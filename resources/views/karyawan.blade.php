<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/karyawan.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.css">
    <title>Document</title>
</head>

<body>
    
    <div class ="satu">
        <img src='images/logo.jpg'>
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
        <h3>Karyawan > Detail Karyawan</h3>
        <div class="search-box">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" placeholder="Search...">
        </div> 
    </div>

    <div class ="empat">
        <div class="empat2">
            <p>Detail Karyawan</p>
            <hr size="3px" color="#EEEEEE">
            <div class="foto">
                <img src='images/karyawan.jpg'>
                <h3>Posisi</h3>
                <p>Ketua Departemen HRD</p>
                <h3>Unit</h3>
                <p>Rekrutmen</p>
                <h3>Departemen</h3>
                <p>HRD</p>
                                

            </div>
            <div class="profil">
                <p class="judul">Biodata</p>
                <ul>
                    <li class="key">Nama</li>
                    <li class="value">Ponari Alexander Charles</li>
                </ul>
                <ul>
                    <li class="key">Tempat & Tanggal Lahir</li>
                    <li class="value">Yogyakarta, 23 Juli 1990</li>
                </ul>
                <ul>
                    <li class="key">Alamat</li>
                    <li class="value">Jl. Jupiter XI No. 45</li>
                </ul>
                <ul>
                    <li class="key">Agama</li>
                    <li class="value">Kristen Protestan</li>
                </ul>
                <ul>
                    <li class="key">Jenis Kelamin</li>
                    <li class="value">Pria</li>
                </ul>
                <ul>
                    <li class="key">Email</li>
                    <li class="value">ponari@gmail.com</li>
                </ul>
                <ul>
                    <li class="key">Telepon</li>
                    <li class="value">089976652891</li>
                </ul>
                <ul>
                    <li class="key">Pendidikan</li>
                    <li class="value">S1 Manajemen Oxford University</li>
                </ul>
                <ul>
                    <li class="key">Pekerjaan Terakhir</li>
                    <li class="value">Perawat - RSUP Dr. Sardjito</li>
                </ul>
                <ul>
                    <li class="key">Status</li>
                    <li class="value">Tetap</li>
                </ul>
                <a href="biodata"><button><i class="fa fa-pen-to-square fa-sm"></i> Edit</button></a>
            </div>
            <div class="karir">
                <p class="judul">Jenjang Karir</p>
                <ul>
                    <li class="key">HR Administrator</li>
                    <li class="value">Unit Rekrutmen - Departemen HRD</li>
                    <li class="value">11/12/2011 - 09/06/2013</li>
                </ul>
                <ul>
                    <li class="key">Sekretaris</li>
                    <li class="value">Unit Rekrutmen - Departemen HRD</li>
                    <li class="value">24/01/2013 - 14/05/2014</li>
                </ul>
                <ul>
                    <li class="key">Bendahara</li>
                    <li class="value">Unit Rekrutmen - Departemen HRD</li>
                    <li class="value">22/07/2014 - 10/03/2016</li>
                </ul>
                <ul>
                    <li class="key">Wakil Departemen HRD</li>
                    <li class="value">Unit Rekrutmen - Departemen HRD</li>
                    <li class="value">12/10/2016 - 24/03/2019</li>
                </ul>
                <ul>
                    <li class="key">Ketua Departemen HRD</li>
                    <li class="value">Unit Rekrutmen - Departemen HRD</li>
                    <li class="value">09/12/2019 - Sekarang</li>
                </ul>
                <a href="detail_jenjang_karir"><button><i class="fa fa-pen-to-square fa-sm"></i> Detail</button></a>
            </div>

            <!-- Kpi -->
            <div class="judul3"><i class="fas fa-briefcase fa-xl"></i><span>   Key Performance Indicator</span></div>
            <table>
                <tr>
                    <th class="posisi_kpi">Posisi</th>
                    <th class="tanggal_dibuat">Tanggal Dibuat</th>
                    <th class="supervisor">Supervisor</th>
                    <th class="periode">Periode Pelaksanaan</th>
                    <th class="deskripsi_kpi">Deskripsi KPI</th>
                    <th class="j_skor">Total Bobot KPI</th>
                    <th class="j_skor_a">Total Skor Akhir</th>
                    <th class="aksi">Aksi</th>
                </tr>
                <tr>
                    <td>Wakil Departemen HRD</td>
                    <td>08/08/2017</td>
                    <td>Bambang Pamungkas S.E</td>
                    <td>10/08/2017 - 15/11/2018</td>
                    <td>KPI sebagai senior di HRD</td>
                    <td>100%</td>
                    <td>94</td>
                    <td align="center">
                        <a href="te_kpi"><button class="detail"><i class="fa fa-pen-to-square fa-sm" ></i></button></a>
                        <button class="hapus"><i class="fa fa-trash-can fa-sm"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>HR Administrator</td>
                    <td>23/05/2016</td>
                    <td>Asnawi Mangkualam S.T</td>
                    <td>23/06/2016 - 18/11/2016</td>
                    <td>Melakukan Perhitungan, rekrutmen, dan Analisis kinerja</td>
                    <td>100%</td>
                    <td>96</td>
                    <td align="center">
                        <a href="te_kpi"><button class="detail"><i class="fa fa-pen-to-square fa-sm" ></i></button></a>
                        <button class="hapus"><i class="fa fa-trash-can fa-sm"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Bendahara</td>
                    <td>29/11/2015</td>
                    <td>Muhammad Ridwan S.E</td>
                    <td>30/11/2015 - 18/01/2016</td>
                    <td>audit keuangan satunama</td>
                    <td>100%</td>
                    <td>98</td>
                    <td align="center">
                        <a href="te_kpi"><button class="detail"><i class="fa fa-pen-to-square fa-sm" ></i></button></a>
                        <button class="hapus"><i class="fa fa-trash-can fa-sm"></i></button>
                    </td>
                </tr>                
                <tr>
                    <td>Staff HRD</td>
                    <td>08/08/2012</td>
                    <td>Kaleb Ramon Setiawan</td>
                    <td>10/08/2012 - 15/11/2012</td>
                    <td>KPI sebagai staff junior di HRD</td>
                    <td>100%</td>
                    <td>95</td>
                    <td align="center">
                        <a href="te_kpi"><button class="detail"><i class="fa fa-pen-to-square fa-sm" ></i></button></a>
                        <button class="hapus"><i class="fa fa-trash-can fa-sm"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Staff HRD</td>
                    <td>06/03/2012</td>
                    <td>Kaleb Ramon Setiawan</td>
                    <td>09/03/2012 - 21/06/2012</td>
                    <td>KPI sebagai staff junior di HRD</td>
                    <td>100%</td>
                    <td>95</td>
                    <td align="center">
                        <a href="te_kpi"><button class="detail"><i class="fa fa-pen-to-square fa-sm" ></i></button></a>
                        <button class="hapus"><i class="fa fa-trash-can fa-sm"></i></button>
                    </td>
                </tr>
            </table>
            <a href="te_kpi"><button class="tambah"><i class="fa-solid fa-plus"></i> Tambah Data</button></a><br>

            <!-- evaluasi -->
            <div class="judul2"><i class="fas fa-clipboard-list fa-xl"></i><span>   Evaluasi</span></div>
            <table>
                <tr>
                    <th>Departemen</th>
                    <th>Posisi</th>
                    <th>Tanggal Evaluasi</th>
                    <th colspan="2">Hasil Kinerja</th>
                    <th>Kekuatan</th>
                    <th>Kekurangan</th>
                    <th>Rekomendasi Pelatihan</th>
                    <th class="aksi">Aksi</th>
                </tr>
                <tr>
                    <td>Keuangan</td>
                    <td>Staff</td>
                    <td>19/05/2022</td>
                    <td>Standard</td>
                    <td>Kontrak Diperpanjang</td>
                    <td>Mampu menyelesaikan tugas sebelum deadline</td>
                    <td>Tidak menguasai ms excel</td>
                    <td>disarankan untuk melakukan pelatihan excel</td>
                    <td align="center">
                        <a href="te_evaluasi"><button class="detail"><i class="fa fa-pen-to-square fa-sm" ></i></button></a>
                        <button class="hapus"><i class="fa fa-trash-can fa-sm"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Keuangan</td>
                    <td>Staff</td>
                    <td>19/05/2022</td>
                    <td>Standard</td>
                    <td>Kontrak Diperpanjang</td>
                    <td>Mampu menyelesaikan tugas sebelum deadline</td>
                    <td>Tidak menguasai ms excel</td>
                    <td>disarankan untuk melakukan pelatihan excel</td>
                    <td align="center">
                        <a href="te_evaluasi"><button class="detail"><i class="fa fa-pen-to-square fa-sm" ></i></button></a>
                        <button class="hapus"><i class="fa fa-trash-can fa-sm"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Keuangan</td>
                    <td>Staff</td>
                    <td>19/05/2022</td>
                    <td>Standard</td>
                    <td>Kontrak Diperpanjang</td>
                    <td>Mampu menyelesaikan tugas sebelum deadline</td>
                    <td>Tidak menguasai ms excel</td>
                    <td>disarankan untuk melakukan pelatihan excel</td>
                    <td align="center">
                        <a href="te_evaluasi"><button class="detail"><i class="fa fa-pen-to-square fa-sm" ></i></button></a>
                        <button class="hapus"><i class="fa fa-trash-can fa-sm"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Keuangan</td>
                    <td>Staff</td>
                    <td>19/05/2022</td>
                    <td>Standard</td>
                    <td>Kontrak Diperpanjang</td>
                    <td>Mampu menyelesaikan tugas sebelum deadline</td>
                    <td>Tidak menguasai ms excel</td>
                    <td>disarankan untuk melakukan pelatihan excel</td>
                    <td align="center">
                        <a href="te_evaluasi"><button class="detail"><i class="fa fa-pen-to-square fa-sm" ></i></button></a>
                        <button class="hapus"><i class="fa fa-trash-can fa-sm"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Keuangan</td>
                    <td>Staff</td>
                    <td>19/05/2022</td>
                    <td>Standard</td>
                    <td>Kontrak Diperpanjang</td>
                    <td>Mampu menyelesaikan tugas sebelum deadline</td>
                    <td>Tidak menguasai ms excel</td>
                    <td>disarankan untuk melakukan pelatihan excel</td>
                    <td align="center">
                        <a href="te_evaluasi"><button class="detail"><i class="fa fa-pen-to-square fa-sm" ></i></button></a>
                        <button class="hapus"><i class="fa fa-trash-can fa-sm"></i></button>
                    </td>
                </tr>
            </table>
            <a href="te_evaluasi"><button class="tambah"><i class="fa-solid fa-plus"></i> Tambah Data</button></a><br>

            <!-- Keahlian -->
            <div class="judul2"><i class="fas fa-kitchen-set fa-xl"></i><span>   Keahlian</span></div>
            <!-- <div style="overflow: auto; height: 531px"> -->
            <table>
                <tr>
                    <th>Keahlian</th>
                    <th>Tingkat Keahlian</th>
                    <th class="aksi">Aksi</th>
                </tr>
                <tr>
                    <td>Pendidikan Pancasila dan HAM</td>
                    <td>Baik</td>
                    <td align="center">
                        <a href="karyawan"><button class="detail"><i class="fa fa-pen-to-square fa-sm" ></i></button></a>
                        <button class="hapus"><i class="fa fa-trash-can fa-sm"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Jurnalisme</td>
                    <td>Standar</td>
                    <td align="center">
                        <a href="karyawan"><button class="detail"><i class="fa fa-pen-to-square fa-sm" ></i></button></a>
                        <button class="hapus"><i class="fa fa-trash-can fa-sm"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Pendidikan Berbasis Budaya</td>
                    <td>Sangat Baik</td>
                    <td align="center">
                        <a href="karyawan"><button class="detail"><i class="fa fa-pen-to-square fa-sm" ></i></button></a>
                        <button class="hapus"><i class="fa fa-trash-can fa-sm"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Narasumber</td>
                    <td>Dibawah Standar</td>
                    <td align="center">
                        <a href="karyawan"><button class="detail"><i class="fa fa-pen-to-square fa-sm" ></i></button></a>
                        <button class="hapus"><i class="fa fa-trash-can fa-sm"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Mengemudi</td>
                    <td>Sangat Baik</td>
                    <td align="center">
                        <a href="karyawan"><button class="detail"><i class="fa fa-pen-to-square fa-sm" ></i></button></a>
                        <button class="hapus"><i class="fa fa-trash-can fa-sm"></i></button>
                    </td>
                </tr>
            </table>
            <a href="te_keahlian"><button class="tambah"><i class="fa-solid fa-plus"></i> Tambah Data</button></a><br>
            
            
            <div class="judul2"><i class="fas fa-book fa-xl"></i><span>   Pelatihan</span></div>
            <!-- <div style="overflow: auto; height: 231px"> -->
            <table>
           
                <tr>
                    <th class="namap">Nama Pelatihan</th>
                    <th class="penyelenggara">Penyelenggara</th>
                    <th class="waktu">Mulai</th>
                    <th class="waktu">Selesai</th>
                    <th class="lokasi">Lokasi</th>
                    <th class="aksi">Aksi</th>
                </tr>
                <tr>
                    <td>Workshop penulisan artikel ilmiah</td>
                    <td>Fakultas Ekonomi UGM</td>
                    <td>12/05/2015</td>
                    <td>04/06/2015</td>
                    <td>Yogyakarta, UGM</td>
                    <td align="center">
                        <a href="karyawan"><button class="detail"><i class="fa fa-pen-to-square fa-sm" ></i></button></a>
                        <button class="hapus"><i class="fa fa-trash-can fa-sm"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Workshop penulisan artikel ilmiah internasional</td>
                    <td>LP3M Univ Katholik Widya Mandala</td>
                    <td>12/05/2015</td>
                    <td>04/06/2015</td>
                    <td>Madiun</td>
                    <td align="center">
                        <a href="karyawan"><button class="detail"><i class="fa fa-pen-to-square fa-sm" ></i></button></a>
                        <button class="hapus"><i class="fa fa-trash-can fa-sm"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Pelatihan pengembangan E-Book dan Web based course</td>
                    <td>Apple Academy Binus</td>
                    <td>12/05/2015</td>
                    <td>04/06/2015</td>
                    <td>Jakarta</td>
                    <td align="center">
                        <a href="karyawan"><button class="detail"><i class="fa fa-pen-to-square fa-sm" ></i></button></a>
                        <button class="hapus"><i class="fa fa-trash-can fa-sm"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Workshop penulisan artikel ilmiah internasional</td>
                    <td>LP3M Univ Katholik Widya Mandala</td>
                    <td>12/05/2015</td>
                    <td>04/06/2015</td>
                    <td>Madiun</td>
                    <td align="center">
                        <a href="karyawan"><button class="detail"><i class="fa fa-pen-to-square fa-sm" ></i></button></a>
                        <button class="hapus"><i class="fa fa-trash-can fa-sm"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Pelatihan Microsoft Excel</td>
                    <td>Lembaga Pelatihan Komputer Indonesia</td>
                    <td>15/05/2015</td>
                    <td>30/06/2015</td>
                    <td>Yogyakarta</td>
                    <td align="center">
                        <a href="karyawan"><button class="detail"><i class="fa fa-pen-to-square fa-sm" ></i></button></a>
                        <button class="hapus"><i class="fa fa-trash-can fa-sm"></i></button>
                    </td>
                </tr>
            </table>
            <a href="te_pelatihan"><button class="tambah"><i class="fa-solid fa-plus"></i> Tambah Data</button></a>
            <br><br><br>
            <hr size="3px" color="#EEEEEE">
            <button class="hapus_kary"><i class="fa fa-trash-can fa-sm"></i> Hapus Karyawan</button>
        </div>
        
    </div>
</body>
</html>