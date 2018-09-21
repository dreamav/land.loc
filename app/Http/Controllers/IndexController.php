<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Page;
use App\Service;
use App\People;
use App\Portfolio;

class IndexController extends Controller
{
    //
    public function execute(Request $request){


        return view("layout.site");
    }
}
