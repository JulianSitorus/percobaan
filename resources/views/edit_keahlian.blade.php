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
        <a href="/karyawan/{{$daftark->id}}/edit_keahlian"><h3 class="breadcrumb">Edit Keahlian Karyawan</h3></a>
    </div>

    <div class ="empat">
        <div class="empat2">
            <p class="judul">Edit Keahlian Karyawan</p>
            <hr size="3px" color="#EEEEEE">
            
            <form action="{{ route('keahlian.update', ['id' => $keahlian->id]) }}" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <label class="key" for="nama_keahlian">Nama Keahlian</label>
                <input id="nama_keahlian" value="{{$keahlian->nama_keahlian}}" type="text" name="nama_keahlian" pattern=".*\S+.*" required
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
                
                <label class="key" for="jenis_keahlian">Jenis Keahlian</label>
                <select name="jenis_keahlian" id="jenis_keahlian" required
                oninvalid="this.setCustomValidity('Jenis keahlian belum terisi!')" 
                onInput="this.setCustomValidity('')" title="Silahkan pilih jenis keahlian">
                    <option value="{{$keahlian->jenis_keahlian}}" disabled selected>--- Pilih Jenis Keahlian ---</option>
                    <option value="Hard Skill" @if ($keahlian->jenis_keahlian == "Hard Skill") selected @endif>Hard Skill</option>
                    <option value="Soft Skill" @if ($keahlian->jenis_keahlian == "Soft Skill") selected @endif>Soft Skill</option> 
                </select>

                <br>
                <br/>
                <hr size="3px" color="#EEEEEE">
                <input class="simpan" type="submit" name="submit" value="Simpan">
            </form>  
                <div class="display_batal ">
                    <button class="batal" onclick="goBack()">Batal</button>
                    
                </div>
            </div>
        </div>
    </div>
            
            
        </div>
    </div>
    <script>
        function goBack() {
            window.history.back();
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