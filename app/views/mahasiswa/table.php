<thead>
    <tr>
        <th class="col-10">Nama</th>
        <th>Detail</th>
        <th>Ubah</th>
        <th>Hapus</th>
    </tr>
</thead>
<tbody>
    <?php if( !empty($data) ) : ?>
        
        <?php foreach($data as $mhs) : ?>
            <tr>
                <td><?= $mhs['nama'] ?></td>
                <td><a href="<?= BASEURL ?>/mahasiswa/detail/<?= $mhs['id'] ?>">Detail</a></td>
                <td><a href="" class="btn-ubah" data-bs-toggle="modal" data-bs-target="#tambahMahasiswa" data-id="<?= $mhs['id'] ?>">Ubah</a></td>
                <td><a href="<?= BASEURL ?>/mahasiswa/hapus/<?= $mhs['id'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a></td>
            </tr>
        <?php endforeach; ?>
    
    <?php else: ?>
        <tr>
            <td>
                <h5>Data tidak ditemukan</h5>
            </td>
        </tr>
    <?php endif; ?>
</tbody>