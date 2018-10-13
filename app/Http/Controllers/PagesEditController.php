<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;


class PagesEditController extends Controller
{
    public function execute(Page $page, Request $request){

        if( $request->isMethod('post') ){
            $input = $request->except('_token');

            $validator = Validator::make($input,[
                'name'=>'required|max:255',
                'alias'=>'required|max:255|unique:pages',
                'text'=>'required',
            ]);

            if($validator->fails()){
                return redirect()
                        ->route('pagesEdit',['pages'=>$input['id']])
                        ->withErrors($validator);
            }

            if( $request->hasFile('images') ){
                $file = $request->file('images');
                $file->move(public_path().'/assets/img/',$file->getClientOriginalName());
                $input['images'] = $file->getClientOriginalName();
            } else {
                $input['images'] = $input['old_images'];
            }

            unset($input['old_images']);


        }

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
