<p class="text-sm mb-0 text-uppercase font-weight-bold">WATER PAYMENT</p>
<div id="filters">
  <select name="fetchval2" id="fetchval2" class="form-select form-select-sm mt-1">
    <option disabled selected>DAILY DEFAULT</option>
    <option value="pembayaranharian">DAILY PAY</option>
    <option value="bulanan">MONTHLY PAY</option>
  </select>
</div>
<h5 class="font-weight-bolder fs-6 text-warning mt-2" style="margin-left: 10px;" id="pembayaran">
  <?php
  function rupiah($angka)
  {
    $format_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $format_rupiah;
  }

  if ($newTb == "null") {
    echo "0";
  } else {
    foreach ($newTb as $row) {
      // $datai = implode($row);
      // $perkalian = $datai * 1.9;
      $perkalian = $row * 0.0019;
      echo rupiah($perkalian);
    }
  }

  ?>
</h5>

<script type="text/javascript">
  $(document).ready(function() {
    $('select[name="fetchval2"]').on('change', function() {
      let value = $(this).val();
      // console.log(value);
      // alert(value);

      $.ajax({
        url: "pembayaran.php",
        type: "POST",
        data: 'request=' + value,
        success: function(data) {
          $('#pembayaran').html(data);
          // $('select[option]')
        }
      });
    });
  });
</script>


<p class="text-success text-sm font-weight-bolder mb-0" style="margin-left: 10px;">
  <?= $tanggalhariini; ?>
</p>