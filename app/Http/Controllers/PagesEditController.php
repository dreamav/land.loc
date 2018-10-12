<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

use App\Http\Requests;

class PagesEditController extends Controller
{
    public function execute(Page $page, Request $request){
        dd($page);
    }
}
