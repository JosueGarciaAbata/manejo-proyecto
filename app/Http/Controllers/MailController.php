<?php

namespace App\Http\Controllers;

use App\Mail\MailSuggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    function sendEmail() {
        $to = "mateoparedeskt1800@gmail.com";
        $msg = "Hola causa";
        $sbj = "La wea penca";
        Mail::to($to)->send(new MailSuggestion($msg,$sbj));
    }

}
