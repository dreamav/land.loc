<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(["middleware"=>"web"],function (){
    Route::match(["get","post"],"/",["uses"=>"IndexController@execute","as"=>"home"]);
    Route::get("/page/{alias}",["uses"=>"PageController@execute","as"=>"page"]);

    Route::auth();
});

// admin/service или admin/portfolios admin/pages
Route::group(["prefix"=>"admin","middleware"=>"auth"],function (){
    // admin/ главная стр админки
    Route::get('/',function (){

    });
    // admin/pages и тут манипуляции со страницами
    Route::group(["prefix"=>"pages"], function (){
        // главная страница
        Route::get("/",["uses"=>"PagesController@execute","as"=>"pages"]);
        // get показываем форму добавления новой страницы
        // post сохраняем данные с формы
        Route::match(["get","post"],"/add",["uses"=>"PagesAddController@execute","as"=>"pagesAdd"]);
        // admin/pages/edit/{page}
        Route::match(["get","post","delete"],"/edit/{page}",["uses"=>"PagesEditController@execute","as"=>"pagesEdit"]);
    });
    // admin/portfolio и тут манипуляции со страницами
    Route::group(["prefix"=>"portfolio"], function (){
        // главная страница
        Route::get("/",["uses"=>"PortfolioController@execute","as"=>"portfolio"]);
        // get показываем форму добавления новой записи в портфолио
        // post сохраняем данные с формы
        Route::match(["get","post"],"/add",["uses"=>"PortfolioAddController@execute","as"=>"portfolioAdd"]);
        // admin/portfolio/edit/{portfolio}
        Route::match(["get","post","delete"],"/edit/{portfolio}",["uses"=>"PortfolioEditController@execute","as"=>"portfolioEdit"]);
    });
    // admin/service и тут манипуляции со страницами
    Route::group(["prefix"=>"services"], function (){
        // главная страница
        Route::get("/",["uses"=>"ServiceController@execute","as"=>"services"]);
        // get показываем форму добавления новой записи в портфолио
        // post сохраняем данные с формы
        Route::match(["get","post"],"/add",["uses"=>"ServiceAddController@execute","as"=>"serviceAdd"]);
        // admin/service/edit/{service}
        Route::match(["get","post","delete"],"/edit/{service}",["uses"=>"ServiceEditController@execute","as"=>"serviceEdit"]);
    });
});