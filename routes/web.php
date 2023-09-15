<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\DaftarkController;
use Illuminate\Support\Facades\Route;

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

// halaman melihat data
Route::get('/daftark',[DaftarkController::class,'index']); 
// halaman membuat data 
Route::get('/biodata',[DaftarkController::class,'create']);
// menampilkan data redirect ke halaman
Route::post('/store',[DaftarkController::class,'store']);
// halaman edit data

// untuk menghapus data
Route::delete('/{id}',[DaftarkController::class,'destroy']);




Route::get('/', function () {
    return view('welcome');
});

// Route::get('/daftark', function () {
//     return view('daftark');
// });
Route::get('/kpi', function () {
    return view('kpi');
});
Route::get('/evaluasi', function () {
    return view('evaluasi');
});
Route::get('/jenjangk', function () {
    return view('jenjangk');
});
Route::get('/keahlian', function () {
    return view('keahlian');
});
Route::get('/karyawan', function () {
    return view('karyawan');
});

// Route::get('/biodata', function () {
//     return view('biodata');
// });
Route::get('/detail_jenjang_karir', function () {
    return view('detail_jenjang_karir');
});
Route::get('/te_jenjang_karir', function () {
    return view('te_jenjang_karir');
});
Route::get('/te_kpi', function () {
    return view('te_kpi');
});
Route::get('/te_evaluasi', function () {
    return view('te_evaluasi');
});
Route::get('/te_keahlian', function () {
    return view('te_keahlian');
});
Route::get('/te_pelatihan', function () {
    return view('te_pelatihan');
});


Route::get('/about', function () {
    return 9*9;
});

Route::get('/home', function () {
    return view('home', ['name' => 'cara wkwkwk', 'phone'=>'08....']);
});

//Route::view('/home', 'home', ['name' => 'cara wkwkwk', 'phone'=>'08....']);

//Route::redirect('/home', '/home us');

// Route::get('/product/{id}',function($id){
//     return 'ini adalah product dengan id '.$id;
// });

Route::get('/product/{id}',function($id){
    return view('product.detail', ['id' => $id]);
});

Route::prefix('admin')->group(function(){
    Route::get('/profil-admin',function(){
        return 'profil-admin';
    });
    Route::get('/about-admin',function(){
        return 'about-admin';
    });
    Route::get('/contact-admin',function(){
        return 'contact-admin';
    });
});
