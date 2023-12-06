<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/detail_jenjang_karir.css') }}">
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
                <li><a class="logout"  href="/logout">
                    <i class="fas fa-right-from-bracket">
                        <span class="menu">&emsp; Keluar</span>
                    </i></a></li>
                
            </ul>
    </div>

    <div class ="tiga" >
        <a href="/daftark"><h3>Karyawan ></h3></a>
        <a href="/karyawan/{{$daftark->id}}"><h3 class="breadcrumb">Detail Karyawan ></h3></a>
        <a href="/karyawan/{{$daftark->id}}/detail_jenjangkarir"><h3 class="breadcrumb">Detail Jenjang Karir</h3></a>
    </div>

    @php
        $hitungPosisi = []; //tiap posisi
        $totalHitung = 0; 
    @endphp

    <div class ="empat">
        <div class="empat2">
            <p class="judul">Detail Jenjang Karir Karyawan</p>
            <hr size="3px" color="#EEEEEE">
            <table id="detail">
                <tr>
                    <th id="posisi">Posisi</th>
                    <th id="unit">Unit</th>
                    <th id="departemen">Departemen</th>
                    <th id="mulai_posisi">Mulai</th>
                    <th id="selesai_posisi">Selesai</th>
                    <th id="durasi">Durasi</th>
                    <th class="aksi">Aksi</th>
                </tr>
                @foreach($daftark->jenjangkarir->reverse() as $dkr)
                <tr>
                    <td>{{$dkr->posisi}}</td>
                    <td>{{$dkr->unit}}</td>
                    <td>{{$dkr->departemen}}</td>
                    <td>{{ \Carbon\Carbon::parse($dkr->tanggal_mulai)->format('d/m/Y') }}</td>
                    <td>
                        @if ($dkr->tanggal_selesai)
                            {{ \Carbon\Carbon::parse($dkr->tanggal_selesai)->format('d/m/Y') }}
                        @else
                            Sekarang
                        @endif
                    </td>
                    <td align="center">{{$dkr->durasi}}</td>
                    <td class="button-container">
                        <a href="/detail_jenjangkarir/{{$dkr->id}}/edit_jenjangkarir"><button class="detail"><i class="fa fa-pen-to-square fa-sm" ></i></button></a>
                        <form action="/detail_jenjangkarir/{{$dkr->id}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="hapus" type="submit"><i class="fa fa-trash-can fa-sm"></i></button>
                        </form>
                    </td>
                </tr>

                @php
                    $posisi = $dkr->posisi;
                    $hitungPosisi[$posisi] = isset($hitungPosisi[$posisi]) ? $hitungPosisi[$posisi] + 1 : 1;
                    $totalHitung++;
                @endphp
                
                @endforeach
            </table>

            <!-- @foreach ($hitungPosisi as $posisi => $hitung)
                <p>{{$posisi}}: {{$hitung}}</p>
            @endforeach -->

            <p class="total">Total Posisi : {{$totalHitung}}</p>

            <div class="sekarang" id="sekarang-count-info" style="display: none;">
                <br><p>*Terdapat <span style="font-weight: bolder;" id="sekarang-count">0</span> data yang tanggal selesainya 
                    <span style="font-weight: bolder;">masih berlangsung hingga saat ini (Sekarang)</span> </p>
            </div>

            <br>

            <hr size="3px" color="#EEEEEE">
            <a href="tambah_jenjangkarir"><button class="tambah"><i class="fa-solid fa-plus"></i> Tambah Data</button></a>
            <button class="kembali" onclick="goBack()">Kembali</button>

        </div>
    </div>
    <!-- ======================================================================================================================================== -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function countSekarang() {
                var table = document.getElementById('detail');
                var rowCount = 0;

                for (var i = 1; i < table.rows.length; i++) {
                    var sekarangCell = table.rows[i].cells[4];
                    var sekarangText = sekarangCell.textContent.trim();

                    if (sekarangText === 'Sekarang') {
                        rowCount++;
                    }
                }

                // Menampilkan jumlah di dalam elemen HTML jika lebih dari 1
                var countElement = document.getElementById('sekarang-count');
                countElement.textContent = rowCount;

                // Menampilkan elemen div hanya jika jumlahnya lebih dari 1
                var sekarangCountInfo = document.getElementById('sekarang-count-info');
                sekarangCountInfo.style.display = rowCount > 1 ? 'block' : 'none';
            }

            countSekarang();
        });
    </script>

    <!-- ======================================================================================================================================== -->
    
    <script>
        function goBack() {
            window.history.back();
        }
    </script>

    <!-- ======================================================================================================================================== -->
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
