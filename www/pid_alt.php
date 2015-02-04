<?php
$page_id='pid_alt';
?>
  <div data-role="page" id="<?php echo $page_id; ?>">
    <div data-role="header">
      <a href="#pid" data-rel="back" data-transition="slide" class="ui-btn ui-corner-all ui-btn-inline">Go Back</a>
      <h1>Altitude PID</h1>
    </div>

    <div role="main" class="ui-content">
<p>WORK IN PROGRESS!</p>
<label for="baro_f">Baro coefficient (0-1000) higher = baro less significant</label>
<input type="number" name="baro_f" id="baro_f" value="<?php echo $baro_f;?>"/>
<div data-role="collapsible" data-collapsed="false">
<h3>Position (height)</h3>
<div class="ui-field-contain">
  <label for="pid_alt_2">P:</label>
  <input type="number" name="pid_alt_2" id="pid_alt_2" value="<?php echo $pid_alt[2];?>"/>
  <label for="pid_alt_3">I:</label>
  <input type="number" name="pid_alt_3" id="pid_alt_3" value="<?php echo $pid_alt[3];?>"/>
  <label for="pid_alt_4">D:</label>
  <input type="number" name="pid_alt_4" id="pid_alt_4" value="<?php echo $pid_alt[4];?>"/>
  <label for="pid_alt_0">Max value:</label>
  <input type="number" name="pid_alt_0" id="pid_alt_0" value="<?php echo $pid_alt[0];?>"/>
  <label for="pid_alt_1">Max Ki term:</label>
  <input type="number" name="pid_alt_1" id="pid_alt_1" value="<?php echo $pid_alt[1];?>"/>
</div>
</div>
<div data-role="collapsible" data-collapsed="false">
<h3>Velocity</h3>
<div class="ui-field-contain">
  <label for="pid_vz_2">P:</label>
  <input type="number" name="pid_vz_2" id="pid_vz_2" value="<?php echo $pid_vz[2];?>"/>
  <label for="pid_vz_3">I:</label>
  <input type="number" name="pid_vz_3" id="pid_vz_3" value="<?php echo $pid_vz[3];?>"/>
  <label for="pid_vz_4">D:</label>
  <input type="number" name="pid_vz_4" id="pid_vz_4" value="<?php echo $pid_vz[4];?>"/>
  <label for="pid_vz_0">Max value:</label>
  <input type="number" name="pid_vz_0" id="pid_vz_0" value="<?php echo $pid_vz[0];?>"/>
  <label for="pid_vz_1">Max Ki term:</label>
  <input type="number" name="pid_vz_1" id="pid_vz_1" value="<?php echo $pid_vz[1];?>"/>
</div>
</div>
<div data-role="collapsible" data-collapsed="false">
<h3>Acceleration</h3>
<div class="ui-field-contain">
  <label for="pid_accel_2">P:</label>
  <input type="number" name="pid_accel_2" id="pid_accel_2" value="<?php echo $pid_accel[2];?>"/>
  <label for="pid_accel_3">I:</label>
  <input type="number" name="pid_accel_3" id="pid_accel_3" value="<?php echo $pid_accel[3];?>"/>
  <label for="pid_accel_4">D:</label>
  <input type="number" name="pid_accel_4" id="pid_accel_4" value="<?php echo $pid_accel[4];?>"/>
  <label for="pid_accel_0">Max value:</label>
  <input type="number" name="pid_accel_0" id="pid_accel_0" value="<?php echo $pid_accel[0];?>"/>
  <label for="pid_accel_1">Max Ki term:</label>
  <input type="number" name="pid_accel_1" id="pid_accel_1" value="<?php echo $pid_accel[1];?>"/>
</div>
</div>
<input type="submit" value="Save"/>
    </div>

  </div>
