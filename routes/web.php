<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordImportController;
use App\Http\Controllers\BulkEmailsController;
use Illuminate\Support\Facades\Mail;

use App\Mail\TestMail;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/show_import_form', [RecordImportController::class, 'showImportForm']);
Route::post('/import', [RecordImportController::class, 'import']);
Route::get('/send_bulk_emails/{keyword}/{category}', [BulkEmailsController::class, 'sendBulkEmails']);
Route::get('/show_numbers', [RecordImportController::class, 'showNumbers']);
