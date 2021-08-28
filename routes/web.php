<?php

use Illuminate\Support\Facades\Route;

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
    //if you were to have a massive set of data  User::all() will crash
    // this will run x many records query plus x many collections all at once
    //$users = App\Models\User::all();

    // lazy collection returns a generator
    // reduces memory consumption so server can handle load
    // not loading it all into memory
    // no queries are run here
    $users = App\Models\User::cursor();

    // no queries are run until you pull it out from the lazy collection returned as per below
    dd($users->first()->name);
});
