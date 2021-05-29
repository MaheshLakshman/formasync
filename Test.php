<?php

class TestForm
{
    public function form($name, $email)
    {
        try
        {
            $target_file = "";
            $str = "";
        if ($_FILES["picture"]) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["picture"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
            // Check if image file is a actual image or fake image
            // if (isset($_POST["submit"])) {
            //     $check = getimagesize($_FILES["picture"]["tmp_name"]);
            //     move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
            //     if ($check !== false) {
                  
            //         $str = "File is an image - " . $check["mime"] . ".";
            //         $uploadOk = 1;
            //     } else {
            //         echo "File is not an image.";
            //         $uploadOk = 0;
            //     }
            }
        //}
        }
        catch(Exception $e)
        {
            var_dump($e->getMessage());
            die();
        }
        return json_encode([
            "name" => $name,
            "email" => $email,
            "file" => $str
        ]);
    }
}

$tst = new TestForm();
$data = $tst->form($_POST['name'], $_POST['email']);
echo $data;
