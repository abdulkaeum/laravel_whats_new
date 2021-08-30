<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('tools', function (){
    return view('tools');
});

Route::get('stringable', function (){
    $string = 'hello world';

    $data = Str::kebab($string);
    $data = Str::after('hello ', $string);
    $data = Str::plural($string);
    $data = Str::replace(' ', '-', $string);
    $data = Str::wordCount($string);
    $data = Str::substr($string, 5);

    $string = 'hello world';

    $data = Str::of($string)->title()->start('My ')->slug('*');

    return $data;
});

//Casting Eloquent Attributes to Value Objects
// much like using Accessors & Mutators on a Model
// but you now have a dedicated place to do the logic
// You'd create a news class to cast the attribute to placing it within the $casts
// then use that class to implement from CastsAttributes
// and use the get() and set()
