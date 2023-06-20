<?php
if ($_SESSION['level'] != "Admin" && $_SESSION['level'] != "Apoteker") {
    // header("location:../../error/page_403.html");  
    echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=pages/error/index.html'>";
}

// Assuming you have established a database connection and stored it in the variable $connect

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nota = $_POST['nota'];
    $waktu_order = date('Y-m-d', strtotime($_POST['waktu_order']));
    $jatuh_tempo = date('Y-m-d', strtotime($_POST['jatuh_tempo']));
    $status = $_POST['status'];
    $bayar = $_POST['bayar'];
    $sisa = $_POST['sisa'];

    // Insert the data into tb_beli
    $query = "INSERT INTO tb_beli (nota, tgl, jatuh_tempo, status, bayar, sisa) VALUES ('$nota', '$waktu_order', '$jatuh_tempo', '$status', '$bayar', '$sisa')";
    $result = mysqli_query($connect, $query);

    if ($result) {
        // Data inserted successfully, you can redirect or show a success message
        // Redirect to the page where you want to display the data
        header("Location: home?p=pembelian");
        exit();
    } else {
        // Error occurred during data insertion, you can redirect or show an error message
        $error_message = "Error: " . mysqli_error($connect);
    }
}
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Pembelian</h6>
    </div>
    <div class="card-body">
        <?php if (isset($error_message)) { ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php } ?>
        <form method="POST" action="home?p=pembelian">
            <div class="form-group">
                <label for="nota">No. Nota:</label>
                <input type="text" class="form-control" id="nota" name="nota" required>
            </div>
            <div class="form-group">
                <label for="waktu_order">Waktu Order:</label>
                <input type="date" class="form-control" id="waktu_order" name="waktu_order" required>
            </div>
            <div class="form-group">
                <label for="jatuh_tempo">Jatuh Tempo:</label>
                <input type="date" class="form-control" id="jatuh_tempo" name="jatuh_tempo" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" class="form-control" id="status" name="status" required>
            </div>
            <div class="form-group">
                <label for="bayar">Bayar:</label>
                <input type="text" class="form-control" id="bayar" name="bayar" required>
            </div>
            <div class="form-group">
                <label for="sisa">Sisa:</label>
                <input type="text" class="form-control" id="sisa" name="sisa" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
