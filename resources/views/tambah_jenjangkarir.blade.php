<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/te_jenjang_karir.css') }}">
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
        <a href="/karyawan/{{$daftark->id}}/detail_jenjangkarir"><h3 class="breadcrumb">Detail Jenjang Karir ></h3></a> 
        <a href="/karyawan/{{$daftark->id}}/detail_jenjangkarir/tambah_jenjangkarir"><h3 class="breadcrumb">Tambah Jenjang Karir</h3></a> 
    </div>

    <div class ="empat">
        <div class="empat2">
            <p class="judul">Tambah Jenjang Karir Karyawan</p>
            <hr size="3px" color="#EEEEEE">
            <form action="/store_jenjangkarir/{{$daftark->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <label for="posisi">Posisi</label><input id="posisi" type="text" name="posisi" pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Posisi karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan posisi"><br>

                <label for="unit">Unit</label><input id="unit" type="text" name="unit" pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Unit karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan unit"><br>

                <label for="departemen">Departemen</label><input id="departemen" type="text" name="departemen" pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Departemen karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan departemen"><br>

                <label for="tanggal_mulai">Mulai</label><input id="tanggal_mulai" type="date" name="tanggal_mulai" pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Tanngal mulai karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan tanggal mulai"><br>

                <label for="tanggal_selesai">Selesai</label><input id="tanggal_selesai" type="date" name="tanggal_selesai" pattern=".*\S+.*" 
                oninvalid="this.setCustomValidity('Tanggal selesai karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan tanggal selesai"><br>

                <br>
                <hr size="3px" color="#EEEEEE">
                <input class="simpan" type="submit" name="submit" value="Simpan">
            </form>
                <div class="display_batal ">
                    <a href="/karyawan/{{$daftark->id}}/detail_jenjangkarir"><button class="batal">Batal</button></a>
                </div>
        </div>
    </div>
    
</body>
</html>