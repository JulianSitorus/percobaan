<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/biodata.css">
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
            <p class="judul">Biodata Karyawan</p>
            <hr size="3px" color="#EEEEEE">
            <form action="store" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="nama_karyawan">Nama</label><input id="nama_karyawan" type="varchar" name="nama_karyawan"><br>

                <label for="tempat_lahir">Tempat Lahir</label><input id="tempat_lahir" type="text" name="tempat_lahir"><br>

                <label for="tanggal_lahir">Tanggal Lahir</label><input id="tanggal_lahir" type="date" name="tanggal_lahir"><br>

                <label for="alamat">Alamat</label><input id="alamat" type="text" name="alamat"><br>


                <label for="agama">Agama</label>
                <select name="agama" id="agama">
                    <option value="">Pilih Agama</option>
                    <option value="islam">Islam</option>
                    <option value="kristen">Kristen</option>
                    <option value="katolik">Katolik</option> 
                    <option value="hindu">Hindu</option> 
                    <option value="buddha">Buddha</option> 
                    <option value="konghucu">Konghucu</option> 
                </select><br>

                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option> 
                </select><br>

                <label for="email">Email</label><input id="email" type="varchar" name="email"><br>

                <label for="no_telp">Telepon</label><input id="no_telp" type="char" pattern="[0-9]{12}" name="no_telp"><br>

                <label for="pendidikan">Pendidikan</label><input id="pendidikan" type="varchar" name="pendidikan"><br>

                <label for="pekerjaan_terakhir">Pekerjaan Terakhir</label><input id="pekerjaan_terakhir" type="varchar" name="pekerjaan_terakhir"><br>

                <label for="departemen">Departemen</label><input id="departemen" type="varchar" name="departemen"><br>

                <label for="unit">Unit</label><input id="unit" type="varchar" name="unit"><br>

                <label for="posisi">Posisi</label><input id="posisi" type="varchar" name="posisi"><br>

                <label for="status">Status</label>
                <select name="status" id="status">
                    <option value="">Pilih Status</option>
                    <option value="Tetap">Tetap</option>
                    <option value="Kontrak">Kontrak</option> 
                    <option value="Paruh Waktu">Paruh Waktu</option>
                    <option value="Harian">Harian</option>
                </select>
                <br>

                <label for="foto">Foto</label>                
                <input id="foto" type="file" name="foto" accept="image/*"
                onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                <div><img src="" id="output" width="180"></div>
                <br>
                <hr size="3px" color="#EEEEEE">
                <input class="simpan" type="submit" name="submit" value="Simpan">
                <a href="karyawan"><button class="batal">Batal</button></a>
                <!-- <button class="simpan">Simpan</button>  -->
            </form>  
        </div>
    </div>
    
</body>
</html>