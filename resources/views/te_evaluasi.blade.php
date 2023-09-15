<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/te_evaluasi.css">
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
        <h3>Karyawan > Evaluasi Karyawan</h3>
        <div class="search-box">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="search" placeholder="Search...">
        </div> 
    </div>

    <div class ="empat">
        <div class="empat2">
            <p class="judul">Evaluasi Karyawan</p>
            <hr size="3px" color="#EEEEEE">
            <form action="">
                <label for="nama">Nama Kepala Departemen</label><input id="nama_kd" type="text" name="nama_kd">

                <label for="tempat_evaluasi">Tempat Evaluasi</label><input id="tempat_evaluasi" type="text" name="tempat_evaluasi"><br>

                <label for="tanggal_evaluasi">Tanggal Evaluasi</label><input id="tanggal_evaluasi" type="date" name="tanggal_evaluasi">

                <label for="tipe_evaluasi" id="tipe_evaluasi">Tipe Evaluasi</label>
                <select name="tipe_evaluasi" id="tipe_evaluasi">
                        <option value="tahunan">Tahunan</option>
                        <option value="percobaan">Percobaan</option> 
                        <option value="promosi">Promosi</option>
                        <option value="khusus">Khusus</option>
                </select>

                <br><br>
                <hr size="3px" color="#EEEEEE">
                <br>
                <p align="center">PENTING:</p>
                <p class="info">Mohon dipastikan bahwa penilaian yang diberikan secara objective 
                    demi masa depan yang bersangkutan dan demi perbaikan kinerja yang bersangkutan. 
                    Hindari Like and Dislike dan Subyektif.</p>
                <table>
                    <tr>
                        <td class="info2">5 = Sangat Baik <br>Pencapaian 100%</td>
                        <td class="info2">4 = Baik <br>Pencapaian 75%</td>
                        <td class="info2">3 = Standard <br>Pencapaian 50%</td>
                        <td class="info2">2 = Dibawah Standard <br>Pencapaian 25%</td>
                        <td class="info2">1 = Buruk/Tidak memuaskan <br>Pencapaian 0%</td>
                    </tr>
                </table>
                
                

                <!-- tabel penilaian performance -->
                <p class="judul3">I. Performance/Kinerja</p>
                <table>
                    <tr>
                        <th class="nomor">No</th>
                        <th class="keterangan">Performance Aspect</th>
                        <th class="judul_nilai">Nilai</th>
                        <th class="komentar">Komentar/Alasan</th>
                    </tr>
                    <tr><form action="">
                        <td align="center">1</td>
                        <td><u><b><i>Pengetahuan tentang Pekerjaannya</u></b></i> - Apakah karyawan memahami konsep kerja, mengetahui SOP yang ada didepartemen/unit terkait, serta tahu program-program kerja dan kegiatan diunit/departemen tersebut.</td>
                        <td><div class="penilaian">
                                <label class="nilai">1</label>
                                <input id="buruk" type="radio" name="tingkat_keahlian">
                                <label class="nilai">2</label>
                                <input id="dibawah_standard" type="radio" name="tingkat_keahlian">
                                <label class="nilai">3</label>
                                <input id="standard" type="radio" name="tingkat_keahlian">
                                <label class="nilai">4</label> 
                                <input id="baik" type="radio" name="tingkat_keahlian">
                                <label class="nilai">5</label>
                                <input id="sangat_baik" type="radio" name="tingkat_keahlian">                
                            </div></td>
                        <td><textarea type="komentar"></textarea></td></form>
                    </tr>
                    <tr><form action="">
                        <td align="center">2</td>
                        <td><u><b><i>Kuantitas dan Kualitas Kerja</u></b></i> - dalam mengerjakan pekerjaan/program/proyek bagaimanakah tingkat efisiensi dan efektif kerjanya, bagaimana kecepatan kerjanya, produktifitasnya,ketelitian, kemampuan merencanakan dan ketepatan dalam membuat laporan PJUM.</td>
                        <td><div class="penilaian">
                        <label class="nilai">1</label>
                                <input id="buruk" type="radio" name="tingkat_keahlian">
                                <label class="nilai">2</label>
                                <input id="dibawah_standard" type="radio" name="tingkat_keahlian">
                                <label class="nilai">3</label>
                                <input id="standard" type="radio" name="tingkat_keahlian">
                                <label class="nilai">4</label> 
                                <input id="baik" type="radio" name="tingkat_keahlian">
                                <label class="nilai">5</label>
                                <input id="sangat_baik" type="radio" name="tingkat_keahlian">                
                            </div></td>
                        <td><textarea type="komentar"></textarea></td>
                        </form>
                    </tr>
                    <tr><form action="">
                        <td align="center">3</td>
                        <td><u><b><i>Konsistensi Kerja</u></b></i> - Apakah dia selalu, kadangkala, tidak pernah mengerjakan pekerjaannya dengan rapi, akurat, teliti, bisa diandalkan dan bisa dipercaya. Apakah dia konsisten dalam pekerjaannya?</td>
                        <td><div class="penilaian">
                        <label class="nilai">1</label>
                                <input id="buruk" type="radio" name="tingkat_keahlian">
                                <label class="nilai">2</label>
                                <input id="dibawah_standard" type="radio" name="tingkat_keahlian">
                                <label class="nilai">3</label>
                                <input id="standard" type="radio" name="tingkat_keahlian">
                                <label class="nilai">4</label> 
                                <input id="baik" type="radio" name="tingkat_keahlian">
                                <label class="nilai">5</label>
                                <input id="sangat_baik" type="radio" name="tingkat_keahlian">              
                            </div></td>
                        <td><textarea type="komentar"></textarea></td></form>
                    </tr>
                    <tr><form action="">
                        <td align="center">4</td>
                        <td><u><b><i>Stabilitas</u></b></i> - bagaimanakah stabilitas kerjanya, stabilitas emosinya, komitment terhadap dan konsisten terhadap pekerjaannya, mempunyai inisiatif untuk team dan organisasi, kedewasaan dan kematangan kepribadian.</td>
                        <td><div class="penilaian">
                        <label class="nilai">1</label>
                                <input id="buruk" type="radio" name="tingkat_keahlian">
                                <label class="nilai">2</label>
                                <input id="dibawah_standard" type="radio" name="tingkat_keahlian">
                                <label class="nilai">3</label>
                                <input id="standard" type="radio" name="tingkat_keahlian">
                                <label class="nilai">4</label> 
                                <input id="baik" type="radio" name="tingkat_keahlian">
                                <label class="nilai">5</label>
                                <input id="sangat_baik" type="radio" name="tingkat_keahlian">             
                            </div></td>
                        <td><textarea type="komentar"></textarea></td></form>
                    </tr>
                    <tr><form action="">
                        <td align="center">5</td>
                        <td><u><b><i>Komunikasi</u></b></i> - bagaimanakah cara berkomunikasinya dengan atasan, rekan kerja, ataupun team diluar unit/departemen? Bagaimanakah menanggapi perintah atau permintaan kepala unit/kepala departemen dengan baik?</td>
                        <td><div class="penilaian">
                                <label class="nilai">1</label>
                                <input id="buruk" type="radio" name="tingkat_keahlian">
                                <label class="nilai">2</label>
                                <input id="dibawah_standard" type="radio" name="tingkat_keahlian">
                                <label class="nilai">3</label>
                                <input id="standard" type="radio" name="tingkat_keahlian">
                                <label class="nilai">4</label> 
                                <input id="baik" type="radio" name="tingkat_keahlian">
                                <label class="nilai">5</label>
                                <input id="sangat_baik" type="radio" name="tingkat_keahlian">                
                            </div></td>
                        <td><textarea type="komentar"></textarea></td></form>
                    </tr>
                    <tr><form action="">
                        <td align="center">6</td>
                        <td><u><b><i>Berdiplomasi& Cara Bersikap</u></b></i> - bagaimanakah ketekunan, keteguhan, rasa hormat kepada rekan kerja dan atasannya.</td>
                        <td><div class="penilaian">
                        <label class="nilai">1</label>
                                <input id="buruk" type="radio" name="tingkat_keahlian">
                                <label class="nilai">2</label>
                                <input id="dibawah_standard" type="radio" name="tingkat_keahlian">
                                <label class="nilai">3</label>
                                <input id="standard" type="radio" name="tingkat_keahlian">
                                <label class="nilai">4</label> 
                                <input id="baik" type="radio" name="tingkat_keahlian">
                                <label class="nilai">5</label>
                                <input id="sangat_baik" type="radio" name="tingkat_keahlian">                
                            </div></td>
                        <td><textarea type="komentar"></textarea></td></form>
                    </tr>
                    <tr><form action="">
                        <td align="center">7</td>
                        <td><u><b><i>Pengambilan Keputusan</u></b></i> - Bagaimanakah cara dia mengambil suatu keputusan? Apakah ragu-ragu? Banyak pertimbangan? Cepat mengambil keputusan dengan benar? Berdampak positif untuk team dan organisasi?</td>
                        <td><div class="penilaian">
                        <label class="nilai">1</label>
                                <input id="buruk" type="radio" name="tingkat_keahlian">
                                <label class="nilai">2</label>
                                <input id="dibawah_standard" type="radio" name="tingkat_keahlian">
                                <label class="nilai">3</label>
                                <input id="standard" type="radio" name="tingkat_keahlian">
                                <label class="nilai">4</label> 
                                <input id="baik" type="radio" name="tingkat_keahlian">
                                <label class="nilai">5</label>
                                <input id="sangat_baik" type="radio" name="tingkat_keahlian">                
                            </div></td>
                        <td><textarea type="komentar"></textarea></td></form>
                    </tr>
                    <tr><form action="">
                        <td align="center">8</td>
                        <td><u><b><i>Hubungan dengan pihak eksternal dan rekankerja</u></b></i> - bagaimana hubungan dalam pekerjaan pekerjaan terhadap rekan kerja ataupun atasan bahkan dengan pimpinan organisasi? Apakah selalu berkonflik? Selalu pembawa damai? Selalu menjadi provokatif? Atau diam dan tidak melakukan sesuatu yang significant</td>
                        <td><div class="penilaian">
                        <label class="nilai">1</label>
                                <input id="buruk" type="radio" name="tingkat_keahlian">
                                <label class="nilai">2</label>
                                <input id="dibawah_standard" type="radio" name="tingkat_keahlian">
                                <label class="nilai">3</label>
                                <input id="standard" type="radio" name="tingkat_keahlian">
                                <label class="nilai">4</label> 
                                <input id="baik" type="radio" name="tingkat_keahlian">
                                <label class="nilai">5</label>
                                <input id="sangat_baik" type="radio" name="tingkat_keahlian">                
                            </div></td>
                        <td><textarea type="komentar"></textarea></td></form>
                    </tr>
                    <tr><form action="">
                        <td align="center">9</td>
                        <td><u><b><i>Kemampuan memecahkan masalah</u></b></i> - apakah selalu bisa memecahkan masalah dengan dampak yang kecil? Apakah selalu meminta pendapat orang lain? apakah tidak punya ide untuk memecahkan masalah?</td>
                        <td><div class="penilaian">
                        <label class="nilai">1</label>
                                <input id="buruk" type="radio" name="tingkat_keahlian">
                                <label class="nilai">2</label>
                                <input id="dibawah_standard" type="radio" name="tingkat_keahlian">
                                <label class="nilai">3</label>
                                <input id="standard" type="radio" name="tingkat_keahlian">
                                <label class="nilai">4</label> 
                                <input id="baik" type="radio" name="tingkat_keahlian">
                                <label class="nilai">5</label>
                                <input id="sangat_baik" type="radio" name="tingkat_keahlian">                
                            </div></td>
                        <td><textarea type="komentar"></textarea></td></form>
                    </tr>
                    <tr><form action="">
                        <td align="center">10</td>
                        <td><u><b><i>Pencapaian Target:</u></b></i> <br>apakah target yang diberikan selalu diterima dengan baik, dikerjakan dan hasilnya sesuai target yang diharapkan?</td>
                        <td><div class="penilaian">
                                <label class="nilai">1</label>
                                <input id="buruk" type="radio" name="tingkat_keahlian">
                                <label class="nilai">2</label>
                                <input id="dibawah_standard" type="radio" name="tingkat_keahlian">
                                <label class="nilai">3</label>
                                <input id="standard" type="radio" name="tingkat_keahlian">
                                <label class="nilai">4</label> 
                                <input id="baik" type="radio" name="tingkat_keahlian">
                                <label class="nilai">5</label>
                                <input id="sangat_baik" type="radio" name="tingkat_keahlian">                
                            </div></td>
                        <td><textarea type="komentar"></textarea></td></form>
                    </tr>
                </table>
                <!-- ----------------------------------- -->

                <!-- tabel penilaian perilaku -->
                <p class="judul3">II. Perilaku</p>
                <table>
                    <tr>
                        <th class="nomor">No</th>
                        <th class="keterangan">Performance Aspect</th>
                        <th class="judul_nilai">Nilai</th>
                        <th class="komentar">Komentar/Alasan</th>
                    </tr>
                    <tr><form action="">
                        <td align="center">1</td>
                        <td><u><b><i>Sikapnya terhadap Supervisornya</u></b></i> - <br>taat pada perintah, menghormati atasan dan mengerjakan apa saja yang diperintahkan/diminta</td>
                        <td><div class="penilaian">
                                <label class="nilai">1</label>
                                <input id="buruk" type="radio" name="tingkat_keahlian">
                                <label class="nilai">2</label>
                                <input id="dibawah_standard" type="radio" name="tingkat_keahlian">
                                <label class="nilai">3</label>
                                <input id="standard" type="radio" name="tingkat_keahlian">
                                <label class="nilai">4</label> 
                                <input id="baik" type="radio" name="tingkat_keahlian">
                                <label class="nilai">5</label>
                                <input id="sangat_baik" type="radio" name="tingkat_keahlian">                
                            </div></td>
                        <td><textarea type="komentar"></textarea></td></form>
                    </tr>
                    <tr><form action="">
                        <td align="center">2</td>
                        <td><u><b><i>Kuantitas dan Kualitas Kerja</u></b></i> - dalam mengerjakan pekerjaan/program/proyek bagaimanakah tingkat efisiensi dan efektif kerjanya, bagaimana kecepatan kerjanya, produktifitasnya,ketelitian, kemampuan merencanakan dan ketepatan dalam membuat laporan PJUM.</td>
                        <td><div class="penilaian">
                                <label class="nilai">1</label>
                                <input id="buruk" type="radio" name="tingkat_keahlian">
                                <label class="nilai">2</label>
                                <input id="dibawah_standard" type="radio" name="tingkat_keahlian">
                                <label class="nilai">3</label>
                                <input id="standard" type="radio" name="tingkat_keahlian">
                                <label class="nilai">4</label> 
                                <input id="baik" type="radio" name="tingkat_keahlian">
                                <label class="nilai">5</label>
                                <input id="sangat_baik" type="radio" name="tingkat_keahlian">                
                            </div></td>
                        <td><textarea type="komentar"></textarea></td>
                        </form>
                    </tr>
                    <tr><form action="">
                        <td align="center">3</td>
                        <td><u><b><i>Inisiatif</u></b></i> - mempunyai usulan yang membantu perbaikan team dan organisasi, kemampuan bekerja tanpa disupervisi, menunjukkan sikap yang baik</td>
                        <td><div class="penilaian">
                                <label class="nilai">1</label>
                                <input id="buruk" type="radio" name="tingkat_keahlian">
                                <label class="nilai">2</label>
                                <input id="dibawah_standard" type="radio" name="tingkat_keahlian">
                                <label class="nilai">3</label>
                                <input id="standard" type="radio" name="tingkat_keahlian">
                                <label class="nilai">4</label> 
                                <input id="baik" type="radio" name="tingkat_keahlian">
                                <label class="nilai">5</label>
                                <input id="sangat_baik" type="radio" name="tingkat_keahlian">                
                            </div></td>
                        <td><textarea type="komentar"></textarea></td></form>
                    </tr>
                    <tr><form action="">
                        <td align="center">4</td>
                        <td><u><b><i>Kehadiran</u></b></i> - hadir sesuai denganwaktu yang ditentukan dan tidak datang terlambat. Memberikan keteladanan dalam kehadiran- tidak masuk sesuka hati tapi mengikuti aturan organisasi.</td>
                        <td><div class="penilaian">
                                <label class="nilai">1</label>
                                <input id="buruk" type="radio" name="tingkat_keahlian">
                                <label class="nilai">2</label>
                                <input id="dibawah_standard" type="radio" name="tingkat_keahlian">
                                <label class="nilai">3</label>
                                <input id="standard" type="radio" name="tingkat_keahlian">
                                <label class="nilai">4</label> 
                                <input id="baik" type="radio" name="tingkat_keahlian">
                                <label class="nilai">5</label>
                                <input id="sangat_baik" type="radio" name="tingkat_keahlian">                
                            </div></td>
                        <td><textarea type="komentar"></textarea></td></form>
                    </tr>
                    <tr><form action="">
                        <td align="center">5</td>
                        <td><u><b><i>Ketepatan Waktu</u></b></i> - setiap kali mendapatkan undangan untuk rapat interlan departemen/ unit selalu datang tepat pada waktunya dan tidak pernah menunda pekerjaan, mencapai target dan tepat waktu yang diberikan atasan.</td>
                        <td><div class="penilaian">
                                <label class="nilai">1</label>
                                <input id="buruk" type="radio" name="tingkat_keahlian">
                                <label class="nilai">2</label>
                                <input id="dibawah_standard" type="radio" name="tingkat_keahlian">
                                <label class="nilai">3</label>
                                <input id="standard" type="radio" name="tingkat_keahlian">
                                <label class="nilai">4</label> 
                                <input id="baik" type="radio" name="tingkat_keahlian">
                                <label class="nilai">5</label>
                                <input id="sangat_baik" type="radio" name="tingkat_keahlian">               
                            </div></td>
                        <td><textarea type="komentar"></textarea></td></form>
                    </tr>
                </table><br>

                <div class="hasil_kinerja">
                    <p class="judul2">III. Hasil Kinerja Menyeluruh/Pencapaian Kinerja</p>
                    <p>Dari hasil evaluasi kinerjanya, pekarya ini telah menunjukkan kerjanya</p>
                    <form action=""></form>
                        <div class="penilaian_hk">
                            <div>
                                <input id="melebihi_standard_hk" type="radio" name="tingkat_keahlian">
                                <label class="nilai_hk" for="melebihi_standard_hk">Melebihi standard</label>
                            </div>
                            <div>                           
                                <input id="standard_hk" type="radio" name="tingkat_keahlian">
                                <label class="nilai_hk" for="standard_hk">Standard</label>
                            </div>
                            <div>                          
                                <input id="dibawah_standard_hk" type="radio" name="tingkat_keahlian">
                                <label class="nilai_hk" for="dibawah_standard_hk">Dibawah standard</label>
                            </div>
                        </div>
                    </form>
                    <textarea type="komentar" placeholder=" berikan alasan jika ada"></textarea>

                    <p>Dengan Demikian saya akan mengusulkan/merekomendasikan untuk</p>
                    <form action="">
                        <div class="penilaian_hk">
                            <div>
                                <input id="kontrak_diperpanjang_hk" type="radio" name="tingkat_keahlian">
                                <label class="nilai_hk" for="kontrak_diperpanjang_hk">Kontrak diperpanjang</label>
                            </div>
                            <div>                           
                                <input id="tidak_diperpanjang_hk" type="radio" name="tingkat_keahlian">
                                <label class="nilai_hk" for="tidak_diperpanjang_hk">Kontrak tidak diperpanjang</label>
                            </div>
                            <div>                          
                                <input id="promosi_hk" type="radio" name="tingkat_keahlian">
                                <label class="nilai_hk" for="promosi_hk">Dipromosi untuk level lebih tinggi</label>
                            </div>
                        </div>
                    </form>
                    <textarea type="komentar" placeholder=" berikan alasan jika ada"></textarea>
                </div>

                <div class="penilaian_umum">
                    <p class="judul2">IV. Penilaian Umum</p>
                    <label for="kekuatan">Kekuatan Utama Pekarya: </label>
                    <textarea id="kekuatan" type="komentar"></textarea><br>
                    <label for="kelemahan">Kelemahan Utama Pekarya: </label>
                    <textarea id="kelemahan" type="komentar"></textarea>
                </div>

                <div class="rekomendasi">
                    <p class="judul2">V. Rekomendasi Pelatihan Dan Pengembangan Pekarya Apabila Kontrak Diperpanjang</p>
                    <textarea id="rekomendasi" type="komentar" placeholder="berikan rekomendasi jika ada"></textarea>
                </div>

                <div class="catatan">
                    <p class="judul2">*Catatan</p>
                    <textarea id="catatan" type="komentar" placeholder="berikan catatan tambahan jika ada"></textarea>
                </div>
            <p class="hidden">asdasdasda</p>
            <hr class="garis" size="3px" color="#EEEEEE">
            <button class="simpan">Simpan</button><a href="karyawan"><button class="batal">Batal</button></a>
            </form>

        </div>
    </div>
    
</body>
</html>