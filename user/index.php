<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="../galeri/img/j.png" type="icon">
    <title>Beranda | SMK 1 TRIPLE 'J'</title>
    <style>
        .container-custom {
    background-color: #bf00ff; /* Warna latar belakang */
    padding: 20px; /* Padding di sekitar konten */
    margin-top: 50px; /* Jarak dari atas halaman */
    border-radius: 10px; /* Radius border */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Shadow */
    color: white; /* Warna teks */
}

.footer {
    display: flex;
    justify-content: space-between;
}

.maps {
    flex: 3; /* Menyusun peta agar mengisi sisa ruang yang tersedia */
    margin-right: 20px; /* Jarak antara peta dan info kontak */
    
}

.alamat {
    flex: 2; /* Menyusun info kontak agar lebih lebar dari peta */
}

.wrapper-contact {
    margin-top: 20px; /* Jarak antara info kontak dan ikon */
}

.item {
    margin-bottom: 10px; /* Jarak antara setiap item kontak */
}

.item i {
    margin-right: 10px; /* Jarak antara ikon dan teks */
}

.text-center {
    text-align: center; /* Pusatkan teks pada bagian bawah */
    margin-top: 20px; /* Jarak dari teks ke bagian bawah halaman */
}

    </style>
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand d-flex align-align-item" href="#">
                <img src="../galeri/img/tj.png" height="50" width="50" alt="logo"
                    class="d-inline-block align-text-top me-3">
                <div class="profile">
                    <h4 class="my-0">SMK DIGITAL INDNESIA</h4>
                    <P class="my-0">Maju seiring perkembangan zaman</P>
                </div>
            </a>
        </div>
    </nav>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../galeri/uploads/sekolah.jpeg" class="w-100" style="height: 70vh;" alt="...">
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>


<div class="container">
        <div class="row">
            <!-- Kolom untuk foto -->
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="gambar">
                        <?php include 'data.php'; ?>
                    </div>
                </div>
            </div>
            <!-- Kolom untuk isi post -->
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="teks">
                        <?php include 'data.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="container-custom">
        <div class="footer">
            <div class="maps">
            <iframe src="https://maps.google.com/maps?q=smks 1 triple j&amp;t=&amp;z=10&amp;ie=UTF8&amp;iwloc=&amp;output=embed" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="alamat">
                <h4 class="mb-3">SMK 1 Triple "J"</h4>
                <h6>Jl. Landbow No.01, Karang Asem Barat, Kec. Citeureup, Kabupaten Bogor, Jawa Barat 16810</h6>
                <div class="wrapper-contact">
                    <div class="item"><i class="fa fa-phone" aria-hidden="true"></i>(021) 8757384</div>
                    <div class="item"><i class="fa fa-envelope"></i> <a href="mailto:smktj1@gmail.com">smktj1@gmail.com</a> </div>
                    <div class="item"><i class="fab fa-facebook-square"></i> <a href="">SMK 1 Triple &quot;J&quot; Citereup</a> </div>
                    <div class="item"><i class="fab fa-instagram"></i> <a href="">@smk_1_triple_j</a> </div>
                    
                </div>  
            </div>
        </div>
    </div>
    <div class="text-center mt-3"><h6>Copyright 2024 SMK 1 Triple J</h6></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>