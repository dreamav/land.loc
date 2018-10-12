<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

use App\Http\Requests;

class PagesEditController extends Controller
{
    public function execute($id){
        $page = Page::find($id);

        dd($page);
    }
}
