<?php
$page_id='cam_select';
$f = $_GET['f'];
$t = $_GET['t'];
?>
  <div data-role="page" id="<?php echo $page_id; ?>">
    <div data-role="header">
      <a href="#camera" data-rel="back" data-transition="slide" class="ui-btn ui-corner-all ui-btn-inline">Go Back</a>
      <h1><?php echo $f; ?></h1>
    </div>

    <div role="main" class="ui-content">

<?php
if ($t == '2') {
        echo "<a class='ui-btn ui-corner-all' data-ajax='false' href='playmp4.php?f=".$f."'>  Play  </a>";
        echo "<a class='ui-btn ui-corner-all' data-ajax='false' href='downloadmp4.php?f=".$f."'>  Download  </a>";
}
if ($t == '1') {
        echo "<a class='ui-btn ui-corner-all' data-ajax='false' href='converth264.php?f=".$f."'>  Convert to MP4  </a>";
        echo "<a class='ui-btn ui-corner-all' data-ajax='false' href='downloadh264.php?f=".$f."'>  Download  </a>";
}
?>

<!--      <a href="delete.php?f=logs&hash=<?php echo $page_id; ?>" data-ajax="false" class="ui-btn ui-corner-all ui-btn-inline">Delete</a> -->
    </div>



  </div>
