<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>
<body>
    <form action="prosessupload.php" method="post" enctype="multipart/form-data">
        Pilih file (JPG only): <input type="file" name="berkas" accept=".jpg"><br><br>
        <input type="submit" value="upload saja" name="upload">
    </form>
</body>
</html>
