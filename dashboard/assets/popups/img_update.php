<form action="./assets/php/update_pic.php" method="post" class="cflex aic">
    <h5 style="text-transform: capitalize;text-align: center;font-size: 1.2em;margin-bottom: auto;"><?php echo $_REQUEST['type'] ?></h5>
    <input type="file" id="ra" style="display:none" name="file">
    <input type="hidden" value="<?php echo $_REQUEST['type'] ?>" name="type">
    <label for="ra" style="cursor:pointer;"><i class="fa-solid fa-camera-viewfinder"></i> Update Pic</label>
    <div class="rflex jcsb" style="margin-top:auto">
        <button id="remove">Remove</button>
        <button id="update">Update</button>
    </div>
</form>