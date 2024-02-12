<?php
session_start();
    include 'admin/database.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Fantom </title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, intial-scale=1.0"/>
        <meta name="author" content="Ramneek Atwal" />
        <meta http-equiv="X-UA-Compatible" content="IE=Edge, chrome=1" /> 
        <meta name="keywords" content="Fantom" />
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php 
            $sql = "SELECT * FROM fantom_data";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
    
        ?>
            <header>
                <!-- Header -->
                <div class="header-section">
                    <div class="container-width header-bar">
                        <div class="logo">
                            <a href="#homepage">
                                <?php if($row['logo_image'] == '' ){
                                    echo "<p>".$row['logo_text']."</p>";
                                }
                                else if($row['logo_text'] == ''){
                                    echo " <img src = "."admin/assets/uploads/logo/".$row['logo_image']." alt="."Fantom Logo".">";
                                } ?> 
                               </a>
                        </div>
                        <div class="header-menu">
                            <nav>
                                <ul>
                                    <li><a href="#section1"><?php echo $row['menu_item_1']; ?></a></li>
                                    <li><a href="#section2"><?php echo $row['menu_item_2']; ?></a></li>
                                    <li><a href="#section3"><?php echo $row['menu_item_3']; ?></a></li>
                                    <li><a href="#section4"><?php echo $row['menu_item_4']; ?></a></li>
                                    <li><a href="#section5"><?php echo $row['menu_item_5']; ?></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>

            <main>
                <!-- Banner -->
                <div class="banner-section">
                    <div class="container-width banner-container">
                    <img src="admin/assets/uploads/bg/<?php echo $row['bg_image']; ?>" alt="background">
                        <div class="banner-content">
                            <h1><span> <?php echo $row['highlighted_h_text']; ?> </span> <?php echo $row['heading']; ?></h1>
                            <p> <?php echo $row['paragraph']; ?></p>
                            <div class="primary-button"><a href="#link"> <?php echo $row['button_text']; ?></a></div>
                        </div>
                    </div>
                </div>
                <?php 
                }
            }
                ?>
            </main>
    </body>
</html>