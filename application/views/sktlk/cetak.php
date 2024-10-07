<style type="text/css">
  @font-face {
    font-family: myFirstFont;
    src: url(fonts/ufonts.com_square721-bt-roman.ttf);
  }

  p, u, td{
    font-family: myFirstFont;
  }
</style>

<body onLoad="window.print()">

<title>Cetak Surat Keterangan Tanda Laporan Kehilangan</title>

<table border=0 width=100%>
<tr>
    <td align="center" rowspan='3' width='88px'><img src='<?= base_url('./assets/img/logo_polsek.png') ?>' width='85px'></td>
</tr> 
<tr>
    <td align="center"><h3 style='margin-bottom:-5px' align=center>KEPOLISIAN DAERAH SUMATERA BARAT<br>
         RESOR TANAH DATAR <br> SEKTOR LIMA KAUM </h3></td>
    <td align="center" rowspan='3' width='88px'>&nbsp;</td>
</tr> 
<tr>
    <td align="center"><p>Jln. Jenderal Sudirman, No.52, Lima Kaum, 27213</p></td>
</tr> 
</table>
<hr style='border:1px solid #000'>

<table width=100%>
<tr>
    <td align="center"><h3 style='margin-bottom:-5px' align=center>SURAT KETERANGAN TANDA LAPORAN KEHILANGAN (SKTLK)</h3></td>
</tr> 
<tr>
    <td align="center"><p>Nomor : 00<?= $SK['id_sktlk']; ?>/SKTLK/<?= date("d/m/Y") ?></p></td>
</tr> 
</table>

<br>

<p style="text-align: justify">
Kepala Kepolisian Tanah Datar Sektor Lima Kaum, Menerangkan Bahwa :
</p>

<table width='55%' align="center">
<tr>
    <td width="30%">Nama Pelapor</td>
    <td width="65%">: <?php echo "$SK[nama]";?></td>
</tr>
<tr>
    <td width="30%">NIK</td>
    <td width="65%">: <?php echo "$SK[nik]";?></td>
</tr>
<tr>
    <td width="30%">Jenis Kelamin</td>
    <td width="65%">: <?php echo "$SK[jenis_kelamin]";?></td>
</tr>
<tr>
    <td width="30%">No Telp</td>
    <td width="65%">: <?php echo "$SK[no_telp]";?></td>
</tr>
<tr>
    <td width="30%">Alamat</td>
    <td width="65%">: <?php echo "$SK[alamat]";?></td>
</tr>
</table>

    <p style="text-align: justify"> 
        Melaporkan telah kehilangan barang :
    </p>

<table width='55%' align="center">
<tr>
    <td width="30%">Kejadian</td>
    <td width="65%">: <?php echo "$SK[kejadian]";?></td>
</tr>
<tr>
    <td width="30%">Waktu Kejadian</td>
    <td width="65%">: <?= date("d-m-Y h:m:s", strtotime($SK['waktu_kejadian']))?></td>
</tr>
<tr>
    <td width="30%">Tempat Kejadian</td>
    <td width="65%">: <?php echo "$SK[tempat_kejadian]";?></td>
</tr>
<tr>
    <td width="30%">Keterangan</td>
    <td width="65%">: <?php echo "$SK[keterangan]";?></td>
</tr>
</table>

    <p style="text-align: justify"> 
        Demikian Surat Keterangan Tanda Laporan Kehilangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya.
    </p>


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