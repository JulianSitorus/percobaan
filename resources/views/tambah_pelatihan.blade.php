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
        <a href="/karyawan/{{$daftark->id}}/tambah_pelatihan"><h3 class="breadcrumb">Tambah Pelatihan Karyawan</h3></a>
    </div>

    <div class ="empat">
        <div class="empat2">
            <p class="judul">Tambah Pelatihan Karyawan</p>
            <hr size="3px" color="#EEEEEE">
            <form action="/store_pelatihan/{{$daftark->id}}" method="POST" enctype="multipart/form-data">
            @csrf

                <label for="nama_pelatihan">Nama Pelatihan</label><input id="nama_pelatihan" type="text" name="nama_pelatihan" pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Nama pelatihan karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan nama pelatihan"><br>

                <label for="penyelanggara">Penyelanggara</label><input id="penyelenggara" type="text" name="penyelenggara" pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Penyelenggara pelatihan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan penyelenggara pelatihan"><br>

                <label for="mulai">Mulai</label><input id="tanggal_mulai" type="date" name="tanggal_mulai" pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Tanggal mulai pelatihan karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan tanggal mulai pelatihan"><br>

                <label for="selesai">Selesai</label><input id="tanggal_selesai" type="date" name="tanggal_selesai" pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Tanggal selesai pelatihan karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan tanggal selesai pelatihan"><br>

                <label for="provinsi">Lokasi</label>

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
        $(function (){
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

            $(function(){
                
                // dirubah sementara dari id_provinsi
                $('#provinsi').on('change', function(){
                    let provinsi = $('#provinsi').val();

                    $.ajax({
                        type : 'POST',
                        url : "{{ route('store_pelatihan', ['id' => $daftark->id]) }}",
                        data : {provinsi:provinsi},
                        cache : false,

                        success: function(msg){
                            $('#kabupaten').html(msg.kabupatens);
                            // console.log(msg); // Periksa respons dari server
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