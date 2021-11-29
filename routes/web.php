<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\BooksController;

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

Route::get('/test', function () {
    return "This is a test message";
});

Route::get('/training', function () {
    return view('bahan/training');
});

Route::get('/welcome/{name}', function ($name) {
    return "Hello: " .$name;
});

Route::get('/welcomes/{name}/{id}', function ($name, $id) {
    return "Hello: " .$name. " Your ID is: " .$id;
});

Route::get('/display', function () {
    $tajuk = "Kursus Laravel Framework";
    return view('bahan/training')->with('tajuk',$tajuk);
});

Route::get('/multi', function () {
    $a = array(
        'tajuk' => 'Laravel Framework',
        'name' => ['ali','abu','bakar'],
        'test' => 'Testing'
    );
    return view('bahan/training')->with($a);
});

Route::get('/start', [PagesController::class, 'index']);
Route::get('/sum/{a}/{b}', [PagesController::class, 'total']);

Route::get('/maklumat', function(){
    return view('pages/maklumat');
});

Route::resource('books', BooksController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/ubah', [App\Http\Controllers\BooksController::class, 'ubah'])->name('home');
