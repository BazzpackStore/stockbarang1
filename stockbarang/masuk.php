<?php
require 'function.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BARANG MASUK </title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-9" href="gambar.php">BAZZPACK OFFICIAL STORE</a>
          <!-- Navbar cetak -->
        <div class="ms-auto d-flex align-items-center">
          <button class="btn btn-light me-2" onclick="window.print()" title="Cetak Halaman">🖨️</button>
        <i class="fas fa-bars"></i>
       </button>
                    </div>
                </div>
            </div>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                      <div class="nav">
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Stock Barang
                            </a>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Barang masuk
                            </a>
                            <a class="nav-link" href="Keluar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Barang Keluar
                                <a class="nav-link" href="logout.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                LOGOUT
                            
                            </a>
                            </a>
                        </div>
                    </div>
                   
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Barang Masuk</h1>
            
                    
                        <div class="card mb-4">
                            <div class="card-header">
                  <div class="container mt-3">
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
    Masuk Bahan Baku
  </button>
</div>
                        </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Kode Supplier</th>
                                             <th>Supplier</th>
                                            <th>Nama Bahan Baku</th>
                                            <th>Jumlah</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                        $ambilsemuadatastock = mysqli_query($conn,"select * from masuk m, stock s where s.idbarang = m.idbarang");
                                        while($data=mysqli_fetch_array($ambilsemuadatastock)){
                                            $kodesupplier = $data['kodesupplier'];
                                            $idb = $data['idbarang'];
                                            $idm = $data['idmasuk']; 
                                            $tanggal = $data['tanggal'];
                                            $namabarang = $data['namabarang'];
                                            $qty = $data['qty'];
                                            $supplier = $data['supplier'];

                                            ?>
                                            <tr>
                                                <td><?=$tanggal;?></td>
                                                <td><?=$kodesupplier;?></td>
                                                <td><?=$supplier;?></td>
                                                <td><?=$namabarang;?></td>
                                                <td><?=$qty;?></td>
                                                
                                                <td>
                                                      <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?=$idm;?>">
                                               Edit
                                            </button> 
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?=$idm;?>">
                                                Delete
                                            </button>
                                        </td>
                                        </tr>

                                          <!-- Edit Modal -->
                                    <div class="modal fade" id="edit<?=$idm;?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Barang</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <form method="post"
                                        <div class="modal-body">
                                            <input type="text" name="kodesupplier" value="<?=$kodesupplier;?>" class="form-control" required>
                                            <br>
                                            <input type="text" name="namabarang" value="<?=$namabarang;?>" class="form-control" required>
                                            <br>
                                            <input type="text" name="supplier" value="<?=$supplier;?>" class="form-control" required>
                                            <br>
                                            <input type="text" name="qty" value="<?=$qty;?>" class="form-control" required>
                                            <br>
                                            <input type="hidden" name="idb" value="<?=$idb;?>">
                                            <input type="hidden" name="idm" value="<?=$idm;?>">
                                            <button type="submit" class="btn btn-primary" name="updatebarangmasuk">Edit</Button>
                                        </div>
                                        </form>

                                        </div>
                                    </div>
                                    </div>

                                     <!-- Delete Modal -->
                                    <div class="modal fade" id="delete<?=$idm;?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Hapus Barang?</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <form method="post"
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus <?=$namabarang;?>?
                                            <input type="hidden" name="idb" value="<?=$idb;?>">
                                            <input type="hidden" name="kty" value="<?=$qty;?>">
                                            <input type="hidden" name="idm" value="<?=$idm;?>">
                                            <br>
                                            <br>
                                            <button type="submit" class="btn btn-danger" name="hapusbarangmasuk">Hapus</Button>
                                        </div>
                                        </form>

                                        </div>
                                    </div>
                                    </div>
            
                                        <?php
                                           };
                                           ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                 <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-5">
                        <div class="d-flex align-items-center justify-content-between large">
                            <div class="text-muted">BAZZPACK OFFICIAL STORE</div>
                            <div>
                                 <div class="text-muted">STYLISH EVERY DAY</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
      <!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Barang Masuk</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
       <form method="post"
      <div class="modal-body">

      <select name="barangnya" class="form-control">
        <?php
            $ambilsemuadatanya = mysqli_query($conn,"select * from stock");
            while($fetcharray =mysqli_fetch_array($ambilsemuadatanya)){
                $namabarangnya = $fetcharray['namabarang'];
                $idbarangnya = $fetcharray['idbarang'];
            ?>

            <option value="<?=$idbarangnya;?>"><?=$namabarangnya;?></option>

            <?php
                  }
            ?>
         </select>
         <br>
        <input type="text" name="kodesupplier" class="form-control" placeholder="Kode Supplier" required>
        <br>
          <input type="number" name="qty" class="form-control" placeholder="Jumlah" required>
        <br>
        <input type="text" name="supplier" class="form-control" placeholder="Supplier" required>
        <br> 
        <button type="submit" class="btn btn-primary" name="barangmasuk">Submit</Button>
      </div>
    </form>

    </div>
  </div>
</div>
</html>
