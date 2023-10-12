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
        <h3>Karyawan > </h3>
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
                        <td>Realisasi</td>
                        <td>Pengisian Realisasi berdasarkan kenyataan pekerjaan</td>
                    </tr>
                    <tr>
                        <td>Skor</td>
                        <td>Realisasi/Target atau Target/Realisasi</td>
                    </tr>
                    <tr>
                        <td>Skor Akhir</td>
                        <td>bobot x skor x 100</td>
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
                    <th class="j_realisasi">Realisasi</th>
                    <th colspan="2" class="j_skor">Skor</th>
                    <th class="j_skor_akhir">Skor Akhir</th>
                </tr>

                @for ($i = 0; $i < 5; $i++)
                <tr>
                    <td><textarea id="area" type="komentar" >Rekrutment</textarea></td>
                    <td><textarea id="kpi" type="komentar">% jumlah kebutuhan karyawan baru yg dapat dipenuhi dengan tepat waktu (< 45 hari)</textarea></td>
                    <td class="background"><input id="bobot-{{ $i }}" class="bobot-input"></td>
                    <td class="background"><input id="target-{{ $i }}"></td>
                    <td class="background"><input id="realisasi-{{ $i }}"></td>
                    <td class="background"><input id="skor-{{ $i }}" class="skor" readonly></td>
                    <td class="background">
                        <select id="jenis_perhitungan-{{ $i }}">
                            <option value="skor-1">R/T</option>
                            <option value="skor-2">T/R</option>
                        </select>
                    </td>
                    <td class="background"><input class="background" id="skor_akhir-{{ $i }}" readonly></td>
                </tr>
                @endfor
                
            </table>
                
            <table class="tabel_total_kpi">
                <tr>
                    <td class="hijau">
                        <div class="total" ><b>Total</b></div>
                    </td>

                    <td class="background"><input class="total-bobot" id="total-bobot" readonly></td>

                    <td class="background1">
                        <div class="total" ><b></b></div>
                    </td>

                    <td class="background"><input id="total_skor_akhir" class="total_skor_akhir" readonly></td>
                </tr>
                
            </table>

            <button class="tambah" id="tambah-baris"><i class="fas fa-plus"><span> Tambah Baris</span></i></button>

            <div class="catatan">
                <p class="judul2">*Catatan</p>
                <textarea id="catatan" type="komentar" placeholder="berikan catatan tambahan jika ada"></textarea>
            </div><br>
            
            <hr size="3px" color="#EEEEEE">
            <button class="simpan">Simpan</button> <a href="karyawan"><button class="batal">Batal</button></a>
            
            
        </div>
    </div>
    
    <script>
    
    // ============================================ TAMBAH BARIS =======================================================
    
    var tombolTambahBaris = document.getElementById("tambah-baris");
    var tabel = document.querySelector(".tabel_kpi");
    var total_skor_akhir = 0;

    tombolTambahBaris.addEventListener("click", function () {
        tambahBaris();
    });

    function tambahBaris() {
        var newRow = document.createElement("tr");

        for (var i = 0; i < 8; i++) {
            var newCell = document.createElement("td");
            var newElement;

            if (i < 2) {
                newElement = document.createElement("textarea");
            } else {
                newElement = document.createElement("input");

                newCell.classList.add("background");

                if (i === 2) {
                    newElement.classList.add("bobot");
                }
                newElement.addEventListener("input", function() {

                    var inputValue = this.value;

                    var cleanedValue = inputValue.replace("%", "");

                    if (this.classList.contains("bobot")) {
                        if (/^\d+$/.test(cleanedValue)) {
                            this.value = cleanedValue + "%";
                        } else {
                            this.value = "";
                        }
                    }

                    hitungTotalBobot();
                });

                if (i === 3) {
                    newElement.classList.add("realisasi");
                }

                if (i === 4) {
                    newElement.classList.add("target");
                }

                if (i === 5) {
                    newElement.classList.add("skor");
                    newElement.classList.add("background");
                    newElement.readOnly = true;
                }

                if (i === 6) {
                    newElement = document.createElement("select");
                    var option1 = document.createElement("option");
                    option1.value = "skor-1";
                    option1.text = "R/T";
                    
                    newElement = document.createElement("select");
                    var option2 = document.createElement("option");
                    option2.value = "skor-2";
                    option2.text = "T/R";

                    newElement.appendChild(option1);
                    newElement.appendChild(option2);
                }

                if (i === 7) {
                    newElement.classList.add("skor_akhir");
                    newElement.classList.add("background");
                    newElement.readOnly = true;
                }
            }

            newCell.appendChild(newElement);
            newRow.appendChild(newCell);
        }

        // Set up event listeners for the new row
        var bobotInput = newRow.querySelector(".bobot");
        var realisasiInput = newRow.querySelector(".realisasi");
        var targetInput = newRow.querySelector(".target");
        var jenisPerhitunganSelect = newRow.querySelector("select");
        var skorInput = newRow.querySelector(".skor");
        var skorAkhirInput = newRow.querySelector(".skor_akhir");
        var totalSkorAkhirInput = newRow.querySelector(".total_skor_akhir");

        bobotInput.addEventListener("input", hitungSkorAkhir);
        realisasiInput.addEventListener("input", hitungSkor);
        targetInput.addEventListener("input", hitungSkor);
        jenisPerhitunganSelect.addEventListener("change", hitungSkor);

        
        // outputnya bakalan "NuN" jika tidak menggunakan if dalam if
        function hitungSkor() {
            var realisasi = parseFloat(realisasiInput.value) || 0;
            var target = parseFloat(targetInput.value) || 0;
            var jenisPerhitungan = jenisPerhitunganSelect.value;

            var skor;

            if (jenisPerhitungan === "skor-1") {
                if (realisasi !== 0) {
                    skor = target / realisasi;
                } else {
                    skor = 0;
                }
            } else if (jenisPerhitungan === "skor-2") {
                if (target !== 0) {
                    skor = realisasi / target;
                } else {
                    skor = 0;
                }
            }
            skorInput.value = skor % 1 === 0 ? skor.toFixed(0) : skor.toFixed(2);
            hitungSkorAkhir();
        }
        
        tabel.appendChild(newRow);

        function hitungSkorAkhir() {
            var skorAkhirInputs = document.querySelectorAll(".skor_akhir");
            var total_skor_akhir = 0;

            skorAkhirInputs.forEach(function (skorAkhirInput) {
                var bobotInput = skorAkhirInput.parentElement.parentElement.querySelector(".bobot");
                var skorInput = skorAkhirInput.parentElement.parentElement.querySelector(".skor");
                    
                var bobot = parseFloat(bobotInput.value) || 0;
                var skor = parseFloat(skorInput.value) || 0;

                var skorAkhir = (bobot / 100) * skor * 100;

                skorAkhirInput.value = skorAkhir % 1 === 0 ? skorAkhir.toFixed(0) : skorAkhir.toFixed(1);
                    
            });
            hitungTotalSkorAkhir()
        }
    }

    // ============================================ MENAMPILKAN % di BOBOT =======================================================

    // Ambil semua elemen input dengan class "bobot-input"
    var inputBobotList = document.querySelectorAll(".bobot-input");

    // Tambahkan event listener untuk memantau perubahan input
    inputBobotList.forEach(function(inputBobot) {
        inputBobot.addEventListener("input", function() {
            // Ambil nilai yang dimasukkan oleh pengguna
            var inputValue = inputBobot.value;
            
            // Hapus semua karakter "%" dari nilai yang dimasukkan
            var cleanedValue = inputValue.replace("%", "");
            
            // Pastikan nilainya adalah angka (gunakan regular expression)
            if (/^\d+$/.test(cleanedValue)) {
                // Tambahkan tanda "%" pada ujung kanan nilai yang dimasukkan
                inputBobot.value = cleanedValue + "%";
                
            } else {
                // Jika bukan angka, tampilkan pesan kesalahan atau lakukan tindakan lain sesuai kebutuhan
                inputBobot.value = "";
            }
            hitungTotalBobot();
        });
    });

    // ============================================ TOTAL BOBOT ================================================

    function hitungTotalBobot() {
        var inputList = document.querySelectorAll(".bobot, .bobot-input");
        var totalBobot = 0;

        inputList.forEach(function (input) {
            var inputValue = input.value.replace("%", "");
            if (!isNaN(inputValue) && inputValue !== "") {
                totalBobot += parseFloat(inputValue);
            }
        });

        var inputTotalBobot = document.getElementById("total-bobot");
        inputTotalBobot.value = totalBobot.toFixed(2).replace(/\.0{2}$/, "") + "%";
    }

    // ============================================= SKOR ==========================================================

    var skorInputs = document.querySelectorAll(".skor, .skor_akhir");

    // Loop melalui setiap elemen input skor
    skorInputs.forEach(function(skorInput, index) {
        var bobotInput = document.getElementById("bobot-" + index);
        var realisasiInput = document.getElementById("realisasi-" + index);
        var targetInput = document.getElementById("target-" + index);
        var jenisPerhitunganSelect = document.getElementById("jenis_perhitungan-" + index);

        // biar responsif
        realisasiInput.addEventListener("input", hitungSkor);
        targetInput.addEventListener("input", hitungSkor);
        bobotInput.addEventListener("input", hitungSkorAkhir);
        jenisPerhitunganSelect.addEventListener("change", hitungSkor);
    });

    // untuk menghitung skor
    function hitungSkor() {
        skorInputs.forEach(function(skorInput, index) {
            var realisasi = parseFloat(document.getElementById("realisasi-" + index).value) || 0;
            // Mengambil angka pertama dari input
            // var angka = parseFloat(inputText.match(/\d+/)); // Menggunakan ekspresi reguler
            // var realisasi = isNaN(angka) ? 0 : angka; // Jika tidak ada angka yang ditemukan, atur ke 0

            var target = parseFloat(document.getElementById("target-" + index).value) || 0; 
            // Mengambil angka pertama dari input
            // var angka2 = parseFloat(inputText.match(/\d+/)); // Menggunakan ekspresi reguler
            // var target = isNaN(angka2) ? 0 : angka2; // Jika tidak ada angka yang ditemukan, atur ke 0
            
            var jenisPerhitungan = document.getElementById("jenis_perhitungan-" + index).value;

            var skor;

            if (jenisPerhitungan === "skor-1") {
                if (target !== 0) {
                    skor = realisasi / target; 
                } else {
                    skor = 0; // Atur skor menjadi 0 jika target = 0
                }
            } else if (jenisPerhitungan === "skor-2") {
                if (realisasi !== 0) {
                    skor = target / realisasi; 
                } else {
                    skor = 0; // Atur skor menjadi 0 jika realisasi = 0
                }
            }
            document.getElementById("skor-" + index).value = skor % 1 === 0 ? skor.toFixed(0) : skor.toFixed(2);
        });
        hitungSkorAkhir();
    }
  
    // ============================================= SKOR AKHIR dan TOTAL SKOR AKHIR ===================================================
    
    // function hitungSkorAkhir() {
    //     total_skor_akhir = 0;
    //     skorInputs.forEach(function(skorInput, index) {
    //         var bobot = parseFloat(document.getElementById("bobot-" + index).value) || 0;
    //         var skor = parseFloat(document.getElementById("skor-" + index).value) || 0;
    //         var skorAkhir = (bobot / 100) * skor * 100;

    //         document.getElementById("skor_akhir-" + index).value = skorAkhir % 1 === 0 ? skorAkhir.toFixed(0) : skorAkhir.toFixed(1);

    //         // total_skor_akhir += skorAkhir;
    //     });
    //     hitungTotalSkorAkhir()
    //     // // Mengisikan total_skor_akhir ke elemen HTML yang telah Anda buat
    //     // var total_skor_akhirInput = document.getElementById("total_skor_akhir");
    //     // document.getElementById("total_skor_akhir").value = total_skor_akhir % 1 === 0 ? total_skor_akhir.toFixed(0) : total_skor_akhir.toFixed(1);
    // }

    function hitungSkorAkhir() {
        var skorAkhirInputs = document.getElementById(".skor_akhir");
        total_skor_akhir = 0;
        
        skorInputs.forEach(function(skorAkhirInput, index) {
            var bobot = parseFloat(document.getElementById("bobot-" + index).value) || 0;
            var skor = parseFloat(document.getElementById("skor-" + index).value) || 0;
            var skorAkhir = (bobot / 100) * skor * 100;

            document.getElementById("skor_akhir-" + index).value = skorAkhir % 1 === 0 ? skorAkhir.toFixed(0) : skorAkhir.toFixed(1);

            // total_skor_akhir += skorAkhir;
        });
        hitungTotalSkorAkhir()
        // // Mengisikan total_skor_akhir ke elemen HTML yang telah Anda buat
        // var total_skor_akhirInput = document.getElementById("total_skor_akhir");
        // document.getElementById("total_skor_akhir").value = total_skor_akhir % 1 === 0 ? total_skor_akhir.toFixed(0) : total_skor_akhir.toFixed(1);
    }


    // function hitungTotalSkorAkhir() {
    //     var totalSkorAkhir = 0;
    //     skorInputs.forEach(function(skorInput, index) {
    //         var skorAkhir = parseFloat(document.getElementById("skor_akhir-" + index).value) || 0;
    //         totalSkorAkhir += skorAkhir;
    //     });

    //     // Tampilkan total skor_akhir
    //     document.getElementById("total_skor_akhir").value = totalSkorAkhir % 1 === 0 ? totalSkorAkhir.toFixed(0) : totalSkorAkhir.toFixed(1);
    //     }

    function hitungTotalSkorAkhir() {
        var skorAkhirInputs = document.querySelectorAll(".skor_akhir");
        var totalSkorAkhir = 0;

        skorAkhirInputs.forEach(function(skorAkhirInput) {
            var skorAkhir = parseFloat(skorAkhirInput.value) || 0;
            totalSkorAkhir += skorAkhir;
        });

        skorInputs.forEach(function(skorInput, index) {
            var skorAkhir = parseFloat(document.getElementById("skor_akhir-" + index).value) || 0;
            totalSkorAkhir += skorAkhir;
        });

        // Tambahkan total skor akhir dari baris yang ditambahkan
        // var newRowSkorAkhirInput = document.querySelector(".tambah-baris .skor_akhir");
        // if (newRowSkorAkhirInput) {
        //     var skorAkhir = parseFloat(newRowSkorAkhirInput.value) || 0;
        //     totalSkorAkhir += skorAkhir;
        // }

        // Update total skor akhir di tempat yang Anda inginkan (misalnya, sebuah input dengan ID "total_skor_akhir")
        var totalSkorAkhirInput = document.getElementById("total_skor_akhir");
        if (totalSkorAkhirInput) {
            totalSkorAkhirInput.value = totalSkorAkhir % 1 === 0 ? totalSkorAkhir.toFixed(0) : totalSkorAkhir.toFixed(1);
        }
    }

    // Panggil fungsi hitungTotalSkorAkhir setiap kali ada perubahan pada skor akhir
    var skorAkhirInputs = document.querySelectorAll(".skor_akhir");
    skorAkhirInputs.forEach(function(skorAkhirInput) {
        skorAkhirInput.addEventListener("input", hitungTotalSkorAkhir);
    });

</script>




</body>
</html>