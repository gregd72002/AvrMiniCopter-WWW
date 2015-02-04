  <div data-role="page" id="esc">
    <div data-role="header">
      <a href="#mainmenu" data-rel="back" data-transition="slide" class="ui-btn ui-corner-all ui-btn-inline">Go Back</a>
      <h1>ESC</h1>
    </div>

    <div role="main" class="ui-content">
<a href="#esc_pwm" data-transition="slide" class="ui-btn ui-corner-all">ESC Max/Min</a>
<a href="#esc_pin" data-transition="slide" class="ui-btn ui-corner-all">PWM Pins</a>
    </div>


  </div>
<?php
@include "esc_pwm.php";
@include "esc_pin.php";
//@include "esc_test.php";
?>
