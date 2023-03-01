<div class="row">
    <div class="col-md-12">
        <div>
            <h3>Data Parkir</h3>
        </div>
        <table id="table1" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Jenis Kendaraan</th>
                    <th>Plat Nomor</th>
                    <th>Jam masuk</th>
                    <th>Jam Keluar</th>
                    <th>Harga</th>
                    <th>.</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($dataParkir as $key) {
                ?>
                <tr>
                    <td><?=$key->jenis_kendaraan?></td>
                    <td><?=$key->plat_nomor?></td>
                    <td><?=$key->jam_masuk?></td>
                    <td><?=$key->jam_keluar?></td>
                    <td><?=number_format($key->harga, 0, 0)?></td>
                    <td>
                        <a href="<?=base_url()?>admin/parkir/keluar/<?=$key->id_transaksi?>">
                            <button class="btn btn-success">Keluar sekarang</button>
                        </a>
                        <a href="#">
                            <button class="btn btn-warning">Ubah</button>
                        </a>
                        <a href="<?=base_url()?>admin/parkir/hapus/<?=$key->id_transaksi?>">
                            <button class="btn btn-danger">Hapus</button>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#table1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false, "bSort": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#table1_wrapper .col-md-6:eq(0)');
    });
</script>