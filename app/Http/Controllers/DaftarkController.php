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

    // menampilkan halaman menambah biodata
    public function create(){
        return view('biodata');
    }

    // cara tambah biodata 
    public function store(Request $request){
        $daftark = Daftark::create($request->except(['_token','submit']));
        // menambah foto
        if($request->hasFile('foto')){
            $request-> file('foto')->move('fotokaryawan/', $request->file('foto')->getClientOriginalName());
            $daftark->foto  = $request->file('foto')->getClientOriginalName();
            $daftark->save();
        };
        return redirect('daftark')->with('success', 'Data telah ditambahkan!');

        // pesan error kalo tidak field kosong (gatau berfungsi apa gak ni kodingan)
        $validateData = $request->validate([
            'nama_karyawan' => 'required|min:2',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'pendidikan' => 'required',
            'pekerjaan_terakhir' => 'required',
            'status' => 'required',
            'posisi' => 'required',
            'unit' => 'required',
            'departemen' => 'required',
            'foto' => 'required',
        ]);
    }

    // halaman detail
    public function show($id){
        $daftark = Daftark::findOrFail($id);
        return view('karyawan', ['daftark' => $daftark]);
    }

    // edit
    public function edit($id){   
        $daftark = Daftark::find($id);
        return view('edit_biodata', compact(['daftark']));
    }

    // update
    public function update($id, Request $request)
    {
        $daftark = Daftark::find($id);
        $daftark-> update($request->except(['_token','submit']));
        if($request->hasFile('foto')){
            $request-> file('foto')->move('fotokaryawan/', $request->file('foto')->getClientOriginalName());
            $daftark->foto  = $request->file('foto')->getClientOriginalName();
            $daftark->save();
        };
        return view('karyawan', ['daftark' => $daftark]);
    }


    // hapus biodata
    public function destroy($id){
        $daftark = Daftark::find($id);
        $daftark->delete();
        return redirect('daftark')->with('success', 'Data telah dihapus!');
    }
}
