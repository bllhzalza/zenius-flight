<?php
ob_start();
include "connection.php";

$sql = "SELECT reff_departure.name, reff_arrival.name as names, price, flight_number, code, type,
  date, time FROM flights
  JOIN planes ON flights.plane_id = planes.id
  JOIN reff_departure ON flights.departure_id = reff_departure.id
  JOIN reff_arrival ON flights.arrival_id = reff_arrival.id";

  $datas = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print</title>
    <style>

        td{
            text-align:center;
        }
        table,tr,th,td{
            padding: 8px 20px;
            border: 1px solid #999;
            border-collapse: collapse;
        }
        </style>
</head>
<body>
        <h2 style="text-align:center">TABEL EDU AIRLINES</h2>
    <table>
        <tr>
            <th>No. Penerbangan</th>
            <th>Pesawat</th>
            <th>Keberangkatan</th>
            <th>Kedatangan</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Harga</th>
        </tr>
        <?php foreach ($datas as $data): ?>
        <?php
        $date = date_create($data['date']);
        $time = date_create($data['time']);
        ?>
        <tr>
            <td><?php echo $data['flight_number']; ?></td>
            <td><?php echo $data['code']; ?> | <?php echo $data['type'] ?></td>
            <td><?php echo $data['name'] ?></td>
            <td><?php echo $data['names'] ?></td>
            <td><?php echo date_format($date, "d M Y"); ?></td>
            <td><?php echo date_format($time, "(G:i)"); ?></td>
            <td><?php echo number_format($data['price'], 0, ",", "."); ?></td>
        </tr>
        <?php endforeach; ?>
</table>
</body>
</html>

<?php 
require './mpdf/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => 'A4',
    'margin-top' => '25',
    'margin-bottom' => '25',
    'margin-left' => '25',
    'margin-right' => '25'
]);

$html = ob_get_contents();

ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));

$content = $mpdf->Output("Contoh.pdf", "");

?>