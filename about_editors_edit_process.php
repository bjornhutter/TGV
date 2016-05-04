<?php
include('includes/db_connect.inc');
//require('includes/auth.php');
$id = $_POST['id'];

if (isset($_POST['delete'])) {
    $result = mysqli_query($link, "SELECT * FROM tgv_about_editors WHERE id = '$id'");
    $row = mysqli_fetch_array($result);
    $image = 'uploads/' . $row['image'];
    unlink($image);

    mysqli_query($link, "DELETE FROM tgv_about_editors WHERE id = '$id'");
} elseif (isset($_POST['save'])) {
    $result = mysqli_query($link, "SELECT image FROM tgv_about_editors WHERE id = '$id'");
    $row = mysqli_fetch_array($result);
    $image = 'uploads/' . $row['image'];

    // Process för bilden
    //$temp_filename = $_FILES["newfileToUpload"]["tmp_name"];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["newfileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
    if (isset($_POST["save"])) {
        $check = getimagesize($_FILES["newfileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

// Check file size
    if ($_FILES["newfileToUpload"]["size"] > 500000) {
        echo "Filen är för stor";
        $uploadOk = 0;
    }

// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Endast JPG, JPEG & PNG är tillåtet.";
        $uploadOk = 0;
    }

/* Byter namn på filen, ska ej vara med i denna process dock?
// Split the filename at every dot, take the last part and put it in $ext, (this will be the file extension)
    $splits = explode(".", $target_file);
    $index = count($splits) - 1;
    $ext  = '.'.$splits[$index];

// Changes filename to an 8-digit number, if file exists it adds 1 to the number until the filename is unique
    $new_filename_basenumber = 10000000;
    $new_filename = $new_filename_basenumber.$ext;

    while (file_exists("uploads/$new_filename")) {
        $new_filename_basenumber++;
        $new_filename = $new_filename_basenumber.$ext;
    }  */

// Move the file to the server and give it the generated name.
// move_uploaded_file($temp_filename, "uploads/$new_filename");

// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Din fil blev ej uppladdad.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["newfileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["newfileToUpload"]["name"]) . " has been uploaded.";
        }
        chmod($target_file, 0755);

        $imgName = basename($_FILES["newfileToUpload"]["name"]);

        mysqli_query($link, "UPDATE tgv_about_editors SET image = '$imgName' WHERE id = '$id'") or die(mysqli_error($link));

    }
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $content = $_POST['content'];
    mysqli_query($link, "UPDATE tgv_about_editors SET fname = '$fname', lname = '$lname', content = '$content' WHERE id = '$id'");
}

header("Location: about.php");

?>