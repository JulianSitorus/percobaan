<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/evaluasi.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>var totalKeseluruhan2 = localStorage.getItem("totalKeseluruhan2");</script>

    <title>Document</title>
</head>

<body>
    
    <div class ="satu">
        <a href="#"><img src='images/logo.jpg'></a>
        <span>Damar Dwi Nughroho <i class="fa fa-circle-user fa-2xl"></i></span>
        
    </div>

    <div class ="dua">
        <header>Menu</header>
            <ul>
                <li><a href="daftark">
                    <i class="fas fa-id-card">
                        <span class="menu">&emsp;Karyawan</span>
                    </i></a></li>
                <li><a href="kpi">
                    <i class="fas fa-briefcase">
                        <span class="menu">&emsp;KPI</span>
                    </i></a></li>
                <li><a href="evaluasi">
                    <i class="fas fa-clipboard-list">
                        <span class="menu">&emsp; Evaluasi</span>
                    </i></a></li>
                <li><a href="jenjangkarir">
                    <i class="fas fa-chart-line">
                        <span class="menu">&emsp;Jenjang Karir</span>
                    </i></a></li>
                <li><a href="keahlian">
                    <i class="fas fa-users-gear">
                        <span class="menu">&emsp;Keahlian & Pelatihan</span>
                    </i></a></li>
                <li><a href="#">
                    <i class="fas fa-right-from-bracket">
                        <span class="menu">&emsp; Keluar</span>
                    </i></a></li>
                
            </ul>
    </div>

    <div class ="tiga">
        <h3>Evaluasi</h3>
        <div class="search-box">
            <form action="" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search...">
                    <button class="input-group-text">&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
        </div> 
    </div>

    <div class ="empat">
        <div class="empat2">
            <p>Evaluasi Karyawan</p>
            <hr size="3px" color="#EEEEEE">
            <div style="overflow: auto; height: 509px;">
            <table>
                <tr>
                    <th class="kiri">No</th>
                    <th class="foto">Foto</th>
                    <th class="nama">Nama</th>
                    <th>Tgl Evaluasi</th>
                    <th>Nilai Kinerja</th>
                    <th>Nilai<br>Perilaku</th>
                    <th colspan="2">Hasil Kinerja</th>
                    <th class="kekuatan">Kekuatan</th>
                    <th class="kekurangan">Kekurangan</th>
                    <th class="rekomendasi">Rekomendasi</th>
                    <th class="kanan">Aksi</th>
                </tr>
                @foreach($daftark as $key => $dk)
                <tr>
                    <td align="center">{{$daftark-> firstItem() + $key}}</td>
                    <td align="center"><img src="{{ asset('fotokaryawan/'.$dk->foto) }}" style="width: 60px; max-height: 60px" alt=""></td>
                    <td class="desk">{{$dk->nama_karyawan}}<br>
                        @if ($dk->jenjangkarir->isNotEmpty())
                            {{$dk->jenjangkarir->last()->posisi}} - {{$dk->jenjangkarir->last()->departemen}}
                        @endif
                    </td>
                    <td align="center">
                        @if ($dk->evaluasi->isNotEmpty())
                            {{ \Carbon\Carbon::parse($dk->evaluasi->last()->tanggal_evaluasi)->format('d/m/Y') }}
                        @endif
                    </td>

                    <td align="center">
                        @if ($dk->evaluasi->isNotEmpty())
                            {{ $dk->evaluasi->last()->total_keseluruhan }}
                        @endif
                    </td>
                    
                    <td align="center"> 
                        @if ($dk->evaluasi->isNotEmpty())
                            {{ $dk->evaluasi->last()->total_keseluruhan2 }}
                        @endif
                    </td>     
                    <td>
                        @if ($dk->evaluasi->isNotEmpty())
                            {{ $dk->evaluasi->last()->kerja }}
                        @endif
                    </td>
                    <td>@if ($dk->evaluasi->isNotEmpty())
                            {{ $dk->evaluasi->last()->rekomendasi }}
                        @endif
                    </td>
                    <td class ="desk">
                        @if ($dk->evaluasi->isNotEmpty())
                            {{ $dk->evaluasi->last()->komentar_kekuatan }}
                        @endif
                    </td>
                    <td class ="desk">
                        @if ($dk->evaluasi->isNotEmpty())
                            {{ $dk->evaluasi->last()->komentar_kelemahan }}
                        @endif
                    </td>
                    <td class ="desk">
                        @if ($dk->evaluasi->isNotEmpty())
                            {{ $dk->evaluasi->last()->komentar_pelatihan }}
                        @endif
                    </td>
                    <td align="center">
                        @if ($dk->evaluasi->isNotEmpty())
                        <a href="karyawan/{{$dk->evaluasi->last()->id}}/edit_evaluasi"><button class="detail"><i class="fa fa-pen-to-square fa-sm"></i></button></a>
                        @endif
                        <a href="karyawan/{{$dk->id}}/tambah_evaluasi"><button class="tambah"><i class="fa-solid fa-plus"></i></button></a>
                    </td>
                
                </tr>
                @endforeach
                
                
            </div>              
            </table>
        </div>
        <p class="jmlh_data">Menampilkan {{ $daftark->firstItem() }} - {{ $daftark->lastItem() }} dari {{ $daftark->total() }} data</p>
        <div class="hlmn">
            {{$daftark->withQueryString()->links('pagination::bootstrap-4')}}
        </div>

    </div>

    <script>                
   </script>


</body>
</html>