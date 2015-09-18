<?php

namespace App\Http\Controllers;

use App\Push;
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

    function register($token) {

        if(isset($token)) {

        } else {
            abort(404, 'bug');
        }
        $token = new Push();

        $token->token = $token;

        $token->save();

        return response("success", 200);
    }
}
