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
    // addSelect = a sub query to get the most recent posts title for user 15 and 2

    $data = App\Models\User::addSelect(['my_new_key' => function($query){
        $query->select('title')
            ->from('posts')
            ->whereColumn('user_id', 'users.id')
            ->limit(1)
            ->latest();
    }])->find([15, 2]);

    //  orderBy and orderByDesc

    $data1 = App\Models\User::orderBy(function ($query){
        $query->select('created_at')
            ->from('posts')
            ->latest()
            ->whereColumn('posts.id', 'users.id')
            ->limit(1);
    })->find([15, 2]);

    dd($data1);
});
