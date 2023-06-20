<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Data Kadaluarsa</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive"><br>
      <h4 style="font-size: 24px; font-weight: bold; text-align: center;"><strong>Data Kadaluarsa</strong></h4>
      <?php $date = date('Y-m-d'); ?>
      <h5 style="font-size: 18px; font-weight: bold; text-align: center;">Priode: <?php echo tanggal_indo($date, true); ?></h5>
      <br>

      <?php $result = $connect->query("SELECT * FROM data_exp WHERE selisih > -210 ORDER BY selisih DESC"); ?>

      <table class="table" width="100%" cellspacing="0" style="font-size: 12px">
        <thead>
          <tr>
            <th width="40px" style="text-align: center;">No</th>
            <th style="text-align: center;">Kode</th>
            <th>Nama</th>
            <th>Suplier</th>
            <th style="text-align: center;">Tanggal Kadaluarsa</th>
            <th style="text-align: center;">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          while ($data = $result->fetch_object()) {
            $sel = $data->selisih;
            if ($sel >= 0) {
              $nilai = 'Kadaluarsa';
              $rowColor = '#FF0000';
            } elseif ($sel >= -180) {
              $nilai = "Akan Kadaluarsa";
              $rowColor = '#FFD700';
            } elseif ($sel >= -210) {
              $nilai = "Kadaluarsa 7 bulan mendatang";
              $rowColor = '#008000';
            } else {
              $rowColor = 'red';
              $nilai = '';
            }
          ?>
            <tr style="color: <?= $rowColor ?>;">
              <td align='center'><?= $no++ ?></td>
              <td align='center'><?= $data->kode ?></td>
              <td><?= $data->nama ?></td>
              <td><?= $data->suplierid ?></td>
              <td align='center'><?= tanggal_indo($data->expired); ?></td>
              <td align='center'><?= $nilai ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
