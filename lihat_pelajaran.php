<?php

require_once('core/init.php');
require_once('middlewares/login_middleware.php');
require_once("services/database.php");
require_once('repositories/pelajaran_repository.php');

$menus = get_menu();
$results = find_all_pelajaran();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pelajaran - Sistem Informasi Bimbel</title>
    
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <main class="flex">
        <sidebar class="side-bar primary-orange-color">
            <h3 class="side-bar-title">Selamat Datang, Admin</h3>
            <ul>
                <li class="side-bar-menu"><a href="lihat_pelajaran.php">Lihat Pelajaran</a></li>
                <li class="side-bar-menu"><a href="tambah_pelajaran.php">Tambah Pelajaran</a></li>
            </ul>
        </sidebar>

        <section class="column flex fg-1">
            <header>
                <nav class="nav-bar primary-color flex">
                    <ul class="flex">
                        <?php foreach ($menus as $menu) { ?>
                            <li class="nav-menu">
                                <a href="<?php echo $menu['link'] ?>" 
                                    class="<?php echo $menu['judul'] === 'Pelajaran' ? 'active' : ''; ?>">
                                    <?php echo $menu['judul']; ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
            </header>

            <article>
                <ul class="data">
                    <ul class="data-header">
                        <li><h4>Kode Mapel</h4></li>
                        <li><h4>Nama Mapel</h4></li>
                        <li><h4>Tingkat Pendidikan</h4></li>
                        <li><h4>Jurusan</h4></li>
                        <li><h4>Aksi</h4></li>
                    </ul>

                    <?php foreach ($results as $pelajaran) { ?>
                    <ul class="data-body">
                        <li><?php echo $pelajaran['kode_mapel']; ?></li>
                        <li><?php echo $pelajaran['nama_pelajaran']; ?></li>
                        <li><?php echo $pelajaran['tingkat_pendidikan']; ?></li>
                        <li><?php echo $pelajaran['jurusan'] ? $pelajaran['jurusan'] : "-"; ?></li>
                        <li>
                            <a href="ubah_pelajaran.php?kode=<?php echo $pelajaran['kode_mapel']; ?>" 
                                class="btn btn-data">
                                Ubah
                            </a>
                            <button class="btn btn-data" 
                                onclick="confirmDeletion('<?php echo $pelajaran['kode_mapel']; ?>')">
                                Hapus
                            </button>
                        </li>
                    </ul>
                    <?php } ?>
                </ul>
            </article>
        </section>
    </main>

    <script src="assets/js/lihat_pelajaran.js"></script>
</body>
</html>