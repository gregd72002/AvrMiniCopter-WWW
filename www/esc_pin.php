<?php
$page_id='esc_pin';
?>

<style>
.mpu {
vertical-align: middle;
}
</style>
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
<div style="position: relative;">
<img src="mpu.png" class="mpu"/>
<img src="axis.png" class="mpu" style="position: absolute; padding: 10px;"/>
</div>
</div>
<div class="ui-grid-a">
	<div class="ui-block-a"><button class="rotate" value="-90">Counter-clockwise</button></div>
	<div class="ui-block-b"><button class="rotate" value="+90">Clockwise</button></div>
</div>
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
  <h3>MPU orientation matrix</h3>
  <p>When pitching forwards the pitch quaternion should increase</p>
  <p>When rolling right the roll quaternion should increase</p>
  <p>When yawing right the yaw quaternion should decrease</p>
  <p>To toggle pitch change the sign of first column (i.e. from 1 to -1)</p>
  <p>To toggle roll change sign of second column (i.e. from 1 to -1)</p>
  <p>This is a 3x3 matrix. The top-left item is identified as 0,0. Please refer to MPU6050/6150 driver source code.</p>
<div class="ui-field-contain">
	<div class="ui-grid-b">
		<div class="ui-block-a"><input type="number" class="gyro_orient" name="gyro_orient_0" id="gyro_orient_0" value="<?php echo $gyro_orient[0];?>"/></div>
		<div class="ui-block-b"><input type="number" class="gyro_orient" name="gyro_orient_1" id="gyro_orient_1" value="<?php echo $gyro_orient[1];?>"/></div>
		<div class="ui-block-c"><input type="number" class="gyro_orient" name="gyro_orient_2" id="gyro_orient_2" value="<?php echo $gyro_orient[2];?>"/></div>

		<div class="ui-block-a"><input type="number" class="gyro_orient" name="gyro_orient_3" id="gyro_orient_3" value="<?php echo $gyro_orient[3];?>"/></div>
		<div class="ui-block-b"><input type="number" class="gyro_orient" name="gyro_orient_4" id="gyro_orient_4" value="<?php echo $gyro_orient[4];?>"/></div>
		<div class="ui-block-c"><input type="number" class="gyro_orient" name="gyro_orient_5" id="gyro_orient_5" value="<?php echo $gyro_orient[5];?>"/></div>

		<div class="ui-block-a"><input type="number" class="gyro_orient" name="gyro_orient_6" id="gyro_orient_6" value="<?php echo $gyro_orient[6];?>"/></div>
		<div class="ui-block-b"><input type="number" class="gyro_orient" name="gyro_orient_7" id="gyro_orient_7" value="<?php echo $gyro_orient[7];?>"/></div>
		<div class="ui-block-c"><input type="number" class="gyro_orient" name="gyro_orient_8" id="gyro_orient_8" value="<?php echo $gyro_orient[8];?>"/></div>
	</div>
</div>
</div>
<input type="submit" value="Save"/>
    </div>

  </div>
<script>

$(".rotate").click(function(event) {
	event.preventDefault();
	deg -=parseInt($(this).attr("value"));
	deg = deg % 360;
	//$(".mpu").each().css("transform", "rotate("+deg+"deg)");
	rad=deg*Math.PI / 180;
	$("#gyro_orient_0").val(Math.round(Math.cos(rad)));
	$("#gyro_orient_1").val(-Math.round(Math.sin(rad)));
	$("#gyro_orient_3").val(Math.round(Math.sin(rad)));
	$("#gyro_orient_4").val(Math.round(Math.cos(rad)));
	updateImageOrientation();
});
$(".gyro_orient").change(function() {
	updateImageOrientation();
});

updateImageOrientation = function() {
	$(".mpu").each(function(){
		$(this).css("transform", "matrix("+$("#gyro_orient_0").val()+","+$("#gyro_orient_1").val()+","+$("#gyro_orient_3").val()+","+$("#gyro_orient_4").val()+",0,0)");
	});
}

updateImageOrientation();
var deg = Math.atan2($("#gyro_orient_3").val(), $("#gyro_orient_0").val())*180/Math.PI;

</script>