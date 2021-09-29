<div class="update-status">
    <form action="updateStatus.php" method="POST">
        <p>Status</p>
        <input type="text" name="id_pengajuan" id="id_pengajuan" hidden value="<?= $data['id_pengajuan'] ?>">
        <select name="status_proposal" id="status_proposal">
            <option value="default"></option>
            <option value="diterima">diterima</option>
            <option value="ditolak">ditolak</option>
        </select>
        <input type="text" name="proposle" id="">
        <button class="btn" name="submit">Submit</button>
    </form>
</div>