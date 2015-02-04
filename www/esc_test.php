<?php
$page_id='esc_test';
?>
<div data-role="page" id="<?php echo $page_id; ?>">
	<div data-role="header">
	<a href="#esc" data-rel="back" data-transition="slide" class="ui-btn ui-corner-all ui-btn-inline">Go Back</a>
	<h1>ESC Test</h1>
	</div>

<div role="main" class="ui-content">
	<div style="text-align: center;"><p>Specify the command to run.</p><p>Commands can be chained using ';' character.</div>
	<div style="text-align: center;"><p>You can also use this option to calibrate your ESCs.</p></div>
	<div style="text-align: center;"><p>r - restart AVR</p></div>
	<div style="text-align: center;"><p>s:X - sleep X seconds</p></div>
	<div style="text-align: center;"><p>a:X:Y - attach motor/esc X to pin Y</p></div>
	<div style="text-align: center;"><p>p:X:Y - send PWM signal Y to motor X (0-4)</p></div>
	<div style="text-align: center;"><p>Example: r;s:3;a:0:3;s:1;p:0:1000;s:2;p:0:1250;s:3;p:0:1000;</p></div>
	<input type="text" name="cmd" id="cmd" value=""/>
	<input type="submit" value="Test"/>
	
</div>
</div>
