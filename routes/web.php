<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');

    // \ ********************************************************************************
    // \
    // \ THIS IS THE BASIC QUERY, WHICH GETS THE JOB DONE BUT NOT AS POWERFUL AS LARAVEL'S
    // \ BUILT-IN QUERY BUILDER
    // \
    // \ ********************************************************************************

    // view users
    // $user = DB::select('select * from users');

    // insert users
    // $users = DB::insert('insert into users (name, email, password) values (?, ?, ?)', ['John Doe', 'john@example.com', 'password']);

    // update users
    // $users = DB::update("update users set email='ahj@gmail.com' where id='2'");
    // $users = DB::update("update users set email=? where id=?", ['ahj@gmail.com', '2']);

    // delete users
    // $users = DB::delete('delete from users where id = ?', [1]);

    // dd($user);
    // dd($user);

    // \ ********************************************************************************
    // \
    // \ THIS IS THE LARAVEL'S BUILT-IN QUERY BUILDER
    // \
    // \ ********************************************************************************

    // get users
    // $users = DB::table('users')->get();
    // $users = DB::table('users')->where('id', 2)->get();

    // $user = DB::table('users')->insert([
    //     'name' => 'Amalina',
    //     'email' => 'ijah@example.com',
    //     'email_verified_at' => now(),
    //     'password' => Hash::make('password'),
    //     'remember_token' => Str::random(10),
    //     'created_at' => now(),
    //     'updated_at' => now(),
    // ]);

    // \
    // \ SAME GOES TO UPDATE AND DELETE
    // \

    // \ ********************************************************************************
    // \
    // \ THIS IS THE LARAVEL'S ELOQUENT ORM
    // \ YOU WILL HAVE MORE POWER OVER YOUR DEVELOPMENT DOWN TO SMALLEST SETTINGS
    // \
    // \ ********************************************************************************

    // get users
    // $users = User::where('id', 6)->first();
    // $user = User::where('name','Norizam')->get();
    // $user = User::find(8);

    // create users
    // $user = User::create([
    //     'name' => 'Ameera',
    //     'email' => 'meera@example.com',
    //     'password' => 'password',
    // ]);

    // update user
    // $user = User::where('id', 6)->update([
    //     'name' => 'Hassan',
    //     'email' => 'hassan@example.com',
    // ]);

    // \ 
    // \ same goes to delete
    // \ 

    // dd($user);
    // dd($user->name);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
