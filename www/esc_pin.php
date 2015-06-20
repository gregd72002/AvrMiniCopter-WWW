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
  <label for="motor_pin_0">pin 9:</label>
  <select name="motor_pin_0" id="motor_pin_0">
    <option value="0">0: Front-left (FL)</option>
    <option value="1">1: Back-left (BL)</option>
    <option value="2">2: Front-right (FR)</option>
    <option value="3">3: Back-right (BR)</option>
  </select>
  <label for="motor_pin_1">pin 3:</label>
  <select name="motor_pin_1" id="motor_pin_1">
    <option value="0">0: Front-left (FL)</option>
    <option value="1">1: Back-left (BL)</option>
    <option value="2">2: Front-right (FR)</option>
    <option value="3">3: Back-right (BR)</option>
  </select>
  <label for="motor_pin_2">pin 6:</label>
  <select name="motor_pin_2" id="motor_pin_2">
    <option value="0">0: Front-left (FL)</option>
    <option value="1">1: Back-left (BL)</option>
    <option value="2">2: Front-right (FR)</option>
    <option value="3">3: Back-right (BR)</option>
  </select>
  <label for="motor_pin_3">pin 5:</label>
  <select name="motor_pin_3" id="motor_pin_3">
    <option value="0">0: Front-left (FL)</option>
    <option value="1">1: Back-left (BL)</option>
    <option value="2">2: Front-right (FR)</option>
    <option value="3">3: Back-right (BR)</option>
  </select>

Calculated motor order: <span id="motor_order"></span>

</div>
<div data-role="collapsible">
  <h3>MPU orientation matrix</h3>
  <p>When pitching forwards the pitch should increase</p>
  <p>When rolling right the roll should increase</p>
  <p>When yawing right the yaw should decrease</p>
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

function calculateMotorOrder() {
	var v = 0;
	v = v | ($("select#motor_pin_0").val());
	v = v | ($("select#motor_pin_1").val() << 2);
	v = v | ($("select#motor_pin_2").val() << 4);
	v = v | ($("select#motor_pin_3").val() << 6);

	$("span#motor_order").text(v);
}

$("select#motor_pin_0").change(function() { calculateMotorOrder(); } );
$("select#motor_pin_1").change(function() { calculateMotorOrder(); } );
$("select#motor_pin_2").change(function() { calculateMotorOrder(); } );
$("select#motor_pin_3").change(function() { calculateMotorOrder(); } );

$("select#motor_pin_0").val(<?php echo $motor_pin[0]; ?>);
$("select#motor_pin_1").val(<?php echo $motor_pin[1]; ?>);
$("select#motor_pin_2").val(<?php echo $motor_pin[2]; ?>);
$("select#motor_pin_3").val(<?php echo $motor_pin[3]; ?>);

calculateMotorOrder();


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
