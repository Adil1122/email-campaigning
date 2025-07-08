<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\WhatsAppAutomation;
use Illuminate\Http\Request;
use App\Imports\RecordsImport;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Models\Record;

class RecordImportController extends Controller
{
    public function showImportForm()
    {


        return view('records.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv,ods',
        ]);

        $file = $request->file('file');
        $fileName = time() . '-' . $file->getClientOriginalName();
        $destinationPath = storage_path('app/temp');

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        $moved = $file->move($destinationPath, $fileName);

        $filePath = $destinationPath . '/' . $fileName;

        (new FastExcel)->import($filePath, function ($line) {

            $record = Record::where([['url', $line['URL']], ['keyword', $line['Keyword']]])->first(['id']);

            if (!$record) {
                Record::create([

                    'keyword' => $line['Keyword'],
                    'business_name' => $line['Business Name'],
                    'url' => $line['URL'],
                    'phone_number' => $line['Phone Number'],
                    'address' => $line['Address'],
                    'category' => $line['Category'],
                    'ratings' => $line['Ratings'],
                    'reviews' => $line['Reviews'],
                    'page_number' => $line['Page Number'],
                    'google_map_link' => $line['Google Map Link'],

                    'google_email_1' => $line['Google Email 1'],
                    'google_email_2' => $line['Google Email 2'],
                    'google_email_3' => $line['Google Email 3'],
                    'google_email_4' => $line['Google Email 4'],
                    'google_email_5' => $line['Google Email 5'],
                    'google_email_6' => $line['Google Email 6'],
                    'google_email_7' => $line['Google Email 7'],

                    'captcha_free_email_1' => $line['Captcha Free Email 1'],
                    'captcha_free_email_2' => $line['Captcha Free Email 2'],
                    'captcha_free_email_3' => $line['Captcha Free Email 3'],

                    'facebook_link' => $line['Facebook Link'],
                    'instagram_link' => $line['Instagram Link'],
                    'twitter_link' => $line['Twitter Link'],
                    'linkedin_link' => $line['LinkedIn Link'],
                    'youtube_link' => $line['YouTube Link'],
                    'contact_us_page' => $line['Contact Us Page']

                ]);
                WhatsAppAutomation::create([
                    'keyword' => $line['Keyword'],
                    'business_name' => $line['Business Name'],
                    'phone_number' => $line['Phone Number'],
                ]);

            }

            return null;

        });

        unlink($filePath);

        return redirect()->back()->with('success', 'Users imported successfully.');
    }
    public function showNumbers()
    {

        $contacts = WhatsAppAutomation::pluck('phone_number');
        return view('records.show_numbers', ['data' => $contacts]);
    }


}
