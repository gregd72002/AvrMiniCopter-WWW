  <div data-role="page" id="pid">
    <div data-role="header">
      <a href="#mainmenu" data-rel="back" data-transition="slide" class="ui-btn ui-corner-all ui-btn-inline">Go Back</a>
      <h1>PID</h1>
    </div>

    <div role="main" class="ui-content">
<a href="#pid_rate" data-transition="slide" class="ui-btn ui-corner-all">Rate/Acro</a>
<a href="#pid_stab" data-transition="slide" class="ui-btn ui-corner-all">Stabilize/Auto level</a>
<a href="#pid_alt" data-transition="slide" class="ui-btn ui-corner-all">Altitude hold</a>
    </div>


  </div>
<?php
@include "pid_rate.php";
@include "pid_stab.php";
@include "pid_alt.php";
?>
