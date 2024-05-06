<?php
include 'koneksi.php';
session_start();
if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $status = $_POST['status'];
    $kategori_judul = $_POST['kategori']; //ambil judul kategori dari form

    // Cari ID kategori berdasarkan judul kategori
    $query_kategori = "SELECT id FROM kategori WHERE judul = ?";
    $stmt_kategori = $conn->prepare($query_kategori);
    $stmt_kategori->bind_param("s", $kategori_judul);
    $stmt_kategori->execute();
    $result_kategori = $stmt_kategori->get_result();
    $row_kategori = $result_kategori->fetch_assoc();
    $kategori_id = $row_kategori['id'];

    $petugas_id = $_POST['petugas'];
    $isi = $_POST['isi'];

    // Check if the post already exists
    $query_check = "SELECT * FROM posts WHERE judul = ?";
    $stmt_check = $conn->prepare($query_check);
    $stmt_check->bind_param("s", $judul);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();
    if ($result_check->num_rows > 0) {
        echo "<script>alert('Woops! judul Sudah Terdaftar.')</script>";
    } else {
        // Insert the post into the database
        $query_insert = "INSERT INTO posts (judul, status, kategori_id, petugas_id, isi) VALUES (?, ?, ?, ?, ?)";
        $stmt_insert = $conn->prepare($query_insert);
        $stmt_insert->bind_param("ssiss", $judul, $status, $kategori_id, $petugas_id, $isi);
        if ($stmt_insert->execute()) {
            echo "<script>alert('Post Berhasil di Tambahkan')</script>";
            $judul = "";
            $status = "";
            $kategori_id = "";
            $petugas_id = "";
            $isi = "";
        } else {
            echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
        }
    }
   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SMK 1 TRIPLE J</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/j.png">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include 'sidebar.php'; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php include 'navbar.php'; ?>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 font-weight-bold mb-0 text-gray-800">Add Post</h1>
                    </div>
                    <div class="row">
                        <!-- Area Chart -->
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Body -->
                                <div class="card-body">
    <form method="POST" action="#">
        <h5 class="m-2 font-weight-bold text-primary">Judul</h5>
        <input type="text" class="form-control bg-light border-1 small" placeholder="Masukan data" name="judul" required>
        
        <label class="m-2 font-weight-bold text-primary">Kategori</label>
        <select class="form-control" name="kategori" id="kategori" required>
            <option value="">Pilih Kategori</option>
            <?php 
            include 'koneksi.php';
            $sql = mysqli_query($conn, "SELECT * FROM kategori") or die (mysqli_error($conn));
            while ($data = mysqli_fetch_array($sql)) {
                echo '<option value="'.$data['judul'].'">'.$data['judul'].'</option>';
            } 
            ?>
        </select>
        
        <label class="m-2 font-weight-bold text-primary">Isi</label>
        <textarea name="isi" class="form-control" rows="5" required></textarea> <!-- Set rows="5" agar textarea bisa menampilkan beberapa baris secara default -->
        
        <label class="m-2 font-weight-bold text-primary">Petugas</label>
                                <?php
                                    if(isset($_SESSION['username'])) {
                                        $id = $_SESSION['username'];
                                        $query = "SELECT * FROM petugas WHERE username = '$id'";
                                        $default_petugas_id = $_SESSION['username'];
                                    ?>
                                    <input type="text" class="form-control bg-light border-1 small" placeholder="petugas" name="petugas" value="<?php echo $default_petugas_id; ?>" required readonly>
                                    <?php
                                    } else {
                                        // Tangani jika admin belum login
                                        echo 'Silakan login sebagai admin untuk menggunakan fitur ini.';
                                    }
                                    ?>
        
        <div class="form-group mb-2">
            <label class="m-2 font-weight-bold text-primary" for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="">Pilih Status</option>
                <option value="publish">Publish</option>
                <option value="draft">Draft</option>
            </select>
        </div>
        
        <button name="submit" class="btn btn-primary btn-md mb-3 mt-3">Tambah data</button>
        <a href="post.php" class="btn btn-secondary">
            <span class="text">Kembali</span>
        </a>
    </form>
</div>
<!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
