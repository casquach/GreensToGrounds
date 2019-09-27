<?php
    if(isset($_POST['new_time'])) {
        include('inc/db_connect.php');

        $new_time = filter_input(INPUT_POST, "new_time");
        $sql = "UPDATE close_time SET close_at='$new_time'";
        $result = $mysqli->query($sql);

        header('Location:week_manager.php');
        die;
    }
?>

<!DOCTYPE html>

<html>
	<head>
        <?php
        $title = "Edit Time";
        include('inc/head.php');
        ?>
	</head>

	<body style="padding-left: 20px;">

        <form action="" method="post">
            <?php
                $close_at = $_POST['close_at'];
            ?>
            <br /><br /><br />
            Enter new time in same format as below<br />
            <input type="text" name="new_time" value="<?php echo $close_at ?>"><br /><br />
            <input type='submit' value='Update Time' class='button btn btn-primary'>
        </form>

	</body>
</html>