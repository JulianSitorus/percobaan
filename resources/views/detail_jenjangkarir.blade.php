<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/detail_jenjang_karir.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome/css/all.css') }}">
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
                <li><a href="#">
                    <i class="fas fa-right-from-bracket">
                        <span class="menu">&emsp; Keluar</span>
                    </i></a></li>
                
            </ul>
    </div>

    <div class ="tiga">
        <a href="/daftark"><h3>Karyawan ></h3></a>
        <a href="/karyawan/{{$daftark->id}}"><h3 class="breadcrumb">Detail Karyawan ></h3></a>
        <a href="/karyawan/{{$daftark->id}}/detail_jenjangkarir"><h3 class="breadcrumb">Detail Jenjang Karir</h3></a>
    </div>

    <div class ="empat">
        <div class="empat2">
            <p class="judul">Detail Jenjang Karir Karyawan</p>
            <hr size="3px" color="#EEEEEE">
            <table>
                <tr>
                    <th id="posisi">Posisi</th>
                    <th id="unit">Unit</th>
                    <th id="departemen">Departemen</th>
                    <th id="mulai_posisi">Mulai</th>
                    <th id="selesai_posisi">Selesai</th>
                    <th class="aksi">Aksi</th>
                </tr>
                @foreach($daftark->jenjangkarir->reverse() as $dkr)
                <tr>
                    <td>{{$dkr->posisi}}</td>
                    <td>{{$dkr->unit}}</td>
                    <td>{{$dkr->departemen}}</td>
                    <td>{{ \Carbon\Carbon::parse($dkr->tanggal_mulai)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($dkr->tanggal_selesai)->format('d/m/Y') }}</td>
                    <td class="button-container">
                        <a href="te_jenjang_karir"><button class="detail"><i class="fa fa-pen-to-square fa-sm" ></i></button></a>
                        <form action="/detail_jenjangkarir/{{$dkr->id}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="hapus" type="submit"><i class="fa fa-trash-can fa-sm"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

            <hr size="3px" color="#EEEEEE">
            <a href="tambah_jenjangkarir"><button class="tambah"><i class="fa-solid fa-plus"></i> Tambah Data</button></a>
            <a href="/karyawan/{{$daftark->id}}"><button class="kembali">Kembali</button></a>

        </div>
    </div>
    
</body>
</html>
