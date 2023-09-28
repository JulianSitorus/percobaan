<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/te_keahlian.css') }}">
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
                <li><a href="#">
                    <i class="fas fa-right-from-bracket">
                        <span class="menu">&emsp; Keluar</span>
                    </i></a></li>
                
            </ul>
    </div>

    <div class ="tiga">
        <a href="/daftark"><h3>Karyawan ></h3></a>
        <a href="/karyawan/{{$daftark->id}}"><h3 class="breadcrumb">Detail Karyawan ></h3></a>
        <a href="/karyawan/{{$daftark->id}}/edit_keahlian"><h3 class="breadcrumb">Edit Keahlian Karyawan</h3></a>
    </div>

    <div class ="empat">
        <div class="empat2">
            <p class="judul">Keahlian Karyawan</p>
            <hr size="3px" color="#EEEEEE">
            
            <form action="{{ route('keahlian.update', ['id' => $keahlian->id]) }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <label class="key" for="jenis_keahlian">Jenis Keahlian</label>
            <input id="jenis_keahlian" value="{{$keahlian->jenis_keahlian}}" type="text" name="jenis_keahlian" pattern=".*\S+.*" required
                oninvalid="this.setCustomValidity('Jenis keahlian karyawan belum terisi!')" onInput="this.setCustomValidity('')" title="Silahkan masukkan jenis keahlian"><br>

                <p class="key">Tingkat Keahlian</p>
                <div>
                    <input id="sb" type="radio" value="Sangat Baik" name="tingkat_keahlian" @if ($keahlian->tingkat_keahlian == "Sangat Baik") checked @endif required>
                    <label for="sb">Sangat Baik</label>
                </div>  
                <div>
                    <input id="b" type="radio" value="Baik" name="tingkat_keahlian" @if ($keahlian->tingkat_keahlian == "Baik") checked @endif required>
                    <label for="b">Baik</label>
                </div>
                <div>
                    <input id="s" type="radio" value="Standar" name="tingkat_keahlian" @if ($keahlian->tingkat_keahlian == "Standar") checked @endif required>
                    <label for="s">Standar</label>
                </div>  
                <div>
                    <input id="ds" type="radio" value="Dibawah Standar" name="tingkat_keahlian" @if ($keahlian->tingkat_keahlian == "Dibawah Standar") checked @endif required>
                    <label for="ds">Dibawah Standar</label>
                </div>
                <div>
                    <input id="brk" type="radio" value="Buruk" name="tingkat_keahlian" @if ($keahlian->tingkat_keahlian == "Buruk") checked @endif required>
                    <label for="brk">Buruk</label>
                </div>

            <br/>
            <hr size="3px" color="#EEEEEE">
            <input class="simpan" type="submit" name="submit" value="Simpan">
            </form>  
                <div class="display_batal ">
                    @if ($daftark)
                        <a href="/karyawan/{{$daftark->id}}"><button class="batal">Batal</button></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
            
            
        </div>
    </div>
    
</body>
</html>