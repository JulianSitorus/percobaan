<?php

namespace App\Http\Controllers;

use App\Models\Daftark;
use Illuminate\Http\Request;

class DaftarkController extends Controller
{
    // halaman daftark dan fungsi search
    public function index(Request $request){
        $search = $request->search;
        $daftark = Daftark::where('nama_karyawan', 'LIKE', '%'.$search.'%')
                    ->orWhere('posisi', 'LIKE', '%'.$search.'%')
                    ->orWhere('unit', 'LIKE', '%'.$search.'%')
                    ->orWhere('departemen', 'LIKE', '%'.$search.'%')
                    ->orWhere('status', 'LIKE', '%'.$search.'%')
                    ->paginate(12);
        // $pagination = 12;
        // $daftark = Daftark::paginate($pagination);
        return view ('daftark',['daftark' => $daftark]);
        // return view ('daftark',compact(['daftark']));
    }

    // halaman tambah biodata
    public function create(){
        return view('biodata');
    }

    // halaman tambah biodata 
    public function store(Request $request){
        $daftark = Daftark::create($request->except(['_token','submit']));
        // menambah foto
        if($request->hasFile('foto')){
            $request-> file('foto')->move('fotokaryawan/', $request->file('foto')->getClientOriginalName());
            $daftark->foto  = $request->file('foto')->getClientOriginalName();
            $daftark->save();
        }
        return redirect('daftark')->with('success', 'Data telah ditambahkan!');
    }

    // hapus biodata
    public function destroy($id){
        $daftark = Daftark::find($id);
        $daftark->delete();
        return redirect('daftark')->with('success', 'Data telah dihapus!');;
    }
}
