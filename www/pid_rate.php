<?php
$page_id='pid_rate';
?>
  <div data-role="page" id="<?php echo $page_id; ?>">
    <div data-role="header">
      <a href="#pid" data-rel="back" data-transition="slide" class="ui-btn ui-corner-all ui-btn-inline">Go Back</a>
      <h1>Rate PID</h1>
    </div>

    <div role="main" class="ui-content">
<div class="ui-field-contain">
  <label for="acro_p">Acro_P:</label>
  <input type="number" name="acro_p" id="acro_p" value="<?php echo $acro_p;?>"/>
</div>
<div data-role="collapsible" data-collapsed="false">
<h3>Roll / Pitch</h3>
<div class="ui-field-contain">
  <label for="pidr_p_2">P:</label>
  <input type="number" name="pidr_p_2" id="pidr_p_2" value="<?php echo $pidr_p[2];?>"/>
  <label for="pidr_p_3">I:</label>
  <input type="number" name="pidr_p_3" id="pidr_p_3" value="<?php echo $pidr_p[3];?>"/>
  <label for="pidr_p_4">D:</label>
  <input type="number" name="pidr_p_4" id="pidr_p_4" value="<?php echo $pidr_p[4];?>"/>
  <label for="pidr_p_0"><a href="#p_pid_max" data-rel="popup">Max value:</a></label>
  <input type="number" name="pidr_p_0" id="pidr_p_0" value="<?php echo $pidr_p[0];?>"/>
  <label for="pidr_p_1"><a href="#p_pid_imax" data-rel="popup">Max Ki term:</a></label>
  <input type="number" name="pidr_p_1" id="pidr_p_1" value="<?php echo $pidr_p[1];?>"/>
</div>
<div style="text-align: center;"><p>For asymetric quadcopters please edit config file manually.</p></div>
</div>
<div data-role="collapsible" data-collapsed="false">
<h3>Yaw</h3>
<div class="ui-field-contain">
  <label for="pidr_y_2">P:</label>
  <input type="number" name="pidr_y_2" id="pidr_y_2" value="<?php echo $pidr_y[2];?>"/>
  <label for="pidr_y_3">I:</label>
  <input type="number" name="pidr_y_3" id="pidr_y_3" value="<?php echo $pidr_y[3];?>"/>
  <label for="pidr_y_4">D:</label>
  <input type="number" name="pidr_y_4" id="pidr_y_4" value="<?php echo $pidr_y[4];?>"/>
  <label for="pidr_y_0"><a href="#p_pid_max" data-rel="popup">Max value:</a></label>
  <input type="number" name="pidr_y_0" id="pidr_y_0" value="<?php echo $pidr_y[0];?>"/>
  <label for="pidr_y_1"><a href="#p_pid_imax" data-rel="popup">Max Ki term:</a></label>
  <input type="number" name="pidr_y_1" id="pidr_y_1" value="<?php echo $pidr_y[1];?>"/>
</div>
</div>
<input type="submit" value="Save"/>
    </div>

<div data-role="popup" id="p_pid_max">
  <p>Rate pid will be constraint by this value. Default: 500</p>
</div>
<div data-role="popup" id="p_pid_imax">
  <p>Ki term of Rate pid will be limitted to this value. Default: 50</p>
</div>

  </div>
