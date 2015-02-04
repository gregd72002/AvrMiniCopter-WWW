<?php
$page_id='esc_pin';
?>
  <div data-role="page" id="<?php echo $page_id; ?>">
    <div data-role="header">
      <a href="#esc" data-rel="back" data-transition="slide" class="ui-btn ui-corner-all ui-btn-inline">Go Back</a>
      <h1>ESC Pins</h1>
    </div>

    <div role="main" class="ui-content">
<div style="text-align: center;">
<p>Motor position is relative to MPU6050/9150 based on the orientation matrix.</p>
<p>The default orientation matrix (identity matrix) assumes setup as per the diagram.</p>
<img src="motordir1.png"/>
</div>
<div class="ui-field-contain">
  <label for="name">Front-left (0) pin:</label>
  <input type="number" name="motor_pin_0" id="motor_pin_0" value="<?php echo $motor_pin[0];?>"/>
  <label for="name">Back-left (1) pin:</label>
  <input type="number" name="motor_pin_1" id="motor_pin_1" value="<?php echo $motor_pin[1];?>"/>
  <label for="name">Front-right (2) pin:</label>
  <input type="number" name="motor_pin_2" id="motor_pin_2" value="<?php echo $motor_pin[2];?>"/>
  <label for="name">Back-right (3) pin:</label>
  <input type="number" name="motor_pin_3" id="motor_pin_3" value="<?php echo $motor_pin[3];?>"/>


</div>
<div data-role="collapsible">
  <h3>MPU orientation</h3>
  <p>When pitching forwards the pitch quaternion should increase</p>
  <p>When rolling right the roll quaternion should increase</p>
  <p>When yawing right the yaw quaternion should decrease</p>
  <p>If inverted is set to '1' the pitch and roll will toggle sign. Otherwise set it to 0.</p>
<div class="ui-field-contain">

<label for="mpu_pos">Inverted:</label>
<input type="number" name="mpu_pos" id="mpu_pos" value="<?php echo $mpu_pos;?>"/>

    </div>
    </div>
<input type="submit" value="Save"/>
    </div>

  </div>
