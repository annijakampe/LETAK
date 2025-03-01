<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Gallery</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="navbar">
        <a href="#letak">LETAK</a>
        <a href="#art">ART</a>
        <a href="#me">ME</a>
        <a href="#contact">CONTACT</a>
    </div>
    <div class="content">
        <h1>Welcome to My Art Gallery</h1>
        <div class="gallery">
            <h2>Gallery</h2>
            <?php
            include 'database/db.php';
            $result = $conn->query("SELECT * FROM photos");
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="photo">';
                    echo '<img src="uploads/' . $row['filename'] . '" alt="' . $row['name'] . '">';
                    echo '<h3>' . $row['name'] . '</h3>';
                    echo '<p>' . $row['description'] . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>Error fetching photos: ' . $conn->error . '</p>';
            }
            ?>
        </div>
    </div>
</body>

</html>