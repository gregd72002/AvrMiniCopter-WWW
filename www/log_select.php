<?php
$page_id='log_select';
$f = $_GET['f'];
$t = $_GET['t'];
?>
  <div data-role="page" id="<?php echo $page_id; ?>">
    <div data-role="header">
      <a href="index.php#logs" data-ajax="false" data-rel="back" data-transition="slide" class="ui-btn ui-corner-all ui-btn-inline">Go Back</a>
      <h1><?php echo $f; ?></h1>
    </div>

    <div role="main" class="ui-content">
      <a href="chart.php?t=<?php echo $t; ?>&f=<?php echo $f; ?>&hash=<?php echo $page_id; ?>" data-ajax="false" class="ui-btn ui-corner-all">Display</a>
      <a href="displaytxt.php?t=<?php echo $t; ?>&f=<?php echo $f; ?>&hash=<?php echo $page_id; ?>" data-ajax="false" class="ui-btn ui-corner-all">Download</a>
<!--      <a href="delete.php?f=logs&hash=<?php echo $page_id; ?>" data-ajax="false" class="ui-btn ui-corner-all ui-btn-inline">Delete logs</a> -->
    </div>



  </div>
