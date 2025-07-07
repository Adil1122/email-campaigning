<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MailTemplate;
class MailTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run()
    {
        MailTemplate::insert([
            [
                'category' => 'Aquila Tech',
                'subject' => 'Make Apps for Your Business Growth',
                'message' => 'Transform your ideas into powerful mobile and web applications tailored to your business needs.',
                'html' => null,
                'smtp' => json_encode([
                    'host' => 'sandbox.smtp.mailtrap.io',
                    'port' => 2525,
                    'username' => '03725dc2c5759c',
                    'password' => '6c76ff67a2d624',
                ]),
                'fromAddress' => 'info@aquilatech.com'
            ],
            [
                'category' => 'Mutee Art',
                'subject' => 'Order Creative Islamic Calligraphy Paintings',
                'message' => 'Bring your walls to life and elevate your interior with our exquisite selection of artwork and decor.',
                'html' => null,
                'smtp' => json_encode([
                    'host' => 'sandbox.smtp.mailtrap.io',
                    'port' => 2525,
                    'username' => 'abd21bf1fc5478',
                    'password' => 'f83da44b5a5c8a',
                ]),
                'fromAddress' => 'info@muteeart.com'
            ],
            [
                'category' => 'Synchro Tv',
                'subject' => 'Efficient and Easy solution to manage screens at your Restuarant',
                'message' => 'Transform your ideas into powerful mobile and web applications tailored to your business needs.',
                'html' => null,
                'smtp' => json_encode([
                    'host' => 'sandbox.smtp.mailtrap.io',
                    'port' => 2525,
                    'username' => '52e33ef97c1f3b',
                    'password' => '4e9da7fad65f85',
                ]),
                'fromAddress' => 'info@synchrotv.com'
            ]
        ]);
    }

}
