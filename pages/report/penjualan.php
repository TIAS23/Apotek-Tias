<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h5 class="m-0 font-weight-bold text-primary">Laporan Penjualan</h5>
  </div><br>
  <div class="card-body">
    <form action="#" method="POST">
      <?php if (isset($_POST['cari'])) { ?>
        <div class="form-group sembunyikan" id="data-shift">
          <label class="control-label col-md-2 col-sm-3 col-xs-12">Pilih Apoteker<span class="required"></span></label>
          <div class="col-md-5 col-sm-6 col-xs-12">
            <select class="form-control" name="apoteker" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px; font-size: 14px;">
              <option disabled="" selected="">Pilih Salah Satu</option>
              <?php
              $sql = $connect->query("SELECT * FROM db_user");
              while ($data = $sql->fetch_object()) {
              ?>
                <option><?= $data->username ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Tanggal Mulai<span class="required"></span></label>
              <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="input-group">
                  <?php
                  $date = date('Y-m-01');
                  ?>
                  <input type="date" value="<?php echo isset($_POST['awal']) ? $_POST['awal'] : ''; ?>" class="form-control" name="awal" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px; font-size: 14px;">
                  <span class="input-group-btn">
                    <div class="btn btn-primary" style="border-bottom-right-radius: 5px; border-bottom-left-radius: 0px; border-top-left-radius: 0px; font-size: 14px"><span class="fa fa-calendar"></span></div>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Tanggal Akhir<span class="required"></span></label>
              <?php
              $calender = CAL_GREGORIAN;
              $bulan = date('m');
              $thn   = date('Y');
              $total = cal_days_in_month($calender, $bulan, $thn);
              $date1 = date('Y-m-' . $total);
              ?>
              <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="input-group">
                  <input type="date" class="form-control" value="<?php echo isset($_POST['akhir']) ? $_POST['akhir'] : ''; ?>" name="akhir" style="border-top-left-radius: 5px; border-bottom-left-radius: 5px; font-size: 14px;">
                  <span class="input-group-btn">
                    <div class=""></div>
                  </span>
                </div>

              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      <button type="submit" name="cari" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Cari</button>
      <a href="l-jual-print.php?awal=<?php echo urlencode($tgl_awal); ?>&amp;akhir=<?php echo urlencode($tgl_akhir); ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-print"></span> Cetak Laporan</a>
    </form>
  </div>
</div>