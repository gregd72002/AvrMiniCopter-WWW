<?php
$page_id='logs';
?>
  <div data-role="page" id="<?php echo $page_id; ?>">
    <div data-role="header">
      <a href="index.php" data-ajax="false" data-rel="back" data-transition="slide" class="ui-btn ui-corner-all ui-btn-inline">Go Back</a>
      <h1>Logs</h1>
    </div>

    <div role="main" class="ui-content">

<?php
@include "log_list.php";
?>

<br/><br/>
      <a href="delete.php?f=logs&hash=<?php echo $page_id; ?>" data-ajax="false" class="ui-btn ui-corner-all ui-btn-inline">Delete logs</a>
    </div>



