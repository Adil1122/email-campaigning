<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\BulkNotificationMail;
use Illuminate\Support\Facades\Mail;

class BulkEmailsController extends Controller
{
    public function sendBulkEmails() {

        //$users = User::whereNotNull('email')->get();

        $data = [
            'subject' => 'Big Update for You!',
            'message' => 'We have an exciting new feature launching this week.'
        ];

        //$user = [];
        $user = (object)[
            'name' => 'Muhammad Adil',
            'email' => 'adil7090@gmail.com'
        ];

        //foreach ($users as $user) {
            //Mail::to('adil7090@gmail.com')->queue(new BulkNotificationMail($user, $data));
            Mail::to($user->email)->send(new BulkNotificationMail($user, $data));
        //}

        return "Emails sent successfully.";
    }
}
