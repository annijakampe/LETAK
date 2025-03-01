<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Art Gallery</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="content">
        <h1>Admin Panel</h1>
        <div class="upload-form">
            <h2>Upload New Photo</h2>
            <form action="../ADMIN/upload.php" method="POST" enctype="multipart/form-data">
                <label for="photo">Select Photo:</label>
                <input type="file" name="photo" id="photo" required><br>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required><br>
                <label for="description">Description:</label>
                <textarea name="description" id="description" required></textarea><br>
                <button type="submit">Upload</button>
            </form>
        </div>
    </div>
</body>

</html>