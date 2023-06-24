<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css" integrity="sha512-CpIKUSyh9QX2+zSdfGP+eWLx23C8Dj9/XmHjZY2uDtfkdLGo0uY12jgcnkX9vXOgYajEKb/jiw67EYm+kBf+6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.4/chartist.min.css" integrity="sha512-V0+DPzYyLzIiMiWCg3nNdY+NyIiK9bED/T1xNBj08CaIUyK3sXRpB26OUCIzujMevxY9TRJFHQIxTwgzb0jVLg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION['status']) != "login") {
        header("location:/zenius2/admin");
    }
    if (isset($_POST['submit'])) {
        session_destroy();
        header("location:/zenius2/admin/index.php");
    }
    ?>
    
    <nav class="navbar navbar-expand-lg bg-light p-3">
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-md-nowrap justify-content-between">
            <a class="navbar-brand" href="#">
                ADMIN PANEL
            </a>
            <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="col-12 col-md-4 col-lg-2">
            <input class="form-control form-control-dark" type="text" placeholder="Search" aria-labels="Search">
        </div>
        <div class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">
          <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Selamat Datang, <?php echo($_SESSION['username']) ?>
            </a>
            <ul class="dropdown-menu">
                    <li>
                        <form id="logout_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <button class="dropdown-item" type="submit" name="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md- col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky">
                    <ul class="nav flex-coloumn">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/zenius2/admin">
                                <i class="fa-solid fa-home px-2"></i>
                                <span>Beranda</span>
                            </a>
                        </li>
                        <ul class="nav flex-coloumn">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/zenius2/admin/users">
                                    <i class="fa-solid fa-user px-2"></i>
                                    <span>Pengguna</span>
                                </a>
                            </li>
                            <ul class="nav flex-coloumn">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">
                                        <i class="fa-solid fa-plane px-2"></i>
                                        <span>Pesawat</span>
                                    </a>
                                </li>
                                <ul class="nav flex-coloumn">
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="#">
                                            <i class="fa-solid fa-plane-departure px-2"></i>
                                            <span>Penerbangan</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Overview</li>
                    </ol>
                </nav>
                <h1 class="h2">Beranda</h2>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit</p>

                <div class="row my-4">
                    <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="card">
                            <h5 class="card-header">Data 1</h5>
                            <div class="card-body">
                                <h5 class="card-title">Deskripsi</h5>
                                <p class="card-text">Lore, ipsum dolor</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="card">
                            <h5 class="card-header">Data 2</h5>
                            <div class="card-body">
                                <h5 class="card-title">Deskripsi</h5>
                                <p class="card-text">Lore, ipsum dolor</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="card">
                            <h5 class="card-header">Data 3</h5>
                            <div class="card-body">
                                <h5 class="card-title">Deskripsi</h5>
                                <p class="card-text">Lore, ipsum dolor</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <div class="card">
                            <h5 class="card-header">Data 4</h5>
                            <div class="card-body">
                                <h5 class="card-title">Deskripsi</h5>
                                <p class="card-text">Lorem, ipsum dolor</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 m-lg-0">
                        <div class="card">
                            <h5 class="card-header">Data Penerbangan</h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nomor Penerbangan</th>
                                                <th scope="col">Pesawat</th>
                                                <th scope="col">Waktu Penerbangan</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">537</th>
                                                <td>Boeing 737 (A320)</td>
                                                <td>1 Agustus 2022 (05:00)</td>
                                                <td><a href="#" class="btn btn-sm btn-primary">Lihat</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">078</th>
                                                <td>Boeing 737 (A330)</td>
                                                <td>1 Agustus 2022 (09:10)</td>
                                                <td><a href="#" class="btn btn-sm btn-primary">Lihat</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">235</th>
                                                <td>Boeing 737 (A340)</td>
                                                <td>1 Agustus 2022 (12:00)</td>
                                                <td><a href="#" class="btn btn-sm btn-primary">Lihat</a></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">467</th>
                                                <td>Boeing 737 (A120)</td>
                                                <td>1 Agustus 2022 (15:30)</td>
                                                <td><a href="#" class="btn btn-sm btn-primary">Lihat</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="#" class="btn btn-primary btn-light">Lihat Semua</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="card">
                            <h5 class="card-header">Data Penerbangan</h5>
                            <div class="card-body">
                                <div id="flight-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <footer class="pt-5 d-flex justify-content-between">
                    <span>Copyright @ 2022 <a href="#">Garuda Airlines</a></span>
                    <ul class="nav m-0">
                        <li class="nav-link text-secondary" href="#">Hubungi Kami</li>
                    </ul>
                </footer>
            </main>
        </div>
    </div>
    <?php
    unset($_SESSION['error']);
    ?>

<script>
      new Chartist.Line('#flight-chart', {
        labels: ['Jan','Feb','Mar','Apr','Mei','Jun'],
        series: [
          [288,250,193,349,567,646]
        ]
      });
    </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.4/chartist.min.js" integrity="sha512-9rxMbTkN9JcgG5euudGbdIbhFZ7KGyAuVomdQDI9qXfPply9BJh0iqA7E/moLCatH2JD4xBGHwV6ezBkCpnjRQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>