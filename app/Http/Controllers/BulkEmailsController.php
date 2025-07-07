<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\BulkNotificationMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Record;
use App\Models\MailTemplate;



class BulkEmailsController extends Controller
{
    public function sendBulkEmails($keyword, $category)
    {

        $users = Record::where('keyword', $keyword)->get([
            'business_name',
            'captcha_free_email_1',
            // 'captcha_free_email_2',
            // 'captcha_free_email_3'
        ]);



        $count = 0;

        foreach ($users as $user) {
            if ($count < 3) {
                if ($user->captcha_free_email_1 !== '' && $user->captcha_free_email_1 !== 'Error: could not access') {

                    $this->setEmailUserAndSendEmail($user->business_name, $user->captcha_free_email_1, $category);


                }
                $count++;
            }

        }

        // if ($user->captcha_free_email_2 !== '' && $user->captcha_free_email_2 !== 'Error: could not access') {
        //     $this->setEmailUserAndSendEmail($user->business_name, $user->captcha_free_email_3, $category);
        // }
        // if ($user->captcha_free_email_3 !== '' && $user->captcha_free_email_3 !== 'Error: could not access') {
        //     $this->setEmailUserAndSendEmail($user->business_name, $user->captcha_free_email_3, $category);
        // }


        return "Emails sent successfully.";

    }
    public function setEmailUserAndSendEmail($business_name, $email, $category)
    {
        $template = MailTemplate::where('category', $category)->first([
            'category',
            'subject',
            'message',
            'fromAddress',
            'smtp'
        ]);
      
        if (!$template) {
            throw new \Exception("No template found for category: $category");
        }

        $user = (object) [
            'name' => $business_name,
            'email' => $email
        ];
        $fromAddress = $template->fromAddress;
        $smtp = json_decode($template->smtp, true);
        $subject = $template->subject;
        $message = $template->message;


        config([
            'mail.mailers.smtp.host' => $smtp['host'],
            'mail.mailers.smtp.port' => $smtp['port'],
            'mail.mailers.smtp.username' => $smtp['username'],
            'mail.mailers.smtp.password' => $smtp['password'],
            'mail.mailers.smtp.encryption' => null,
        ]);

        $data = [
            'fromAddress' => $fromAddress,
            'subject' => $subject,
            'message' => $message,
            'category' => $category
        ];


        Mail::to($user->email)->send(new BulkNotificationMail($user, $data));


        // This line won't be reached due to dd() stopping execution

        // Mail::mailer('smtp')->to($user->email)->send(new BulkNotificationMail($user, $data));
    }






}