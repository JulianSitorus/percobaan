<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/keahlian.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.css">
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
        <h3>Keahlian & Pelatihan > </h3>
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
            <p>Keahlian & Pelatihan Karyawan</p>
            <hr size="3px" color="#EEEEEE">
            <div style="overflow: auto; height: 515px;">
            <table>
                <tr>
                    <th class="kiri">No</th>
                    <th class="foto">Foto</th>
                    <th class="nama">Nama</th>
                    <th>Keahlian</th>
                    <th>Pelatihan</th>
                    <th class="kanan">Aksi</th>
                </tr>
                @foreach($daftark as $key => $dk)
                <tr>
                    <td align="center">{{$daftark-> firstItem() + $key}}</td>
                    <td align="center"><img src="{{ asset('fotokaryawan/'.$dk->foto) }}" style="width: 60px; max-height: 60px" alt=""></td>
                    <td>{{$dk->nama_karyawan}} </td>
                    <td class="keahlian">
                        @foreach($dk->keahlian as $keahlian)
                            {{$keahlian->jenis_keahlian}},
                        @endforeach                    
                    </td>
                    <td class="pelatihan">
                        @foreach($dk->pelatihan as $pelatihan)
                            {{$pelatihan->nama_pelatihan}},
                        @endforeach 
                    </td>
                    <td align="center">
                        <a href="karyawan/{{$dk->id}}"><button class="detail"><i class="fa fa-pen-to-square fa-sm" ></i></button></a>
                        <button class="tambah"><i class="fa-solid fa-plus"></i></button>
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
</body>
</html>