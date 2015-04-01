<?php
$page_id='esc_pwm';
?>
  <div data-role="page" id="<?php echo $page_id; ?>">
    <div data-role="header">
      <a href="#esc" data-rel="back" data-transition="slide" class="ui-btn ui-corner-all ui-btn-inline">Go Back</a>
      <h1>ESC Max/Min</h1>
    </div>

    <div role="main" class="ui-content">
<div class="ui-field-contain">
  <label for="throttle_0"><a href="#p_pwm_min" data-rel="popup">ESC min:</a></label>
  <input type="number" name="throttle_0" id="throttle_0" value="<?php echo $throttle[0];?>"/>
  <label for="throttle_1"><a href="#p_inflight_threshold" data-rel="popup">Inflight threshold:</a></label>
  <input type="number" name="throttle_1" id="throttle_1" value="<?php echo $throttle[1];?>"/>
  <label for="throttle_2"><a href="#p_hover" data-rel="popup">Hover throttle:</a></label>
  <input type="number" name="throttle_2" id="throttle_2" value="<?php echo $throttle[2];?>"/>

</div>
<input type="submit" value="Save"/>
    </div>

<div data-role="popup" id="p_pwm_min">
  <p>This is a PWM value that will be fed to ESCs when throttle is at 0%.</p>
</div>
<div data-role="popup" id="p_inflight_threshold">
  <p>At this PWM value the controller PIDs will be activated. Please ensure that your motors do spin at this value.</p>
</div>
<div data-role="popup" id="p_hover">
  <p>This is a throttle at which the quadcopter should hover.</p>
</div>

  </div>
