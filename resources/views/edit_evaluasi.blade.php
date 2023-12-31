<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/te_evaluasi.css') }}">
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
                <li><a class="logout" href="/logout">
                    <i class="fas fa-right-from-bracket">
                        <span class="menu">&emsp; Keluar</span>
                    </i></a></li>
                
            </ul>
    </div>

    <div class ="tiga">
        <h3>Edit Evaluasi Karyawan</h3>
    </div>

    <div class ="empat">
        <div class="empat2">
            <p class="judul">Edit Evaluasi Karyawan</p>
            <hr size="3px" color="#EEEEEE">
            <form action="{{ route('evaluasi.update', ['id' => $evaluasi->id]) }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <label for="nama">Nama Kepala Departemen</label><input id="nama_kd" value="{{$evaluasi->nama_kd}}" type="text" name="nama_kd" pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Nama kepala departemen karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan nama kepala departemen">

                <label for="tempat_evaluasi">Tempat Evaluasi</label><input id="tempat_evaluasi" value="{{$evaluasi->tempat_evaluasi}}" type="text" name="tempat_evaluasi" pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Tempat evaluasi karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan tempat evaluasi"><br>

                <label for="tanggal_evaluasi">Tanggal Evaluasi</label><input id="tanggal_evaluasi" value="{{$evaluasi->tanggal_evaluasi}}" type="date" name="tanggal_evaluasi" max="9999-12-31" required
                oninvalid="this.setCustomValidity('Tanggal evaluasi karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan tanggal evaluasi">

                <label for="tipe_evaluasi" id="tipe_evaluasi">Tipe Evaluasi</label>
                <select name="tipe_evaluasi" id="tipe_evaluasi" required
                oninvalid="this.setCustomValidity('Tipe evaluasi karyawan belum terisi!')" 
                onInput="this.setCustomValidity('')" title="Silahkan pilih tipe evaluasi">
                        <option value="" disabled selected>--- Pilih Tipe Evaluasi ---</option>
                        <option value="Triwulan" @if ($evaluasi->tipe_evaluasi == "Triwulan") selected @endif >Triwulan</option>
                        <option value="Tahunan" @if ($evaluasi->tipe_evaluasi == "Tahunan") selected @endif>Tahunan</option>
                        <option value="Percobaan" @if ($evaluasi->tipe_evaluasi == "Percobaan") selected @endif>Percobaan</option> 
                        <option value="Promosi" @if ($evaluasi->tipe_evaluasi == "Promosi") selected @endif>Promosi</option>
                        <option value="Khusus" @if ($evaluasi->tipe_evaluasi == "Khusus") selected @endif>Khusus</option>
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
                    
                    <tr>
                        <td align="center">1</td>
                        <td><u><b><i>Pengetahuan tentang Pekerjaannya</u></b></i> - Apakah karyawan memahami konsep kerja, mengetahui SOP yang ada didepartemen/unit terkait, serta tahu program-program kerja dan kegiatan diunit/departemen tersebut.</td>
                        <td><div class="penilaian">
                                <label class="nilai">1</label>
                                <input id="buruk" type="radio" name="tingkat_keahlian_pertanyaan_1" value="1" required @if ($evaluasi->tingkat_keahlian_pertanyaan_1 == "1") checked @endif
                                oninvalid="this.setCustomValidity('Nilai kinerja belum dipilih!')" onInput="this.setCustomValidity('')" title="Silahkan pilih salah satu pilihan ini"> 
                                <label class="nilai">2</label>
                                <input id="dibawah_standard" type="radio" name="tingkat_keahlian_pertanyaan_1" value="2" required @if ($evaluasi->tingkat_keahlian_pertanyaan_1 == "2") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">3</label>
                                <input id="standard" type="radio" name="tingkat_keahlian_pertanyaan_1" value="3" required @if ($evaluasi->tingkat_keahlian_pertanyaan_1 == "3") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">4</label> 
                                <input id="baik" type="radio" name="tingkat_keahlian_pertanyaan_1" value="4" required @if ($evaluasi->tingkat_keahlian_pertanyaan_1 == "4") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">5</label>
                                <input id="sangat_baik" type="radio" name="tingkat_keahlian_pertanyaan_1" value="5" required @if ($evaluasi->tingkat_keahlian_pertanyaan_1 == "5") checked @endif title="Silahkan pilih salah satu pilihan ini">                
                            </div>
                        </td>
                        <td><textarea name="komentar_pertanyaan_1"  placeholder="berikan alasan jika ada">{{$evaluasi->komentar_pertanyaan_1}}</textarea></td>
                    </tr>
                    <tr>
                        <td align="center">2</td>
                        <td><u><b><i>Kuantitas dan Kualitas Kerja</u></b></i> - dalam mengerjakan pekerjaan/program/proyek bagaimanakah tingkat efisiensi dan efektif kerjanya, bagaimana kecepatan kerjanya, produktifitasnya,ketelitian, kemampuan merencanakan dan ketepatan dalam membuat laporan PJUM.</td>
                        <td><div class="penilaian">
                                <label class="nilai">1</label>
                                <input id="buruk" type="radio" name="tingkat_keahlian_pertanyaan_2" value="1" required @if ($evaluasi->tingkat_keahlian_pertanyaan_2 == "1") checked @endif
                                oninvalid="this.setCustomValidity('Nilai kinerja belum dipilih!')" onInput="this.setCustomValidity('')" title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">2</label>
                                <input id="dibawah_standard" type="radio" name="tingkat_keahlian_pertanyaan_2" value="2" required @if ($evaluasi->tingkat_keahlian_pertanyaan_2 == "2") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">3</label>
                                <input id="standard" type="radio" name="tingkat_keahlian_pertanyaan_2" value="3" required @if ($evaluasi->tingkat_keahlian_pertanyaan_2 == "3") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">4</label> 
                                <input id="baik" type="radio" name="tingkat_keahlian_pertanyaan_2" value="4" required @if ($evaluasi->tingkat_keahlian_pertanyaan_2 == "4") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">5</label>
                                <input id="sangat_baik" type="radio" name="tingkat_keahlian_pertanyaan_2" value="5" @if ($evaluasi->tingkat_keahlian_pertanyaan_2 == "5") checked @endif required title="Silahkan pilih salah satu pilihan ini">                 
                            </div>
                        </td>
                        <td><textarea name="komentar_pertanyaan_2"  placeholder="berikan alasan jika ada">{{$evaluasi->komentar_pertanyaan_2}}</textarea></td>
                        
                    </tr>
                    <tr>
                        <td align="center">3</td>
                        <td><u><b><i>Konsistensi Kerja</u></b></i> - Apakah dia selalu, kadangkala, tidak pernah mengerjakan pekerjaannya dengan rapi, akurat, teliti, bisa diandalkan dan bisa dipercaya. Apakah dia konsisten dalam pekerjaannya?</td>
                        <td><div class="penilaian">
                                <label class="nilai">1</label>
                                <input id="buruk" type="radio" name="tingkat_keahlian_pertanyaan_3" value="1" required @if ($evaluasi->tingkat_keahlian_pertanyaan_3 == "1") checked @endif
                                oninvalid="this.setCustomValidity('Nilai kinerja belum dipilih!')" onInput="this.setCustomValidity('')" title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">2</label>
                                <input id="dibawah_standard" type="radio" name="tingkat_keahlian_pertanyaan_3" value="2" required @if ($evaluasi->tingkat_keahlian_pertanyaan_3 == "2") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">3</label>
                                <input id="standard" type="radio" name="tingkat_keahlian_pertanyaan_3" value="3" required @if ($evaluasi->tingkat_keahlian_pertanyaan_3 == "3") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">4</label> 
                                <input id="baik" type="radio" name="tingkat_keahlian_pertanyaan_3" value="4" required @if ($evaluasi->tingkat_keahlian_pertanyaan_3 == "4") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">5</label>
                                <input id="sangat_baik" type="radio" name="tingkat_keahlian_pertanyaan_3" value="5" required @if ($evaluasi->tingkat_keahlian_pertanyaan_3 == "5") checked @endif title="Silahkan pilih salah satu pilihan ini">                
                            </div>
                        </td>
                        <td><textarea name="komentar_pertanyaan_3"  placeholder="berikan alasan jika ada">{{$evaluasi->komentar_pertanyaan_3}}</textarea></td>
                    </tr>
                    <tr>
                        <td align="center">4</td>
                        <td><u><b><i>Stabilitas</u></b></i> - bagaimanakah stabilitas kerjanya, stabilitas emosinya, komitment terhadap dan konsisten terhadap pekerjaannya, mempunyai inisiatif untuk team dan organisasi, kedewasaan dan kematangan kepribadian.</td>
                        <td><div class="penilaian">
                                <label class="nilai">1</label>
                                <input id="buruk" type="radio" name="tingkat_keahlian_pertanyaan_4" value="1" required @if ($evaluasi->tingkat_keahlian_pertanyaan_4 == "1") checked @endif
                                oninvalid="this.setCustomValidity('Nilai kinerja belum dipilih!')" onInput="this.setCustomValidity('')" title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">2</label>
                                <input id="dibawah_standard" type="radio" name="tingkat_keahlian_pertanyaan_4" value="2" required @if ($evaluasi->tingkat_keahlian_pertanyaan_4 == "2") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">3</label>
                                <input id="standard" type="radio" name="tingkat_keahlian_pertanyaan_4" value="3" required @if ($evaluasi->tingkat_keahlian_pertanyaan_4 == "3") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">4</label> 
                                <input id="baik" type="radio" name="tingkat_keahlian_pertanyaan_4" value="4" required @if ($evaluasi->tingkat_keahlian_pertanyaan_4 == "4") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">5</label>
                                <input id="sangat_baik" type="radio" name="tingkat_keahlian_pertanyaan_4" value="5" required @if ($evaluasi->tingkat_keahlian_pertanyaan_4 == "5") checked @endif title="Silahkan pilih salah satu pilihan ini">                
                            </div>
                        </td>
                        <td><textarea name="komentar_pertanyaan_4" placeholder="berikan alasan jika ada" >{{$evaluasi->komentar_pertanyaan_4}}</textarea></td>
                    </tr>
                    <tr>
                        <td align="center">5</td>
                        <td><u><b><i>Komunikasi</u></b></i> - bagaimanakah cara berkomunikasinya dengan atasan, rekan kerja, ataupun team diluar unit/departemen? Bagaimanakah menanggapi perintah atau permintaan kepala unit/kepala departemen dengan baik?</td>
                        <td><div class="penilaian">
                                <label class="nilai">1</label>
                                <input id="buruk" type="radio" name="tingkat_keahlian_pertanyaan_5" value="1" required @if ($evaluasi->tingkat_keahlian_pertanyaan_5 == "1") checked @endif
                                oninvalid="this.setCustomValidity('Nilai kinerja belum dipilih!')" onInput="this.setCustomValidity('')" title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">2</label>
                                <input id="dibawah_standard" type="radio" name="tingkat_keahlian_pertanyaan_5" value="2" required @if ($evaluasi->tingkat_keahlian_pertanyaan_5 == "2") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">3</label>
                                <input id="standard" type="radio" name="tingkat_keahlian_pertanyaan_5" value="3" required @if ($evaluasi->tingkat_keahlian_pertanyaan_5 == "3") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">4</label> 
                                <input id="baik" type="radio" name="tingkat_keahlian_pertanyaan_5" value="4" required @if ($evaluasi->tingkat_keahlian_pertanyaan_5 == "4") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">5</label>
                                <input id="sangat_baik" type="radio" name="tingkat_keahlian_pertanyaan_5" value="5" required @if ($evaluasi->tingkat_keahlian_pertanyaan_5 == "5") checked @endif title="Silahkan pilih salah satu pilihan ini">                
                            </div>
                        </td>
                        <td><textarea name="komentar_pertanyaan_5" placeholder="berikan alasan jika ada">{{$evaluasi->komentar_pertanyaan_5}}</textarea></td>
                    </tr>
                    <tr>
                        <td align="center">6</td>
                        <td><u><b><i>Berdiplomasi& Cara Bersikap</u></b></i> - bagaimanakah ketekunan, keteguhan, rasa hormat kepada rekan kerja dan atasannya.</td>
                        <td><div class="penilaian">
                                <label class="nilai">1</label>
                                <input id="buruk" type="radio" name="tingkat_keahlian_pertanyaan_6" value="1" required  @if ($evaluasi->tingkat_keahlian_pertanyaan_6 == "1") checked @endif
                                oninvalid="this.setCustomValidity('Nilai kinerja belum dipilih!')" onInput="this.setCustomValidity('')" title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">2</label>
                                <input id="dibawah_standard" type="radio" name="tingkat_keahlian_pertanyaan_6" value="2" required @if ($evaluasi->tingkat_keahlian_pertanyaan_6 == "2") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">3</label>
                                <input id="standard" type="radio" name="tingkat_keahlian_pertanyaan_6" value="3" required @if ($evaluasi->tingkat_keahlian_pertanyaan_6 == "3") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">4</label> 
                                <input id="baik" type="radio" name="tingkat_keahlian_pertanyaan_6" value="4" required @if ($evaluasi->tingkat_keahlian_pertanyaan_6 == "4") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">5</label>
                                <input id="sangat_baik" type="radio" name="tingkat_keahlian_pertanyaan_6" value="5" required @if ($evaluasi->tingkat_keahlian_pertanyaan_6 == "5") checked @endif title="Silahkan pilih salah satu pilihan ini">                
                            </div>
                        </td>
                        <td><textarea name="komentar_pertanyaan_6" placeholder="berikan alasan jika ada">{{$evaluasi->komentar_pertanyaan_6}}</textarea></td>
                    </tr>
                    <tr>
                        <td align="center">7</td>
                        <td><u><b><i>Pengambilan Keputusan</u></b></i> - Bagaimanakah cara dia mengambil suatu keputusan? Apakah ragu-ragu? Banyak pertimbangan? Cepat mengambil keputusan dengan benar? Berdampak positif untuk team dan organisasi?</td>
                        <td><div class="penilaian">
                                <label class="nilai">1</label>
                                <input id="buruk" type="radio" name="tingkat_keahlian_pertanyaan_7" value="1" required @if ($evaluasi->tingkat_keahlian_pertanyaan_7 == "1") checked @endif
                                oninvalid="this.setCustomValidity('Nilai kinerja belum dipilih!')" onInput="this.setCustomValidity('')" title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">2</label>
                                <input id="dibawah_standard" type="radio" name="tingkat_keahlian_pertanyaan_7" value="2" required @if ($evaluasi->tingkat_keahlian_pertanyaan_7 == "2") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">3</label>
                                <input id="standard" type="radio" name="tingkat_keahlian_pertanyaan_7" value="3" required @if ($evaluasi->tingkat_keahlian_pertanyaan_7 == "3") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">4</label> 
                                <input id="baik" type="radio" name="tingkat_keahlian_pertanyaan_7" value="4" required @if ($evaluasi->tingkat_keahlian_pertanyaan_7 == "4") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">5</label>
                                <input id="sangat_baik" type="radio" name="tingkat_keahlian_pertanyaan_7" value="5" required @if ($evaluasi->tingkat_keahlian_pertanyaan_7 == "5") checked @endif title="Silahkan pilih salah satu pilihan ini">                
                            </div>
                        </td>
                        <td><textarea name="komentar_pertanyaan_7" placeholder="berikan alasan jika ada">{{$evaluasi->komentar_pertanyaan_7}}</textarea></td>
                    </tr>
                    <tr>
                        <td align="center">8</td>
                        <td><u><b><i>Hubungan dengan pihak eksternal dan rekankerja</u></b></i> - bagaimana hubungan dalam pekerjaan pekerjaan terhadap rekan kerja ataupun atasan bahkan dengan pimpinan organisasi? Apakah selalu berkonflik? Selalu pembawa damai? Selalu menjadi provokatif? Atau diam dan tidak melakukan sesuatu yang significant</td>
                        <td><div class="penilaian">
                                <label class="nilai">1</label>
                                <input id="buruk" type="radio" name="tingkat_keahlian_pertanyaan_8" value="1" required @if ($evaluasi->tingkat_keahlian_pertanyaan_8 == "1") checked @endif
                                oninvalid="this.setCustomValidity('Nilai kinerja belum dipilih!')" onInput="this.setCustomValidity('')" title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">2</label>
                                <input id="dibawah_standard" type="radio" name="tingkat_keahlian_pertanyaan_8" value="2" required @if ($evaluasi->tingkat_keahlian_pertanyaan_8 == "2") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">3</label>
                                <input id="standard" type="radio" name="tingkat_keahlian_pertanyaan_8" value="3" required @if ($evaluasi->tingkat_keahlian_pertanyaan_8 == "3") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">4</label> 
                                <input id="baik" type="radio" name="tingkat_keahlian_pertanyaan_8" value="4" required @if ($evaluasi->tingkat_keahlian_pertanyaan_8 == "4") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">5</label>
                                <input id="sangat_baik" type="radio" name="tingkat_keahlian_pertanyaan_8" value="5" required @if ($evaluasi->tingkat_keahlian_pertanyaan_8 == "5") checked @endif title="Silahkan pilih salah satu pilihan ini">                
                            </div>
                        </td>
                        <td><textarea name="komentar_pertanyaan_8" placeholder="berikan alasan jika ada">{{$evaluasi->komentar_pertanyaan_8}}</textarea></td>
                    </tr>
                    <tr>
                        <td align="center">9</td>
                        <td><u><b><i>Kemampuan memecahkan masalah</u></b></i> - apakah selalu bisa memecahkan masalah dengan dampak yang kecil? Apakah selalu meminta pendapat orang lain? apakah tidak punya ide untuk memecahkan masalah?</td>
                        <td><div class="penilaian">
                                <label class="nilai">1</label>
                                <input id="buruk" type="radio" name="tingkat_keahlian_pertanyaan_9" value="1" required @if ($evaluasi->tingkat_keahlian_pertanyaan_9 == "1") checked @endif
                                oninvalid="this.setCustomValidity('Nilai kinerja belum dipilih!')" onInput="this.setCustomValidity('')" title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">2</label>
                                <input id="dibawah_standard" type="radio" name="tingkat_keahlian_pertanyaan_9" value="2" required @if ($evaluasi->tingkat_keahlian_pertanyaan_9 == "2") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">3</label>
                                <input id="standard" type="radio" name="tingkat_keahlian_pertanyaan_9" value="3" required @if ($evaluasi->tingkat_keahlian_pertanyaan_9 == "3") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">4</label> 
                                <input id="baik" type="radio" name="tingkat_keahlian_pertanyaan_9" value="4" required @if ($evaluasi->tingkat_keahlian_pertanyaan_9 == "4") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">5</label>
                                <input id="sangat_baik" type="radio" name="tingkat_keahlian_pertanyaan_9" value="5" required @if ($evaluasi->tingkat_keahlian_pertanyaan_9 == "5") checked @endif title="Silahkan pilih salah satu pilihan ini">                
                            </div>
                        </td>
                        <td><textarea name="komentar_pertanyaan_9" placeholder="berikan alasan jika ada">{{$evaluasi->komentar_pertanyaan_9}}</textarea></td>
                    </tr>
                    <tr>
                        <td align="center">10</td>
                        <td><u><b><i>Pencapaian Target:</u></b></i> <br>apakah target yang diberikan selalu diterima dengan baik, dikerjakan dan hasilnya sesuai target yang diharapkan?</td>
                        <td><div class="penilaian">
                                <label class="nilai">1</label>
                                <input id="buruk" type="radio" name="tingkat_keahlian_pertanyaan_10" value="1" required @if ($evaluasi->tingkat_keahlian_pertanyaan_10 == "1") checked @endif
                                oninvalid="this.setCustomValidity('Nilai kinerja belum dipilih!')" onInput="this.setCustomValidity('')" title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">2</label>
                                <input id="dibawah_standard" type="radio" name="tingkat_keahlian_pertanyaan_10" value="2" required @if ($evaluasi->tingkat_keahlian_pertanyaan_10 == "2") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">3</label>
                                <input id="standard" type="radio" name="tingkat_keahlian_pertanyaan_10" value="3" required @if ($evaluasi->tingkat_keahlian_pertanyaan_10 == "3") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">4</label> 
                                <input id="baik" type="radio" name="tingkat_keahlian_pertanyaan_10" value="4" required @if ($evaluasi->tingkat_keahlian_pertanyaan_10 == "4") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai">5</label>
                                <input id="sangat_baik" type="radio" name="tingkat_keahlian_pertanyaan_10" value="5" required @if ($evaluasi->tingkat_keahlian_pertanyaan_10 == "5") checked @endif title="Silahkan pilih salah satu pilihan ini">                
                            </div>
                        </td>
                        <td><textarea name="komentar_pertanyaan_10" placeholder="berikan alasan jika ada">{{$evaluasi->komentar_pertanyaan_10}}</textarea></td>
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
                    <tr>
                        <td align="center">1</td>
                        <td><u><b><i>Sikapnya terhadap Supervisornya</u></b></i> - <br>taat pada perintah, menghormati atasan dan mengerjakan apa saja yang diperintahkan/diminta</td>
                        <td><div class="penilaian">
                            <label class="nilai">1</label>
                            <input id="buruk" type="radio" name="tingkat_keahlian2_pertanyaan_1" value="1" @if ($evaluasi->tingkat_keahlian2_pertanyaan_1 == "1") checked @endif
                                oninvalid="this.setCustomValidity('Nilai kinerja belum dipilih!')" onInput="this.setCustomValidity('')" title="Silahkan pilih salah satu pilihan ini">
                            <label class="nilai">2</label>
                            <input id="dibawah_standard" type="radio" name="tingkat_keahlian2_pertanyaan_1" value="2" required @if ($evaluasi->tingkat_keahlian2_pertanyaan_1 == "2") checked @endif title="Silahkan pilih salah satu pilihan ini">
                            <label class="nilai">3</label>
                            <input id="standard" type="radio" name="tingkat_keahlian2_pertanyaan_1" value="3" required @if ($evaluasi->tingkat_keahlian2_pertanyaan_1 == "3") checked @endif title="Silahkan pilih salah satu pilihan ini">
                            <label class="nilai">4</label> 
                            <input id="baik" type="radio" name="tingkat_keahlian2_pertanyaan_1" value="4" required @if ($evaluasi->tingkat_keahlian2_pertanyaan_1 == "4") checked @endif title="Silahkan pilih salah satu pilihan ini">
                            <label class="nilai">5</label>
                            <input id="sangat_baik" type="radio" name="tingkat_keahlian2_pertanyaan_1" value="5" required @if ($evaluasi->tingkat_keahlian2_pertanyaan_1 == "5") checked @endif title="Silahkan pilih salah satu pilihan ini">                
                        </div>
                    </td>
                    <td><textarea name="komentar2_pertanyaan_1" type="text" placeholder="berikan alasan jika ada">{{$evaluasi->komentar2_pertanyaan_1}}</textarea></td>
                    </tr>
                    <tr>
                        <td align="center">2</td>
                        <td><u><b><i>Kuantitas dan Kualitas Kerja</u></b></i> - dalam mengerjakan pekerjaan/program/proyek bagaimanakah tingkat efisiensi dan efektif kerjanya, bagaimana kecepatan kerjanya, produktifitasnya,ketelitian, kemampuan merencanakan dan ketepatan dalam membuat laporan PJUM.</td>
                        <td><div class="penilaian">
                            <label class="nilai">1</label>
                            <input id="buruk" type="radio" name="tingkat_keahlian2_pertanyaan_2" value="1" required @if ($evaluasi->tingkat_keahlian2_pertanyaan_2 == "1") checked @endif
                                oninvalid="this.setCustomValidity('Nilai kinerja belum dipilih!')" onInput="this.setCustomValidity('')" title="Silahkan pilih salah satu pilihan ini">
                            <label class="nilai">2</label>
                            <input id="dibawah_standard" type="radio" name="tingkat_keahlian2_pertanyaan_2" value="2" required @if ($evaluasi->tingkat_keahlian2_pertanyaan_2 == "2") checked @endif title="Silahkan pilih salah satu pilihan ini">
                            <label class="nilai">3</label>
                            <input id="standard" type="radio" name="tingkat_keahlian2_pertanyaan_2" value="3" required @if ($evaluasi->tingkat_keahlian2_pertanyaan_2 == "3") checked @endif title="Silahkan pilih salah satu pilihan ini">
                            <label class="nilai">4</label> 
                            <input id="baik" type="radio" name="tingkat_keahlian2_pertanyaan_2" value="4" required @if ($evaluasi->tingkat_keahlian2_pertanyaan_2 == "4") checked @endif title="Silahkan pilih salah satu pilihan ini">
                            <label class="nilai">5</label>
                            <input id="sangat_baik" type="radio" name="tingkat_keahlian2_pertanyaan_2" value="5" required @if ($evaluasi->tingkat_keahlian2_pertanyaan_2 == "5") checked @endif title="Silahkan pilih salah satu pilihan ini">                
                        </div>
                    </td>
                    <td><textarea name="komentar2_pertanyaan_2" placeholder="berikan alasan jika ada">{{$evaluasi->komentar2_pertanyaan_2}}</textarea></td>
                    </tr>
                    <tr>
                        <td align="center">3</td>
                        <td><u><b><i>Inisiatif</u></b></i> - mempunyai usulan yang membantu perbaikan team dan organisasi, kemampuan bekerja tanpa disupervisi, menunjukkan sikap yang baik</td>
                        <td><div class="penilaian">
                            <label class="nilai">1</label>
                            <input id="buruk" type="radio" name="tingkat_keahlian2_pertanyaan_3" value="1" required @if ($evaluasi->tingkat_keahlian2_pertanyaan_3 == "1") checked @endif
                                oninvalid="this.setCustomValidity('Nilai kinerja belum dipilih!')" onInput="this.setCustomValidity('')" title="Silahkan pilih salah satu pilihan ini">
                            <label class="nilai">2</label>
                            <input id="dibawah_standard" type="radio" name="tingkat_keahlian2_pertanyaan_3" value="2" required @if ($evaluasi->tingkat_keahlian2_pertanyaan_3 == "2") checked @endif title="Silahkan pilih salah satu pilihan ini">
                            <label class="nilai">3</label>
                            <input id="standard" type="radio" name="tingkat_keahlian2_pertanyaan_3" value="3" required @if ($evaluasi->tingkat_keahlian2_pertanyaan_3 == "3") checked @endif title="Silahkan pilih salah satu pilihan ini">
                            <label class="nilai">4</label> 
                            <input id="baik" type="radio" name="tingkat_keahlian2_pertanyaan_3" value="4" required @if ($evaluasi->tingkat_keahlian2_pertanyaan_3 == "4") checked @endif title="Silahkan pilih salah satu pilihan ini">
                            <label class="nilai">5</label>
                            <input id="sangat_baik" type="radio" name="tingkat_keahlian2_pertanyaan_3" value="5" required @if ($evaluasi->tingkat_keahlian2_pertanyaan_3 == "5") checked @endif title="Silahkan pilih salah satu pilihan ini">                
                        </div>
                    </td>
                    <td><textarea name="komentar2_pertanyaan_3"  placeholder="berikan alasan jika ada">{{$evaluasi->komentar2_pertanyaan_3}}</textarea></td>
                    </tr>
                    <tr>
                        <td align="center">4</td>
                        <td><u><b><i>Kehadiran</u></b></i> - hadir sesuai denganwaktu yang ditentukan dan tidak datang terlambat. Memberikan keteladanan dalam kehadiran- tidak masuk sesuka hati tapi mengikuti aturan organisasi.</td>
                        <td><div class="penilaian">
                            <label class="nilai">1</label>
                            <input id="buruk" type="radio" name="tingkat_keahlian2_pertanyaan_4" value="1" required @if ($evaluasi->tingkat_keahlian2_pertanyaan_4 == "1") checked @endif
                                oninvalid="this.setCustomValidity('Nilai kinerja belum dipilih!')" onInput="this.setCustomValidity('')" title="Silahkan pilih salah satu pilihan ini">
                            <label class="nilai">2</label>
                            <input id="dibawah_standard" type="radio" name="tingkat_keahlian2_pertanyaan_4" value="2" required @if ($evaluasi->tingkat_keahlian2_pertanyaan_4 == "2") checked @endif title="Silahkan pilih salah satu pilihan ini">
                            <label class="nilai">3</label>
                            <input id="standard" type="radio" name="tingkat_keahlian2_pertanyaan_4" value="3" required @if ($evaluasi->tingkat_keahlian2_pertanyaan_4 == "3") checked @endif title="Silahkan pilih salah satu pilihan ini">
                            <label class="nilai">4</label> 
                            <input id="baik" type="radio" name="tingkat_keahlian2_pertanyaan_4" value="4" required @if ($evaluasi->tingkat_keahlian2_pertanyaan_4 == "4") checked @endif title="Silahkan pilih salah satu pilihan ini">
                            <label class="nilai">5</label>
                            <input id="sangat_baik" type="radio" name="tingkat_keahlian2_pertanyaan_4" value="5" required @if ($evaluasi->tingkat_keahlian2_pertanyaan_4 == "5") checked @endif title="Silahkan pilih salah satu pilihan ini">                
                        </div>
                    </td>
                    <td><textarea name="komentar2_pertanyaan_4" placeholder="berikan alasan jika ada" >{{$evaluasi->komentar2_pertanyaan_4}}</textarea></td>
                    </tr>
                    <tr>
                        <td align="center">5</td>
                        <td><u><b><i>Ketepatan Waktu</u></b></i> - setiap kali mendapatkan undangan untuk rapat interlan departemen/ unit selalu datang tepat pada waktunya dan tidak pernah menunda pekerjaan, mencapai target dan tepat waktu yang diberikan atasan.</td>
                        <td><div class="penilaian">
                            <label class="nilai">1</label>
                            <input id="buruk" type="radio" name="tingkat_keahlian2_pertanyaan_5" value="1" required @if ($evaluasi->tingkat_keahlian2_pertanyaan_5 == "1") checked @endif
                                oninvalid="this.setCustomValidity('Nilai kinerja belum dipilih!')" onInput="this.setCustomValidity('')" title="Silahkan pilih salah satu pilihan ini">
                            <label class="nilai">2</label>
                            <input id="dibawah_standard" type="radio" name="tingkat_keahlian2_pertanyaan_5" value="2" required @if ($evaluasi->tingkat_keahlian2_pertanyaan_5 == "2") checked @endif title="Silahkan pilih salah satu pilihan ini">
                            <label class="nilai">3</label>
                            <input id="standard" type="radio" name="tingkat_keahlian2_pertanyaan_5" value="3" required @if ($evaluasi->tingkat_keahlian2_pertanyaan_5 == "3") checked @endif title="Silahkan pilih salah satu pilihan ini">
                            <label class="nilai">4</label> 
                            <input id="baik" type="radio" name="tingkat_keahlian2_pertanyaan_5" value="4" required @if ($evaluasi->tingkat_keahlian2_pertanyaan_5 == "4") checked @endif title="Silahkan pilih salah satu pilihan ini">
                            <label class="nilai">5</label>
                            <input id="sangat_baik" type="radio" name="tingkat_keahlian2_pertanyaan_5" value="5" required @if ($evaluasi->tingkat_keahlian2_pertanyaan_5 == "5") checked @endif title="Silahkan pilih salah satu pilihan ini">                
                        </div>
                    </td>
                    <td><textarea name="komentar2_pertanyaan_5" placeholder="berikan alasan jika ada">{{$evaluasi->komentar2_pertanyaan_5}}</textarea></td>
                    </tr>
                </table><br>

                <p hidden>Total Keseluruhan: <span name="total_keseluruhan" id="total_keseluruhan">0</span></p>
                <p hidden>Total Keseluruhan: <span name="total_keseluruhan2" id="total_keseluruhan2">0</span></p>

                <input hidden type="text" name="total_keseluruhan" id="total_keseluruhan" readonly>
                <input hidden type="text" name="total_keseluruhan2" id="total_keseluruhan2" readonly>


                <div class="hasil_kinerja">
                    <p class="judul2">III. Hasil Kinerja Menyeluruh/Pencapaian Kinerja</p>

                    <p>Dari hasil evaluasi kinerjanya, pekarya ini telah menunjukkan kerjanya</p>
                        <div class="penilaian_hk">
                            <div>
                                <input id="melebihi_standard_hk" type="radio" name="kerja" value="Melebihi standard" required @if ($evaluasi->kerja == "Melebihi standard") checked @endif
                                oninvalid="this.setCustomValidity('Hasil kinerja belum dipilih!')" onInput="this.setCustomValidity('')" title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai_hk" for="melebihi_standard_hk">Melebihi standard</label>
                            </div>
                            <div>                           
                                <input id="standard_hk" type="radio" name="kerja" value="Standard" required @if ($evaluasi->kerja == "Standard") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai_hk" for="standard_hk">Standard</label>
                            </div>
                            <div>                          
                                <input id="dibawah_standard_hk" type="radio" name="kerja" value="Dibawah standard" required @if ($evaluasi->kerja == "Dibawah standard") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai_hk" for="dibawah_standard_hk">Dibawah standard</label>
                            </div>
                        </div>
                    
                    <textarea name="komentar_kerja" id="komentar_kerja" type="komentar" placeholder=" berikan alasan jika ada"  >{{$evaluasi->komentar_kerja}}</textarea>

                    <p>Dengan Demikian saya akan mengusulkan/merekomendasikan untuk</p>
                        <div class="penilaian_hk">
                            <div>
                                <input id="kontrak_diperpanjang_hk" type="radio" name="rekomendasi" value="Kontrak diperpanjang" required @if ($evaluasi->rekomendasi == "Kontrak diperpanjang") checked @endif
                                oninvalid="this.setCustomValidity('Hasil rekomendasi belum dipilih!')" onInput="this.setCustomValidity('')" title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai_hk" for="kontrak_diperpanjang_hk">Kontrak diperpanjang</label>
                            </div>
                            <div>                           
                                <input id="tidak_diperpanjang_hk" type="radio" name="rekomendasi" value="Kontrak tidak diperpanjang" required @if ($evaluasi->rekomendasi == "Kontrak tidak diperpanjang") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai_hk" for="tidak_diperpanjang_hk">Kontrak tidak diperpanjang</label>
                            </div>
                            <div>                          
                                <input id="promosi_hk" type="radio" name="rekomendasi" value="Dipromosi untuk level lebih tinggi" required @if ($evaluasi->rekomendasi == "Dipromosi untuk level lebih tinggi") checked @endif title="Silahkan pilih salah satu pilihan ini">
                                <label class="nilai_hk" for="promosi_hk">Dipromosi untuk level lebih tinggi</label>
                            </div>
                        </div>                   
                    <textarea name="komentar_rekomendasi" type="komentar" placeholder=" berikan alasan jika ada" >{{$evaluasi->komentar_rekomendasi}}</textarea>

                </div>

                <div class="penilaian_umum">
                    <p class="judul2">IV. Penilaian Umum</p>
                    <label for="kekuatan">Kekuatan Utama Pekarya: </label>
                    <textarea name="komentar_kekuatan" id="kekuatan" type="komentar" required 
                    oninvalid="this.setCustomValidity('Kekuatan utama karyawan belum terisi!')" onInput="this.setCustomValidity('')">{{$evaluasi->komentar_kekuatan}}</textarea><br>
                    
                    <label for="kelemahan">Kelemahan Utama Pekarya: </label>
                    <textarea name="komentar_kelemahan" id="kelemahan" type="komentar" required 
                    oninvalid="this.setCustomValidity('Kelemahan utama karyawan karyawan belum terisi!')" onInput="this.setCustomValidity('')">{{$evaluasi->komentar_kelemahan}}</textarea>
                </div>

                <div class="rekomendasi">
                    <p class="judul2">V. Rekomendasi Pelatihan Dan Pengembangan Pekarya Apabila Kontrak Diperpanjang</p>
                    <textarea name="komentar_pelatihan" id="rekomendasi" type="komentar" placeholder="berikan rekomendasi jika ada">{{$evaluasi->komentar_pelatihan}}</textarea>
                </div>

                <div class="catatan">
                    <p class="judul2">*Catatan</p>
                    <textarea name="komentar_catatan" id="catatan" type="komentar" placeholder="berikan catatan tambahan jika ada">{{$evaluasi->komentar_catatan}}</textarea>
                </div>

                <p class="hidden">asdasdasda</p>
                <hr class="garis" size="3px" color="#EEEEEE">
                <input class="simpan" type="submit" name="submit" value="Simpan">
            </form>

            <div class="display_batal ">
                <button class="batal" onclick="goBack()">Batal</button>
            </div>

        </div>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

    <script>
        // mengambil elemen untuk menampilkan total
        var totalKeseluruhanElement = document.getElementById("total_keseluruhan");

        // mengambil semua elemen input radio 
        var radioPertanyaan1 = document.querySelectorAll('input[name="tingkat_keahlian_pertanyaan_1"]');
        var radioPertanyaan2 = document.querySelectorAll('input[name="tingkat_keahlian_pertanyaan_2"]');
        var radioPertanyaan3 = document.querySelectorAll('input[name="tingkat_keahlian_pertanyaan_3"]');
        var radioPertanyaan4 = document.querySelectorAll('input[name="tingkat_keahlian_pertanyaan_4"]');
        var radioPertanyaan5 = document.querySelectorAll('input[name="tingkat_keahlian_pertanyaan_5"]');
        var radioPertanyaan6 = document.querySelectorAll('input[name="tingkat_keahlian_pertanyaan_6"]');
        var radioPertanyaan7 = document.querySelectorAll('input[name="tingkat_keahlian_pertanyaan_7"]');
        var radioPertanyaan8 = document.querySelectorAll('input[name="tingkat_keahlian_pertanyaan_8"]');
        var radioPertanyaan9 = document.querySelectorAll('input[name="tingkat_keahlian_pertanyaan_9"]');
        var radioPertanyaan10 = document.querySelectorAll('input[name="tingkat_keahlian_pertanyaan_10"]');

        //  untuk menghitung total keseluruhan
        function hitungTotalKeseluruhan() {
            // inisialisasi
            var totalPertanyaan1 = 0;
            var totalPertanyaan2 = 0;
            var totalPertanyaan3 = 0;
            var totalPertanyaan4 = 0;
            var totalPertanyaan5 = 0;
            var totalPertanyaan6 = 0;
            var totalPertanyaan7 = 0;
            var totalPertanyaan8 = 0;
            var totalPertanyaan9 = 0;
            var totalPertanyaan10 = 0;

            // hitung total nilai untuk pertanyaan
            for (var i = 0; i < radioPertanyaan1.length; i++) {
                if (radioPertanyaan1[i].checked) {
                    totalPertanyaan1 += parseInt(radioPertanyaan1[i].value);
                }
            }

            for (var i = 0; i < radioPertanyaan2.length; i++) {
                if (radioPertanyaan2[i].checked) {
                    totalPertanyaan2 += parseInt(radioPertanyaan2[i].value);
                }
            }

            for (var i = 0; i < radioPertanyaan3.length; i++) {
                if (radioPertanyaan3[i].checked) {
                    totalPertanyaan3 += parseInt(radioPertanyaan3[i].value);
                }
            }

            for (var i = 0; i < radioPertanyaan4.length; i++) {
                if (radioPertanyaan4[i].checked) {
                    totalPertanyaan4 += parseInt(radioPertanyaan4[i].value);
                }
            }
   
            for (var i = 0; i < radioPertanyaan5.length; i++) {
                if (radioPertanyaan5[i].checked) {
                    totalPertanyaan5 += parseInt(radioPertanyaan5[i].value);
                }
            }
            
            for (var i = 0; i < radioPertanyaan6.length; i++) {
                if (radioPertanyaan6[i].checked) {
                    totalPertanyaan6 += parseInt(radioPertanyaan6[i].value);
                }
            }
      
            for (var i = 0; i < radioPertanyaan7.length; i++) {
                if (radioPertanyaan7[i].checked) {
                    totalPertanyaan7 += parseInt(radioPertanyaan7[i].value);
                }
            }
        
            for (var i = 0; i < radioPertanyaan8.length; i++) {
                if (radioPertanyaan8[i].checked) {
                    totalPertanyaan8 += parseInt(radioPertanyaan8[i].value);
                }
            }
        
            for (var i = 0; i < radioPertanyaan9.length; i++) {
                if (radioPertanyaan9[i].checked) {
                    totalPertanyaan9 += parseInt(radioPertanyaan9[i].value);
                }
            }
      
            for (var i = 0; i < radioPertanyaan10.length; i++) {
                if (radioPertanyaan10[i].checked) {
                    totalPertanyaan10 += parseInt(radioPertanyaan10[i].value);
                }
            }

            // Hitung total keseluruhan
            var totalKeseluruhan = totalPertanyaan1 + totalPertanyaan2 + totalPertanyaan3 + totalPertanyaan4 + totalPertanyaan5 
            + totalPertanyaan6 + totalPertanyaan7 + totalPertanyaan8 + totalPertanyaan9 + totalPertanyaan10;
            
            // simpan total keseluruhan di local storage
            localStorage.setItem("totalKeseluruhan", totalKeseluruhan.toString()); // tidak terpakai            

            // cara menampilkan total keseluruhan dalam elemen HTML
            totalKeseluruhanElement.textContent = totalKeseluruhan.toString();

            // menyimpan ke database
            var inputTotalKeseluruhan = document.querySelector('input[name="total_keseluruhan"]');
            if (inputTotalKeseluruhan) {
                inputTotalKeseluruhan.value = totalKeseluruhan.toString();
            }
        }

        //  event listener change  elemen input radio
        radioPertanyaan1.forEach(function(radio) {
            radio.addEventListener("change", hitungTotalKeseluruhan);
        });
        radioPertanyaan2.forEach(function(radio) {
            radio.addEventListener("change", hitungTotalKeseluruhan);
        });
        radioPertanyaan3.forEach(function(radio) {
            radio.addEventListener("change", hitungTotalKeseluruhan);
        });
        radioPertanyaan4.forEach(function(radio) {
            radio.addEventListener("change", hitungTotalKeseluruhan);
        });
        radioPertanyaan5.forEach(function(radio) {
            radio.addEventListener("change", hitungTotalKeseluruhan);
        });
        radioPertanyaan6.forEach(function(radio) {
            radio.addEventListener("change", hitungTotalKeseluruhan);
        });
        radioPertanyaan7.forEach(function(radio) {
            radio.addEventListener("change", hitungTotalKeseluruhan);
        });
        radioPertanyaan8.forEach(function(radio) {
            radio.addEventListener("change", hitungTotalKeseluruhan);
        });
        radioPertanyaan9.forEach(function(radio) {
            radio.addEventListener("change", hitungTotalKeseluruhan);
        });
        radioPertanyaan10.forEach(function(radio) {
            radio.addEventListener("change", hitungTotalKeseluruhan);
        });

        // hitung total keseluruhan 
        hitungTotalKeseluruhan();

        // soal 2-----------------------------------------------------------------------------------------------------------------------------------
        var totalKeseluruhan2Element = document.getElementById("total_keseluruhan2");

        var radioPertanyaan2_1 = document.querySelectorAll('input[name="tingkat_keahlian2_pertanyaan_1"]');
        var radioPertanyaan2_2 = document.querySelectorAll('input[name="tingkat_keahlian2_pertanyaan_2"]');
        var radioPertanyaan2_3 = document.querySelectorAll('input[name="tingkat_keahlian2_pertanyaan_3"]');
        var radioPertanyaan2_4 = document.querySelectorAll('input[name="tingkat_keahlian2_pertanyaan_4"]');
        var radioPertanyaan2_5 = document.querySelectorAll('input[name="tingkat_keahlian2_pertanyaan_5"]');

        // menghitung total keseluruhan
        function hitungTotalKeseluruhan2() {
            // inisialisasi 
            var totalPertanyaan2_1 = 0;
            var totalPertanyaan2_2 = 0;
            var totalPertanyaan2_3 = 0;
            var totalPertanyaan2_4 = 0;
            var totalPertanyaan2_5 = 0;

            // hitung total nilai untuk tiap pertanyaan 
            for (var i = 0; i < radioPertanyaan2_1.length; i++) {
                if (radioPertanyaan2_1[i].checked) {
                    totalPertanyaan2_1 += parseInt(radioPertanyaan2_1[i].value);
                }
            }

            for (var i = 0; i < radioPertanyaan2_2.length; i++) {
                if (radioPertanyaan2_2[i].checked) {
                    totalPertanyaan2_2 += parseInt(radioPertanyaan2_2[i].value);
                }
            }

            for (var i = 0; i < radioPertanyaan2_3.length; i++) {
                if (radioPertanyaan2_3[i].checked) {
                    totalPertanyaan2_3 += parseInt(radioPertanyaan2_3[i].value);
                }
            }

            for (var i = 0; i < radioPertanyaan2_4.length; i++) {
                if (radioPertanyaan2_4[i].checked) {
                    totalPertanyaan2_4 += parseInt(radioPertanyaan2_4[i].value);
                }
            }

            for (var i = 0; i < radioPertanyaan2_5.length; i++) {
                if (radioPertanyaan2_5[i].checked) {
                    totalPertanyaan2_5 += parseInt(radioPertanyaan2_5[i].value);
                }
            }

            var totalKeseluruhan2 = totalPertanyaan2_1 + totalPertanyaan2_2 + totalPertanyaan2_3 + totalPertanyaan2_4 + totalPertanyaan2_5 
            
            // Redirect ke halaman berbeda dengan hasil sebagai parameter
            // localStorage.setItem('totalKeseluruhan2', totalKeseluruhan2.toString());

            // for (var i = 0; i < totalKeseluruhan2; i++) {
            //     var kunci = "kunci2_" + i; // Misalnya, "kunci_0", "kunci_1", "kunci_2", dan seterusnya
            //     var nilai = totalKeseluruhan2; // Gantilah dengan nilai yang sesuai dalam setiap iterasi

            //     localStorage.setItem(kunci, nilai.toString());
            // }


            totalKeseluruhan2Element.textContent = totalKeseluruhan2.toString();

            var inputTotalKeseluruhan2 = document.querySelector('input[name="total_keseluruhan2"]');
            if (inputTotalKeseluruhan2) {
                inputTotalKeseluruhan2.value = totalKeseluruhan2.toString();
            }
        }

        radioPertanyaan2_1.forEach(function(radio) {
            radio.addEventListener("change", hitungTotalKeseluruhan2);
        });
        radioPertanyaan2_2.forEach(function(radio) {
            radio.addEventListener("change", hitungTotalKeseluruhan2);
        });
        radioPertanyaan2_3.forEach(function(radio) {
            radio.addEventListener("change", hitungTotalKeseluruhan2);
        });
        radioPertanyaan2_4.forEach(function(radio) {
            radio.addEventListener("change", hitungTotalKeseluruhan2);
        });
        radioPertanyaan2_5.forEach(function(radio) {
            radio.addEventListener("change", hitungTotalKeseluruhan2);
        });

        hitungTotalKeseluruhan2();

    </script>

    <!-- alert logout -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $(document).on('click', '.logout', function(e){
                e.preventDefault();
                var form = $(this).closest('form');

                Swal.fire({
                    title: "Anda ingin logout?",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Logout"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/index';
                    }
                });
            });
        });
    </script>
    
</body>
</html>