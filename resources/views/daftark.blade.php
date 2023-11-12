<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/daftark.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">  -->
    <link rel="stylesheet" href="css/fontawesome/css/all.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    
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
                <li><a href="daftark" target="_self">
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
        <a href="daftark"><h3>Karyawan</h3></a>
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
            <p>Daftar Karyawan</p>
            <hr size="3px" color="#EEEEEE">
            <a href="biodata"><button class="tambah"><i class="fa-solid fa-plus"></i> Tambah Karyawan</button></a>
            <div style="overflow: auto; height: 515px;">
            <table>
                <tr>
                    <th class="kiri">No</th>
                    <th class="foto">Foto</th>
                    <th>Nama</th>
                    <th>Departemen</th>
                    <th>Unit</th>
                    <th>Posisi</th>
                    <th>Status</th>
                    <th>Kontak</th>
                    <th class="kanan">Aksi</th>
                </tr>
                @foreach($daftark as $key => $dk)
                    <tr>
                        <td align="center">{{$daftark-> firstItem() + $key}}</td>
                        <td align="center"><img src="{{ asset('fotokaryawan/'.$dk->foto) }}" style="width: 60px; max-height: 60px" alt=""></td>
                        <td>{{$dk->nama_karyawan}} </td>
                        <td>
                            @if ($dk->jenjangkarir->isNotEmpty())
                                {{ $dk->jenjangkarir->last()->departemen }}
                            @endif
                        </td>
                        <td>
                            @if ($dk->jenjangkarir->isNotEmpty())
                                {{ $dk->jenjangkarir->last()->unit }}
                            @endif
                        </td>
                        <td>
                            @if ($dk->jenjangkarir->isNotEmpty())
                                {{ $dk->jenjangkarir->last()->posisi }}
                            @endif
                        </td>
                        <td>{{$dk->status}}</td>
                        <td class="kontak">
                            {{$dk->no_telp}} <br>
                            {{$dk->email}}
                        </td>
                        <td class="button-container">
                            <!-- tombol detail -->
                            <a href="karyawan/{{$dk->id}}"><button class="detail"><i class="fa fa-pen-to-square fa-sm"></i></button></a>
                            <!-- tombol hapus -->
                            <form action="{{$dk->id}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="hapus" type="submit"><i class="fa fa-trash-can fa-sm"></i></button>
                            </form>
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

    <!-- alert memghapus karyawan -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $(document).on('click', '.hapus', function(e){
                e.preventDefault();
                var form = $(this).closest('form');

                Swal.fire({
                    title: "Anda yakin?",
                    text: "Anda tidak akan dapat mengembalikan ini!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus Saja!"
                    }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>

    <!-- alert sukses nambah karyawan -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if (Session::has('success'))
    <script>
        swal("Berhasil","{{ Session::get('success') }}", 'success',{
            button:true,
            button:"OK",
            timer:2500,
        });
    </script>
    @endif

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