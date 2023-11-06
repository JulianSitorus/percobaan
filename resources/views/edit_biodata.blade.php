<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/biodata.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <li><a href="/logout">
                    <i class="fas fa-right-from-bracket">
                        <span class="menu">&emsp; Keluar</span>
                    </i></a></li>
                
            </ul>
    </div>

    <div class ="tiga">
        <a href="/daftark"><h3>Karyawan ></h3></a><a href="/karyawan/{{$daftark->id}}"><h3 class="breadcrumb">Detail Karyawan ></h3></a><a href="/biodata/{{$daftark->id}}/edit_biodata"><h3 class="breadcrumb">Edit Biodata Karyawan</h3></a>
        <!-- <h3>Karyawan > Detail Karyawan > Edit Biodata Karyawan</h3> -->
        <!-- <div class="search-box">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="search" placeholder="Search...">
        </div>  -->
    </div>

    <div class ="empat">
        <div class="empat2">
            <p class="judul">Edit Biodata Karyawan</p>
            <hr size="3px" color="#EEEEEE">
            <form action="{{ route('biodata.update', ['id' => $daftark->id]) }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <label for="nama_karyawan">Nama</label><input id="nama_karyawan" value="{{$daftark->nama_karyawan}}" type="text" name="nama_karyawan" pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Nama karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan nama"><br>

                <label for="tempat_lahir">Tempat Lahir</label>
                <!-- <input id="tempat_lahir" value="{{$daftark->tempat_lahir}}" type="text" name="tempat_lahir" pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Tempat lahir karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan tempat lahir"><br> -->

                <select name="provinsi" id="provinsi" required
                oninvalid="this.setCustomValidity('Provinsi belum terisi!')" 
                onInput="this.setCustomValidity('')" title="Silahkan pilih provinsi pelatihan" onchange="updateKabupatenOptions()">
                    <option value="">Pilih Provinsi</option>
                    @foreach ($provinces as $provinsi)
                        <option value="{{ $provinsi->id }}" {{ $daftark->provinsi == $provinsi->name ? 'selected' : '' }}>
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

                <br>

                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input id="tanggal_lahir" value="{{$daftark->tanggal_lahir}}" type="date" name="tanggal_lahir" pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Tanggal lahir karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan tanggal lahir"><br>

                <label for="alamat">Alamat</label><input id="alamat" value="{{$daftark->alamat}}" type="text" name="alamat" pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Alamat karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan alamat"><br>


                <label for="agama">Agama</label>
                <select name="agama" id="agama" required
                oninvalid="this.setCustomValidity('Agama karyawan belum terisi!')" 
                onInput="this.setCustomValidity('')" title="Silahkan pilih agama karyawan">
                    <option value="" >Pilih Agama</option>
                    <option value="islam" @if ($daftark->agama == "islam") selected @endif>Islam</option>
                    <option value="kristen" @if ($daftark->agama == "kristen") selected @endif>Kristen</option>
                    <option value="katolik" @if ($daftark->agama == "katolik") selected @endif>Katolik</option> 
                    <option value="hindu" @if ($daftark->agama == "hindu") selected @endif>Hindu</option> 
                    <option value="buddha" @if ($daftark->agama == "buddha") selected @endif>Buddha</option> 
                    <option value="konghucu" @if ($daftark->agama == "konghucu") selected @endif>Konghucu</option> 
                </select><br>

                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" required
                oninvalid="this.setCustomValidity('Jenis kelamin karyawan belum terisi!')" 
                onInput="this.setCustomValidity('')" title="Silahkan pilih jenis kelamin karyawan">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki" @if ($daftark->jenis_kelamin == "Laki-laki") selected @endif>Laki-laki</option>
                    <option value="Perempuan" @if ($daftark->jenis_kelamin == "Perempuan") selected @endif>Perempuan</option> 
                </select><br>

                <label for="email">Email</label><input id="email" value="{{$daftark->email}}" type="email" name="email" required title="Silahkan masukkan email"><br>

                <label for="no_telp">Telepon</label><input id="no_telp" value="{{$daftark->no_telp}}" type="char" pattern="[0-9]{12}" name="no_telp" required
                oninvalid="this.setCustomValidity('Nomor telepon karyawan belum terisi dengan tepat!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan nomor telepon"><br>

                <label for="pendidikan">Pendidikan Terakhir</label><input id="pendidikan" value="{{$daftark->pendidikan}}" type="varchar" name="pendidikan" pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Pendidikan karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan pendidikan"><br>

                <label for="pekerjaan_terakhir">Pekerjaan Terakhir</label><input id="pekerjaan_terakhir" value="{{$daftark->pekerjaan_terakhir}}" type="varchar" name="pekerjaan_terakhir"  pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Pekerjaan terakhir karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan pekerjaan terakhir"><br>

                <label for="status">Status</label>
                <select name="status" id="status" required
                oninvalid="this.setCustomValidity('Status karyawan belum terisi!')" 
                onInput="this.setCustomValidity('')" title="Silahkan pilih status karyawan">
                    <option value="">Pilih Status</option>
                    <option value="Tetap" @if ($daftark->status == "Tetap") selected @endif>Tetap</option>
                    <option value="Kontrak" @if ($daftark->status == "Kontrak") selected @endif>Kontrak</option> 
                    <option value="Paruh Waktu" @if ($daftark->status == "Paruh Waktu") selected @endif>Paruh Waktu</option>
                    <option value="Harian" @if ($daftark->status == "Harian") selected @endif>Harian</option>
                </select>
                <br>

                <label for="foto">Foto</label>                
                <input id="foto" value="{{$daftark->foto}}" type="file" name="foto" accept="image/*"
                onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                <div><img src="" id="output" width="180"></div>
                <p class="info_ubah">*Tidak perlu input ulang foto jika tidak ada perubahan</p>
                <br>
                <hr size="3px" color="#EEEEEE">
                
                <!-- <a href="/daftark/"><button class="simpan" type="submit" name="submit" value="Simpan">Simpan</button></a> -->
                <input class="simpan" type="submit" name="submit" value="Simpan">
                <!-- <a href="/daftark"><button class="batal">Batal</button></a>  -->
            </form> 
                <div class="display_batal ">
                    <a href="/karyawan/{{$daftark->id}}"><button class="batal">Batal</button></a>
                </div>
                    
                
        </div>
    </div>

    <script>
        function updateKabupatenOptions() {
        var provinsiDropdown = document.getElementById("provinsi");
        var kabupatenDropdown = document.getElementById("kabupaten");
        var selectedProvinsiId = provinsiDropdown.value;
        var selectedKabupatenId = kabupatenDropdown.value;

        kabupatenDropdown.innerHTML = ""; // Hapus opsi saat ini

        var defaultOption = document.createElement("option");
        defaultOption.text = "Pilih Kota atau Kabupaten";
        kabupatenDropdown.add(defaultOption);

        if (selectedProvinsiId !== "") {
            // Loop melalui daftar kabupaten dan tambahkan opsi yang sesuai
            @foreach ($regencies as $kabupaten)
                if ("{{ $kabupaten->province_id }}" === selectedProvinsiId) {
                    var kabupatenOption = document.createElement("option");
                    kabupatenOption.value = "{{ $kabupaten->id }}";
                    kabupatenOption.text = "{{ $kabupaten->name }}";
                    kabupatenOption.selected = "{{ $kabupaten->name }}" === "{{ $daftark->kabupaten }}";
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