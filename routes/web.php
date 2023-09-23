<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\DaftarkController;
use App\Http\Controllers\JenjangkarirController;
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

// halaman menampilkan data
Route::get('/daftark',[DaftarkController::class,'index']); 
// halaman membuat data 
Route::get('/biodata',[DaftarkController::class,'create']);
// menampilkan data redirect ke halaman
Route::post('/store',[DaftarkController::class,'store']);
// halaman detail data
Route::get('/karyawan/{id}',[DaftarkController::class, 'show']);
// halaman edit biodata karyawan
Route::get('/biodata/{id}/edit_biodata',[DaftarkController::class, 'edit']);
// untuk put
Route::put('/karyawan/{id}',[DaftarkController::class,'update']);
// untuk menghapus data
Route::delete('/{id}',[DaftarkController::class,'destroy']);
Route::delete('/karyawan/{id}',[DaftarkController::class,'destroy']);

// 1-n karyawan dgn jenjang karir
Route::get('/jenjangkarir',[DaftarkController::class,'jenjangkarir']);

// halaman detail jenjang karir
Route::get('/karyawan/{id}/detail_jenjangkarir',[DaftarkController::class,'show_jenjangkarir']);
// halaman membuat tambah data jenjang karir 
Route::get('/karyawan/{id}/tambah_jenjangkarir',[DaftarkController::class,'create_jenjangkarir']);
// menampilkan data redirect ke halaman detail jenjang karir
Route::post('/store_jenjangkarir/{id}',[DaftarkController::class,'store_jenjangkarir']);
// untuk menghapus salah satu data jenjang karir
Route::delete('/detail_jenjangkarir/{id}',[DaftarkController::class,'destroy_jenjangkarir']);



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
// Route::get('/jenjangkarir', function () {
//     return view('jenjangkarir');
// });
Route::get('/keahlian', function () {
    return view('keahlian');
});
Route::get('/karyawan', function () {
    return view('karyawan');
});

// Route::get('/biodata', function () {
//     return view('biodata');
// });
// Route::get('/detail_jenjangkarir', function () {
//     return view('detail_jenjangkarir');
// });
// Route::get('/te_jenjangkarir', function () {
//     return view('te_jenjangkarir');
// });
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
