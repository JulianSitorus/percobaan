<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/karyawan.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome/css/all.css') }}">
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js') }}" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>
</head>

<body>
    
    <div class ="satu">
        <img src="{{ asset('images/logo.jpg') }}">
        <span>Damar Dwi Nughroho <i class="fa fa-circle-user fa-2xl"></i></span> 
    </div>

    <div class ="dua">
        <header>Menu</header>
            <ul>
                <li><a href="/daftark">
                    <i class="fas fa-id-card">
                        <span class="menu">&emsp;Karyawan</span>
                    </i></a></li>
                <li><a href="/kpi">
                    <i class="fas fa-briefcase">
                        <span class="menu">&emsp;KPI</span>
                    </i></a></li>
                <li><a href="/evaluasi">
                    <i class="fas fa-clipboard-list">
                        <span class="menu">&emsp; Evaluasi</span>
                    </i></a></li>
                <li><a href="/jenjangkarir">
                    <i class="fas fa-chart-line">
                        <span class="menu">&emsp;Jenjang Karir</span>
                    </i></a></li>
                <li><a href="/keahlian">
                    <i class="fas fa-users-gear">
                        <span class="menu">&emsp;Keahlian & Pelatihan</span>
                    </i></a></li>
                <li><a class="logout" href="/logout">
                    <i class="fas fa-right-from-bracket">
                        <span class="menu">&emsp; Keluar</span>
                    </i></a></li>
                
            </ul>
    </div>

    <div class ="tiga">
        <!-- <a href="/daftark"><h3>Karyawan ></h3></a> -->
        <a href="/karyawan/{{$daftark->id}}"><h3>Detail Karyawan</h3></a>
    </div>

    
    <div class ="empat">
        <div class="empat2">
            <p>Detail Karyawan {{$daftark->nama_karyawan}}</p>
            <hr size="3px" color="#EEEEEE">
            <div class="foto">
                <!-- <div><img src="{{ asset('fotokaryawan/' . $daftark) }}" id="output"></div> -->
                <img src="{{ asset('fotokaryawan/' . $daftark->foto) }}" alt="Foto Karyawan">
                <!-- <img src='images/karyawan.jpg'> -->
                <h3>Posisi</h3>
                <p style="width:240px;">
                    @if ($daftark->jenjangkarir->isNotEmpty())
                        {{ $daftark->jenjangkarir->last()->posisi }}
                    @endif
                </p>
                <h3 >Unit</h3>
                <p id="kpi" style="width:240px;">
                    @if ($daftark->jenjangkarir->isNotEmpty())
                        {{ $daftark->jenjangkarir->last()->unit }}
                    @endif
                </p>
                <h3>Departemen</h3>
                <p style="width:240px;">
                    @if ($daftark->jenjangkarir->isNotEmpty())
                        {{ $daftark->jenjangkarir->last()->departemen }}
                    @endif
                </p>
            </div>
            
            <div class="profil">
                <p class="judul">Biodata</p>
                <div style="overflow: auto; height: 405px;">

                <ul>
                    <li class="key">Nama</li>
                    <li class="value">{{$daftark->nama_karyawan}}</li>
                </ul>
                <ul>
                    <li class="key">Tempat & Tanggal Lahir</li>
                    <li class="value"> {{ ucwords(strtolower(implode(' ', array_slice(explode(' ', $daftark->kabupaten), 1)))) }}, {{ \Carbon\Carbon::parse($daftark->tanggal_lahir)->format('d F Y') }}</li>
                </ul>
                <ul>
                    <li class="key">Alamat</li>
                    <li class="value">{{$daftark->alamat}}</li>
                </ul>
                <ul>
                    <li class="key">Agama</li>
                    <li class="value">{{$daftark->agama}}</li>
                </ul>
                <ul>
                    <li class="key">Jenis Kelamin</li>
                    <li class="value">{{$daftark->jenis_kelamin}}</li>
                </ul>
                <ul>
                    <li class="key">Email</li>
                    <li class="value">{{$daftark->email}}</li>
                </ul>
                <ul>
                    <li class="key">Telepon</li>
                    <li class="value">{{$daftark->no_telp}}</li>
                </ul>
                <ul>
                    <li class="key">Pendidikan Terakhir</li>
                    <li class="value">{{$daftark->pendidikan}}</li>
                </ul>
                <ul>
                    <li class="key">Pekerjaan Terakhir</li>
                    <li class="value">{{$daftark->pekerjaan_terakhir}}</li>
                </ul>
                <ul>
                    <li class="key">Status</li>
                    <li class="value">{{$daftark->status}}</li>
                </ul>
                </div>
                <a href="/biodata/{{$daftark->id}}/edit_biodata"><button><i class="fa fa-pen-to-square fa-sm"></i> Edit</button></a>
            </div>
        
            <div class="karir">
                <p class="judul">Jenjang Karir</p>
                <div style="overflow: auto; height: 390px;">
                @foreach($daftark->jenjangkarir->sortByDesc('created_at') as $dkr)
                    <ul>
                        <li class="key">
                            {{$dkr->posisi}}
                        </li>
                        <li class="value"> 
                            Unit {{$dkr->unit}} - Departemen {{$dkr->departemen}}
                        </li>
                        <li class="value">
                            {{ \Carbon\Carbon::parse($dkr->tanggal_mulai)->format('d/m/Y') }} - 
                            @if ($dkr->tanggal_selesai)
                                {{ \Carbon\Carbon::parse($dkr->tanggal_selesai)->format('d/m/Y') }}
                            @else
                                Sekarang
                            @endif
                            
                            @if ($dkr->durasi)
                                ({{$dkr->durasi}})
                            @else

                            @endif
                            
                        </li>
                    </ul>
                @endforeach 
                </div>
                <a href="/karyawan/{{$daftark->id}}/detail_jenjangkarir"><button><i class="fa fa-pen-to-square fa-sm"></i> Detail</button></a>
            </div>

            <!-- Kpi -->
            
            <div class="judul3"><i class="fas fa-briefcase fa-xl"></i><span>   Key Performance Indicator</span></div>
            <table>
                <tr>
                    <!-- <th class="posisi_kpi">Posisi</th> -->
                    <th class="tanggal_dibuat">Tanggal Disetujui</th>
                    <th class="supervisor">Supervisor</th>
                    <th class="jbtn_supervisor">Jabatan Supervisor</th>
                    <th class="periode">Periode Pelaksanaan</th>
                    <th class="deskripsi_kpi">Deskripsi KPI</th>
                    <th class="j_skor">Total Bobot KPI</th>
                    <th class="j_skor_a">Total Skor Akhir</th>
                    <th class="aksi">Aksi</th>
                </tr>
                @foreach($daftark->kpi->sortByDesc('created_at') as $dkpi)
                <tr>
                    <!-- <td>Wakil Departemen HRD</td> -->
                    <td>{{ \Carbon\Carbon::parse($dkpi->tanggal_kpi)->format('d/m/Y') }}</td>
                    <td>{{$dkpi->supervisor}}</td>
                    <td>{{$dkpi->jabatan_supervisor}}</td>
                    <td>{{ \Carbon\Carbon::parse($dkpi->mulai_pelaksanaan)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($dkpi->selesai_pelaksanaan)->format('d/m/Y') }}</td>
                    <td>{{$dkpi->deskripsi_kpi}}</td>
                    <td align="center">{{$dkpi->total_bobot}}</td>
                    <td align="center">{{$dkpi->total_skor_akhir}}</td>
                    <td align="center" class="button-container">
                        <a href="/karyawan/{{$dkpi->id}}/edit_kpi"><button class="detail"><i class="fa fa-pen-to-square fa-sm" ></i></button></a>
                        <form action="{{ route('kpi.destroy', ['id' => $dkpi->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="hapus" type="submit"><i class="fa fa-trash-can fa-sm"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            <a href="{{$daftark->id}}/tambah_kpi"><button class="tambah"><i class="fa-solid fa-plus"></i> Tambah Data</button></a><br>


            <!-- evaluasi -->
            <div class="judul2"><i class="fas fa-clipboard-list fa-xl"></i><span>   Evaluasi</span></div>
            <table>
                <tr>
                    <th class="tgl_eva">Tanggal Evaluasi</th>
                    <th>Kinerja</th>
                    <th>Perilaku</th>
                    <th class="hsl_kine" colspan="2">Hasil Kinerja</th>
                    <th>Kekuatan</th>
                    <th>Kekurangan</th>
                    <th>Rekomendasi Pelatihan</th>
                    <th class="aksi">Aksi</th>
                </tr>
                @foreach($daftark->evaluasi->sortByDesc('created_at') as $dke)
                <tr>
                    <td align="center">{{ \Carbon\Carbon::parse($dke->tanggal_evaluasi)->format('d/m/Y') }}</td>
                    <td align="center">{{ $dke->total_keseluruhan }}</td>
                    <td align="center">{{ $dke->total_keseluruhan2 }}</td>
                    <td>{{$dke->kerja}}</td>
                    <td>{{$dke->rekomendasi}}</td>
                    <td>{{$dke->komentar_kekuatan}}</td>
                    <td>{{$dke->komentar_kelemahan}}</td>
                    <td>{{$dke->komentar_pelatihan}}</td>
                    <td align="center" class="button-container">
                        <a href="/karyawan/{{$dke->id}}/edit_evaluasi"><button class="detail"><i class="fa fa-pen-to-square fa-sm" ></i></button></a>
                        <form action="{{ route('evaluasi.destroy', ['id' => $dke->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="hapus" type="submit"><i class="fa fa-trash-can fa-sm"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            <a  id="keahlian" href="{{$daftark->id}}/tambah_evaluasi"><button class="tambah"><i class="fa-solid fa-plus"></i > Tambah Data</button></a><br>


            <!-- Keahlian -->
            <div class="judul2"><i class="fas fa-kitchen-set fa-xl"></i><span>   Keahlian</span></div>
            <!-- <div style="overflow: auto; height: 531px"> -->
            <table>
                <tr>
                    <th class="nama_keahlian">Keahlian</th>
                    <th>Tingkat Keahlian</th>
                    <th>Jenis Keahlian</th>
                    <th class="aksi">Aksi</th>
                </tr>
                @foreach($daftark->keahlian->sortByDesc('created_at') as $dkk)
                <tr>
                    <td>{{$dkk->nama_keahlian}}</td>
                    <td class="tingkat_keahlian">{{$dkk->tingkat_keahlian}}</td>
                    <td align="center">{{$dkk->jenis_keahlian}}</td>
                    <td align="center" class="button-container">
                        <a href="/karyawan/{{$dkk->id}}/edit_keahlian"><button class="detail"><i class="fa fa-pen-to-square fa-sm" ></i></button></a>
                        <form action="{{ route('keahlian.destroy', ['id' => $dkk->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="hapus" type="submit"><i class="fa fa-trash-can fa-sm"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            <a href="{{$daftark->id}}/tambah_keahlian"><button class="tambah"><i class="fa-solid fa-plus"></i> Tambah Data</button></a><br>

            <!-- Pelatihan -->
            <div class="judul2"><i class="fas fa-book fa-xl"></i><span >   Pelatihan</span></div>
            <!-- <div style="overflow: auto; height: 231px"> -->
            <table>
           
                <tr>
                    <th class="namap">Nama Pelatihan</th>
                    <th class="penyelenggara">Penyelenggara</th>
                    <th class="waktu">Mulai</th>
                    <th class="waktu">Selesai</th>
                    <th class="lokasi">Lokasi</th>
                    <th class="aksi1">Aksi</th>
                </tr>
                @foreach($daftark->pelatihan->sortByDesc('created_at') as $dkp)
                    <tr>
                        <td>{{$dkp->nama_pelatihan}}</td>
                        <td>{{$dkp->penyelenggara}}</td>
                        <td>{{ \Carbon\Carbon::parse($dkp->tanggal_mulai)->format('d/m/Y') }}</td>   
                        <td>{{ \Carbon\Carbon::parse($dkp->tanggal_selesai)->format('d/m/Y') }}</td>
                        <td>
                            @if ($dkp->provinsi && $dkp->kabupaten && $dkp->kabupaten !== 'Pilih Kota atau Kabupaten')
                                {{ ucwords(strtolower(implode(' ', (explode(' ', $dkp->provinsi))))) }}, 
                                {{ ucwords(strtolower(implode(' ', array_slice(explode(' ', $dkp->kabupaten), 1)))) }}
                            @else
                                {{ $dkp->negara }}
                            @endif
                        </td>
                        <td align="center" class="button-container">
                            <a href="/karyawan/{{$dkp->id}}/edit_pelatihan"><button class="detail"><i class="fa fa-pen-to-square fa-sm" ></i></button></a>
                            <form action="{{ route('pelatihan.destroy', ['id' => $dkp->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="hapus" type="submit"><i class="fa fa-trash-can fa-sm"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            <a href="{{$daftark->id}}/tambah_pelatihan"><button class="tambah"><i class="fa-solid fa-plus"></i> Tambah Data</button></a>

            <br><br><br>
            <hr size="3px" color="#EEEEEE">
            <form action="{{ route('daftark.destroy', ['id' => $daftark->id]) }}" method="POST">
                @csrf
                @method('delete')
                <button class="hapus_kary" type="submit"><i class="fa fa-trash-can fa-sm"></i> Hapus Karyawan</button>
            </form>
        </div>
        
    </div>

    <!-- ======================================================================================================================================== -->

    <!-- alert memghapus karyawan -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $(document).on('click', '.hapus_kary', function(e){
                e.preventDefault();
                var form = $(this).closest('form');

                Swal.fire({
                    title: "Anda yakin?",
                    text: "Anda tidak akan dapat mengembalikan ini!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus Saja!"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                        title: "Deleted!",
                        text: "Data karyawan telah dihapus!",
                        icon: "success"
                        });
                        form.submit();
                    }
                });
            });
        });
    </script>

    <!-- ======================================================================================================================================== -->

    <!-- alert memghapus data -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $(document).on('click', '.hapus', function(e){
                e.preventDefault();
                var form = $(this).closest('form');

                Swal.fire({
                    title: "Hapus Data?",
                    text: "Anda tidak akan dapat mengembalikan ini!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus Saja!"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                        title: "Deleted!",
                        text: "Data telah dihapus!",
                        icon: "success"
                        });
                        form.submit();
                    }
                });
            });
        });
    </script>

    <!-- ======================================================================================================================================== -->

    <!-- alert logout -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $(document).on('click', '.logout', function(e){
                e.preventDefault();
                var form = $(this).closest('form');

                Swal.fire({
                    title: "Anda ingin logout?",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Logout"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/index';
                    }
                });
            });
        });
    </script>

    <!-- alert sukses nambah karyawan -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if (Session::has('success'))
    <script>
        swal("Berhasil","{{ Session::get('success') }}", 'success',{
            button:true,
            button:"OK",
            timer:2500,
        });
    </script>
    @endif -->

    

</body>
</html>