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
                @for ($i = 0; $i < 5; $i++)
                <tr>
                    <td><textarea id="area" type="komentar" >Rekrutment</textarea></td>
                    <td><textarea id="kpi" type="komentar">% jumlah kebutuhan karyawan baru yg dapat dipenuhi dengan tepat waktu (< 45 hari )</textarea></td>
                    <td class="background"><input id="bobot_{{ $i }}" class="bobot-input"></td>
                    <td class="background"><input id="target"></td>
                    <td class="background"><input id="real"></td>
                    <td class="background"><input id="skor"></td>
                    <td class="background"><input id="skor_a"></td>
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

                    <td class="background"><input id="skor_a"></td>
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
    // Ambil tombol "tambah baris" dan tabel
    var tombolTambahBaris = document.getElementById("tambah-baris");
    var tabel = document.querySelector(".tabel_kpi");

    // Hitung jumlah baris saat ini
    var jumlahBaris = 5;

    // Tambahkan event listener untuk tombol "tambah baris"
    tombolTambahBaris.addEventListener("click", function() {
        // Buat elemen <tr> baru
        var newRow = document.createElement("tr");

        // Isi elemen <td> dalam baris baru dengan elemen textarea untuk kolom pertama dan kedua
        for (var i = 0; i < 7; i++) {
            var newCell = document.createElement("td");
            var newElement;

            if (i < 2) {
                newElement = document.createElement("textarea");
            } else {
                newElement = document.createElement("input");
                newCell.classList.add("background");
            }
            
            // Tetapkan ID CSS ke elemen <td>
            newCell.id = "css-id-" + jumlahBaris + "-" + i;

            newCell.appendChild(newElement);
            newRow.appendChild(newCell);
        }

        // Tambahkan baris baru ke dalam tabel
        tabel.appendChild(newRow);

        // Tambahkan 1 ke jumlah baris
        jumlahBaris++;
    });

    // ===============================================================================================================

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
        });
    });

    // ===============================================================================================================

    // Ambil semua elemen input dengan class "bobot-input"
    var inputBobotList = document.querySelectorAll(".bobot-input");

    // Ambil elemen input yang menampilkan total bobot
    var inputTotalBobot = document.getElementById("total-bobot");

    // Tambahkan event listener untuk memantau perubahan input
    inputBobotList.forEach(function(inputBobot) {
        inputBobot.addEventListener("input", function() {
            // Ambil nilai yang dimasukkan oleh pengguna dari semua input bobot
            var totalBobot = 0;
            inputBobotList.forEach(function(input) {
                var inputValue = input.value.replace("%", ""); // Hapus tanda "%"
                if (!isNaN(inputValue) && inputValue !== "") {
                    totalBobot += parseFloat(inputValue);
                }
            });

            // Tampilkan total bobot dalam elemen input total bobot
            inputTotalBobot.value = totalBobot.toFixed(2).replace(/\.0{2}$/, "")+ "%";
        });
    });

</script>




</body>
</html>