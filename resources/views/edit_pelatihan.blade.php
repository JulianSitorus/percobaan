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
                <li><a href="/jenjangk">
                    <i class="fas fa-chart-line">
                        <span class="menu">&emsp;Jenjang Karir</span>
                    </i></a></li>
                <li><a href="/keahlian">
                    <i class="fas fa-users-gear">
                        <span class="menu">&emsp;Keahlian & Pelatihan</span>
                    </i></a></li>
                <li><a href="/logout">
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

                <label for="mulai">Mulai</label><input id="tanggal_mulai" value="{{$pelatihan->tanggal_mulai}}" type="date" name="tanggal_mulai" pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Tanggal mulai pelatihan karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan tanggal mulai pelatihan"><br>

                <label for="selesai">Selesai</label><input id="tanggal_selesai" value="{{$pelatihan->tanggal_selesai}}" type="date" name="tanggal_selesai" pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Tanggal selesai pelatihan karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan tanggal selesai pelatihan"><br>

                <label for="provinsi">Lokasi</label>
                <!-- <input id="lokasi" value="{{$pelatihan->lokasi}}" type="text" name="lokasi" pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Lokasi pelatihan karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan lokasi pelatihan"><br> -->
                
                <select name="provinsi" id="provinsi" required
                oninvalid="this.setCustomValidity('Provinsi belum terisi!')" 
                onInput="this.setCustomValidity('')" title="Silahkan pilih provinsi pelatihan" onchange="updateKabupatenOptions()" >
                    <option value="">Pilih Provinsi</option>
                    @foreach ($provinces as $provinsi)
                        <option value="{{ $provinsi->id }}" {{ $pelatihan->provinsi == $provinsi->name ? 'selected' : '' }}>
                            {{$provinsi->name}}
                        </option>
                    @endforeach
                </select>

                <br>

                <select name="kabupaten" id="kabupaten" required
                oninvalid="this.setCustomValidity('Kabupaten belum terisi!')" 
                onInput="this.setCustomValidity('')" title="Silahkan pilih kabupaten pelatihan">
                    <option value="">Pilih Kota atau Kabupaten</option> 
                    
                </select>

                <br><br>
                <hr size="3px" color="#EEEEEE">
                <input class="simpan" type="submit" name="submit" value="Simpan">
            </form>  
            <div class="display_batal ">
                <a href="/karyawan/{{$daftark->id}}"><button class="batal">Batal</button></a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>

    <script>
        function updateKabupatenOptions() {
            // Dapatkan elemen dropdown "provinsi" dan kabupaten
            var provinsiDropdown = document.getElementById("provinsi");
            var kabupatenDropdown = document.getElementById("kabupaten");

            // Dapatkan nilai yang dipilih di dropdown "provinsi"
            var selectedProvinsiId = provinsiDropdown.value;
            var selectedKabupatenId = kabupatenDropdown.value;

            // Hapus semua opsi saat ini di dropdown "kabupaten"
            kabupatenDropdown.innerHTML = "";

            // Tambahkan opsi default
            var defaultOption = document.createElement("option");
           
            defaultOption.text = "Pilih Kota atau Kabupaten";
                    
            kabupatenDropdown.add(defaultOption);
            
            
            // Jika "provinsi" dipilih, tambahkan opsi kabupaten yang sesuai
            if (selectedProvinsiId !== "") {
                // Loop melalui daftar kabupaten dan tambahkan opsi yang sesuai dengan provinsi yang dipilih
                @foreach ($regencies as $kabupaten)
                    if ("{{ $kabupaten->province_id }}" === selectedProvinsiId) {
                        var kabupatenOption = document.createElement("option");
                        kabupatenOption.value = "{{ $kabupaten->id }}";
                        kabupatenOption.text = "{{ $kabupaten->name }}";
                        kabupatenOption.selected = "{{ $kabupaten->name }}" === "{{ $pelatihan->kabupaten }}";

                        kabupatenDropdown.add(kabupatenOption);
                    }
                @endforeach 
            }
        }
        // Panggil fungsi ini saat halaman dimuat untuk pertama kalinya
        updateKabupatenOptions();
    </script>


    
</body>
</html>