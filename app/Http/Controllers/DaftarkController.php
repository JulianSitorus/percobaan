<?php

namespace App\Http\Controllers;

use App\Models\Daftark;
use App\Models\Evaluasi;
use App\Models\Jenjangkarir;
use App\Models\Keahlian;
use App\Models\Pelatihan;
use Illuminate\Http\Request;

class DaftarkController extends Controller
{
    // halaman daftark dan fungsi search
    public function index(Request $request){
        $search = $request->search;
        $daftark = Daftark::with('jenjangkarir')
                    ->where('nama_karyawan', 'LIKE', '%'.$search.'%')
                    ->orWhere('no_telp', 'LIKE', '%'.$search.'%')
                    ->orWhere('email', 'LIKE', '%'.$search.'%')
                    ->orWhere('status', 'LIKE', '%'.$search.'%')
                    ->orWhereHas('jenjangkarir', function($query) use($search) {
                        $query->where('departemen', 'LIKE', '%'.$search.'%');
                    })
                    ->orWhereHas('jenjangkarir', function($query) use($search) {
                        $query->where('unit', 'LIKE', '%'.$search.'%');
                    })
                    ->orWhereHas('jenjangkarir', function($query) use($search) {
                        $query->where('posisi', 'LIKE', '%'.$search.'%');
                    })

                    ->paginate(12);
        return view ('daftark',['daftark' => $daftark]);
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
        return redirect('daftark')->with('success', 'Data Karyawan telah ditambahkan!');
    }


    // halaman detail karyawan
    public function show($id){
        $daftark = Daftark::findOrFail($id);
        session(['daftark_id' => $daftark->id]);
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
        // Temukan objek Karyawan berdasarkan ID
        $daftark = Daftark::find($id);

        if ($daftark) {
            // Hapus semua data Jenjang Karir yang terkait
            $daftark->jenjangkarir()->delete();
            $daftark->keahlian()->delete();
            $daftark->pelatihan()->delete();

            // Hapus objek Karyawan itu sendiri
            $daftark->delete();

            // Redirect atau berikan respons yang sesuai
            return redirect('daftark')->with('success', 'Data karyawan telah dihapus!');
        } else {
            // Handle jika Karyawan tidak ditemukan
            return redirect('daftark')->with('error', 'Karyawan tidak ditemukan.');
        }
    }

    // ------------------------------------------------------------------------------------------------

    public function evaluasi(Request $request){
        
        $search = $request->search;
        $daftark = Daftark::with('evaluasi', 'jenjangkarir')
                    ->where('nama_karyawan', 'LIKE', '%'.$search.'%')
                    ->orWhereHas('jenjangkarir', function($query) use($search) {
                        $query->where('departemen', 'LIKE', '%'.$search.'%');
                    })
                    ->orWhereHas('jenjangkarir', function($query) use($search) {
                        $query->where('posisi', 'LIKE', '%'.$search.'%');
                    })
                    ->orWhereHas('evaluasi', function($query) use($search) {
                        $query->where('tanggal_evaluasi', 'LIKE', '%'.$search.'%');
                    })
                    ->orWhereHas('evaluasi', function($query) use($search) {
                        $query->where('total_keseluruhan', 'LIKE', '%'.$search.'%');
                    })
                    ->orWhereHas('evaluasi', function($query) use($search) {
                        $query->where('total_keseluruhan2', 'LIKE', '%'.$search.'%');
                    })
                    ->orWhereHas('evaluasi', function($query) use($search) {
                        $query->where('kerja', 'LIKE', '%'.$search.'%');
                    })
                    ->orWhereHas('evaluasi', function($query) use($search) {
                        $query->where('rekomendasi', 'LIKE', '%'.$search.'%');
                    })
                    ->orWhereHas('evaluasi', function($query) use($search) {
                        $query->where('komentar_kekuatan', 'LIKE', '%'.$search.'%');
                    })
                    ->orWhereHas('evaluasi', function($query) use($search) {
                        $query->where('komentar_kelemahan', 'LIKE', '%'.$search.'%');
                    })
                    ->orWhereHas('evaluasi', function($query) use($search) {
                        $query->where('komentar_pelatihan', 'LIKE', '%'.$search.'%');
                    })
                    ->paginate(12);  
        
        $daftarks = Daftark::with('jenjangkarir')->get();
        

        return view ('evaluasi', [
            'daftark' => $daftark,
            'daftarks' => $daftarks,
        ]);
    }

