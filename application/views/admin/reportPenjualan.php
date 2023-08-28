<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>laporan Penjualan Pupuk</title>

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

        .garis_rg {
            border-right: 1px solid black;
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
$bulan = array(
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
);
$split1 = explode('-', $awal);
$split2 = explode('-', $akhir);
$tglAwal = $split1[2] . ' ' . $bulan[(int)$split1[1]] . ' ' . $split1[0];
$tglAkhir = $split2[2] . ' ' . $bulan[(int)$split2[1]] . ' ' . $split2[0];
$query = "SELECT `tbl_keranjang`.*,`tbl_pembayaran`.*,`users`.`name`,`tbl_pupuk`.`nama`
FROM `tbl_keranjang` 
INNER JOIN `tbl_pembayaran`
ON `tbl_keranjang`.`id_pembayaran`=`tbl_pembayaran`.`id_pembayaran`
INNER JOIN `users`
ON `tbl_pembayaran`.`id_user`=`users`.`id`
INNER JOIN `tbl_pupuk`
ON `tbl_keranjang`.`id_pupuk`=`tbl_pupuk`.`id`
WHERE `tbl_pembayaran`.`status_pembayaran`=1
AND `tbl_keranjang`.`tanggal_bayar` >= '$awal' AND `tbl_keranjang`.`tanggal_bayar` <= '$akhir'";
$dataLaporan = $this->db->query($query)->result_array();

$query1 = "SELECT SUM(total_harga) AS `total` , SUM(jumlah) AS `jumlah`
FROM `tbl_keranjang` 
INNER JOIN `tbl_pembayaran`
ON `tbl_keranjang`.`id_pembayaran`=`tbl_pembayaran`.`id_pembayaran`
INNER JOIN `users`
ON `tbl_pembayaran`.`id_user`=`users`.`id`
INNER JOIN `tbl_pupuk`
ON `tbl_keranjang`.`id_pupuk`=`tbl_pupuk`.`id`
WHERE `tbl_pembayaran`.`status_pembayaran`=1
AND `tbl_keranjang`.`tanggal_bayar` >= '$awal' AND `tbl_keranjang`.`tanggal_bayar` <= '$akhir'";
$totalHarga = $this->db->query($query1)->row_array();

// var_dump($totalHarga);
// die;
?>

<body>
    <!-- <img src="<?= base_url('assets/template/') ?>dist/img/logo_surat.png" style="position: absolute; width: 105px; height: 95px; "> -->
    <table style="width: 100%;">
        <tr>
            <td align="center">
                <span style="line-height: 1.2; font-weight: bold; font-family:coopbl; font-size: 20px">
                    SISTEM INFORMASI PENJUALAN PUPUK
                    <br>KELOMPOK TANI MEKAR TANI
                    <br>PURWODADI
                    <br>
                </span>
            </td>
        </tr>
        <tr>
            <td align="center">
                <span class="alamat">
                    <br>
                    <i style="font-family: coopbl;">Alamat: Purwodadi, Kec. Trimurjo, Kabupaten Lampung Tengah, Lampung</i>
                    <hr class="line-title">
                </span>
            </td>
        </tr>
        <tr>
            <td align="center">
                <p style="font-family:coopbl;font-size:15pt;"><strong>LAPORAN PENJUALAN PUPUK</strong></p>

            </td>
        </tr>
        <tr>
            <td style="font-family:ARIAL;font-size:12pt;">
                <b>Periode Penjualan : <?= $tglAwal; ?> - <?= $tglAkhir; ?></b>
            </td>
        </tr>
    </table>
    <table align="center" width="100%" border="1px" style="margin-bottom: 30px;">
        <tr class="garis_tr">
            <th style="width: 30px;">No</th>
            <th class="garis_td">Pembeli</th>
            <th class="garis_td">Pupuk</th>
            <th class="garis_td">Tanggal</th>
            <th class="garis_td">Jumlah</th>
            <th class="garis_td">Total</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($dataLaporan as $data) : ?>
            <?php $bulan = array(
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            $split1 = explode('-', $data['tanggal_bayar']);
            $tanggal = $split1[2] . ' ' . $bulan[(int)$split1[1]] . ' ' . $split1[0];
            ?>
            <tr class="garis_tr">
                <td class="garis_td" align="center"><?= $i; ?></td>
                <td class="garis_td"><?= $data['name']; ?></td>
                <td class="garis_td"><?= $data['nama']; ?></td>
                <td class="garis_td" align="center"><?= $tanggal; ?></td>
                <td class="garis_td" align="center"><?= $data['jumlah']; ?></td>
                <?php
                $nominal = "Rp. " . number_format($data['total_harga'], 0, ".", ".");
                ?>
                <td class="garis_td"><?= $nominal; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
        <tr class="garis_tr">
            <td></td>
            <td></td>
            <td></td>
            <td class="garis_rg"></td>
            <td class="garis_tr" align="center"><?= $totalHarga['jumlah']; ?></td>
            <?php
            $total1 = "Rp. " . number_format($totalHarga['total'], 0, ".", ".");
            ?>
            <td class="garis_tr"><?= $total1; ?></td>
        </tr>
    </table>
    <table border="0" width="100%">
        <tr>
            <td rowspan="4" width="65%"></td>
            <td>
                <p>Purwodadi, <?= $tanggal; ?></p>
                <p>Ketua.</p>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><span><b>Agus Supriadi S.T</b></span></td>
        </tr>
    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>