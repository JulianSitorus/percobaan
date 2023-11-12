<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/kpi.css">
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
                <li><a href="jenjangkarir">
                    <i class="fas fa-chart-line">
                        <span class="menu">&emsp;Jenjang Karir</span>
                    </i></a></li>
                <li><a href="keahlian">
                    <i class="fas fa-users-gear">
                        <span class="menu">&emsp;Keahlian & Pelatihan</span>
                    </i></a></li>
                <li><a class="logout" href="logout">
                    <i class="fas fa-right-from-bracket">
                        <span class="menu">&emsp; Keluar</span>
                    </i></a></li>
                
            </ul>
    </div>

    <div class ="tiga">
        <h3>KPI > </h3>
        <div class="search-box">
            <form action="" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search...">
                    <button class="input-group-text">&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
        </div> 
    </div>

    <div class ="empat">
        <div class="empat2">
            <p>KPI Karyawan</p>
            <hr size="3px" color="#EEEEEE">
            <div style="overflow: auto; height: 509px;">
            <table>
                <tr>
                    <th class="kiri">No</th>
                    <th class="foto">Foto</th>
                    <th class="nama_kpi">Nama</th>
                    <th class="posisi_kpi">Posisi</th>
                    <th class="tanggal_dibuat">Tgl Dibuat</th>
                    <th class="supervisor">Supervisor</th>
                    <th class="periode">Periode Pelaksanaan</th>
                    <th class="deskripsi_kpi">Deskripsi KPI</th>
                    <th class="j_bobot">Total Bobot</th>
                    <th class="j_skor_a">Skor Akhir</th>
                    <th class="kanan">Aksi</th>
                </tr>
                @foreach($daftark as $key => $dk)
                    <tr>
                        <td align="center">{{$daftark-> firstItem() + $key}}</td>
                        <td align="center"><img src="{{ asset('fotokaryawan/'.$dk->foto) }}" style="width: 60px; max-height: 60px" alt=""></td>
                        <td>{{$dk->nama_karyawan}} </td>
                        <td>
                            @if ($dk->jenjangkarir->isNotEmpty())
                                {{$dk->jenjangkarir->last()->posisi}} <br> {{$dk->jenjangkarir->last()->departemen}}
                            @endif
                        </td>
                        <td>
                            @if ($dk->kpi->isNotEmpty())
                                {{ \Carbon\Carbon::parse($dk->kpi->last()->tanggal_kpi)->format('d/m/Y') }}
                            @endif
                        </td>
                        <td>
                            @if ($dk->kpi->isNotEmpty())
                                {{$dk->kpi->last()->supervisor}}
                            @endif
                        </td>
                        <td>
                            @if ($dk->kpi->isNotEmpty())
                                {{ \Carbon\Carbon::parse($dk->kpi->last()->mulai_pelaksanaan)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($dk->kpi->last()->selesai_pelaksanaan)->format('d/m/Y') }}
                            @endif
                        </td>
                        <td>
                            @if ($dk->kpi->isNotEmpty())
                                {{$dk->kpi->last()->deskripsi_kpi}}
                            @endif
                        </td>
                        <td align="center">
                            @if ($dk->kpi->isNotEmpty())
                                {{$dk->kpi->last()->total_bobot}}
                            @endif
                        </td>
                        <td align="center">
                            @if ($dk->kpi->isNotEmpty())
                                {{$dk->kpi->last()->total_skor_akhir}}
                            @endif
                        </td>
                        <td align="center">
                            @if ($dk->kpi->isNotEmpty())
                                <a href="karyawan/{{$dk->kpi->last()->id}}/edit_kpi"><button class="detail"><i class="fa fa-pen-to-square fa-sm"></i></button></a>
                            @endif
                            <a href="karyawan/{{$dk->id}}/tambah_kpi"><button class="tambah"><i class="fa-solid fa-plus"></i></button></a>
                        </td>
                    </tr>
                @endforeach
                
            </table>
                
        </div>
        <p class="jmlh_data">Menampilkan {{ $daftark->firstItem() }} - {{ $daftark->lastItem() }} dari {{ $daftark->total() }} data</p>
        <div class="hlmn">
            {{$daftark->withQueryString()->links('pagination::bootstrap-4')}}
        </div>
    </div>

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