<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/jenjangk.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
        <a href="jenjangkarir"><h3>Jenjang Karir</h3>
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
            <p>Jenjang Karir Karyawan</p>
            <hr size="3px" color="#EEEEEE">
            <div style="overflow: auto; height: 509px;">
            <table>
                <tr>
                    <th class="kiri">No</th>
                    <th class="foto">Foto</th>
                    <th class="nama">Nama</th>
                    <th class="posisi_s">Posisi Sekarang</th>
                    <th class="ps" colspan="4">Posisi sebelumnya</th>
                    <th class="kanan">Aksi</th>
                </tr>
                @foreach($jenjangkarir as $key => $jk)
                    <tr>
                        <td align="center">{{ $jenjangkarir-> firstItem() + $key}}</td>
                        <td align="center"><img src="{{ asset('fotokaryawan/'.$jk->daftark['foto']) }}" style="width: 60px; max-height: 60px" alt=""></td>
                        <td>
                            {{$jk->daftark['nama_karyawan']}}
                        </td>
                        <td>
                            <ul>
                                <li class="key">{{$jk->posisi}}</li>
                                <li class="value">Unit {{$jk->unit}} - Departemen {{$jk->departemen}}</li>
                                <li class="value">{{ \Carbon\Carbon::parse($jk->tanggal_mulai)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($jk->tanggal_selesai)->format('d/m/Y') }}</li>
                            </ul>
                        </td>
                        <td>
                            <ul>
                                <li class="key">{{$jk->posisi}}</li>
                                <li class="value">Unit {{$jk->unit}} - Departemen {{$jk->departemen}}</li>
                                <li class="value">{{ \Carbon\Carbon::parse($jk->tanggal_mulai)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($jk->tanggal_selesai)->format('d/m/Y') }}</li>
                            </ul>
                        </td>
                        <td>
                            <ul>
                                <li class="key">Bendahara</li>
                                <li class="value">Unit Rekrutmen - Departemen HRD</li>
                                <li class="value">22/07/2014 - 10/03/2016</li>
                            </ul> 
                        </td>
                        <td>
                            <ul>
                                <li class="key">Sekretaris</li>
                                <li class="value">Unit Rekrutmen - Departemen HRD</li>
                                <li class="value">24/01/2013 - 14/05/2014</li>
                            </ul>
                        </td>
                        <td>
                            <ul>
                                <li class="key">HR Administrator</li>
                                <li class="value">Unit Rekrutmen - Departemen HRD</li>
                                <li class="value">11/12/2011 - 09/06/2013</li>
                            </ul>
                        </td>
                        
                        <td class="button-container" align="center">
                            <button class="detail"><i class="fa fa-pen-to-square fa-sm"></i></button>
                            <a href="karyawan/{{$jk->daftark['id']}}"><button class="tambah"><i class="fa-solid fa-plus"></i></button></a>
                        </td>
                    </tr>
                @endforeach
            </div>             
            </table>
        </div>
        <div class="info_data">
            <p class="jmlh_data">Menampilkan {{ $jenjangkarir->firstItem() }} - {{ $jenjangkarir->lastItem() }} dari {{ $jenjangkarir->total() }} data</p>
            <div class="hlmn">
                {{$jenjangkarir->links('pagination::bootstrap-4')}}
                <!-- <button id="nomor"><</button><button id="nomor">1</button><button id="nomor">2</button><button id="nomor">3</button><button id="nomor">></button> -->
            </div>
        </div>

    </div>
</body>
</html>