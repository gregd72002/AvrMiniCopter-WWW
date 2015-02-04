<?php
$page_id='pid_stab';
?>
  <div data-role="page" id="<?php echo $page_id; ?>">
    <div data-role="header">
      <a href="#pid" data-rel="back" data-transition="slide" class="ui-btn ui-corner-all ui-btn-inline">Go Back</a>
      <h1>Stab PID</h1>
    </div>

    <div role="main" class="ui-content">
<div data-role="collapsible" data-collapsed="false">
<h3>Roll / Pitch</h3>
<div class="ui-field-contain">
  <label for="pids_p_2">P:</label>
  <input type="number" name="pids_p_2" id="pids_p_2" value="<?php echo $pids_p[2];?>"/>
  <label for="pids_p_3">I:</label>
  <input type="number" name="pids_p_3" id="pids_p_3" value="<?php echo $pids_p[3];?>"/>
  <label for="pids_p_4">D:</label>
  <input type="number" name="pids_p_4" id="pids_p_4" value="<?php echo $pids_p[4];?>"/>
  <label for="pids_p_0">Max value:</label>
  <input type="number" name="pids_p_0" id="pids_p_0" value="<?php echo $pids_p[0];?>"/>
  <label for="pids_p_1">Max Ki term:</label>
  <input type="number" name="pids_p_1" id="pids_p_1" value="<?php echo $pids_p[1];?>"/>
</div>
</div>
<div data-role="collapsible" data-collapsed="false">
<h3>Yaw</h3>
<div class="ui-field-contain">
  <label for="pids_y_2">P:</label>
  <input type="number" name="pids_y_2" id="pids_y_2" value="<?php echo $pids_y[2];?>"/>
  <label for="pids_y_3">I:</label>
  <input type="number" name="pids_y_3" id="pids_y_3" value="<?php echo $pids_y[3];?>"/>
  <label for="pids_y_4">D:</label>
  <input type="number" name="pids_y_4" id="pids_y_4" value="<?php echo $pids_y[4];?>"/>
  <label for="pids_y_0">Max value:</label>
  <input type="number" name="pids_y_0" id="pids_y_0" value="<?php echo $pids_y[0];?>"/>
  <label for="pids_y_1">Max Ki term:</label>
  <input type="number" name="pids_y_1" id="pids_y_1" value="<?php echo $pids_y[1];?>"/>
</div>
</div>
<input type="submit" value="Save"/>
    </div>

  </div>
