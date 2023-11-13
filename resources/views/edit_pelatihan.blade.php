<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/te_pelatihan.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome/css/all.css') }}">
    <title>Document</title>
</head>

<body >
    
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
                <li><a href="/jenjangkarirmax="9999-12-31"">
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
        <a href="/karyawan/{{$daftark->id}}/edit_pelatihan"><h3 class="breadcrumb">Edit Pelatihan Karyawan</h3></a> 
    </div>

    <div class ="empat">
        <div class="empat2">
            <p class="judul">Edit Pelatihan Karyawan</p>
            <hr size="3px" color="#EEEEEE">
            <form action="{{ route('pelatihan.update', ['id' => $pelatihan->id]) }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
                <label for="nama_pelatihan">Nama Pelatihan</label><input id="nama_pelatihan" value="{{$pelatihan->nama_pelatihan}}" type="text" name="nama_pelatihan" pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Nama pelatihan karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan nama pelatihan"><br>

                <label for="penyelanggara">Penyelanggara</label><input id="penyelenggara" value="{{$pelatihan->penyelenggara}}" type="text" name="penyelenggara" pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Penyelenggara pelatihan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan penyelenggara pelatihan"><br>

                <label for="mulai">Mulai</label><input id="tanggal_mulai" value="{{$pelatihan->tanggal_mulai}}" type="date" name="tanggal_mulai" max="9999-12-31" required
                oninvalid="this.setCustomValidity('Tanggal mulai pelatihan karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan tanggal mulai pelatihan"><br>

                <label for="selesai">Selesai</label><input id="tanggal_selesai" value="{{$pelatihan->tanggal_selesai}}" type="date" name="tanggal_selesai" max="9999-12-31" required
                oninvalid="this.setCustomValidity('Tanggal selesai pelatihan karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan tanggal selesai pelatihan"><br>

                <div id="prov_kab">
                <label for="provinsi">Lokasi Pelatihan <br> Dalam Negeri</label>
                
                <select name="provinsi" id="provinsi" 
                oninvalid="this.setCustomValidity('Provinsi belum terisi!')" 
                onInput="this.setCustomValidity('')" title="Silahkan pilih provinsi pelatihan" onchange="updateKabupatenOptions()" >
                    <option value="">--- Pilih Provinsi ---</option>
                    @foreach ($provinces as $provinsi)
                        <option value="{{ $provinsi->id }}" {{ $pelatihan->provinsi == $provinsi->name ? 'selected' : '' }}>
                            {{$provinsi->name}}
                        </option>
                    @endforeach
                </select>

                <br>

                <select name="kabupaten" id="kabupaten"
                oninvalid="this.setCustomValidity('Kabupaten belum terisi!')" 
                onInput="this.setCustomValidity('')" title="Silahkan pilih kabupaten pelatihan">
                    <option value=""></option> 
                </select>
                </div>
                
                <br>

                <span>Apakah pelatihannya di luar negeri? <input type="checkbox" id="luarNegeriCheckbox"></span> 

                <div id="negara" >
                <label for="provinsi">Lokasi Pelatihan<br>Luar Negeri</label>

                <select name="negara"
                oninvalid="this.setCustomValidity('Negara belum terisi!')" 
                onInput="this.setCustomValidity('')" title="Silahkan pilih negara pelatihan" >
                    <option value="" disabled selected>--- Pilih Negara ---</option>
                    @foreach ($countries as $negara) 
                        <option value="{{$negara->id}}" {{ $pelatihan->negara == $negara->name ? 'selected' : '' }}>
                            {{$negara->name}}
                        </option>
                    @endforeach
                </select>
                </div>

                <br><br>
                <hr size="3px" color="#EEEEEE">
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

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    $(document).ready(function () {
        // disable opsi pertama pada dropdown kabupaten
        $('#kabupaten option:first-child').prop('disabled', true);

        // properti required pada dropdown kabupaten
        $('#provinsi').change(function () {
            var selectedProvinsi = $(this).val();
            $('#kabupaten').prop('required', selectedProvinsi !== '');
        });
    });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var checkbox = document.getElementById('luarNegeriCheckbox');
            var negaraSelect = document.getElementById('negara');
            var provKabSelect = document.getElementById('prov_kab');
            var provinsiSelect = document.getElementById('provinsi');

            checkbox.addEventListener('change', function () {
                negaraSelect.style.display = this.checked ? 'block' : 'none';
                provKabSelect.style.display = this.checked ? 'none' : 'block';
                provinsiSelect.value = this.checked ? '' : null;
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>

    <script>
        function updateKabupatenOptions() {
            var provinsiDropdown = document.getElementById("provinsi");
            var kabupatenDropdown = document.getElementById("kabupaten");

            var selectedProvinsiId = provinsiDropdown.value;
            // Hapus semua opsi saat ini di dropdown "kabupaten"
            kabupatenDropdown.innerHTML = "";

            // opsi default
            var defaultOption = document.createElement("option");
            defaultOption.text = "--- Pilih Kabupaten atau Kota ----";
            defaultOption.disabled = true;
                    
            kabupatenDropdown.add(defaultOption);


            if (selectedProvinsiId !== "") {
                @foreach ($regencies as $kabupaten)
                    if ("{{ $kabupaten->province_id }}" === selectedProvinsiId) {
                        var kabupatenOption = document.createElement("option");
                        kabupatenOption.value = "{{ $kabupaten->id }}";
                        kabupatenOption.text = "{{ $kabupaten->name }}";
                        kabupatenOption.selected = "{{ $kabupaten->name }}" === "{{ $pelatihan->kabupaten }}";
                        kabupatenOption.selected = "{{ $kabupaten->name }}" === "{{ $pelatihan->kabupaten }}";

                        kabupatenDropdown.add(kabupatenOption);
                    }
                @endforeach 
            }
        }
        updateKabupatenOptions();
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