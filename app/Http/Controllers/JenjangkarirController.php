<?php

namespace App\Http\Controllers;
use App\Models\Jenjangkarir;

use Illuminate\Http\Request;

class JenjangkarirController extends Controller
{
    // public function index(Request $request){
    //     $search = $request->search;
    //     $jenjangkarir = Jenjangkarir::where('nama_karyawan', 'LIKE', '%'.$search.'%')
    //                 // ->orWhere('posisi', 'LIKE', '%'.$search.'%')
    //                 // ->orWhere('unit', 'LIKE', '%'.$search.'%')
    //                 // ->orWhere('departemen', 'LIKE', '%'.$search.'%')
    //                 ->orWhere('status', 'LIKE', '%'.$search.'%')
    //                 ->paginate(12);
    //     // $pagination = 12;
    //     // $daftark = Daftark::paginate($pagination);
    //     return view ('jenjangkarir',['jenjangkarir' => $jenjangkarir]);
    //     // return view ('daftark',compact(['daftark']));
    // }
}
