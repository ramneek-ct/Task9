<?php
    include 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fantom Input Form</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="assets/js/index.js"></script>
</head>
<body>

    <?php
        $sql="SELECT * FROM fantom_data";
        $execute = mysqli_query($conn,$sql);

        if(mysqli_num_rows($execute)>0){
            $row = mysqli_fetch_assoc($execute);
        }
    ?>

    <form action="" method="post" enctype="multipart/form-data"><br>

        <label for="logo">Choose the format for logo: </label>
        <select name="logo" id="logo">
            <option value="0">Choose format</option>
            <option value="1">Image</option>
            <option value="2">Text</option>
        </select><br><br>

        <div class = "img">
        <label for="logo_img">Upload Logo Image: </label>
        <input type="file" id="logo_img" name="logo_img">
        <label for="logo_img_name" class="logo_img_name"> <?php echo $row['logo_image']; ?></label><br><br> 
        </div>

        <div class = "text">
        <label for="logo_text">Enter Logo Text: </label>
        <input type="textfield" id="logo_text" name="logo_text" value="<?php echo $row['logo_text'] ?>"><br><br>
        </div> 

        <label for="menu_item1">Enter menu-item-1: </label>
        <input type="textfield" id="menu_item1" name="menu_item1" value= "<?php echo $row['menu_item_1'] ?>"><br>
        <label for="menu_item2">Enter menu-item-2: </label>
        <input type="textfield" id="menu_item2" name="menu_item2" value= "<?php echo $row['menu_item_2']; ?>"><br>
        <label for="menu_item3">Enter menu-item-3: </label>
        <input type="textfield" id="menu_item3" name="menu_item3" value= "<?php echo $row['menu_item_3']; ?>"><br>
        <label for="menu_item4">Enter menu-item-4: </label>
        <input type="textfield" id="menu_item4" name="menu_item4" value= "<?php echo $row['menu_item_4']; ?>"><br>
        <label for="menu_item5">Enter menu-item-5: </label>
        <input type="textfield" id="menu_item5" name="menu_item5" value= "<?php echo $row['menu_item_5']; ?>"><br><br>

        <label for="bg_img">Upload background image: </label>
        <input type="file" id="bg_img" name="bg_img">
        <label for="bg_img_name" class="bg_img_name"><?php echo $row['bg_image']; ?></label><br><br>

        <label for="highlight_heading">Enter highlighted heading: </label>
        <input type="textfield" id="highlight_heading" name="highlight_heading" value= "<?php echo $row['highlighted_h_text']; ?>"><br>

        <label for="banner_heading">Enter banner heading: </label>
        <input type="textfield" id="banner_heading" name="banner_heading" value="<?php echo $row['heading']; ?>"><br>

        <label for="banner_pg">Enter banner paragraph: </label>
        <input type="textfield" id="banner_pg" name="banner_pg" value="<?php echo $row['paragraph']; ?>"><br>

        <label for="button">Enter button text: </label>
        <input type="textfield" id="button" name="button" value="<?php echo $row['button_text']; ?>"><br><br>

        <input type="submit" class="submit_button" value="Enter">

        <input type="submit" value="Log out" class="logout"><br><br>

    </form>
</body>
</html>