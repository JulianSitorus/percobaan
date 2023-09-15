<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/te_pelatihan.css">
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
                <li><a href="jenjangk">
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
        <h3>Karyawan > </h3>
        <div class="search-box">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="search" placeholder="Search...">
        </div> 
    </div>

    <div class ="empat">
        <div class="empat2">
            <p class="judul">Pelatihan Karyawan</p>
            <hr size="3px" color="#EEEEEE">
            <form action="">
                <label for="nama_pelatihan">Nama Pelatihan</label><input id="nama_pelatihan" type="text" name="nama_pelatihan"><br>

                <label for="penyelanggara">Penyelanggara</label><input id="penyelanggara" type="text" name="penyelanggara"><br>

                <label for="mulai">Mulai</label><input id="mulai" type="date" name="mulai"><br>

                <label for="selesai">Selesai</label><input id="selesai" type="date" name="selesai"><br>

                <label for="lokasi">Lokasi</label><input id="lokasi" type="text" name="lokasi"><br>

                <br>
                <hr size="3px" color="#EEEEEE">
                <button class="simpan">Simpan</button> <a href="karyawan"><button class="batal">Batal</button></a>
            </form>  
        </div>
    </div>
    
</body>
</html>