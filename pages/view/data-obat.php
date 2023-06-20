<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data obat</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <div class="my-2"></div>
      <a href="#" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
        <span class="icon text-white-50">
          <i class="fas fa-folder-open"></i>
        </span>
        <span class="text"></span><strong>Tambah data</strong>
      </a>
      <p/>

      <table id="kode" class="table" width="100%" cellspacing="0" style="font-size: 12px">
        <thead>
          <tr>
            <th width="40px">Kode</th>
            <th>Nama</th>
            <th>Suplier</th>
            <th>Kategori</th>
            <th>Harga beli</th>
            <th>Harga jual</th>
            <th>Stok</th>
            <th style="text-align: center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $result = $connect->query('SELECT * FROM tb_obat');
          while ($data = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $data['kode'] . "</td>";
            echo "<td>" . $data['nama'] . "</td>";
            echo "<td>" . $data['suplierid'] . "</td>";
            echo "<td>" . $data['kategori'] . "</td>";
            echo "<td>" . $data['beli'] . "</td>";
            echo "<td>" . $data['jual'] . "</td>";
            echo "<td>" . $data['stok'] . "</td>";
            echo "<td style='text-align: center'>";
            echo "<a href='#' class='btn btn-primary btn-sm edit-btn' data-toggle='modal' data-target='#edit_modal' data-id='" . $data['kode'] . "'><i class='fas fa-edit'></i> Edit</a> ";
            echo "<a href='#' class='btn btn-danger btn-sm delete-btn' data-id='" . $data['kode'] . "'><i class='fas fa-trash'></i> Delete</a>";
            echo "</td>";
            echo "</tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
