<style type="text/css">
  @font-face {
    font-family: myFirstFont;
    src: url(fonts/ufonts.com_square721-bt-roman.ttf);
  }

  p, u, td{
    font-family: myFirstFont;
  }
</style>
<title>Print Data Surat Tugas</title>
<tr><td colspan=8 color="#FFF000"><center>Polsekta Samarinda Utara</center></td></tr>
<tr><td colspan=8 ><center>LAPORAN DATA LAPORAN DIRI POLSEKTA SAMARINDA UTARA</center></td></tr>
<tr><td colspan=8 ><center>Jl. D.I Panjaitan No. 46 Samarinda Utara</center></td></tr>
<tr><td colspan=8 ><center>=======================================================</center></td></tr>

<table width="100%" border="1" cellpadding="8" cellspacing="0">
<tr bgcolor='#f2a91c'> 
<th scope="col" class="align-middle text-center">Nama Pelapor</th>
<th scope="col" class="align-middle text-center">Tanggal</th>
<th scope="col" class="align-middle text-center">Jenis</th>
<th scope="col" class="align-middle text-center">Isi</th>
<th scope="col" class="align-middle text-center">Waktu</th>
<th scope="col" class="align-middle text-center">Tempat</th>
<th scope="col" class="align-middle text-center">Status</th>
</tr>

<tr bgcolor='#FFF'>
<td class="align-middle"><?= $l['id_pelapor'] ?></td>
<td class="align-middle"><?= $l['id_pelapor'] ?></td>
                                <td class="align-middle"><?= date("d-m-Y", strtotime($l['tgl_lp'])) ?></td>
                                <td class="align-middle"><?= $l['jenis_lp'] ?></td>
                                <td class="align-middle"><?= $l['isi_lp'] ?></td>
                                <td class="align-middle"><?= date("d-m-Y h:m:s", strtotime($l['waktu_kejadian'])) ?></td>
                                <td class="align-middle"><?= $l['tempat_kejadian'] ?></td>
                                <td class="align-middle text-center">
                                        <?php if ($l["status_lp"] == 'Menunggu') { ?>
                                        <a class="btn btn-warning">Menunggu</a>
                                        <?php } else if ($l["status_lp"] == 'Terima') { ?>
                                        <a class="btn btn-success">Diterima</a>
                                        <?php } else if ($l["status_lp"] == 'Tolak') { ?>
                                        <a class="btn btn-danger">Ditolak</a>
                                        <?php } ?>
                                </td>
</tr>
</table>
<br>
<br>
<table>
<td>
<tr>Padang,<?php echo date('d - M - Y'); ?></tr><br>
<tr>        Ttd         </tr><br>
<tr>                    </tr><br>
<tr>                    </tr><br>
<tr>                    </tr><br>
<tr>      Ervin Suryatna, M.Si     </tr>
</td>
</table>

</div>
</div>
</div>
</div>