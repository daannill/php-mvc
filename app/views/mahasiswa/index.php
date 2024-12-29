<div class="container">

    <?= Flasher::getMessage() ?>

    <button type="button" class="btn btn-primary mt-3 mb-3 tambah" data-bs-toggle="modal" data-bs-target="#tambahMahasiswa">
        Tambah Mahasiswa
    </button>

    <div class="input-group mb-3">
        <input type="search" class="form-control" id="searchbox" placeholder="Search...">
        <button class="btn btn-outline-primary" type="button" id="search">Search</button>
    </div>


    <table class="table">
        <thead>
            <tr>
                <th class="col-10">Nama</th>
                <th>Detail</th>
                <th>Ubah</th>
                <th>Hapus</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $mhs) : ?>
                <tr>
                    <td><?= $mhs['nama'] ?></td>
                    <td><a href="<?= BASEURL ?>/mahasiswa/detail/<?= $mhs['id'] ?>">Detail</a></td>
                    <td><a href="" class="btn-ubah" data-bs-toggle="modal" data-bs-target="#tambahMahasiswa" data-id="<?= $mhs['id'] ?>">Ubah</a></td>
                    <td><a href="<?= BASEURL ?>/mahasiswa/hapus/<?= $mhs['id'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="tambahMahasiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 judul" id="exampleModalLabel">Tambah Mahasiwa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id='modal' action="<?= BASEURL ?>/mahasiswa/tambah" method="post">
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Jurusan</label>
                <select class="form-control" id="jurusan" name="jurusan">
                    <option selected>Choose...</option>
                    <option value="Teknik Informatika">Teknik Informatika</option>
                    <option value="Sistem Informasi">Sistem Informasi</option>
                    <option value="Teknik Komputer">Teknik Komputer</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-primary tombol">Tambah</button>
        </div>
        </form>
    </div>
  </div>
</div>