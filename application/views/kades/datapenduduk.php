<section class="content">
    <div class="container-fluid">
        <div class="card card-info card-outline">
            <div class="card-body">
                <?php
                $query = "SELECT * FROM `tbl_data_penduduk` ORDER BY `id_penduduk` DESC";
                $datapenduduk = $this->db->query($query)->result_array();
                ?>
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Provinsi</th>
                            <th>Kabupaten</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datapenduduk as $data) : ?>
                            <tr>
                                <td class=" py-1 align-middle"><?= $data['nik']; ?></td>
                                <td class=" py-1 align-middle"><?= $data['nama']; ?></td>
                                <td class=" py-1 align-middle"><?= $data['provinsi']; ?></td>
                                <td class=" py-1 align-middle"><?= $data['kabupaten']; ?></td>
                                <td class="text-center py-1 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?= site_url('kades/viewData?data=' . $data['nik']) ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>

                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>