<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\DaftarkController;
use App\Http\Controllers\JenjangkarirController;
use App\Http\Controllers\Keahlian;
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

// --------------------------------------------DAFTAR KARYAWAN---------------------------------------------------

// halaman menampilkan data daftrak
Route::get('/daftark',[DaftarkController::class,'index']); 
// halaman membuat data 
Route::get('/biodata',[DaftarkController::class,'create']);
// menampilkan data redirect ke halaman
Route::post('/store',[DaftarkController::class,'store']);
// halaman detail data
Route::get('/karyawan/{id}',[DaftarkController::class, 'show']);
// halaman edit biodata karyawan
Route::get('/biodata/{id}/edit_biodata',[DaftarkController::class, 'edit']);
// untuk put biodata
Route::put('/karyawan/{id}',[DaftarkController::class,'update'])->name('biodata.update');
// untuk menghapus data
Route::delete('/{id}',[DaftarkController::class,'destroy']);
Route::delete('/karyawan/{id}', [DaftarkController::class, 'destroy'])->name('daftark.destroy');

// -------------------------------------------------KPI---------------------------------------------------------

// 1-n karyawan dgn kpi
// Route::get('/kpi',[DaftarkController::class,'kpi']);

// ------------------------------------------------EVALUASI-----------------------------------------------------

// 1-n karyawan dgn evaluasi
Route::get('/evaluasi',[DaftarkController::class,'evaluasi']);

// halaman membuat tambah data evaluasi 
Route::get('/karyawan/{id}/tambah_evaluasi',[DaftarkController::class,'create_evaluasi']);
// menampilkan data redirect ke halaman karyawan
Route::post('/store_evaluasi/{id}',[DaftarkController::class,'store_evaluasi']);
// halaman edit evaluasi
Route::get('/karyawan/{id}/edit_evaluasi',[DaftarkController::class, 'edit_evaluasi']);
// untuk put evaluasi
Route::put('/evaluasi/{id}',[DaftarkController::class, 'update_evaluasi'])->name('evaluasi.update');
// untuk menghapus salah satu data evaluasi
Route::delete('/evaluasi/{id}', [DaftarkController::class, 'destroy_evaluasi'])->name('evaluasi.destroy');

// -------------------------------------------JENJANG KARIR-----------------------------------------------------

// 1-n karyawan dgn jenjang karir
Route::get('/jenjangkarir',[DaftarkController::class,'jenjangkarir']);

// halaman detail jenjang karir
Route::get('/karyawan/{id}/detail_jenjangkarir',[DaftarkController::class,'show_jenjangkarir']);
// halaman membuat tambah data jenjang karir 
Route::get('/karyawan/{id}/tambah_jenjangkarir',[DaftarkController::class,'create_jenjangkarir']);
// menampilkan data redirect ke halaman detail jenjang karir
Route::post('/store_jenjangkarir/{id}',[DaftarkController::class,'store_jenjangkarir']);
// halaman edit jenjang karir
Route::get('/detail_jenjangkarir/{id}/edit_jenjangkarir',[DaftarkController::class, 'edit_jenjangkarir']);
// untuk put
Route::put('/detail_jenjangkarir/{id}',[DaftarkController::class, 'update_jenjangkarir']);
// untuk menghapus salah satu data jenjang karir
Route::delete('/detail_jenjangkarir/{id}',[DaftarkController::class,'destroy_jenjangkarir']);

// ---------------------------------------------KEAHLIAN-------------------------------------------------------

// 1-n karyawan dgn keahlian
Route::get('/keahlian',[DaftarkController::class,'keahlian']);

// halaman membuat tambah data keahlian 
Route::get('/karyawan/{id}/tambah_keahlian',[DaftarkController::class,'create_keahlian']);
// menampilkan data redirect ke halaman karyawan
Route::post('/store_keahlian/{id}',[DaftarkController::class,'store_keahlian']);
// halaman edit keahlian
Route::get('/karyawan/{id}/edit_keahlian',[DaftarkController::class, 'edit_keahlian']);
// untuk put keahlian
Route::put('/keahlian/{id}',[DaftarkController::class, 'update_keahlian'])->name('keahlian.update');
// untuk menghapus salah satu data keahlian
Route::delete('/keahlian/{id}', [DaftarkController::class, 'destroy_keahlian'])->name('keahlian.destroy');

// ---------------------------------------------PELATIHAN------------------------------------------------------

// 1-n karyawan dgn pelatihan
Route::get('/pelatihan',[DaftarkController::class,'pelatihan']);

// halaman membuat tambah data pelatihan
Route::get('/karyawan/{id}/tambah_pelatihan',[DaftarkController::class,'create_pelatihan']);
// menampilkan data redirect ke halaman detail jenjang karir
Route::post('/store_pelatihan/{id}',[DaftarkController::class,'store_pelatihan']);
// halaman edit pelatihan
Route::get('/karyawan/{id}/edit_pelatihan',[DaftarkController::class, 'edit_pelatihan']);
// untuk put pelatihan
Route::put('/pelatihan/{id}',[DaftarkController::class, 'update_pelatihan'])->name('pelatihan.update');
// untuk menghapus salah satu data jenjang karir
Route::delete('/pelatihan/{id}',[DaftarkController::class,'destroy_pelatihan'])->name('pelatihan.destroy');












Route::get('/', function () {
    return view('welcome');
});

// Route::get('/daftark', function () {
//     return view('daftark');
// });
Route::get('/kpi', function () {
    return view('kpi');
});
// Route::get('/evaluasi', function () {
//     return view('evaluasi');
// });
// // Route::get('/jenjangkarir', function () {
//     return view('jenjangkarir');
// });
// Route::get('/keahlian', function () {
//     return view('keahlian');
// });
// Route::get('/karyawan', function () {
//     return view('karyawan');
// });

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
Route::get('/tambah_evaluasi', function () {
    return view('tambah_evaluasi');
});
// Route::get('/te_keahlian', function () {
//     return view('te_keahlian');
// });
// Route::get('/te_pelatihan', function () {
//     return view('te_pelatihan');
// });


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
