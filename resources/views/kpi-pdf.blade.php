<!DOCTYPE html>
<html>
<head>
<style>
    body{
        font-size: 12px;
    }

    #kpi {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #kpi td, #kpi th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #kpi tr:nth-child(even){
        background-color: #f2f2f2;
    }

    #kpi tr:hover {
        background-color: #ddd;
    }

    #kpi th {
      font-size: 12px;
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: center;
      background-color: #04AA6D;
      color: white;
    }

    .total{
      font-size: 12px;
      color: black;
      text-align: center;
    }

    #kpi td {
      font-size: 11px;
    }

    .tab1{margin-left: 35px;}
    .tab2{margin-left: 87px;}
    .tab3{margin-left: 13px;}
    .tab4{margin-left: 24px;}
    .tab5{margin-left: 8px;}
    .tab6{margin-left: 15px;}
    .tab7{margin-left: 45px;}

    .area{width: 22%;}
    .key{width: 43%;}
    .bobot{width: 7%;}
    .target{width: 7%;}
    .realisasi{width: 7%;}
    .skor{width: 7%;}
    .skor_akhir{width: 7%;}

</style>
</head>

<body>

<center>
  <img style=" width: 120px;" src='images/sn_logo.jpg'> 
</center>
<h1 style="text-align: center; margin-top: -3px">Key Performance Indicator</h1>

  <p>Nama Karyawan <span class="tab1"> : </span> {{ $daftark->nama_karyawan }}</p>
  <p>
    @if ($daftark->jenjangkarir->isNotEmpty())
      Posisi <span class="tab2"> : </span> {{ $daftark->jenjangkarir->last()->posisi }}
    @endif
  </p>
  <p>Supervisor Langsung <span class="tab3"> : </span> {{ $kpi->supervisor }}</p>
  <p>Jabatan Supervisor <span class="tab4"> : </span> {{ $kpi->jabatan_supervisor }}</p>
  <p>KPI disetujui bersama <span class="tab5"> : </span> {{ \Carbon\Carbon::parse($kpi->tanggal_kpi)->format('d F Y') }}</p>
  <p>Periode Pelaksanaan <span class="tab6"> : </span> {{ \Carbon\Carbon::parse($kpi->mulai_pelaksanaan)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($kpi->selesai_pelaksanaan)->format('d/m/Y') }}</p>
  <p>Deskripsi KPI <span class="tab7"> : </span> {{ $kpi->deskripsi_kpi }}</p>

<table id="kpi">
  <thead>
    <tr>
      <th class="area">Area Kinerja Utama</th>
      <th class="key">Key Performance Indicator</th>
      <th class="bobot">Bobot<br>KPI</th>
      <th class="target">Target</th>
      <th class="realisasi">Realisasi</th>
      <th class="skor">Skor</th>
      <th class="skor_akhir">Skor<br>Akhir</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <td>{{$kpi->area}}</td>
      <td>{{$kpi->ket}}</td>
      <td>{{$kpi->bobot}}</td>
      <td>{{$kpi->target}}</td>
      <td>{{$kpi->realisasi}}</td>
      <td>{{$kpi->skor}}</td>
      <td>{{$kpi->skor_akhir}}</td>
    </tr>
  </tbody>

  <tfoot>
    <tr>
      <td class="total" colspan="2">Total</td>
      <td>{{$kpi->total_bobot}}</td>
      <td class="kosong" colspan="3"></td>
      <td>{{$kpi->total_skor_akhir}}</td>
    </tr>
  </tfoot>

</table>



</body>
</html>


