<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>laporan Surat Masuk</title>
    <style>
        .line-title {
            border: 0;
            border-style: inset;
            border-top: 4px solid #000;
            margin-top: 1px;
        }

        .alamat {
            font-family: arial;
            font-size: 15px;
        }

        p {
            line-height: 0.5;
            font-family: Arial;
        }

        table {
            border-collapse: collapse;
            font-family: Arial;
            font-size: 10pt;
            color: #5E5B5C;
            margin: 0 auto;
        }

        table tr {
            border: 0px solid #ffffff;
            padding: 3px;
        }

        table td {
            border: 1px solid #ffffff;
            padding: 3px;
            vertical-align: middle;
        }

        thead th {
            border: 1px solid #FFFFFF;
            padding: 3px;
            font-weight: bold;
            text-align: center;
            background-color: #525659;
            color: #FFFFFF;
        }

        body {
            -webkit-print-color-adjust: exact;
        }

        .garis_tr {
            border: 1px solid black;
            font-size: 11pt;
        }

        .garis_td {
            border: 1px solid black;
            font-size: 11pt;
        }

        @page {
            size: A4;
            size: potrait;
            margin-left: 1.5cm;
            margin-right: 1.5cm;
        }
    </style>
</head>
<?php
$awal = substr($range, 0, 10);
$akhir = substr($range, -10);
$query = "SELECT * FROM `tbl_surat_masuk` WHERE `tanggal_surat` >= '$awal' AND `tanggal_surat` <= '$akhir' ORDER BY `no_agenda` DESC";
$datasurat = $this->db->query($query)->result_array();
?>

<body>
    <img src="<?= base_url('assets/template/') ?>dist/img/logo_surat.png" style="position: absolute; width: 105px; height: 95px; ">
    <table style="width: 100%;">
        <tr>
            <td align="center">
                <span style="line-height: 1.2; font-weight: bold; font-family:coopbl; font-size: 20px">
                    PEMERINTAH KABUPATEN TANGGAMUS
                    <br>KECAMATAN ULUBELU
                    <br>PEKON DATARAJAN
                    <br>
                </span>
            </td>
        </tr>
        <tr>
            <td align="center">
                <span class="alamat">
                    <br>
                    <i style="font-family: coopbl;">Alamat: Jln. Datarajan Kecamatan Ulubelu Kabupaten Tanggamus Kode Pos. 35379</i>
                    <hr class="line-title">
                </span>
            </td>
        </tr>
        <tr>
            <td align="center">
                <p style="font-family:coopbl;font-size:15pt;"><strong>LAPORAN AGENDA SURAT MASUK</strong></p>

            </td>
        </tr>
        <tr>
            <td style="font-family:ARIAL;font-size:12pt;">
                <b>Periode Surat : <?= $range; ?></b>

            </td>
        </tr>
    </table>
    <table align="center" width="100%" border="1px" style="margin-bottom: 30px;">
        <tr class="garis_tr">
            <th class="garis_td">Nomor Surat</th>
            <th class="garis_td">Tanggal Surat</th>
            <th class="garis_td">Tanggal Terima</th>
            <th class="garis_td">Asal Surat</th>
            <th class="garis_td">Perihal</th>
            <th class="garis_td">Ringkasan</th>
        </tr>
        <?php foreach ($datasurat as $data) : ?>
            <tr class="garis_tr">
                <td class="garis_td" align="center"><?= $data['nomor_surat']; ?></td>
                <td class="garis_td" align="center"><?= $data['tanggal_surat']; ?></td>
                <td class="garis_td" align="center"><?= $data['tanggal_terima']; ?></td>
                <td class="garis_td"><?= $data['asal_surat']; ?></td>
                <td class="garis_td"><?= $data['perihal']; ?></td>
                <td class="garis_td"><?= $data['ringkasan']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <table border="0" width="100%">
        <tr>
            <td rowspan="4" width="65%"></td>
            <td>
                <p>Datarajan, <?= $tanggal; ?></p>
                <p>Kepala Pekon Datarajan</p>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><span><b>S O D R I</b></span></td>
        </tr>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>