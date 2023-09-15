<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/te_keahlian.css">
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
            <input type="text" placeholder="Search...">
        </div> 
    </div>

    <div class ="empat">
        <div class="empat2">
            <p class="judul">Keahlian Karyawan</p>
            <hr size="3px" color="#EEEEEE">
            
            <label class="key" for="jenis_keahlian">Jenis Keahlian</label><input id="jenis_keahlian" type="text" name="jenis_keahlian"><br>
            <!-- <p class="key">Jenis Keahlian</p><input id="keahlian" type="text"> -->
            <form action="">
                <p class="key">Tingkat Keahlian</p>
                <div>
                    <input id="sb" type="radio" name="tingkat_keahlian">
                    <label for="sb">Sangat Baik</label>
                </div>  
                <div>
                    <input id="b" type="radio" name="tingkat_keahlian">
                    <label for="b">Baik</label>
                </div>
                <div>
                    <input id="s" type="radio" name="tingkat_keahlian">
                    <label for="s">Standar</label>
                </div>  
                <div>
                    <input id="ds" type="radio" name="tingkat_keahlian">
                    <label for="ds">Dibawah Standar</label>
                </div><div>
                    <input id="brk" type="radio" name="tingkat_keahlian">
                    <label for="brk">Buruk</label>
                </div>
            </form>  
            <br/>
            
            <hr size="3px" color="#EEEEEE">
            <button class="simpan">Simpan</button> <a href="karyawan"><button class="batal">Batal</button></a>
            
            
        </div>
    </div>
    
</body>
</html>