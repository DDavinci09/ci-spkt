<style>
/* CSS untuk cetak */
@media print {
  @page {
    size: landscape; /* Mengatur orientasi cetak menjadi landscape */
  }
}
</style>
<body onLoad="window.print()">
<title>Cetak Laporan SIK</title>
<table border=0 width=100%>
<tr>
    <td align="center" rowspan='3' width='88px'><img src='<?= base_url('./assets/img/logo_polsek.png') ?>' width='85px'></td>
</tr> 
<tr>
    <td align="center"><h3 style='margin-bottom:-5px' align=center>KEPOLISIAN DAERAH SUMATERA BARAT<br>
         RESOR TANAH DATAR <br> SEKTOR LIMA KAUM <br> LAPORAN SURAT IJIN KERAMAIAN (SIK) </h3></td>
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
<th scope="col" class="align-middle text-center">Kode SIK</th>
<th scope="col" class="align-middle text-center">Tanggal SIK</th>
<th scope="col" class="align-middle text-center">Nama Kegiatan</th>
<th scope="col" class="align-middle text-center">Tujuan Kegiatan</th>
<th scope="col" class="align-middle text-center">Waktu Kegiatan</th>
<th scope="col" class="align-middle text-center">Tempat Kegiatan</th>
<th scope="col" class="align-middle text-center">Penanggunjawab</th>
<th scope="col" class="align-middle text-center">Organisasi</th>
<th scope="col" class="align-middle text-center">Status</th>
<th scope="col" class="align-middle text-center">Keterangan</th>
</tr>

  <?php
  $i = 1;
  foreach ($SIK as $SI) : ?>
<tr>
<td class="align-middle text-center"><?= $i++ ?></td>
<td class="align-middle text-center"><?= $SI['nama'] ?></td>
<td class="align-middle text-center"><?= $SI['kode_sik'] ?></td>
<td class="align-middle text-center"><?= $SI['nik'] ?></td>
<td class="align-middle text-center"><?= $SI['nama_kegiatan'] ?></td>
<td class="align-middle text-center"><?= $SI['tujuan_kegiatan'] ?></td>
<td class="align-middle text-center"><?= date("d-m-Y h:m:s", strtotime($SI['waktu_kegiatan'])) ?></td>
<td class="align-middle text-center"><?= $SI['tempat_kegiatan'] ?></td>
<td class="align-middle text-center"><?= $SI['penanggungjawab'] ?></td>
<td class="align-middle text-center"><?= $SI['organisasi'] ?></td>
<td class="align-middle text-center"><?= $SI['status_sik'] ?></td>
<td class="align-middle text-center"><?= $SI['keterangan'] ?></td>
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