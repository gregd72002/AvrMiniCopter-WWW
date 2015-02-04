<?php
$page_id='camera';
?>
  <div data-role="page" id="<?php echo $page_id; ?>">
    <div data-role="header">
      <a href="index.php" data-ajax="false" data-rel="back" data-transition="slide" class="ui-btn ui-corner-all ui-btn-inline">Go Back</a>
      <h1>Camera</h1>
    </div>

    <div role="main" class="ui-content">

<?php
#@include "cam_list.php";
?>
<br/><br/>
      <a href="delete.php?f=cam&hash=<?php echo $page_id; ?>" data-ajax="false" class="ui-btn ui-corner-all ui-btn-inline">Delete media</a>


  </div>
  </div>

