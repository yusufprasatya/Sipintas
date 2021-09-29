<?php
include '../conn/koneksi.php';

?>

<div class="row">
    <div class="col s12 m9">
        <h3 class="orange-text">Pengumuman</h3>
    </div>
    <div class="col s12 m3">
        <div class="section"></div>
    </div>
</div>
<table id="example" class="display responsive-table" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>File Pengumuman</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM pengumuman");
        while ($r = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $r['tanggal']; ?></td>
                <td><?php echo $r['keterangan']; ?></td>
                <td><a target="_blank" href="view/view_pengumuman.php?id=<?php echo $r['id']; ?>">Lihat</a></td>
            </tr>
        <?php  }
        ?>
    </tbody>
</table>