<!DOCTYPE html>
<html>

    <head>
        <title>File Upload Form</title>
    </head>

    <body>
        <form action="file_adit.php" method="post" enctype="multipart/form-data">
            <label for="fileToUpload">Select a file:</label>
            <input type="file" name="fileToUpload" id="fileToUpload" multiple><br>

            <label for="targetFolder">Select a folder:</label>
            <select name="targetFolder" id="targetFolder">
                <option value="img/">insta</option>
                <option value="img/">feck</option>
                <!-- Add more folder options as needed -->
            </select><br>

            <input type="submit" value="Upload File" name="submit">
        </form>
    </body>

</html>
<?php
if (isset($_POST["submit"])) {
    $targetDirectory = $_POST["targetFolder"] ?? "img/"; // Default to "uploads/" if no folder is selected

    $targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);

    if (file_exists($targetFile)) {
        echo "Sorry, the file already exists.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded to " . $targetDirectory;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>