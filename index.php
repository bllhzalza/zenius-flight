<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css" integrity="sha512-CpIKUSyh9QX2+zSdfGP+eWLx23C8Dj9/XmHjZY2uDtfkdLGo0uY12jgcnkX9vXOgYajEKb/jiw67EYm+kBf+6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.2/font/bootstrap-icons.min.css" integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>TUGAS UI</title>
    <style>
@import url('http://fonts.cdnfonts.com/css/gilroy-bold');
      body {
            background: #f7f7f7;
        }
        .title {
            color: #0275d8;
            margin-bottom: 0px;
            font-size: 50px;
            text-transform: uppercase;
            font-family: 'Gilroy-Bold', sans-serif;
        }
        .title2 {
            color: #0dcaf0;
            margin-bottom: 0px;
            font-size: 40px;
            text-transform: uppercase;
            font-family: 'Gilroy-Bold', sans-serif;
        }
        .btn-contohtombol1 {
            background-color: #0275d8;
            color: #FFFFFF;
            font-family: century gothic;
            border: 0px;
            text-align: center;
            width: 150px;
            height: 40px;
        }
        .btn-contohtombol2 {
            background-color: #000000;
            color: #FFFFFF;
            font-family: century gothic;
            border: 0px ;
            text-align: center;
            width: 150px;
            height: 40px;
            margin-left: 20px;
        }
        .carousel-wrapper {
          height: 400px;
        }
      </style>
</head>
<body>
  <?php
  
  include 'connection.php';

  $sql = "SELECT reff_departure.name, reff_arrival.name as names, price, flight_number, code, type,
  date, time FROM flights
  JOIN planes ON flights.plane_id = planes.id
  JOIN reff_departure ON flights.departure_id = reff_departure.id
  JOIN reff_arrival ON flights.arrival_id = reff_arrival.id";

  if (isset($_POST['filter_submit'])){
    $filters = array();

    if ($_POST['departure']){
      array_push($filters, "flights.departure_id = ".$_POST['departure']);
    }
    if ($_POST['arrival']){
      array_push($filters, "flights.arrival_id = '".$_POST['arrival']."'");
    }

    if($filters){
      $sql .=" WHERE ";
      foreach($filters as $key => $filter) {
        $sql .= $filter;
        if (count($filters) > 1 && (count($filters) > $key+1)){
          $sql .= " AND ";
        }
      }
    }
  }

  $datas = $conn->query($sql);

  $departure_sql = "SELECT * FROM reff_departure";
  $departures = $conn->query($departure_sql);

  $arrival_sql = "SELECT * FROM reff_arrival";
  $arrivals = $conn->query($arrival_sql);

  ?>

<nav class="navbar" style="background-color: #f7f7f7">
  <div class="container">
<a class="navbar-brand" style="font-size: 35px;">
<img src="assets/pesawat.png" height="60px" width="60px">
EDU AIRLINES
      </a>
    <ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Menu 1</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Menu 2</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">
    <i class="bi bi-search"></i>
</a>
  </li>
</ul>
  </div>
</nav>

<div id="carouselExampleSlidesOnly" class="carousel" data-bs-ride="carousel">
    <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="carousel-wrapper d-flex align-items-center">
      <div class="container">
        <div class="row">
          <div class="col-8">
        <h1 class="title">Heading</h1>
        <h2 class="title2">Subtitle</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
            <button class="btn-contohtombol1">Contoh Tombol</button>
            <button class="btn-contohtombol2">Contoh Tombol</button>
        </div>
        <div class="col-4">
          <img class ="m-auto" src="assets/garudaair.jpg" style="width: 350px; height: 200px;">
        </div>
      </div>
      </div>
      </div>
      <div>
  <i class="bi bi-chevron-double-down text-center d-block" style="color: #0275d8; font-size: 40px;"></i>
</div>

<div class="container text-center p-3">
<div class="mx-3">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <div class="row justify-content-center">
  <div class="col-3 col-md-3 m-2">
    <select class="form-select rounded-pill" aria-label="Default select example" name="departure">
  <option value="">Dari</option>
  <?php foreach ($departures as $departure): ?>
    <option value="<?php echo $departure['id']; ?>" <?php echo $_POST['departure'] == $departure['id'] ? "selected" : ""; ?>>
    <?php echo $departure['name']; ?></option>
