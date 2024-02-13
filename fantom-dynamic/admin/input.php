<?php
    include 'database.php';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $logo_text = $_POST['logo_text'];
        $logo_img_name = $_POST['logo_img_name'];
        $item1 = $_POST['item1'];
        $item2 = $_POST['item2'];
        $item3 = $_POST['item3'];
        $item4 = $_POST['item4'];
        $item5 = $_POST['item5'];
        $bg_img_name = $_POST['bg_img_name'];
        $h_heading = $_POST['h_heading'];
        $heading = $_POST['heading'];
        $paragraph = $_POST['paragraph'];
        $button = $_POST['button'];
 
        $alert='';
        $l_image= '';
        if (isset($_FILES['logo_image'])){
            $l_image = $_FILES['logo_image']['name'];
            $l_image_tmp = $_FILES['logo_image']['tmp_name'];
            move_uploaded_file($l_image_tmp, "assets/uploads/logo/".$l_image);
        }
        $target_l_img =  "assets/uploads/logo/".basename($_FILES["logo_image"]["name"]);
        $l_imageFileType = strtolower(pathinfo($target_l_img,PATHINFO_EXTENSION));

        $bg_image= '';
        if (isset($_FILES['bg_img'])){
            $bg_image = $_FILES['bg_img']['name'];
            $bg_image_tmp = $_FILES['bg_img']['tmp_name'];
            move_uploaded_file($bg_image_tmp, "assets/uploads/bg/".$bg_image);
        }
        $target_bg_img =  "assets/uploads/bg/".basename($_FILES["bg_img"]["name"]);
        $bg_imageFileType = strtolower(pathinfo($target_bg_img,PATHINFO_EXTENSION));

       $check="SELECT * FROM fantom_data";
        $run_check = mysqli_query($conn, $check);

        if($l_imageFileType != "jpg" && $l_imageFileType != "png" && $l_imageFileType != "jpeg" && $bg_imageFileType != "jpg" && $bg_imageFileType != "png" && $bg_imageFileType != "jpeg"){
            $alert = "Only image file type can be inserted!";
        }else{
            if(mysqli_num_rows($run_check) > 0){
                $row = mysqli_fetch_assoc($run_check);
                $id = $row['id'];
                if(!empty($l_image)){
                $update = "UPDATE fantom_data SET logo_image = '$l_image', logo_text = '', menu_item_1 = '$item1', menu_item_2 = '$item2', menu_item_3 = '$item3', menu_item_4 = '$item4', menu_item_5 = '$item5', bg_image = '$bg_image', highlighted_h_text = '$h_heading', heading = '$heading', paragraph = '$paragraph', button_text = '$button' WHERE id = $id";

                mysqli_query($conn,$update);
                $alert = "Record Updated!";

                }else if(!empty($logo_text)){

                    $update1 = "UPDATE fantom_data SET logo_image = '' , logo_text = '$logo_text', menu_item_1 = '$item1', menu_item_2 = '$item2', menu_item_3 = '$item3', menu_item_4 = '$item4', menu_item_5 = '$item5', bg_image = '$bg_image', highlighted_h_text = '$h_heading', heading = '$heading', paragraph = '$paragraph', button_text = '$button' WHERE id = $id";

                    mysqli_query($conn,$update1);
                    $alert = "Record Updated!";
                }

            }else{ 
                $insert = "INSERT INTO fantom_data (logo_image, logo_text, menu_item_1, menu_item_2, menu_item_3, menu_item_4, menu_item_5, bg_image, highlighted_h_text, heading, paragraph, button_text ) VALUES ('$l_image', '$logo_text', '$item1', '$item2', '$item3', '$item4', '$item5', '$bg_image', '$h_heading', '$heading', '$paragraph', '$button')";
        
                if (mysqli_query($conn,$insert)){
                    $alert = "Record  Inserted!!";
                }else{
                    $alert = "Error";
                }
            }
        }

        $output =['logo_img_name' => $logo_img_name,
        'bg_img_name' => $bg_img_name,
        'alert' => $alert];
        header('Content-Type: application/json');
        echo json_encode($output);
    }
?>