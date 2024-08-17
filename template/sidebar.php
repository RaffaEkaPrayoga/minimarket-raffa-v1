<?php 
$multiuser = new Multiuser($conn); 
?>
 
<div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?=$base_url?>index.php">Minimarket Raffa</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?=$base_url?>index.php">Market</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item">
                <a href="<?=$base_url?>index.php?page=dashboard" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>
              <?php 
              $userData = $multiuser->getUserData();
              if ($userData['level'] != 3) { ?>
              <li class="menu-header">Penjualan Barang</li>
              <li class="nav-item">
                <a href="<?=$base_url?>index.php?page=transaksi" class="nav-link"><i class="fas fa-laptop"></i><span>Transaksi</span></a>
              </li>
              <?php if ($userData['level'] == 1) { ?>
              <li class="menu-header">Pembelian Barang</li>
              <li class="nav-item dropdown">
                <a href="<?=$base_url?>index.php?page=suplier" class="nav-link has-dropdown " data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Suplier</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link " href="<?=$base_url?>index.php?page=suplier">Data Suplier</a></li>
                  <li><a class="nav-link " href="<?=$base_url?>index.php?page=add-suplier">Tambah Suplier</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="<?=$base_url?>index.php?page=pembelian" class="nav-link has-dropdown " data-toggle="dropdown"><i class="far fa-square"></i> <span>Pembelian</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link " href="<?=$base_url?>index.php?page=pembelian">Data Pembelian</a></li>
                  <li><a class="nav-link " href="<?=$base_url?>index.php?page=add-pembelian">Tambah Pembelian</a></li>
                </ul>
              </li>
              <?php 
                }
              } ?>

              <li class="menu-header">Data Barang</li>
              <li class="nav-item"><a class="nav-link" href="<?=$base_url?>index.php?page=kategori"><i class="fas fa-th-large"></i> <span>Kategori</span></a></li>
              <li class="nav-item">
                <a href="<?=$base_url?>index.php?page=produk" class="nav-link"><i class="fas fa-th"></i> <span>Produk</span></a>
              </li>
              <li class="menu-header">Data Pelangan</li>
              <li class="nav-item">
                <a href="<?=$base_url?>index.php?page=pelanggan" class="nav-link"><i class="far fa-user"></i> <span>Pelanggan</span></a>
              </li>

              <?php 
              if ($userData['level'] != 3) { ?>
              <li class="menu-header">Laporan</li>
              <li class="nav-item">
               <a href="<?=$base_url?>index.php?page=laporan" class="nav-link"><i class="far fa-file-alt"></i> <span>Laporan</span></a>
               </li>
              </li>
              <?php } ?>
            </ul>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="https://instagram.com/raffaekaprayoga" target="_blank" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-instagram"></i> Instagram Saya
              </a>
            </div>
        </aside>
      </div>