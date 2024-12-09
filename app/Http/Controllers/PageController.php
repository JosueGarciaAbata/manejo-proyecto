<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show(){
        return view('pages.page.data');
    }
    public function ourSlogan(){
        return view('pages.page.slogan');
    }

    public function aboutOrganization(){
        return view('pages.page.organization');
    }

    public function watchFooter(){
        return view('pages.page.footer');
    }
}
