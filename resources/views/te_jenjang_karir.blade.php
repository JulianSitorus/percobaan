<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/te_jenjang_karir.css">
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
            <p class="judul">Jenjang Karir Karyawan</p>
            <hr size="3px" color="#EEEEEE">
            <form action="">
                <label for="posisi">Posisi</label><input id="posisi" type="text" name="posisi"><br>

                <label for="unit">Unit</label><input id="unit" type="text" name="unit"><br>

                <label for="departemen">Departemen</label><input id="departemen" type="text" name="departemen"><br>

                <label for="mulai_posisi">Mulai</label><input id="mulai_posisi" type="date" name="mulai_posisi"><br>

                <label for="selesai_posisi">Selesai</label><input id="selesai_posisi" type="date" name="selesai_posisi"><br>

                <br>
                <hr size="3px" color="#EEEEEE">
                <button class="simpan">Simpan</button> <a href="karyawan"><button class="batal">Batal</button></a>
            </form>  
        </div>
    </div>
    
</body>
</html>