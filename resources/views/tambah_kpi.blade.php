<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/te_kpi.css') }}">
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
        <h3>Tambah Key Performance Indicator Karyawan</h3>
    </div>

    <div class ="empat">
        <div class="empat2">
            <p class="judul">Tambah Key Performance Indicator Karyawan</p>
            <hr size="3px" color="#EEEEEE">

            <form action="/store_kpi/{{$daftark->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            
                <label for="supervisor">Supervisor Langsung</label>
                <input id="supervisor" type="text" name="supervisor" pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Supervisor karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan nama supervisor">

                <label for="jabatan_supervisor">Jabatan Supervisor</label>
                <input id="jabatan_supervisor" type="text" name="jabatan_supervisor" pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Jabatan supervisor karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan jabatan supervisor"><br>

                <label for="tanggal_kpi">Tanggal KPI Disetujui</label>
                <input id="tanggal_kpi" type="date" name="tanggal_kpi" max="9999-12-31" required
                oninvalid="this.setCustomValidity('Tanggal KPI disetujui belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan tanggal" onchange="setMinDate1()">

                <label for="mulai_pelaksanaan">Periode Pelaksanaan</label>
                <input id="mulai_pelaksanaan" type="date" name="mulai_pelaksanaan" max="9999-12-31" required min="tanggal_kpi" disabled
                oninvalid="this.setCustomValidity('')" onInput="this.setCustomValidity('')" title="Silahkan masukkan tanggal" onchange="setMinDate2()">
                
                - <input id="selesai_pelaksanaan" type="date" name="selesai_pelaksanaan" max="9999-12-31" required min="mulai_pelaksanaan" disabled
                oninvalid="this.setCustomValidity('')" onInput="this.setCustomValidity('')" title="Silahkan masukkan tanggal"><br>

                <label for="deskripsi_kpi">Deskripsi KPI</label>
                <textarea id="deskripsi_kpi" type="komentar" name="deskripsi_kpi" pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Deskripsi KPI belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan deskripsi"></textarea>
                
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
                            <td>Input angka terlebih dahulu, kemudian satuannya dapat berupa % ( persen), jumlah hari, jumlah orang, jumlah jam</td>
                        </tr>
                        <tr>
                            <td>Realisasi</td>
                            <td>Input angka terlebih dahulu, pengisian realisasi berdasarkan kenyataan pekerjaan</td>
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

                    @for ($i = 0; $i < 6; $i++)
                    <tr>
                        <td><textarea name="area[]" id="area-{{ $i }}" type="komentar"></textarea></td>
                        <td><textarea name="ket[]" id="ket-{{ $i }}" type="komentar"></textarea></td>
                        <td class="background"><input name="bobot[]" id="bobot-{{ $i }}" class="bobot-input"></td>
                        <td class="background"><input name="target[]" id="target-{{ $i }}"></td>
                        <td class="background"><input name="realisasi[]" id="realisasi-{{ $i }}" class="realisasi" readonly></td>
                        <td class="background">
                            <select name="jenis_perhitungan[]" id="jenis_perhitungan-{{ $i }}" class="jenis_perhitungan">
                                <option value="skor-1">R/T</option>
                                <option value="skor-2">T/R</option>
                            </select>
                        </td>
                        <td class="background"><input name="skor[]" id="skor-{{ $i }}" class="skor" readonly></td>
                        <td class="background"><input class="background" name="skor_akhir[]" id="skor_akhir-{{ $i }}" readonly></td>
                    </tr>
                    @endfor
                    
                </table>
                    
                <table class="tabel_total_kpi">
                    <tr>
                        <td class="hijau">
                            <div class="total" ><b>Total</b></div>
                        </td>

                        <td class="background"><input name="total_bobot" id="total_bobot" class="total_bobot" readonly 
                        oninvalid="this.setCustomValidity('')"
                        oninput="this.setCustomValidity('')"></td>

                        <td class="background1">
                            <div class="total" ><b></b></div>
                        </td>
                        <td class="background"><input name="total_skor_akhir" id="total_skor_akhir" class="total_skor_akhir" readonly></td>
                    </tr>
                    
                </table>

                <button type="button" class="tambah" id="tambah-baris"><i class="fas fa-plus"><span> Tambah Baris</span></i></button>

                <td><span id="totalBobotError" class="error-message"></span></td>


                <div class="catatan">
                    <p class="judul2">*Catatan</p>
                    <textarea id="catatan" type="komentar" placeholder="berikan catatan tambahan jika ada"></textarea>
                </div><br>

                <hr size="3px" color="#EEEEEE">
                <input class="simpan" type="submit" name="submit" value="Simpan">                
            </form>

            <div class="display_batal ">
                <button class="batal" onclick="goBack()">Batal</button>
            </div>
        </div>
    </div>

    <!-- ========================================================================================================================================== -->

    <script>
        function setMinDate1() {
            var tanggalKpi = document.getElementById('tanggal_kpi').value;
            var mulaiPelaksanaan = document.getElementById('mulai_pelaksanaan');

            // Enable tanggal_selesai jika tanggal_mulai diisi
            mulaiPelaksanaan.disabled = tanggalKpi === '';

            // Set minimum date pada tanggal_selesai
            mulaiPelaksanaan.min = tanggalKpi;
        }
    </script>

    <!-- ========================================================================================================================================== -->

    <script>
        function setMinDate2() {
            var mulaiPelaksanaan = document.getElementById('mulai_pelaksanaan').value;
            var selesaiPelaksanaan = document.getElementById('selesai_pelaksanaan');

            // Enable tanggal_selesai jika tanggal_mulai diisi
            selesaiPelaksanaan.disabled = mulaiPelaksanaan === '';

            // Set minimum date pada tanggal_selesai
            selesaiPelaksanaan.min = mulaiPelaksanaan;
        }
    </script>

    <!-- ========================================================================================================================================== -->

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

    <!-- ========================================================================================================================================== -->

    <!-- alert simpan kpi -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $(document).on('click', '.simpan', function(e){
                e.preventDefault();
                var form = $(this).closest('form');

                Swal.fire({
                    title: "Anda yakin?",
                    text: "Jika Anda menyimpan ini maka beberapa data tidak dapat diedit lagi",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Simpan"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Mengirim permintaan AJAX untuk menyimpan data
                        $.ajax({
                            url: form.attr('action'), // Menggunakan URL yang diambil dari form action
                            method: 'POST',
                            data: form.serialize(), // Mengirim data form
                            success: function(response) {
                                window.location.href = '/karyawan/{{ $daftark->id }}';
                            },
                            error: function(error) {
                                Swal.fire("Terjadi kesalahan pada inputan data", "", "error");
                            }
                        });
                    }                   
                });
            });
        });
    </script> -->

    <!-- =========================================== TAMBAH BARIS ======================================================= -->

    <script>
    
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
                newElement.setAttribute("name", i === 0 ? "area[]" : "ket[]");
            } else {
                newElement = document.createElement("input");

                newCell.classList.add("background");

                if (i === 2) {
                    newElement.classList.add("bobot");
                    newElement.setAttribute("name", "bobot[]");
                }
                newElement.addEventListener("input", function() {

                    var inputValue = this.value;

                    var cleanedValue = inputValue.replace("%", "");

                    if (this.classList.contains("bobot")) {
                        if (/^\d+$/.test(cleanedValue)) {
                            // Pastikan nilai tidak melebihi 100
                            var numericValue = parseInt(cleanedValue, 10);
                            var finalValue = numericValue > 100 ? 100 : numericValue;
                            
                            this.value = finalValue + "%";
                        } else {
                            this.value = "";
                        }
                    }

                    hitungTotalBobot();
                });

                if (i === 3) {
                    newElement.classList.add("target");
                    newElement.setAttribute("name", "target[]");
                }

                if (i === 4) {
                    newElement.classList.add("realisasi");
                    newElement.setAttribute("name", "realisasi[]");
                    newElement.readOnly = true;
                }

                if (i === 5) {
                    newElement = document.createElement("select");
                    
                    newElement.setAttribute("name", "jenis_perhitungan[]");

                    var option1 = document.createElement("option");
                    option1.value = "skor-1";
                    option1.text = "R/T";
                    
                    var option2 = document.createElement("option");
                    option2.value = "skor-2";
                    option2.text = "T/R";

                    newElement.appendChild(option1);
                    newElement.appendChild(option2);
                    newElement.classList.add("jenis_perhitungan");
                }

                if (i === 6) {
                    newElement.setAttribute("name", "skor[]");

                    newElement.classList.add("skor");
                    newElement.classList.add("background");
                    newElement.readOnly = true;
                }

                if (i === 7) {
                    newElement.setAttribute("name", "skor_akhir[]");

                    newElement.classList.add("skor_akhir");
                    newElement.classList.add("background");
                    newElement.readOnly = true;
                }
            }

            newCell.appendChild(newElement);
            newRow.appendChild(newCell);
        }

        // event listeners untuk row baru
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
                    skor = realisasi / target;
                } else {
                    skor = 0;
                }
            } else if (jenisPerhitungan === "skor-2") {
                if (target !== 0) {
                    skor = target / realisasi;
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

    // ambil semua input class "bobot-input"
    var inputBobotList = document.querySelectorAll(".bobot-input");

    // event listener untuk memantau perubahan input
    inputBobotList.forEach(function(inputBobot) {
        inputBobot.addEventListener("input", function() {
            // ambil nilai yang dimasukkan oleh pengguna
            var inputValue = inputBobot.value;
            
            // hapus semua karakter "%" dari nilai yang dimasukkan
            var cleanedValue = inputValue.replace("%", "");
            
            // memastikan nilainya adalah angka (regular expression)
            if (/^\d+$/.test(cleanedValue)) {
                // pastikan nilai tidak melebihi 100
                var numericValue = parseInt(cleanedValue, 10);
                var finalValue = numericValue > 100 ? 100 : numericValue;
                // %  ujung kanan nilai yang diinput
                inputBobot.value = finalValue + "%";
                
            } else {
                // jika bukan angka langsung rest
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

        var inputTotalBobot = document.getElementById("total_bobot");

        if (inputTotalBobot) {
            var totalBobot = totalBobot;  // Remove '%' here, as it's added later
            inputTotalBobot.value = totalBobot + "%";

            // ubah warna latar belakang jika totalBobot lebih dari 100
            if (totalBobot > 100 ||  totalBobot < 100) {
                inputTotalBobot.style.backgroundColor = "red";
                inputTotalBobot.style.color = "white";
            } else{
                inputTotalBobot.style.backgroundColor = "";
                inputTotalBobot.style.color = "black"; // Reset background color
            }
        }
    }

    document.querySelector("form").addEventListener("submit", function (event) {
    // Memanggil fungsi hitungTotalBobot sebelum submit
        hitungTotalBobot();

        var inputTotalBobot = document.getElementById("total_bobot");
        var numericValue = parseFloat(inputTotalBobot.value.replace("%", ""));
        // var totalBobotError = document.getElementById("totalBobotError");

        if (numericValue > 100) {
            // totalBobotError.textContent = "Total bobot tidak boleh lebih dari 100. Periksa kembali input Anda.";
            alert("Total bobot tidak boleh lebih dari 100. Periksa kembali input Anda.");
            event.preventDefault(); 
        } else if (numericValue < 100) {
            alert("Total bobot tidak boleh kurang dari 100. Periksa kembali input Anda.");
            event.preventDefault(); //
        }
    });

    // ============================================= SKOR ==========================================================

    var skorInputs = document.querySelectorAll(".skor, .skor_akhir");

    // loop melalui setiap elemen input skor
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
                    skor = 0; // atur skor menjadi 0 jika target = 0
                }
            } else if (jenisPerhitungan === "skor-2") {
                if (realisasi !== 0) {
                    skor = target / realisasi; 
                } else {
                    skor = 0; // atur skor menjadi 0 jika realisasi = 0
                }
            }
            document.getElementById("skor-" + index).value = skor % 1 === 0 ? skor.toFixed(0) : skor.toFixed(2);
        });
        hitungSkorAkhir();
    }
  
    // ============================================= SKOR AKHIR dan TOTAL SKOR AKHIR ===================================================

    function hitungSkorAkhir() {
        var skorAkhirInputs = document.getElementById(".skor_akhir");
        total_skor_akhir = 0;
        
        skorInputs.forEach(function(skorAkhirInput, index) {
            var bobot = parseFloat(document.getElementById("bobot-" + index).value) || 0;
            var skor = parseFloat(document.getElementById("skor-" + index).value) || 0;
            var skorAkhir = (bobot / 100) * skor * 100;

            document.getElementById("skor_akhir-" + index).value = skorAkhir % 1 === 0 ? skorAkhir.toFixed(0) : skorAkhir.toFixed(1);
        });
        hitungTotalSkorAkhir()
    }

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

        // update total skor akhir 
        var totalSkorAkhirInput = document.getElementById("total_skor_akhir");
        if (totalSkorAkhirInput) {
            totalSkorAkhirInput.value = totalSkorAkhir % 1 === 0 ? totalSkorAkhir.toFixed(0) : totalSkorAkhir.toFixed(1);
        }

        var totalSkorAkhirInput = document.querySelector('input[name="total_skor_akhir"]');
        if (totalSkorAkhirInput) {
            totalSkorAkhirInput.value = totalSkorAkhir.toString();
        }
    }

    // panggil fungsi hitungTotalSkorAkhir setiap kali ada perubahan di skor akhir
    var skorAkhirInputs = document.querySelectorAll(".skor_akhir");
    skorAkhirInputs.forEach(function(skorAkhirInput) {
        skorAkhirInput.addEventListener("input", hitungTotalSkorAkhir);
    });
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