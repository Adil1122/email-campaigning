<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\BulkNotificationMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Record;

class BulkEmailsController extends Controller
{
    public function sendBulkEmails($keyword, $category) {

        $users = Record::where('keyword', $keyword)->whereDate('created_at', date('Y-m-d'))->get([
            'business_name', 
            'captcha_free_email_1', 
            'captcha_free_email_2', 
            'captcha_free_email_3'
        ]);

        $count = 0;

        foreach ($users as $user) {
            if($count > 3) {
                break;
            }
            $count++;
            //Mail::to('adil7090@gmail.com')->queue(new BulkNotificationMail($user, $data));
            if($user->captcha_free_email_1 !== '' && $user->captcha_free_email_1 !== 'Error: could not access') {
                $this->setEmailUserAndSendEmail($user->business_name, $user->captcha_free_email_1, $category);
            } 
            
            if($user->captcha_free_email_2 !== '' && $user->captcha_free_email_2 !== 'Error: could not access') {
                $this->setEmailUserAndSendEmail($user->business_name, $user->captcha_free_email_2, $category);
            }

            if($user->captcha_free_email_3 !== '' && $user->captcha_free_email_3 !== 'Error: could not access') {
                $this->setEmailUserAndSendEmail($user->business_name, $user->captcha_free_email_3, $category);
            }
        }

        return "Emails sent successfully.";
    }

    public function setEmailUserAndSendEmail($business_name, $email, $category) {

        $user = (object)[
            'name' => $business_name,
            'email' => $email
        ];

        $subject = 'Make Apps for Your Business Growth';
        $message = "Hi " . $business_name . "! Transform your ideas into powerful mobile and web applications tailored to your business needs. We specialize in creating user-friendly, scalable, and innovative apps that deliver exceptional user experiences.";

        if($category == 'Mutee Art') {
            $subject = 'Order Creative Islamic Calligraphy Paintings';
            $message = "Hi " . $business_name . "! Transform your ideas into powerful mobile and web applications tailored to your business needs. We specialize in creating user-friendly, scalable, and innovative apps that deliver exceptional user experiences.";
        }

        $data = [
            'subject' => $subject,
            'message' => $message,
            'category' => $category
        ];

        Mail::to($user->email)->send(new BulkNotificationMail($user, $data));

    }
}