    // menampilkan halaman tambah evaluasi
    public function create_evaluasi($id){
        
        $daftark = Daftark::all();
        $daftark = Daftark::find($id);
        return view('tambah_evaluasi', compact(['daftark']));
    }

    // request tambah evaluasi
    public function store_evaluasi(Request $request, $id) {
        $totalKeseluruhan = $request->input('total_keseluruhan');
        $totalKeseluruhan2 = $request->input('total_keseluruhan2');

        $daftark = Daftark::find($id);
        
        if ($daftark) {
            // Buat objek evaluasi baru
            $evaluasi = new Evaluasi([                
                'nama_kd' => $request->nama_kd,
                'tempat_evaluasi' => $request->tempat_evaluasi,
                'tanggal_evaluasi' => $request->tanggal_evaluasi,
                'tipe_evaluasi' => $request->tipe_evaluasi,

                'tingkat_keahlian_pertanyaan_1' => $request->tingkat_keahlian_pertanyaan_1,
                'komentar_pertanyaan_1' => $request->komentar_pertanyaan_1,
                'tingkat_keahlian_pertanyaan_2' => $request->tingkat_keahlian_pertanyaan_2,
                'komentar_pertanyaan_2' => $request->komentar_pertanyaan_2,
                'tingkat_keahlian_pertanyaan_3' => $request->tingkat_keahlian_pertanyaan_3,
                'komentar_pertanyaan_3' => $request->komentar_pertanyaan_3,
                'tingkat_keahlian_pertanyaan_4' => $request->tingkat_keahlian_pertanyaan_4,
                'komentar_pertanyaan_4' => $request->komentar_pertanyaan_4,
                'tingkat_keahlian_pertanyaan_5' => $request->tingkat_keahlian_pertanyaan_5,
                'komentar_pertanyaan_5' => $request->komentar_pertanyaan_5,
                'tingkat_keahlian_pertanyaan_6' => $request->tingkat_keahlian_pertanyaan_6,
                'komentar_pertanyaan_6' => $request->komentar_pertanyaan_6,
                'tingkat_keahlian_pertanyaan_7' => $request->tingkat_keahlian_pertanyaan_7,
                'komentar_pertanyaan_7' => $request->komentar_pertanyaan_7,
                'tingkat_keahlian_pertanyaan_8' => $request->tingkat_keahlian_pertanyaan_8,
                'komentar_pertanyaan_8' => $request->komentar_pertanyaan_8,
                'tingkat_keahlian_pertanyaan_9' => $request->tingkat_keahlian_pertanyaan_9,
                'komentar_pertanyaan_9' => $request->komentar_pertanyaan_9,
                'tingkat_keahlian_pertanyaan_10' => $request->tingkat_keahlian_pertanyaan_10,
                'komentar_pertanyaan_10' => $request->komentar_pertanyaan_10,

                'tingkat_keahlian2_pertanyaan_1' => $request->tingkat_keahlian2_pertanyaan_1,
                'komentar2_pertanyaan_1' => $request->komentar2_pertanyaan_1,
                'tingkat_keahlian2_pertanyaan_2' => $request->tingkat_keahlian2_pertanyaan_2,
                'komentar2_pertanyaan_2' => $request->komentar2_pertanyaan_2,
                'tingkat_keahlian2_pertanyaan_3' => $request->tingkat_keahlian2_pertanyaan_3,
                'komentar2_pertanyaan_3' => $request->komentar2_pertanyaan_3,
                'tingkat_keahlian2_pertanyaan_4' => $request->tingkat_keahlian2_pertanyaan_4,
                'komentar2_pertanyaan_4' => $request->komentar2_pertanyaan_4,
                'tingkat_keahlian2_pertanyaan_5' => $request->tingkat_keahlian2_pertanyaan_5,
                'komentar2_pertanyaan_5' => $request->komentar2_pertanyaan_5,

                'total_keseluruhan' => $totalKeseluruhan,
                'total_keseluruhan2' => $totalKeseluruhan2,

                'kerja' => $request->kerja,
                'komentar_kerja' => $request->komentar_kerja,
                'rekomendasi' => $request->rekomendasi,
                'komentar_rekomendasi' => $request->komentar_rekomendasi,

                'komentar_kekuatan' => $request->komentar_kekuatan,
                'komentar_kelemahan' => $request->komentar_kelemahan,

                'komentar_pelatihan' => $request->komentar_pelatihan,

                'komentar_catatan' => $request->komentar_catatan,
            ]);

            session(['totalKeseluruhan2' => $totalKeseluruhan2]);
            
            $evaluasi->daftark_id = $daftark->id;

            // Simpan evaluasi
            $evaluasi->save();

            return redirect('/karyawan/'. $daftark->id )->with('success', 'Data jenjang karir telah ditambah!');;
        } else {
            return redirect('/karyawan/'. $daftark->id );
        }
    }

