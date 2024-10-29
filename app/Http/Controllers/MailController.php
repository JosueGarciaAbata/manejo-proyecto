<?php

namespace App\Http\Controllers;

use App\Mail\MailSuggestion;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    function sendEmail($email) {
        if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            return view('errors.404');
        }
        $to = $email;
        $msg = "Apreciamos tu voto";
        $sbj = "Registro de voto";
        Mail::to($to)->send(new MailSuggestion($msg,$sbj));
    }

}
