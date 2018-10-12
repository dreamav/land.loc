<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

use App\Http\Requests;

class PagesEditController extends Controller
{
    public function execute(Page $page, Request $request){

        $old = $page->toArray();
        if (view()->exists('admin.pages_edit')){
            $data = [
                'title' => 'Редактирование страницы - '.$old['name'],
                'data' => $old
            ];

            return view('admin.pages_edit',$data);
        }
    }
}
