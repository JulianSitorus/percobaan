<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/te_kpi.css">
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
            <p class="judul">Key Performance Indicator Karyawan</p>
            <hr size="3px" color="#EEEEEE">
            
            <label for="supervisor">Supervisor Langsung</label><input id="supervisor" type="text" name="supervisor">
            <label for="jabatan_supervisor">Jabatan Supervisor</label><input id="jabatan_supervisor" type="text" name="jabatan_supervisor"><br>
            <label for="tanggal_dibuat">KPI Disetujui Bersama</label><input id="tanggal_dibuat" type="date" name="tanggal_dibuat">
            <label for="tanggal_mulai">Periode Pelaksanaan</label><input id="tanggal_mulai" type="date" name="tanggal_mulai"> - <input id="tanggal_berakhir" type="date" name="tanggal_berakhir"><br>
            <label for="deskripsi_kpi">Deskripsi KPI</label>
            <!-- <input id="deskripsi_kpi" type="text" name="deskripsi_kpi"> -->
            <textarea id="deskripsi_kpi" type="komentar"></textarea>
            
            <br><br>
            <hr size="3px" color="#EEEEEE">
            <br>

            <p align="center" style="font-size: 14px;"><b>Keterangan Pengisian:</b></p>
            <div class="tabel_info">
                <table>
                    <tr>
                        <td>Bobot KPI</td>
                        <td>Nilai dalam bentuk %</td>
                    </tr>
                    <tr>
                        <td>Target</td>
                        <td>Pembuatan Target bisa berupa % ( persen), jumlah hari, jumlah orang, jumlah jam</td>
                    </tr>
                    <tr>
                        <td>Realisasi Akhir Tahun</td>
                        <td>Pengisian Realisasi Akhir tahun berdasarkan kenyataan pekerjaan</td>
                    </tr>
                    <tr>
                        <td>Skor</td>
                        <td>Realisasi / Target</td>
                    </tr>
                    <tr>
                        <td>Skor Akhir</td>
                        <td>skor x bobot x 100</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>Penjumlahan bobot KPI & penjumlahan skor akhir</td>
                    </tr>
                </table>
            </div>

            <table class="tabel_kpi">
                <tr>
                    <th class="j_area">Area Kinerja Utama</th>
                    <th class="j_kpi">Key Performance Indicators</th>
                    <th class="j_bobot">Bobot KPI</th>
                    <th class="j_target">Target</th>
                    <th class="j_real">Realisasi Akhir Tahun</th>
                    <th class="j_skor">Skor</th>
                    <th class="j_skor_a">Skor Akhir</th>
                </tr>
                <tr>
                    <td><textarea id="area" type="komentar">Rekrutment</textarea></td>
                    <td><textarea id="kpi" type="komentar">% jumlah kebutuhan karyawan baru yg dapat dipenuhi dengan tepat waktu (< 45 hari )</textarea></td>
                    <td class="background"><input id="bobot" type="text" value="15%"></td>
                    <td class="background"><input id="target" type="text" value="100%"></td>
                    <td class="background"><input id="real" type="text" value="90%"></td>
                    <td class="background"><input id="skor" type="text" value="0,90"></td>
                    <td class="background"><input id="skor_a" type="text" value="14"></td>
                </tr>
                <tr>
                    <td><textarea id="area" type="komentar"></textarea></td>
                    <td><textarea id="kpi" type="komentar">Rata-rata score evaluasi karyawan baru setelah bekerja selama 3 bulan</textarea></td>
                    <td class="background"><input id="bobot" type="text" value="20%"></td>
                    <td class="background"><input id="target" type="text" value="80"></td>
                    <td class="background"><input id="real" type="text" value="82"></td>
                    <td class="background"><input id="skor" type="text" value="1,03"></td>
                    <td class="background"><input id="skor_a" type="text" value="21"></td>
                </tr>
                <tr>
                    <td><textarea id="area" type="komentar">Performance Management</textarea></td>
                    <td><textarea id="kpi" type="komentar">% jumlah karyawan level supervisor keatas yang sudah menyusun KPI individu</textarea></td>
                    <td class="background"><input id="bobot" type="text" value="10%"></td>
                    <td class="background"><input id="target" type="text" value="90%"></td>
                    <td class="background"><input id="real" type="text" value="100%"></td>
                    <td class="background"><input id="skor" type="text" value="1,11"></td>
                    <td class="background"><input id="skor_a" type="text" value="11"></td>
                </tr>
                <tr>
                    <td><textarea id="area" type="komentar">Training&Development</textarea></td>
                    <td><textarea id="kpi" type="komentar">Jumlah training per karyawan( per kapita ) per tahun</textarea></td>
                    <td class="background"><input id="bobot" type="text" value="10%"></td>
                    <td class="background"><input id="target" type="text" value="30 jam"></td>
                    <td class="background"><input id="real" type="text" value="28 jam"></td>
                    <td class="background"><input id="skor" type="text" value="0,93"></td>
                    <td class="background"><input id="skor_a" type="text" value="9"></td>
                </tr>
                <tr>
                    <td><textarea id="area" type="komentar">Employee retention and Productivity</textarea></td>
                    <td><textarea id="kpi" type="komentar">Great employee turn over ( great employee yang dimaksud adalah karyawan “Star”)</textarea></td>
                    <td class="background"><input id="bobot" type="text" value="10%"></td>
                    <td class="background"><input id="target" type="text" value="Mak 1%"></td>
                    <td class="background"><input id="real" type="text" value="1,50%"></td>
                    <td class="background"><input id="skor" type="text" value="0,67"></td>
                    <td class="background"><input id="skor_a" type="text" value="7"></td>
                </tr>
                <tr>
                    <td><textarea id="area" type="komentar"></textarea></td>
                    <td><textarea id="kpi" type="komentar">Revenue per employee</textarea></td>
                    <td class="background"><input id="bobot" type="text" value="10%"></td>
                    <td class="background"><input id="target" type="text" value="2 M/ karyawan"></td>
                    <td class="background"><input id="real" type="text" value="2.2M/karyawan"></td>
                    <td class="background"><input id="skor" type="text" value="1,10"></td>
                    <td class="background"><input id="skor_a" type="text" value="12"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="total" ><b>Total</b></div>
                    </td>
                    <td class="background"><input id="bobot" type="text"></td>
                    <td  class="background" colspan="3">
                        <div class="total" ><b></b></div>
                    </td>
                    <!-- <td><input id="bobot" type="text"></td>
                    <td><input id="bobot" type="text"></td>
                    <td><input id="bobot" type="text"></td> -->
                    <td class="background"><input id="bobot" type="text"></td>
                </tr>
            </table>
            <button class="tambah"><i class="fas fa-plus"><span> Tambah Baris</span></i></button>

            <!-- <a href="coba">
                    <i class="fas fa-id-card">
                        <span class="menu">&emsp;Karyawan</span>
                    </i></a> -->

            <div class="catatan">
                <p class="judul2">*Catatan</p>
                <textarea id="catatan" type="komentar" placeholder="berikan catatan tambahan jika ada"></textarea>
            </div><br>
            
            <hr size="3px" color="#EEEEEE">
            <button class="simpan">Simpan</button> <a href="karyawan"><button class="batal">Batal</button></a>
            
            
        </div>
    </div>
    
</body>
</html>