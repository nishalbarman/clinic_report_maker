<?php

// connect to the database
$conn = mysqli_connect("sql212.byethost32.com", "b32_32494563", "@NishalBoss21", "b32_32494563_healthkind");

$sql = "SELECT * FROM files";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = time() . '_' . $_FILES['myfile']['name'];
    $p_name = $_POST['pname'];
    $p_age = $_POST['page'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['txt', 'zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO files (patient_name, patient_age, file_name, size, downloads) VALUES ('$p_name', $p_age, '$filename', $size, 0)";
            if (mysqli_query($conn, $sql)) {
                echo "<script>alert('File uploaded successfully');</script>";
            }
        } else {
            echo "<script>alert('File upload failed');</script>";
        }
    }
}

// Downloads files
if (isset($_GET['serial'])) {
    $id = $_GET['serial'];

    // fetch file to download from database
    $sql = "SELECT * FROM files WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['file_name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['file_name']));
        
        //This part of code prevents files from being corrupted after download
        ob_clean();
        flush();
        
        readfile('uploads/' . $file['file_name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}