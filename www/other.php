<?php
$page_id='other';
?>
  <div data-role="page" id="<?php echo $page_id; ?>">
    <div data-role="header">
      <a href="#mainmenu" data-rel="back" data-transition="slide" class="ui-btn ui-corner-all ui-btn-inline">Go Back</a>
      <h1>Other</h1>
    </div>

    <div role="main" class="ui-content">

<div data-role="collapsible" data-collapsed="true">
<h3>MPU</h3>
<fieldset data-role="controlgroup">
     	<input type="radio" name="mpu_addr" id="mpu_addr-0" value="0" <?php if ($mpu_addr==0) echo 'checked'; ?> />
     	<label for="mpu_addr-0">0x68</label>
   	<input type="radio" name="mpu_addr" id="mpu_addr-1" value="1" <?php if ($mpu_addr==1) echo 'checked'; ?>  />
     	<label for="mpu_addr-1">0x69</label>
</fieldset>
<label for="mpu_reset">Reset PIN:</label>
<input type="number" name="mpu_reset" id="mpu_reset" value="<?php echo $mpu_reset;?>"/>
</div>

<input type="submit" value="Save"/>
    </div>



  </div>