    // edit evaluasi
    public function edit_evaluasi($id){
        // mengambil id daftark dari detail jenjang karir
        $daftark_id = session('daftark_id');
        $daftark = Daftark::find($daftark_id);

        $evaluasi = Evaluasi::find($id);
        return view('edit_evaluasi', compact(['evaluasi', 'daftark']));
    }

    // put evaluasi
    public function update_evaluasi($id, Request $request)
    {   
        $daftark_id = session('daftark_id');
        $daftark = Daftark::find($daftark_id);

        $evaluasi = Evaluasi::find($id);
        $evaluasi->update($request->except(['_token', 'submit']));
        return redirect('/karyawan/'. $daftark->id );
    }

    // hapus keahlian
    public function destroy_evaluasi($id){
        $daftark_id = session('daftark_id');
        $daftark = Daftark::find($daftark_id);

        $evaluasi = Evaluasi::find($id);
        $evaluasi->delete();
        return redirect('/karyawan/'. $daftark->id);
    }

    // ------------------------------------------------------------------------------------------------

    // relation ke jenjang karir
    // public function jenjangkarir(Request $request)
    // {   
    //     $search = $request->search;
    //     $jenjangkarir = Jenjangkarir::with('daftark')
    //                 ->Where('posisi', 'LIKE', '%'.$search.'%')
    //                 ->orWhere('unit', 'LIKE', '%'.$search.'%')
    //                 ->orWhere('departemen', 'LIKE', '%'.$search.'%')
    //                 ->orWhereHas('daftark', function($query) use($search) {
    //                     $query->where('nama_karyawan', 'LIKE', '%'.$search.'%');
    //                 })
    //                 ->paginate(12);
    //     return view('jenjangkarir', ['jenjangkarir' => $jenjangkarir]);
    // }

    
    public function jenjangkarir(Request $request){
        $search = $request->search;
        $daftark = Daftark::with('jenjangkarir')
                    ->where('nama_karyawan', 'LIKE', '%'.$search.'%')
                    ->orWhereHas('jenjangkarir', function($query) use($search) {
                        $query->where('departemen', 'LIKE', '%'.$search.'%');
                    })
                    ->orWhereHas('jenjangkarir', function($query) use($search) {
                        $query->where('unit', 'LIKE', '%'.$search.'%');
                    })
                    ->orWhereHas('jenjangkarir', function($query) use($search) {
                        $query->where('posisi', 'LIKE', '%'.$search.'%');
                    })
                    ->orWhereHas('jenjangkarir', function($query) use($search) {
                        $query->where('tanggal_mulai', 'LIKE', '%'.$search.'%');
                    })
                    ->orWhereHas('jenjangkarir', function($query) use($search) {
                        $query->where('tanggal_selesai', 'LIKE', '%'.$search.'%');
                    })

                    ->paginate(12);
        return view ('jenjangkarir',['daftark' => $daftark]);
    }

