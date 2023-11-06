<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" >
    <link rel="stylesheet" href="css/biodata.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <li><a href="logout">
                    <i class="fas fa-right-from-bracket">
                        <span class="menu">&emsp; Keluar</span>
                    </i></a></li>
                
            </ul>
    </div>

    <div class ="tiga">
        <a href="daftark"><h3>Karyawan ></h3></a><a href="biodata"><h3 class="breadcrumb">Tambah Karyawan</h3></a>
        <!-- <h3>Karyawan > Tambah Karyawan</h3> -->
        <!-- <div class="search-box">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="search" placeholder="Search...">
        </div>  -->
    </div>

    <div class ="empat">
        <div class="empat2">
            <p class="judul">Tambah Biodata Karyawan</p>

            <hr size="3px" color="#EEEEEE">
            <form action="store" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="nama_karyawan">Nama</label><input id="nama_karyawan" type="text" name="nama_karyawan" pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Nama karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan nama"><br>

                <label for="tempat_lahir">Tempat Lahir</label>
                <!-- <input id="tempat_lahir" type="text" name="tempat_lahir" pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Tempat lahir karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan tempat lahir"> -->
                
                <select name="provinsi" id="provinsi" required
                oninvalid="this.setCustomValidity('Provinsi belum terisi!')" 
                onInput="this.setCustomValidity('')" title="Silahkan pilih provinsi pelatihan">
                    <option value="">Pilih Provinsi</option>
                    @foreach ($provinces as $provinsi) 
                        <option value="{{$provinsi->id}}">{{$provinsi->name}}</option>
                    @endforeach
                </select>

                <br>

                <select name="kabupaten" id="kabupaten" required
                oninvalid="this.setCustomValidity('Kabupaten belum terisi!')" 
                onInput="this.setCustomValidity('')" title="Silahkan pilih kabupaten pelatihan">
                    <option value=""></option>
                </select>

                <br>

                <label for="tanggal_lahir">Tanggal Lahir</label><input id="tanggal_lahir" type="date" name="tanggal_lahir" pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Tanggal lahir karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan tanggal lahir"><br>

                <label for="alamat">Alamat</label><input id="alamat" type="text" name="alamat" pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Alamat karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan alamat"><br>


                <label for="agama">Agama</label>
                <select name="agama" id="agama" required
                oninvalid="this.setCustomValidity('Agama karyawan belum terisi!')" 
                onInput="this.setCustomValidity('')" title="Silahkan pilih agama karyawan">
                    <option value="">Pilih Agama</option>
                    <option value="islam">Islam</option>
                    <option value="kristen">Kristen</option>
                    <option value="katolik">Katolik</option> 
                    <option value="hindu">Hindu</option> 
                    <option value="buddha">Buddha</option> 
                    <option value="konghucu">Konghucu</option> 
                </select><br>

                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" required
                oninvalid="this.setCustomValidity('Jenis kelamin karyawan belum terisi!')" 
                onInput="this.setCustomValidity('')" title="Silahkan pilih jenis kelamin karyawan">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option> 
                </select><br>

                <label for="email">Email</label><input id="email" type="email" name="email"  required title="Silahkan masukkan email"><br>

                <label for="no_telp">Telepon</label><input id="no_telp" type="char" pattern="[0-9]{12}" name="no_telp" required
                oninvalid="this.setCustomValidity('Nomor telepon karyawan belum terisi dengan tepat!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan nomor telepon"><br>

                <label for="pendidikan">Pendidikan Terakhir</label><input id="pendidikan" type="varchar" name="pendidikan" pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Pendidikan karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan pendidikan"><br>

                <label for="pekerjaan_terakhir">Pekerjaan Terakhir</label><input id="pekerjaan_terakhir" type="varchar" name="pekerjaan_terakhir"  pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Pekerjaan terakhir karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan pekerjaan terakhir"><br>

                <label for="status">Status</label>
                <select name="status" id="status" required
                oninvalid="this.setCustomValidity('Status karyawan belum terisi!')" 
                onInput="this.setCustomValidity('')" title="Silahkan pilih status karyawan">
                    <option value="">Pilih Status</option>
                    <option value="Tetap">Tetap</option>
                    <option value="Kontrak">Kontrak</option> 
                    <option value="Paruh Waktu">Paruh Waktu</option>
                    <option value="Harian">Harian</option>
                </select>

                <br>

                <label for="foto">Foto</label>                
                <input id="foto" type="file" name="foto" accept="image/*"
                onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                <div><img src="" id="output" width="180"></div>
                <br>

                

                <hr size="3px" color="#EEEEEE">

                <!-- <a href="/daftark/"><button class="simpan" type="submit" name="submit" value="Simpan">Simpan</button></a> -->
                    <input class="simpan" type="submit" name="submit" value="Simpan">
                <!-- <a href="/daftark"><button class="batal">Batal</button></a>  -->
            </form> 
                <div class="display_batal ">
                    <a href="/daftark"><button class="batal">Batal</button></a>
                </div>
                    
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>

    <script>
        $(function (){
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });

            $(function(){
                $('#provinsi').on('change', function(){
                    let provinsi = $('#provinsi').val();

                    $.ajax({
                        type : 'POST',
                        url : "{{ route('store') }}",
                        data : {provinsi:provinsi},
                        cache : false,

                        success: function(msg){
                            console.log(msg); // Periksa respons dari server
                            $('#kabupaten').html(msg.kabupatens);
                        },
                        error: function(data){
                            console.log('error:', data)
                        },
                    })
                })
            })
        });
    </script>
    
</body>
</html>