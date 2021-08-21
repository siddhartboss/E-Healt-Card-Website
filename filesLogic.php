<?php
session_start();
// connect to the database
//$conn = mysqli_connect('localhost', 'root', '', 'user information');
$conn = new mysqli('localhost','root','','user information');
$sql = "SELECT * FROM signupinfo"; //WHERE email = '".$_SESSION['email']."' AND password = '".$_SESSION['password']."'
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);
// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file

    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = "uploads/".$filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    //move_uploaded_file($file, $destination);

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) 
    {
        echo "You file extension must be .zip, .pdf or .docx";
    } 
    elseif ($_FILES['myfile']['size'] > 1000000) 
    { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } 
    else 
        {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) 
        {
            $sql = "UPDATE signupinfo SET doc1='$filename',docsize=$size, downloads=0 WHERE email = '".$_SESSION['email']."' AND password = '".$_SESSION['password']."'";
            if (mysqli_query($conn, $sql)) 
            {
                echo "File uploaded successfully";
                echo '<br><a href="account.php">CONTINUE</a>';
            }
        } 
        else
        {
            echo "Failed to upload file.";
        }
    }
}

// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM signupinfo WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['doc1'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['doc1']));
        readfile('uploads/' . $file['doc1']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE signupinfo SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}
?>