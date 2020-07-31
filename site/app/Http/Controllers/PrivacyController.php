<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    function privacyIndex() {

        return view('Privacy');
    }
}