<?php endforeach; ?>
</select>
    </div>
    <div class="col-3 col-md-3 m-2">
    <select class="form-select rounded-pill" aria-label="Default select example" name="arrival">
  <option value="">Ke</option>
  <?php foreach ($arrivals as $arrival): ?>
    <option value="<?php echo $arrival['id']; ?>" <?php echo $_POST['arrival'] == $arrival['id'] ? "selected" : ""; ?>>
    <?php echo $arrival['name']; ?></option>
<?php endforeach; ?>
</select>
    </div>
    <div class="col-3 col-md-3 m-2">
    <select class="form-select rounded-pill" aria-label="Default select example">
  <option value="">Tanggal Berangkat</option>
  <?php foreach ($datas as $data): ?>
        <?php
        $date = date_create($data['date']);
        ?>
        <option value="<?php echo $data['id']; ?>"><?php echo date_format($date, "d M Y"); ?></option>
        <?php endforeach; ?>
</select>
    </div>
    <div class="col col-md-2 m-2 rounded-pill">
    <button type="submit" name="filter_submit" class="rounded-pill btn btn-primary bi bi-search" style="width: 50%"></button>
  </div>
</div>
</action>
</div>
</div>
<?php foreach ($datas as $data): ?>
        <?php
        $date = date_create($data['date']);
        $time = date_create($data['time']);
        ?>
      <div class="container text-center w-auto p-3">
        <div class="content-wrapper">
        <div class="bg-white rounded-3 mx-5">
          <div class="row justify-content-center">
          <div class="col m-3">
              <img src="assets/pesawat.png" width="100px" height="100px">
                  <p class="mb-0">Edu Airlines <br> (<?php echo $data['code']; ?> | <?php echo $data['type'] ?>)</p>
                </div>
                <div class="col-6 m-3">
                  <p>Penerbangan (<?php echo $data['flight_number']; ?>)</p>
                  <div class="d-flex justify-content
                  
                  
                  
                  
                  
                  
                  
                  
                  -center gap-5">
                    <div>
                      <h3><?php echo $data['name'] ?></h3>
                      <p> <?php echo date_format($date, "d M Y"); ?> <?php echo date_format($time, "(G:i)"); ?> </p>
                    </div>
                    <div>
                      <i class="bi bi-chevron-compact-right text-center d-block" style="font-size: 40px;"></i>
                    </div>
                    <div>
                      <h3><?php echo $data['names']; ?></h3>
                      <p> 06 Juni 2018 (04:00) </p>
                    </div>
                  </div>
                </div>
                  <div class="col-3 text-end m-3">
                    <div class="d-flex">
                      <div>
                      <ul class="list-inline">
                        <li class="list-inline-item me-0"><h3>IDR <?php echo number_format($data['price'], 0, ",", "."); ?>,-</h3></li>
                        <li class="list-inline-item">/pax</li>
                      </ul>
                        <div>
                        <button type="button" class="btn btn-primary" style="width: 50%">PILIH</button>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          
          <nav class="navbar mt-5" style="background-color: #0dcaf0">
          <div class="container py-3 p-md-3 px-3 px-md-4">
            <div class="row">
              <div class="col">
                <a class="navbar-brand" style="font-size: 20px" href="#">
                <img src="assets/pesawat.png" width="70" height="70">
                EDU AIRLINES
              </a>
              <ul class="list-unstyled">
                <li class="mt-2">088975756789</li>
                <li class="">Jakarta Barat, Indonesia</li>
              </ul>
            </div>
          </div>
          <div class="col-4">
            <p class="text-center fw-bold mt-5">© Copyright 2022 Zalzabillah. All Right Reserved</p>
          </div>
          <nav class="nav justify-content-end mb-5">
            <a class="nav-link active" aria-current="page" href="#">Menu 1</a>
            <a class="nav-link" href="#">Menu 2</a>
            <a class="nav-link" href="#">Menu 3</a>
          </nav>
        </div>
      </nav>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js" integrity="sha512-5BqtYqlWfJemW5+v+TZUs22uigI8tXeVah5S/1Z6qBLVO7gakAOtkOzUtgq6dsIo5c0NJdmGPs0H9I+2OHUHVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
</html>