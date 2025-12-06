<p class="text-sm mb-0 text-uppercase font-weight-bold">Water Usage
<div id="filters">
  <select name="fetchval" id="fetchval" class="form-select form-select-sm mt-1">
    <option disabled selected>DAILY DEFAULT</option>
    <option value="harian">DAILY</option>
    <option value="bulan">MONTHLY</option>
  </select>
</div>
</p>
<h5 class="font-weight-bolder text-primary" style="margin-left: 10px; margin-top: -10px;" id="water">
  <?php
  foreach ($newTb as $row1) {
    if (!$row1 == 0) {
      echo $row1;
    } else {
      echo $row1 = 0;
    }
  }
  // } 
  ?>
  Ml
</h5>

  


<p class="mb-0 text-success text-sm font-weight-bolder" style="margin-left: 10px; margin-top: -5px;">
  <?= $tanggalhariini; ?>
</p>