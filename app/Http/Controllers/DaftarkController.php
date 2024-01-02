<?php

namespace App\Http\Controllers;

use App\Models\Daftark;
use App\Models\Kpi;
use App\Models\Kpi_items;
use App\Models\Evaluasi;
use App\Models\Jenjangkarir;
use App\Models\Keahlian;
use App\Models\Pelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

// use PDF;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Departemen;
use App\Models\Unit;

use App\Models\Country;

use App\Models\Province;
use App\Models\Regency;


class DaftarkController extends Controller
{
    // ======================================================= LOGIN ===========================================================

    function index_login(){
        return view("index");
    }
    function login(Request $request){
        Session::flash('email', $request->email);
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            return redirect('daftark');
        }else{
            // return 'gagal';
            return redirect('index')->with('success', 'Email atau password yang Anda masukkan salah!');
        }
    }

    function logout(){
        Auth::logout();
        return redirect('index');
    }


    // ======================================================= DAFTARK ===========================================================

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
                    ->orderBy('nama_karyawan', 'asc')
                    ->paginate(12);
        return view ('daftark',['daftark' => $daftark]);
    }

    // menampilkan halaman menambah biodata
    public function create(){
        $provinces = Province::all();
        $regencies = Regency::all();
        return view('biodata', compact(['provinces', 'regencies']));
    }

    // cara tambah biodata 
    public function store(Request $request){

        $id_provinsi = $request->input('provinsi');
        $id_kabupaten = $request->input('kabupaten'); 

        $nama_provinsi = Province::find($id_provinsi)->name;
            
        if ($request->ajax()) {
            $kabupatens = Regency::where('province_id', $id_provinsi)->get();
            $option = "<option value='' disabled selected>--- Pilih Kabupaten atau Kota ---</option>";
    
            if (count($kabupatens) > 0) {
                foreach ($kabupatens as $kabupaten) {
                    $option .= "<option value='$kabupaten->id'>$kabupaten->name</option>";
                }
            }
            return response()->json(['kabupatens' => $option]);
        }
            // $nama_provinsi = $id_provinsi->name;
            
        $nama_kabupaten = Regency::find($id_kabupaten)->name;

        $request->merge(['provinsi' => $nama_provinsi]);
        $request->merge(['kabupaten' => $nama_kabupaten]);

        $daftark = Daftark::create($request->except(['_token','submit'])); 
        

        // menambah foto
        if($request->hasFile('foto')){
            $request-> file('foto')->move('fotokaryawan/', $request->file('foto')->getClientOriginalName());
            $daftark->foto  = $request->file('foto')->getClientOriginalName();
            $daftark->save();
        };

        // menambah KTP
        if($request->hasFile('ktp')){
            $request-> file('ktp')->move('ktp/', $request->file('ktp')->getClientOriginalName());
            $daftark->ktp  = $request->file('ktp')->getClientOriginalName();
            $daftark->save();
        };

        // menambah KK
        if($request->hasFile('kk')){
            $request-> file('kk')->move('kk/', $request->file('kk')->getClientOriginalName());
            $daftark->kk  = $request->file('kk')->getClientOriginalName();
            $daftark->save();
            
        };

        // menambah ijazah
        if($request->hasFile('ijazah')){
            $request-> file('ijazah')->move('ijazah/', $request->file('ijazah')->getClientOriginalName());
            $daftark->ijazah  = $request->file('ijazah')->getClientOriginalName();
            $daftark->save();
            
        };

        // menambah bpjs
        if($request->hasFile('bpjs')){
            $request-> file('bpjs')->move('bpjs/', $request->file('bpjs')->getClientOriginalName());
            $daftark->bpjs  = $request->file('bpjs')->getClientOriginalName();
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
        $provinces = Province::all();
        $regencies = Regency::all();
        return view('edit_biodata', compact(['daftark', 'provinces', 'regencies']));
    }

    // update
    public function update($id, Request $request)
    {
        $daftark = Daftark::find($id);

         $id_provinsi = $request->input('provinsi');
        $id_kabupaten = $request->input('kabupaten'); 

        $nama_provinsi = Province::find($id_provinsi)->name;  
        $nama_kabupaten = Regency::find($id_kabupaten)->name;

        $request->merge(['provinsi' => $nama_provinsi]);
        $request->merge(['kabupaten' => $nama_kabupaten]);
        
        $daftark-> update($request->except(['_token','submit']));

        // ubah foto
        if($request->hasFile('foto')){
            $request-> file('foto')->move('fotokaryawan/', $request->file('foto')->getClientOriginalName());
            $daftark->foto  = $request->file('foto')->getClientOriginalName();
            $daftark->save();
        };

        // ubah KTP
        if($request->hasFile('ktp')){
            $request-> file('ktp')->move('ktp/', $request->file('ktp')->getClientOriginalName());
            $daftark->ktp  = $request->file('ktp')->getClientOriginalName();
            $daftark->save();
            
        };

        // ubah KK
        if($request->hasFile('kk')){
            $request-> file('kk')->move('kk/', $request->file('kk')->getClientOriginalName());
            $daftark->kk  = $request->file('kk')->getClientOriginalName();
            $daftark->save();
            
        };

        // ubah ijazah
        if($request->hasFile('ijazah')){
            $request-> file('ijazah')->move('ijazah/', $request->file('ijazah')->getClientOriginalName());
            $daftark->ijazah  = $request->file('ijazah')->getClientOriginalName();
            $daftark->save();
            
        };

        // ubah bpjs
        if($request->hasFile('bpjs')){
            $request-> file('bpjs')->move('bpjs/', $request->file('bpjs')->getClientOriginalName());
            $daftark->bpjs  = $request->file('bpjs')->getClientOriginalName();
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
            $daftark->kpi()->delete();
            $daftark->jenjangkarir()->delete();
            $daftark->keahlian()->delete();
            $daftark->pelatihan()->delete();

            // Hapus objek Karyawan itu sendiri
            $daftark->delete();

            // Redirect atau berikan respons yang sesuai
            return redirect('daftark')->with('success', 'Data karyawan berhasil dihapus.');;
        } else {
            // Handle jika Karyawan tidak ditemukan
            return redirect('daftark')->with('error', 'Karyawan tidak ditemukan.');
        }
    }
    // ======================================================= KPI ===========================================================

    public function kpi(Request $request){
        $search = $request->search;
        $daftark = Daftark::with('kpi')
                    ->where('nama_karyawan', 'LIKE', '%'.$search.'%')
                    // ->orWhere('no_telp', 'LIKE', '%'.$search.'%')
                    ->orWhereHas('jenjangkarir', function($query) use($search) {
                        $query->where('departemen', 'LIKE', '%'.$search.'%');
                    })
                    ->orWhereHas('jenjangkarir', function($query) use($search) {
                        $query->where('posisi', 'LIKE', '%'.$search.'%');
                    })
                    ->orWhereHas('kpi', function($query) use($search) {
                        $query->where('tanggal_kpi', 'LIKE', '%'.$search.'%');
                    })
                    ->orWhereHas('kpi', function($query) use($search) {
                        $query->where('supervisor', 'LIKE', '%'.$search.'%');
                    })
                    ->orWhereHas('kpi', function($query) use($search) {
                        $query->where('mulai_pelaksanaan', 'LIKE', '%'.$search.'%');
                    })
                    ->orWhereHas('kpi', function($query) use($search) {
                        $query->where('selesai_pelaksanaan', 'LIKE', '%'.$search.'%');
                    })
                    ->orWhereHas('kpi', function($query) use($search) {
                        $query->where('deskripsi_kpi', 'LIKE', '%'.$search.'%');
                    })
                    ->orWhereHas('kpi', function($query) use($search) {
                        $query->where('total_bobot', 'LIKE', '%'.$search.'%');
                    })
                    ->orWhereHas('kpi', function($query) use($search) {
                        $query->where('total_skor_akhir', 'LIKE', '%'.$search.'%');
                    })
                    ->orderBy('nama_karyawan', 'asc')
                    ->paginate(12);
        return view ('kpi',['daftark' => $daftark]);
    }

    // menampilkan halaman tambah kpi
    public function create_kpi($id){
        $daftark = Daftark::all();
        $daftark = Daftark::find($id);
        return view('tambah_kpi', compact(['daftark']));
    }    

    //  request tambah kpi
    public function store_kpi(Request $request, $id) {
        $formData = $request->all();
        
        $skor = $request->input('skor');
        $skor_akhir = $request->input('skor_akhir');
        $total_bobot = $request->input('total_bobot');
        $total_skor_akhir = $request->input('total_skor_akhir');

        $daftark = Daftark::find($id);
        
        if ($daftark) {
            $kpi = new Kpi([                
                'supervisor' => $request->supervisor,
                'jabatan_supervisor' => $request->jabatan_supervisor,
                'tanggal_kpi' => $request->tanggal_kpi,
                'mulai_pelaksanaan' => $request->mulai_pelaksanaan,
                'selesai_pelaksanaan' => $request->selesai_pelaksanaan,
                'deskripsi_kpi' => $request->deskripsi_kpi,

                'total_bobot' => $total_bobot,
                'total_skor_akhir' => $total_skor_akhir,

                'komentar_catatan' => $request->komentar_catatan,
            ]);

            session(['skor' => $skor]);
            session(['skor_akhir' => $skor_akhir]);
            session(['total_bobot' => $total_bobot]);
            session(['total_skor_akhir' => $total_skor_akhir]);
            
            $kpi->daftark_id = $daftark->id;

            // Simpan evaluasi
            $kpi->save();

            for ($i = 0; $i < count($request->area); $i++) {
                $kpi_items = new Kpi_items([
                    'area' => $request->area[$i],
                    'ket' => $request->ket[$i],
                    'bobot' => $request->bobot[$i],
                    'target' => $request->target[$i],
                    'realisasi' => $request->realisasi[$i],
                    'jenis_perhitungan' => $request->jenis_perhitungan[$i],
                    'skor' => $skor[$i],
                    'skor_akhir' => $skor_akhir[$i],
                ]);
                $kpi->kpi_items()->save($kpi_items);
            }

            return redirect('/karyawan/'. $daftark->id );
        } else {
            return redirect('/karyawan/'. $daftark->id );
        }
    }

     // edit kpi
     public function edit_kpi($id){
        // mengambil id daftark 
        $daftark_id = session('daftark_id');
        $daftark = Daftark::find($daftark_id);

        $kpi = Kpi::find($id);

        $kpi_items = $kpi->kpi_items;

        return view('edit_kpi', compact(['kpi', 'daftark', 'kpi_items']));
    }


    // put kpi
    public function update_kpi($id, Request $request)
    {   
        $kpi = Kpi::find($id);
        $daftark = $kpi->daftark;

        $kpi->update($request->except(['area','ket','bobot','target','realisasi','skor','jenis_perhitungan','skor_akhir','_token', 'submit']));

        foreach ($request->area as $key => $area) {
            // Temukan atau buat KpiItem sesuai dengan indeks $key
            $kpi_items = $kpi->kpi_items->get($key, new Kpi_items());
    
            // Update data KpiItem
            $kpi_items->area = $area;
            $kpi_items->ket = $request->ket[$key];
            $kpi_items->bobot = $request->bobot[$key];
            $kpi_items->target = $request->target[$key];
            $kpi_items->realisasi = $request->realisasi[$key];
            $kpi_items->jenis_perhitungan = $request->jenis_perhitungan[$key];
            $kpi_items->skor = $request->skor[$key];
            $kpi_items->skor_akhir = $request->skor_akhir[$key];
    
            // Simpan atau asosiasikan KpiItem dengan Kpi
            $kpi->kpi_items()->save($kpi_items);
        }

        return redirect('/karyawan/'. $daftark->id );
    }

    // Export KPI
    public function export_pdf($id){
        $daftark_id = session('daftark_id');
        $daftark = Daftark::find($daftark_id);
        $kpi = Kpi::find($id);
        $kpi_items = Kpi_items::find($id);

        $kpi_items = $kpi->kpi_items;
        
        view()->share('kpi',$kpi);
        $pdf = PDF::loadview('kpi-pdf', compact('kpi', 'daftark', 'kpi_items'));
        return $pdf->download('kpi.pdf');
    } 

    // hapus kpi
    public function destroy_kpi($id){
        $daftark_id = session('daftark_id');
        $daftark = Daftark::find($daftark_id);

        $kpi = Kpi::find($id);
        if ($kpi) {
            // semua kpi_items di kpi terkait
            $kpi_items = $kpi->kpi_items;
            foreach ($kpi_items as $kpi_item) {
                $kpi_item->delete();
            }
            $kpi->delete();
        }
        return redirect('/karyawan/'. $daftark->id);
    }  

    // ======================================================= EVALUASI ===========================================================

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
                    ->orderBy('nama_karyawan', 'asc')
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
        // mengambil id daftark        
        $daftark_id = session('daftark_id');
        $daftark = Daftark::find($daftark_id);

        $evaluasi = Evaluasi::find($id);
        return view('edit_evaluasi', compact(['evaluasi', 'daftark']));
    }

    // put evaluasi
    public function update_evaluasi($id, Request $request)
    {   
        $evaluasi = Evaluasi::find($id);
        $daftark = $evaluasi->daftark;
        $evaluasi->update($request->except(['_token', 'submit']));
        return redirect('/karyawan/'. $daftark->id );
    }

   

    // hapus evaluasi
    public function destroy_evaluasi($id){
        $daftark_id = session('daftark_id');
        $daftark = Daftark::find($daftark_id);

        $evaluasi = Evaluasi::find($id);
        $evaluasi->delete();
        return redirect('/karyawan/'. $daftark->id);
    }

    // ======================================================= JENJANG KARIR ===========================================================

    // relation ke jenjang karir    
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
                    ->orWhereHas('jenjangkarir', function($query) use($search) {
                        $query->where('durasi', 'LIKE', '%'.$search.'%');
                    })
                    ->orderBy('nama_karyawan', 'asc')
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

        $departemen = Departemen::all();
        $unit = unit::all();
        return view('tambah_jenjangkarir', compact(['daftark', 'departemen', 'unit']));
    }

    // cara tambah jenjangkarir
    public function store_jenjangkarir(Request $request, $id) {
        // Temukan objek Daftark berdasarkan id
        $daftark = Daftark::find($id);
        $durasi = $request->input('durasi');

            $id_departemen = $request->input('departemen');
            $id_unit = $request->input('unit'); 

            $nama_departemen = optional(Departemen::find($id_departemen))->nama_departemen;

            if ($request->ajax()) {
                $unit = Unit::where('departemen_id', $id_departemen)->get();
                $options = [];
            
                foreach ($unit as $unitt) {
                    $options[] = [
                        'id' => $unitt->id,
                        'nama_unit' => $unitt->nama_unit,
                    ];
                }
                return response()->json(['options' => $options]);
            }

            $nama_unit = optional(Unit::find($id_unit))->nama_unit;

    
        if ($daftark) {
            // Buat objek Jenjangkarir baru
            $jenjangkarir = new Jenjangkarir([
                'posisi' => $request->posisi,
                'unit' => $nama_unit,
                'departemen' => $nama_departemen,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_selesai' => $request->tanggal_selesai,

                'durasi' => $durasi,
            ]);

            session(['durasi' => $durasi]);
    
            // Hubungkan Jenjangkarir dengan Daftark
            $jenjangkarir->daftark_id = $daftark->id;
    
            $jenjangkarir->save();
    
            return redirect('/karyawan/'. $daftark->id . '/detail_jenjangkarir/');
        } else {
            return redirect('/karyawan/'. $daftark->id . '/detail_jenjangkarir/');
        }
    }

    // edit jenjang karir
    public function edit_jenjangkarir($id){
        // mengambil id daftark dari detail jenjang karir
        $daftark_id = session('daftark_id');
        $daftark = Daftark::find($daftark_id);
        $durasi = session('durasi');

        $departemen = Departemen::all();
        $unit = unit::all();

        $jenjangkarir = Jenjangkarir::find($id);
        return view('edit_jenjangkarir', compact(['jenjangkarir', 'daftark', 'departemen', 'unit']));
    }

    // put jenjang karir
    public function update_jenjangkarir($id, Request $request)
    {   
        $daftark_id = session('daftark_id');
        $daftark = Daftark::find($daftark_id);
        $jenjangkarir = Jenjangkarir::find($id);

        $id_departemen = $request->input('departemen');
        $id_unit = $request->input('unit'); 

        if ($request->ajax()) {
            $unit = Unit::where('departemen_id', $id_departemen)->get();
            $options = [];
            $id_unit = null;
        
            foreach ($unit as $unitt) {
                $options[] = [
                    'id' => $unitt->id,
                    'nama_unit' => $unitt->nama_unit,
                ];
                if ($unitt->nama_unit === $jenjangkarir->unit) {
                    $id_unit = $unitt->nama_unit;
                }
            }
            dd($unit, $jenjangkarir->unit);
            return response()->json(['options' => $options, 'id_unit' => $id_unit]);
        }

        $nama_departemen = optional(Departemen::find($id_departemen))->nama_departemen;
        $nama_unit = optional(Unit::find($id_unit))->nama_unit;

        $request->merge(['departemen' => $nama_departemen]);
        $request->merge(['unit' => $nama_unit]);

        $jenjangkarir->daftark_id = $daftark->id;

        $jenjangkarir->update($request->except(['_token', 'submit']));
        return redirect('/karyawan/'. $daftark->id . '/detail_jenjangkarir/');
    }

    // hapus salah satu data jenjang karir
    public function destroy_jenjangkarir($id){   
        $jenjangkarir = Jenjangkarir::find($id);
        
        if ($jenjangkarir) {
            $daftark_id = $jenjangkarir->daftark_id; // ambil id Daftark yang terkait dengan Jenjangkarir
            $jenjangkarir->delete();
            
            return redirect('/karyawan/'.$daftark_id. '/detail_jenjangkarir')->with('success', 'Data Jenjangkarir berhasil 
            dihapus.');
        } else {
            return redirect('/karyawan')->with('error', 'Jenjangkarir tidak ditemukan.');
        }
    }
    
    // ======================================================= KEAHLIAN ===========================================================

    // relation ke keahlian
    public function keahlian(Request $request){
        $search = $request->search;
        $daftark = Daftark::with('keahlian')
                    ->where('nama_karyawan', 'LIKE', '%'.$search.'%')
                    ->orWhereHas('keahlian', function($query) use($search) {
                        $query->where('nama_keahlian', 'LIKE', '%'.$search.'%');
                    })
                    ->orWhereHas('pelatihan', function($query) use($search) {
                        $query->where('nama_pelatihan', 'LIKE', '%'.$search.'%');
                    })
                    ->orderBy('nama_karyawan', 'asc')
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
                'nama_keahlian' => $request->nama_keahlian,
                'tingkat_keahlian' => $request->tingkat_keahlian,
                'jenis_keahlian' => $request->jenis_keahlian,
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
                    ->orderBy('nama_karyawan', 'asc')
                    ->paginate(12);
        return view ('keahlian',['daftark' => $daftark]);
    }

    // menampilkan halaman tambah pelatihan
    public function create_pelatihan($id){
        $daftark = Daftark::all();
        $daftark = Daftark::find($id);
        // Get semua data
        $provinces = Province::all();
        $regencies = Regency::all();

        $countries = Country::all();

        return view('tambah_pelatihan', compact(['daftark', 'provinces', 'regencies','countries']));
    }

    // cara tambah pelatihan
    public function store_pelatihan(Request $request, $id) {
        // Temukan objek Daftark berdasarkan id
        $daftark = Daftark::find($id);
        $provinces = Province::find($id);
        
        // $provinces = Province::all();
        $id_provinsi = $request->input('provinsi');
        $id_kabupaten = $request->input('kabupaten'); 
        $id_negara = $request->input('negara'); 

        $nama_provinsi = optional(Province::find($id_provinsi))->name;
            
        if ($request->ajax()) {
            $kabupatens = Regency::where('province_id', $id_provinsi)->get();
            $option = "<option value=''>--- Pilih Kota atau Kabupaten ---</option>";

            foreach ($kabupatens as $kabupaten) {
                $option .= "<option value='$kabupaten->id'>$kabupaten->name</option>";
            }
            return response()->json(['kabupatens' => $option]);
        }
            
        $nama_kabupaten = optional(Regency::find($id_kabupaten))->name;
        $nama_negara = optional(Country::find($id_negara))->name;

        // $provinsi = Province::find($id_provinsi);
        if ($daftark) {

            $pelatihan = new Pelatihan([
                'nama_pelatihan' => $request->nama_pelatihan,
                'penyelenggara' => $request->penyelenggara,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_selesai' => $request->tanggal_selesai,
                'lokasi' => $request->lokasi,
                'sertifikat' => $request->sertifikat,

                'provinsi' => $nama_provinsi,
                'kabupaten' => $nama_kabupaten,

                'negara' => $nama_negara,
            ]);

            
            // Hubungkan pelatihan dengan Daftark
            $pelatihan->daftark_id = $daftark->id;

            if($request->hasFile('sertifikat')){
                $request-> file('sertifikat')->move('sertifikat/', $request->file('sertifikat')->getClientOriginalName());
                $pelatihan->sertifikat  = $request->file('sertifikat')->getClientOriginalName();
                $pelatihan->save();
            };
    
            // Simpan Jenjangkarir
            $pelatihan->save();
            session(['provinsi' => $nama_provinsi, 'kabupaten' => $nama_kabupaten]);           

            return redirect('/karyawan/'. $daftark->id )->with('success', 'Data pelatihan telah ditambah!');
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

        $provinces = Province::all();
        $regencies = Regency::all();

        $countries = Country::all();
        return view('edit_pelatihan', compact(['pelatihan', 'daftark', 'provinces', 'regencies','countries']));
    }

    // put pelatihan
    public function update_pelatihan($id, Request $request)
    {   
        $daftark_id = session('daftark_id');
        $daftark = Daftark::find($daftark_id);

        $pelatihan = Pelatihan::find($id);
        
        $id_provinsi = $request->input('provinsi');
        $id_kabupaten = $request->input('kabupaten');
        $id_negara = $request->input('negara'); 

        $nama_provinsi = optional(Province::find($id_provinsi))->name;
        $nama_kabupaten = optional(Regency::find($id_kabupaten))->name;
        $nama_negara = optional(Country::find($id_negara))->name;

        $request->merge(['provinsi' => $nama_provinsi]);
        $request->merge(['kabupaten' => $nama_kabupaten]);
        $request->merge(['negara' => $nama_negara]);

        $pelatihan->daftark_id = $daftark->id;
        
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
