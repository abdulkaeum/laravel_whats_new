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

// track down a resource using a custom key i.e posts.slug instead of posts.id posts/1
Route::get('posts/{post:slug}', function (Post $post){
    return $post;
});

//Route Custom Keys With Scoping
// track down the posts using relationships i.e get this users post
// scope is used here users.post_id
Route::get('users/{user}/posts/{post:id}', function (User $user, Post $post){
    return $post;
});

Route::get('newHttpClientGet', function (){

    $data = \Illuminate\Support\Facades\Http::get('https://reqres.in/api/users');

    //dd(collect($data->json()['data']));

    if($data->ok()) {
        return collect($data->json()['data'])->map(fn($user) => $user['email']);
    } else {
        return $data->ok();
    }
});

Route::get('newHttpClientPost', function (){
    $post = \Illuminate\Support\Facades\Http::post('https://reqres.in/api/users', [
        'name' => 'Neo',
        'job' => 'The One'
    ]);

    //dd($post->status());

    if($post->status() == 201){
        return $post->json();
    } else {
        return $post->status();
    }
});

Route::get('classFactories', function (){
    $return = \App\Models\User::factory()->is_admin()->unverified()->make();
    var_dump($return);

    // v7
    //factory(\App\Models\User)->make();
});
