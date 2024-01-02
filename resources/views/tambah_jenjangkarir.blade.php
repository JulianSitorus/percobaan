<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/te_jenjang_karir.css') }}">
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
        <a href="/daftark"><h3>Karyawan ></h3></a>
        <a href="/karyawan/{{$daftark->id}}"><h3 class="breadcrumb">Detail Karyawan ></h3></a>
        <a href="/karyawan/{{$daftark->id}}/detail_jenjangkarir"><h3 class="breadcrumb">Detail Jenjang Karir ></h3></a> 
        <a href="/karyawan/{{$daftark->id}}/detail_jenjangkarir/tambah_jenjangkarir"><h3 class="breadcrumb">Tambah Jenjang Karir</h3></a> 
    </div>

    <div class ="empat">
        <div class="empat2">
            <p class="judul">Tambah Jenjang Karir Karyawan</p>
            <hr size="3px" color="#EEEEEE">
            <form action="/store_jenjangkarir/{{$daftark->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <label for="departemen">Departemen</label>
                <select name="departemen" id="departemen">
                    <option value="" selected>--- Pilih Departemen ---</option>
                    @foreach ($departemen as $dpm)
                        <option value="{{$dpm->id}}">{{$dpm->nama_departemen}}</option>
                    @endforeach
                </select><br>

                <label for="unit">Unit</label>
                <select name="unit" id="unit">
                               
                </select><br>

                <label for="posisi">Posisi</label><input id="posisi" type="text" name="posisi" pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Posisi karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan posisi"><br>                

                <label for="tanggal_mulai">Mulai</label><input id="tanggal_mulai" type="date" name="tanggal_mulai" max="9999-12-31" required
                oninvalid="this.setCustomValidity('Tanngal mulai karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan tanggal mulai" onchange="setMinDate()"><br>

                <label for="tanggal_selesai">Selesai</label><input id="tanggal_selesai" type="date" name="tanggal_selesai" value="" max="9999-12-31" min="tanggal_mulai"
                oninvalid="this.setCustomValidity('Tanggal selesai tidak bisa kurang dari tanggal mulai!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan tanggal selesai" disabled >

                <p id="tanggal_selesai2">*Jika tanggal selesai dikosongkan maka outputnya "Sekarang"</p><br>
                
                <p class="durasi">Durasi Posisi  <span id="durasi" name="durasi" ></span></p>
                <input hidden type="text" id="durasi" name="durasi" readonly>

                <!-- <label for="">Pilih unit</label>
                <select name="unit" id="unit">
                    @foreach ($unit as $ut)
                        <option value="{{$ut->id}}">{{$ut->nama_unit}}</option>
                    @endforeach
                </select> -->


                <br><br>
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
        function setMinDate() {
            var tanggalMulai = document.getElementById('tanggal_mulai').value;
            var tanggalSelesai = document.getElementById('tanggal_selesai');

            // Enable tanggal_selesai jika tanggal_mulai diisi
            tanggalSelesai.disabled = tanggalMulai === '';

            // Set minimum date pada tanggal_selesai
            tanggalSelesai.min = tanggalMulai;
        }
    </script>

    <!-- =============================================================================================================== -->
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#departemen').on('change', function(){
                var departemen_id = $(this).val();
                if(departemen_id){
                    $.ajax({
                        url: "{{ route('store_jenjangkarir', ['id' => $daftark->id]) }}",
                        type: 'POST',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'departemen': departemen_id
                        },
                        dataType: 'json',
                        success: function(data){
                            if (data.options && data.options.length > 0) {
                                $('#unit').empty();
                                $('#unit').append('<option value="" disabled selected>--- Pilih Unit ---</option>');
                                $.each(data.options, function(key, unit){
                                    $('#unit').append(
                                        '<option value="' + unit.id + '">' +
                                        unit.nama_unit + '</option>'
                                    );
                                });
                            } else {
                                $('#unit').empty();  
                            }
                        },
                    });
                } else {
                    $('#unit').empty(); 
                }
            });
        });
    </script>


    <!-- =============================================================================================================== -->
    <script>
        function goBack() {
            window.history.back();
        }
    </script>

    <!-- =============================================================================================================== -->
    <script>
        // menghitung selisih 
        function hitungSelisihTahunBulan(tanggalMulai, tanggalSelesai) {
            const mulai = new Date(tanggalMulai);
            const selesai = new Date(tanggalSelesai);

            const selisihTahun = selesai.getFullYear() - mulai.getFullYear();
            const selisihBulan = selesai.getMonth() - mulai.getMonth() + selisihTahun * 12;
            const selisihHari = (selesai - mulai) / (1000 * 60 * 60 * 24); // Selisih dalam hari

            if (selisihBulan < 12) {
                if (selisihHari < 30) {
                    return "0 bulan";
                } else {
                    return selisihBulan + " bulan";
                }
            }

            const sisaBulan = selisihBulan % 12;
            if (sisaBulan === 0) {
                return Math.floor(selisihBulan / 12) + " tahun";
            } else {
                return Math.floor(selisihBulan / 12) + " tahun " + sisaBulan + " bulan";
            }
        }

        // eventlistener untuk input tanggal
        document.getElementById("tanggal_mulai").addEventListener("input", updateSelisihTahunBulan);
        document.getElementById("tanggal_selesai").addEventListener("input", updateSelisihTahunBulan);

        // menampilkan selisih tahun dan bulan 
        function updateSelisihTahunBulan() {
            const tanggalMulai = document.getElementById("tanggal_mulai").value;
            const tanggalSelesai = document.getElementById("tanggal_selesai").value;

            if (tanggalMulai && tanggalSelesai) {
                const selisihTahunBulan = hitungSelisihTahunBulan(tanggalMulai, tanggalSelesai);
                document.getElementById("durasi").textContent = `${selisihTahunBulan}`;
            } else {
                document.getElementById("durasi").textContent = "";
            }

            var selisihTahunBulan = document.getElementById("durasi").textContent;

            var inputSelisihTahunBulan = document.querySelector('input[name="durasi"]');
            if (inputSelisihTahunBulan) {
                inputSelisihTahunBulan.value = selisihTahunBulan.toString();
            }
        }
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