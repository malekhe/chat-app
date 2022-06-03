<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\FichiersController;
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


Route::get('/',HomeController::class)->name('home.show'); 
Route::get('signup', function () {
    return view('utilisateurs.signup');
})->name('signup.show');




Route::get('login', function () {
    return view('utilisateurs.login');
})->name('login.show');

Route::get('chat', function () {
    return view('chat.chat');
})->name('chat.sh');

Route::resource('user',UserController::class);

Route::post('signup/si',[UserController::class,'store1'])->name('user.store1');
Route::get('signup/alo',[UserController::class,'store'])->name('user.signup');

Route::get('login/alo',[UserController::class,'login'])->name('user.login');
Route::get('logout',[UserController::class,'logout'])->name('user.logout');
Route::get('acess', function () {
    return view('chat.index');
})->name('chat.show');

Route::get('acess/verif',[UserController::class,'acess'])->name('user.acess');
Route::get('users',[UserController::class,'users'])->name('users.show');
Route::get('users/{user}',[MessageController::class,'getChat'])->name('chat.get');
Route::get('cours',[FichiersController::class,'show'])->name('cours.show');
Route::get('cours/telecharger/{fichier}',[FichiersController::class,'telecharger'])->name('cours.telecharger');
Route::get('cours/delete/{fichier}',[FichiersController::class,'destroy'])->name('cours.delete');
Route::post('cours/upload',[FichiersController::class,'upload'])->name('cours.upload');

Route::get('etudiant',[UserController::class,'users2'])->name('etudiant.show');
Route::get('prof',[UserController::class,'users3'])->name('prof.show');
Route::get('user/{user}',[UserController::class,'destroy'])->name('user.destroy');
Route::get('message',[MessageController::class,'insert'])->name('message.insert');




