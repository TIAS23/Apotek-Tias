<?php
session_start();

$get_level = $_SESSION['level'];

if ($get_level == 'admin') {
    $table = 'tb_obat';
} else {
    $table = 'tb_obat';
}

$primaryKey = 'kode';

$columns = array(
    array('db' => 'kode', 'dt' => 0),
    array('db' => 'nama', 'dt' => 1),
    array('db' => 'suplierid', 'dt' => 2),
    array('db' => 'kategori', 'dt' => 3),
    array(
        'db'        => 'beli',
        'dt'        => 4,
        'formatter' => function ($d, $row) {
            return 'Rp. ' . number_format($d);
        }
    ),
    array(
        'db'        => 'jual',
        'dt'        => 5,
        'formatter' => function ($d, $row) {
            return 'Rp. ' . number_format($d);
        }
    ),
    array(
        'db'        => 'stok',
        'dt'        => 6,
        'formatter' => function ($d, $row) {
            return number_format($d);
        }
    ),
    array(
        'db'        => 'kode',
        'dt'        => 7,
        'formatter' => function ($d, $row) {
            $id = $row['kode']; // Ambil nilai kode dari baris data
            return '
                <a href="action/action?kode=' . $d . '&amp;act=del-obat" class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></a>
                <a href="#edit_modal" class="btn btn-dark btn-sm" data-toggle="modal" data-id="' . $id . '"><span class="fa fa-edit"></span></a>';
        }
    )
);

$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'db_apotek',
    'host' => 'localhost'
);

require('ssp.class.php');

$db = new mysqli($sql_details['host'], $sql_details['user'], $sql_details['pass'], $sql_details['db']);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Retrieve table columns using a SQL query
$query = "SHOW COLUMNS FROM $table";
$result = $db->query($query);
$columns = array();
while ($row = $result->fetch_assoc()) {
    $columns[] = array('db' => $row['Field'], 'dt' => count($columns));
}

$primaryKey = isset($primaryKey) ? $primaryKey : $columns[0]['db'];
$data = SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns);

echo json_encode($data);
?>
