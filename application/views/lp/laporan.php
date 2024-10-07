<style>
/* CSS untuk cetak */
@media print {
  @page {
    size: landscape; /* Mengatur orientasi cetak menjadi landscape */
  }
}
</style>
<body onLoad="window.print()">
<title>Cetak Laporan LP</title>
<table border=0 width=100%>
<tr>
    <td align="center" rowspan='3' width='88px'><img src='<?= base_url('./assets/img/logo_polsek.png') ?>' width='85px'></td>
</tr> 
<tr>
    <td align="center"><h3 style='margin-bottom:-5px' align=center>KEPOLISIAN DAERAH SUMATERA BARAT<br>
         RESOR TANAH DATAR <br> SEKTOR LIMA KAUM <br> LAPORAN SURAT LAPORAN POLISI (LP) </h3></td>
    <td align="center" rowspan='3' width='88px'>&nbsp;</td>
</tr> 
<tr>
    <td align="center"><p>Jln. Jenderal Sudirman, No.52, Lima Kaum, 27213</p></td>
</tr> 
</table>
<tr><td colspan=8 ><center>=====================================================================</center></td></tr>
<br>
<table width="100%" border="1" cellpadding="8" cellspacing="0">
<tr> 
<th scope="col" class="align-middle text-center">NO</th>
<th scope="col" class="align-middle text-center">Nama Pelapor</th>
<th scope="col" class="align-middle text-center">Kode LP</th>
<th scope="col" class="align-middle text-center">Tanggal LP</th>
<th scope="col" class="align-middle text-center">Jenis Laporan</th>
<th scope="col" class="align-middle text-center">Isi Laporan</th>
<th scope="col" class="align-middle text-center">Tanggal</th>
<th scope="col" class="align-middle text-center">Tempat</th>
<th scope="col" class="align-middle text-center">Status</th>
<th scope="col" class="align-middle text-center">Keterangan</th>
</tr>

  <?php
  $i = 1;
  foreach ($LP as $L) : ?>
<tr>
<td class="align-middle text-center"><?= $i++ ?></td>
<td class="align-middle text-center"><?= $L['nama'] ?></td>
<td class="align-middle text-center"><?= $L['kode_lp'] ?></td>
<td class="align-middle text-center"><?= $L['tgl_lp'] ?></td>
<td class="align-middle text-center"><?= $L['jenis_lp'] ?></td>
<td class="align-middle text-center"><?= $L['isi_lp'] ?></td>
<td class="align-middle text-center"><?= date("d-m-Y h:m:s", strtotime($L['waktu_kejadian'])) ?></td>
<td class="align-middle text-center"><?= $L['tempat_kejadian'] ?></td>
<td class="align-middle text-center"><?= $L['status_lp'] ?></td>
<td class="align-middle text-center"><?= $L['keterangan'] ?></td>
</tr>
<?php endforeach; ?>
</table>
<br>
<br>
<table width=100%>
  <tr>
    <td width="30%">
    </td>

    <td width="30%">

    </td>

    <td >
       
        <table>
            
            <tr>
              <td>Lima Kaum,</td>
              <td> <?= date("d M Y"); ?></td></tr>
        </table><br>
        <center>
          KEPALA KEPOLISIAN SEKTOR LIMA KAUM<br><br><br><br>

          <u>ELFISON, S.H</u><br>
         
          IPTU NRP. 75090595
        </center>
    </td>
  </tr>
</table> 
</body>