    // halaman detail jenjang karir
    public function show_jenjangkarir($id){
        $daftark = Daftark::find($id);
        // menyimpan id daftark untuk tombol kembali di halaman edit
        session(['daftark_id' => $daftark->id]);
        $daftark = Daftark::findOrFail($id);
        return view('detail_jenjangkarir', ['daftark' => $daftark]);
    }

    // menampilkan halaman menambah jenjang karir
    public function create_jenjangkarir($id){
        $daftark = Daftark::all();
        $daftark = Daftark::find($id);
        return view('tambah_jenjangkarir', compact(['daftark']));
    }

    // cara tambah jenjangkarir
    public function store_jenjangkarir(Request $request, $id) {
        // Temukan objek Daftark berdasarkan id
        $daftark = Daftark::find($id);
    
        if ($daftark) {
            // Buat objek Jenjangkarir baru
            $jenjangkarir = new Jenjangkarir([
                'posisi' => $request->posisi,
                'unit' => $request->unit,
                'departemen' => $request->departemen,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_selesai' => $request->tanggal_selesai,
            ]);
    
            // Hubungkan Jenjangkarir dengan Daftark
            $jenjangkarir->daftark_id = $daftark->id;
    
            // Simpan Jenjangkarir
            $jenjangkarir->save();
    
            return redirect('/karyawan/'. $daftark->id . '/detail_jenjangkarir/')->with('success', 'Data jenjang karir telah ditambah!');;
        } else {
            return redirect('/karyawan/'. $daftark->id . '/detail_jenjangkarir/');
        }
    }

    // edit jenjang karir
    public function edit_jenjangkarir($id){
        // mengambil id daftark dari detail jenjang karir
        $daftark_id = session('daftark_id');
        $daftark = Daftark::find($daftark_id);

        $jenjangkarir = Jenjangkarir::find($id);
        return view('edit_jenjangkarir', compact(['jenjangkarir', 'daftark']));
    }

    // put jenjang karir
    public function update_jenjangkarir($id, Request $request)
    {   
        $daftark_id = session('daftark_id');
        $daftark = Daftark::find($daftark_id);

        $jenjangkarir = Jenjangkarir::find($id);
        $jenjangkarir->update($request->except(['_token', 'submit']));
        return redirect('/karyawan/'. $daftark->id . '/detail_jenjangkarir/');
    }

    // hapus salah satu data jenjang karir
    public function destroy_jenjangkarir($id){   
        $jenjangkarir = Jenjangkarir::find($id);
        
        if ($jenjangkarir) {
            $daftark_id = $jenjangkarir->daftark_id; // ambil id Daftark yang terkait dengan Jenjangkarir
            $jenjangkarir->delete();
            
            return redirect('/karyawan/'.$daftark_id. '/detail_jenjangkarir')->with('success', 'Data Jenjangkarir berhasil dihapus.');
        } else {
            return redirect('/karyawan')->with('error', 'Jenjangkarir tidak ditemukan.');
        }
    }
    
    // ------------------------------------------------------------------------------------------------

    // relation ke keahlian
    public function keahlian(Request $request){
        $search = $request->search;
        $daftark = Daftark::with('keahlian')
                    ->where('nama_karyawan', 'LIKE', '%'.$search.'%')
                    ->orWhereHas('keahlian', function($query) use($search) {
                        $query->where('jenis_keahlian', 'LIKE', '%'.$search.'%');
                    })
                    ->paginate(12);
        return view ('keahlian',['daftark' => $daftark]);
    }

    // menampilkan halaman tambah keahlian
    public function create_keahlian($id){
        $daftark = Daftark::all();
        $daftark = Daftark::find($id);
        return view('tambah_keahlian', compact(['daftark']));
    }

