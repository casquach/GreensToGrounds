<?php
if(!empty($errors)){
    echo "<p class='error'>".nl2br($errors)."</p>";
}
?>
<!--discount-->
<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
    <label for='name'><span class="b">Discount Code:</span></label><br />
    <input type="text" class="form-control" name="discount" value='<?php echo htmlentities($discount) ?>'>
    <input type="submit" class="btn btn-primary" name="submit" value="Click Here to Apply Discount" style="font-weight:bold; margin-top: 1em;">
</form>

<form method="post" name="signup_form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
    <div class="order-form-header">Contact info:</div><br />
    <!--name-->
    <input type="text" name="name" placeholder="full name (excluding special characters such as apostrophes and quotes)" class="form-control" value='<?php echo htmlentities($name) ?>'><br />
    <!--email-->
    <input type="text" name="email" placeholder="email" class="form-control" value='<?php echo htmlentities($email) ?>'><br />
    <!--phone_num-->
    <input type="text" name="phone_num" placeholder="phone number" class="form-control" value='<?php echo htmlentities($phone_num) ?>'><br />
    <!--year-->
    <span style='font-weight: bold;'>Year:</span>
    <select name="year">
        <option value="1st year">1st Year</option>
        <option value="2nd year">2nd Year</option>
        <option value="3rd year">3rd Year</option>
        <option value="4th year">4th Year</option>
        <option value="Grad student">Grad Student</option>
        <option value="Faculty">Faculty</option>
    </select><br />
    <!--packages-->
    <!-- <span style='font-weight: bold;'>Package Options:</span>
     <select name="packages">
        <option value="None">None</option>
       <option value="Half Season Snack Box"> Half Season Snack Box: $28: 4 weeks - 7% weekly discount</option>
        <option value="Half Season Produce Box"> Half Season Produce Box: $28: 4 weeks - 7% weekly discount</option>
        <option value="Full Season Snack Box"> Full Season Snack Box: $59: 7 weeks - 10% weekly discount</option>
        <option value="Full Season Produce Box"> Full Season Produce Box: $59: 7 weeks - 10% weekly discount</option>

    </select><br /> -->
  
    <div class="order-form-header">Select your box:</div><br />
<!--     box_content    -->    
    <?php
    $sql = "SELECT * FROM weekly_food";
    $result = $mysqli->query($sql);
    $add_on = 0;
    print "<div class='row boxes'>";
    while ($row = $result->fetch_assoc()) {
        $food_type = $row['food_type'];
        $food = $row['food'];
        $price = $row['price'];
        if($food_type == 'Add-on' && $add_on == 0) {
            print "<br /><div style='font-weight: bold;'>This Week's Add-ons:</div><br />";
            $add_on++;
        }
        if($food_type == 'Produce Box')
            print "<input type='checkbox' name='box_content[]' value='$food_type ($$price)'><div class='produce-box-header'>$food_type ($$price):</div> $food<br />";
        if($food_type == 'Snack Box')
            print "<input type='checkbox' name='box_content[]' value='$food_type ($$price)'><div class='produce-box-header'>$food_type ($$price):</div> $food<br />";
        if($food_type == 'Add-on')
            print "<input type='checkbox' name='box_content[]' value='$food ($$price)'>&nbsp;$food ($$price)<br />";
    }
    ?>
    </div>
    <br />
    <div class="alert">***Please be aware that, due to the local nature of our food, some last-minute swaps may be necessary to accommodate unexpected changes in availability</div>
<!--     <br />If we owe you a discount because of the lack of availability of melons the first week, enter your code here:<br />
    <input type="text" name="refundformelon" placeholder="Refund Code for Watermelon" class="form-control" value='<?php echo htmlentities($refundformelon) ?>'><br /> -->
    <!--comments-->
    <div class="order-form-header">Comments:</div>
    <br />Please specify any dietary restrictions so we may accomodate you<br /><textarea name="comments" rows=4 cols=30></textarea>
    <!--captcha-->
    <div id="capcha">
        <p class="order-form-header">Captcha: </p>
        <?php include("s3Capcha.php"); ?>
    </div>
    <br /><br /><br />
    <div class="order-form-questions" style="font-weight: bold;">Box pick-ups are on Fridays from 12-3pm on Mad Bowl (unless otherwise noted).  If you or a friend cannot be there to pick-up your box, please contact us BEFORE placing your order to make other arrangements with our staff. We do not store boxes after Friday and we donate all unclaimed food to the Haven.</div>
    <br />
    <input type="checkbox" name="agreement" value="agreed" required>
    <strong style="color:#2492FF;">&nbsp;I have read and understood the above statement</strong>
    <br /><br />
    <div class="order-form-questions">If you have any questions about your order, please feel free to contact us at <strong>greenstogrounds@gmail.com</strong></div>
    <br />
    <input type="hidden" name="submit" />
    <input type="image" name="submit_btn" value="Proceed to Next Step" src="lib/imgs/checkout.png" height="52" width="220">
</form>