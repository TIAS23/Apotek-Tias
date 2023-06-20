<?php

if ($_SESSION['level'] != "Admin" && $_SESSION['level'] != "Apoteker") {
    // header("location:../../error/page_403.html");  
    echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=pages/error/index.html'>";
}

// Assuming you have established a database connection and stored it in the variable $connect

$result = mysqli_query($connect, "SELECT * FROM tb_beli");

?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data obat</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="my-2"></div>
            <a href="?p=form-pembelian" class="btn btn-dark"><span class="icon text-white-50"><i class="fas fa-folder-open"></i></span><span class="text"></span><strong>Tambah data</strong></a><p />

            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="100px">No. nota</th>
                        <th>Waktu order</th>
                        <th>Jatuh tempo</th>
                        <th>Status</th>
                        <th>Bayar</th>
                        <th>Sisa</th>
                        <th style="text-align: center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($data = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $data['nota'] . "</td>";
                        echo "<td>" . $data['tgl'] . "</td>";
                        echo "<td>" . $data['jatuh_tempo'] . "</td>";
                        echo "<td>" . $data['status'] . "</td>";
                        echo "<td>" . $data['bayar'] . "</td>";
                        echo "<td>" . $data['sisa'] . "</td>";
                        echo "<td style='text-align: center'>";
                        echo "<a href='?p=form-pembelian&nota=" . $data['nota'] . "' class='btn btn-primary btn-sm edit-btn' data-id='" . $data['nota'] . "'><i class='fas fa-edit'></i> Edit</a> ";
                        echo "<a href='#' class='btn btn-danger btn-sm delete-btn' data-id='" . $data['nota'] . "'><i class='fas fa-trash'></i> Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
