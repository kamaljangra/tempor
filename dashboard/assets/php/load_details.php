<?php

require "./utils.php";
$type = $_POST['type'];
if ($type == "personal") {
?>
    <div class="block">
        <h4 class="block_title">Profile Pictures</h4>
        <div class="rflexw jcse" id="profile_pics"> </div>
    </div>
    <div class="detail_block block">
        <h4 class="detail_title">Full Name</h4>
        <form action="" method="post" class="rflexw">
            <input type="text" name="" id="" placeholder="First Name">
            <input type="text" name="" id="" placeholder="Middle Name">
            <input type="text" name="" id="" placeholder="Last Name">
        </form>
        <div class="rflex aic">
            <div class="rflex">
                <label for="">Accessable</label>
                <select name="" id="">
                    <option value="hide">No One</option>
                    <option value="hide">Public</option>
                </select>
            </div>
            <button class="update">Update</button>
        </div>
    </div>
    <div class="detail_block block">
        <h4 class="detail_title">Occupation</h4>
        <form action="" method="post" class="rflexw">
            <input type="text" name="" id="" placeholder="Occupation">
            <input type="Number" name="" id="" placeholder="Experience (Years)">
        </form>
        <div class="rflex aic">
            <div class="rflex">
                <label for="">Accessable</label>
                <select name="" id="">
                    <option value="hide">No One</option>
                    <option value="hide">Public</option>
                </select>
            </div>
            <button>Update</button>
        </div>
    </div>
    <div class="detail_block block">
        <h4 class="detail_title">Contact</h4>
        <form action="" method="post" class="rflexw">
            <input type="text" name="" id="" placeholder="contact">
            <input type="text" name="" id="" placeholder="Alternate">
        </form>
        <div class="rflex">
            <div class="rflex">
                <label for="">Accessable</label>
                <select name="" id="">
                    <option value="hide">No One</option>
                    <option value="hide">Public</option>
                </select>
            </div>
            <button>Update</button>
        </div>
    </div>
<?php
} else if ($type == "family") {
?>
    <div class="detail_block block">
        <h4 class="detail_title">Parental Information</h4>
        <form action="" method="post" class="rflexw">
            <input type="text" name="" id="" placeholder="Father's name">
            <input type="text" name="" id="" placeholder="Mother's name">
        </form>
        <div class="rflex">
            <div class="rflex">
                <label for="">Accessable</label>
                <select name="" id="">
                    <option value="hide">No One</option>
                    <option value="hide">Public</option>
                </select>
            </div>
            <button>Update</button>
        </div>
    </div>
<?php
} else if ($type == "social") {
?>
    <h4>social Details</h4>
<?php
} else if ($type == "education") {
?>
    <h4>education Details</h4>
<?php
}
?>