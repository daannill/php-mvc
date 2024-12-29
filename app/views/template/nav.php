<nav class="navbar bg-primary navbar-expand-lg" data-bs-theme="dark">
  <div class="container-fluid mx-4">
    <a class="navbar-brand" href="<?= BASEURL ?>/">My Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?= $data == 'home' ? 'active' : ''; ?>" aria-current="page" href="<?= BASEURL ?>/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $data == 'mahasiswa' ? 'active' : ''; ?>" href="<?= BASEURL ?>/mahasiswa/">Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= $data == 'about' ? 'active' : ''; ?>" href="<?= BASEURL ?>/about/">About</a>
        </li>
      </ul>
    </div>
  </div>
</nav>