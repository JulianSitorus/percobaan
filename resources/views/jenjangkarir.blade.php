<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/jenjangk.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
        <a href="jenjangkarir"><h3>Jenjang Karir</h3></a>
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
            <p>Jenjang Karir Karyawan</p>
            <hr size="3px" color="#EEEEEE">
            <div style="overflow: auto; height: 509px;">
            <table>
                <tr>
                    <th class="kiri">No</th>
                    <th class="foto">Foto</th>
                    <th class="nama">Nama</th>
                    <th class="posisi_s">Posisi Sekarang</th>
                    <th class="ps1" colspan="4">4 Posisi sebelumnya</th>
                    <th class="total">Total <br> Posisi</th>
                    <th class="kanan">Aksi</th>
                </tr>

                @foreach($daftark as $key => $dk)

                <tr>
                    <td align="center">{{$daftark-> firstItem() + $key}}</td>
                    <td align="center"><img src="{{ asset('fotokaryawan/'.$dk->foto) }}" style="width: 60px; max-height: 60px" alt=""></td>
                    <td>{{$dk->nama_karyawan}} </td>

                    <td>
                        @if ($dk->jenjangkarir->isNotEmpty())
                            <ul>
                                <li class="key">&bull; {{ $dk->jenjangkarir->last()->posisi }}</li>
                                <li class="value">&bull; Unit {{ $dk->jenjangkarir->last()->unit }} - Departemen {{ $dk->jenjangkarir->last()->departemen }}</li>
                                <li class="value">&bull; {{ \Carbon\Carbon::parse($dk->jenjangkarir->last()->tanggal_mulai)->format('d/m/Y') }} - 
                                    @if ($dk->jenjangkarir->last()->tanggal_selesai)
                                        {{ \Carbon\Carbon::parse($dk->jenjangkarir->last()->tanggal_selesai)->format('d/m/Y') }} 
                                    @else
                                        Sekarang 
                                    @endif
                                    <br>
                                    @if ( $dk->jenjangkarir->last()->durasi )
                                        &bull; {{ $dk->jenjangkarir->last()->durasi }}
                                    @else
                        
                                    @endif
                                </li>
                            </ul>  
                        @endif        
                    </td>

                    <td class="ps">
                        @if ($dk->jenjangkarir->count() >= 2)
                            <ul>
                                <li class="key">&bull; {{ $dk->jenjangkarir[$dk->jenjangkarir->count() - 2]->posisi }}</li>
                                <li class="value">&bull; Unit {{ $dk->jenjangkarir[$dk->jenjangkarir->count() - 2]->unit }} - Departemen {{ $dk->jenjangkarir[$dk->jenjangkarir->count() - 2]->departemen }}</li>
                                <li class="value">&bull; {{ \Carbon\Carbon::parse($dk->jenjangkarir[$dk->jenjangkarir->count() - 2]->tanggal_mulai)->format('d/m/Y') }} - 
                                    @if ($dk->jenjangkarir[$dk->jenjangkarir->count() - 2]->tanggal_selesai)
                                        {{ \Carbon\Carbon::parse($dk->jenjangkarir[$dk->jenjangkarir->count() - 2]->tanggal_selesai)->format('d/m/Y') }}
                                    @else
                                        Sekarang 
                                    @endif
                                    <br> 
                                    @if ( $dk->jenjangkarir[$dk->jenjangkarir->count() - 2]->durasi )
                                        &bull; {{ $dk->jenjangkarir[$dk->jenjangkarir->count() - 2]->durasi }}
                                    @else
                        
                                    @endif
                                </li>
                            </ul>
                        @endif
                    </td>

                    <td class="ps">
                        @if ($dk->jenjangkarir->count() >= 3)
                            <ul>
                                <li class="key">&bull; {{ $dk->jenjangkarir[$dk->jenjangkarir->count() - 3]->posisi }}</li>
                                <li class="value">&bull; Unit {{ $dk->jenjangkarir[$dk->jenjangkarir->count() - 3]->unit }} - Departemen {{ $dk->jenjangkarir[$dk->jenjangkarir->count() - 3]->departemen }}</li>
                                <li class="value">&bull; {{ \Carbon\Carbon::parse($dk->jenjangkarir[$dk->jenjangkarir->count() - 3]->tanggal_mulai)->format('d/m/Y') }} - 
                                    @if($dk->jenjangkarir[$dk->jenjangkarir->count() - 3]->tanggal_selesai)
                                        {{ \Carbon\Carbon::parse($dk->jenjangkarir[$dk->jenjangkarir->count() - 3]->tanggal_selesai)->format('d/m/Y') }}
                                    @else
                                        Sekarang
                                    @endif
                                    <br> 
                                    @if ($dk->jenjangkarir[$dk->jenjangkarir->count() - 3]->durasi)
                                        &bull;{{ $dk->jenjangkarir[$dk->jenjangkarir->count() - 3]->durasi }}
                                    @else

                                    @endif
                                </li>
                            </ul>
                        @endif
                    </td>

                    <td class="ps">
                        @if ($dk->jenjangkarir->count() >= 4)
                            <ul>
                                <li class="key">&bull; {{ $dk->jenjangkarir[$dk->jenjangkarir->count() - 4]->posisi }}</li>
                                <li class="value">&bull; Unit {{ $dk->jenjangkarir[$dk->jenjangkarir->count() - 4]->unit }} - Departemen {{ $dk->jenjangkarir[$dk->jenjangkarir->count() - 4]->departemen }}</li>
                                <li class="value">&bull; {{ \Carbon\Carbon::parse($dk->jenjangkarir[$dk->jenjangkarir->count() - 4]->tanggal_mulai)->format('d/m/Y') }} - 
                                    @if($dk->jenjangkarir[$dk->jenjangkarir->count() - 4]->tanggal_selesai)
                                        {{ \Carbon\Carbon::parse($dk->jenjangkarir[$dk->jenjangkarir->count() - 4]->tanggal_selesai)->format('d/m/Y') }}
                                    @else
                                        Sekarang
                                    @endif
                                    <br>
                                    @if ($dk->jenjangkarir[$dk->jenjangkarir->count() - 4]->durasi)
                                        &bull;{{ $dk->jenjangkarir[$dk->jenjangkarir->count() - 4]->durasi }}
                                    @else

                                    @endif
                                </li>
                            </ul>
                        @endif
                    </td>

                    <td class="ps">
                        @if ($dk->jenjangkarir->count() >= 5)
                            <ul>
                                <li class="key">&bull; {{ $dk->jenjangkarir[$dk->jenjangkarir->count() - 5]->posisi }}</li>
                                <li class="value">&bull; Unit {{ $dk->jenjangkarir[$dk->jenjangkarir->count() - 5]->unit }} - Departemen {{ $dk->jenjangkarir[$dk->jenjangkarir->count() - 5]->departemen }}</li>
                                <li class="value">&bull; {{ \Carbon\Carbon::parse($dk->jenjangkarir[$dk->jenjangkarir->count() - 5]->tanggal_mulai)->format('d/m/Y') }} - 
                                    @if($dk->jenjangkarir[$dk->jenjangkarir->count() - 5]->tanggal_selesai)
                                        {{ \Carbon\Carbon::parse($dk->jenjangkarir[$dk->jenjangkarir->count() - 5]->tanggal_selesai)->format('d/m/Y') }}
                                    @else
                                        Sekarang
                                    @endif
                                    <br>
                                    @if ($dk->jenjangkarir[$dk->jenjangkarir->count() - 5]->durasi)
                                        &bull;{{ $dk->jenjangkarir[$dk->jenjangkarir->count() - 5]->durasi }}
                                    @else

                                    @endif
                                </li>
                            </ul>
                        @endif
                    </td>
                        
                    <td align="center">
                        {{ $dk->jenjangkarir->count() }}    
                    </td>

                    <td align="center">
                        <a href="karyawan/{{$dk->id}}/detail_jenjangkarir"><button class="detail"><i class="fa fa-pen-to-square fa-sm"></i></button></a>
                        <a href="karyawan/{{$dk->id}}/tambah_jenjangkarir"><button class="tambah"><i class="fa-solid fa-plus"></i></button></a>
                    </td>

                </tr>
                @endforeach
                
            </div>             
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