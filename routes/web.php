<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\PostsController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

Route::group(['middleware' => ['auth', 'role:admin']], function() { 
    Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');
});

Route::group(['middleware' => ['auth', 'role:student']], function() { 
    Route::get('/dashboard/achievement', 'App\Http\Controllers\DashboardController@achievement')->name('dashboard.achievement');
});

Route::group(['middleware' => ['auth', 'role:admin']], function() { 
    Route::get('/dashboard/addusers', 'App\Http\Controllers\DashboardController@users')->name('dashboard.users');
});

Route::get('/dashboard/myprofile', [PostsController::class, 'create'])->name('dashboard.myprofile');
Route::post('/dashboard/myprofile' , function(){
    Post::create([
        'title' => request('title'),
        'date' => request('date'),
        'description' => request('description')
    ]);
    return redirect('dashboard');
});

require __DIR__.'/auth.php';
