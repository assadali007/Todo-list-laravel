<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main;

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
/*just for checking route
 Route::get('check', function () {
    echo 'test';
}); */

Route::get('/home',[Main::class,'home'])->name('home');

Route::get('/new_task',[Main::class,'new_task'])->name('new_task');
Route::post('/new_task_submit',[Main::class,'new_task_submit'])->name('new_task_submit');

Route::get('/task_done/{id}',[Main::class,'task_done'])->name('task_done');
Route::get('/task_undone/{id}',[Main::class,'task_undone'])->name('task_undone');

Route::get('/update_task_form/{id}',[Main::class,'update_task'])->name('update_task_form');
Route::post('/update_task_submit',[Main::class,'update_task_submit'])->name('update_task_submit');

Route::get('/task_visible/{id}',[Main::class,'task_visible'])->name('task_visible');
Route::get('/task_unvisible/{id}',[Main::class,'task_unvisible'])->name('task_unvisible');

Route::get('list_invisibles',[Main::class,'list_invisibles'])->name('list_invisibles');
Route::get('list_visibles',[Main::class,'list_visibles'])->name('list_visibles');

