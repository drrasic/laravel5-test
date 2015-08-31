<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    //
    function about() {

        $first = "sarma";
        $last = "dve sarme";

        return view('pages.contact', compact('first', 'last'));
    }
}