    // cara tambah keahlian
    public function store_keahlian(Request $request, $id) {
        // Temukan objek Daftark berdasarkan id
        $daftark = Daftark::find($id);
    
        if ($daftark) {
            // Buat objek Keahlian baru
            $keahllian = new Keahlian([
                'jenis_keahlian' => $request->jenis_keahlian,
                'tingkat_keahlian' => $request->tingkat_keahlian,
            ]);
    
            // Hubungkan Jenjangkarir dengan Daftark
            $keahllian->daftark_id = $daftark->id;
    
            // Simpan Jenjangkarir
            $keahllian->save();
    
            return redirect('/karyawan/'. $daftark->id )->with('success', 'Data jenjang karir telah ditambah!');;
        } else {
            return redirect('/karyawan/'. $daftark->id );
        }
    }

    // edit keahlian
    public function edit_keahlian($id){
        // mengambil id daftark dari detail jenjang karir
        $daftark_id = session('daftark_id');
        $daftark = Daftark::find($daftark_id);

        $keahlian = Keahlian::find($id);
        return view('edit_keahlian', compact(['keahlian', 'daftark']));
    }

    // put keahlian
    public function update_keahlian($id, Request $request)
    {   
        $daftark_id = session('daftark_id');
        $daftark = Daftark::find($daftark_id);

        $keahlian = Keahlian::find($id);
        $keahlian->update($request->except(['_token', 'submit']));
        return redirect('/karyawan/'. $daftark->id );
    }

    // hapus keahlian
    public function destroy_keahlian($id){
        $daftark_id = session('daftark_id');
        $daftark = Daftark::find($daftark_id);

        $keahlian = Keahlian::find($id);
        $keahlian->delete();
        return redirect('/karyawan/'. $daftark->id);
    }

    // ------------------------------------------------------------------------------------------------

    // relation ke pelatihan
    public function pelatihan(Request $request){
        $search = $request->search;
        $daftark = Daftark::with('pelatihan')
                    ->where('nama_karyawan', 'LIKE', '%'.$search.'%')
                    ->orWhereHas('keahlian', function($query) use($search) {
                        $query->where('nama_pelatihan', 'LIKE', '%'.$search.'%');
                    })
                    ->paginate(12);
        return view ('keahlian',['daftark' => $daftark]);
    }

    // menampilkan halaman tambah pelatihan
    public function create_pelatihan($id){
        $daftark = Daftark::all();
        $daftark = Daftark::find($id);
        return view('tambah_pelatihan', compact(['daftark']));
    }

    // cara tambah pelatihan
    public function store_pelatihan(Request $request, $id) {
        // Temukan objek Daftark berdasarkan id
        $daftark = Daftark::find($id);
    
        if ($daftark) {
            // Buat objek Jenjangkarir baru
            $pelatihan = new Pelatihan([
                'nama_pelatihan' => $request->nama_pelatihan,
                'penyelenggara' => $request->penyelenggara,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_selesai' => $request->tanggal_selesai,
                'lokasi' => $request->lokasi,
            ]);
    
            // Hubungkan Jenjangkarir dengan Daftark
            $pelatihan->daftark_id = $daftark->id;
    
            // Simpan Jenjangkarir
            $pelatihan->save();
    
            return redirect('/karyawan/'. $daftark->id )->with('success', 'Data pelatihan telah ditambah!');;
        } else {
            return redirect('/karyawan/'. $daftark->id );
        }
    }

    // edit pelatihan
    public function edit_pelatihan($id){
        // mengambil id daftark dari detail jenjang karir
        $daftark_id = session('daftark_id');
        $daftark = Daftark::find($daftark_id);

        $pelatihan = Pelatihan::find($id);
        return view('edit_pelatihan', compact(['pelatihan', 'daftark']));
    }

    // put keahlian
    public function update_pelatihan($id, Request $request)
    {   
        $daftark_id = session('daftark_id');
        $daftark = Daftark::find($daftark_id);

        $pelatihan = Pelatihan::find($id);
        $pelatihan->update($request->except(['_token', 'submit']));
        return redirect('/karyawan/'. $daftark->id );
    }

    // hapus pelatihan
    public function destroy_pelatihan($id){
        $daftark_id = session('daftark_id');
        $daftark = Daftark::find($daftark_id);

        $pelatihan = Pelatihan::find($id);
        $pelatihan->delete();
        return redirect('/karyawan/'. $daftark->id);
    }
}
