<?php
session_start();
if (empty($_SESSION['id_admin'])) {
    header("Location: index.php");
    exit();
}

require_once("../db.php");

// Handle image upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["placement_image"])) {
    $target_dir = "../uploads/placements/";
    $target_file = $target_dir . basename($_FILES["placement_image"]["name"]);
    
    if (move_uploaded_file($_FILES["placement_image"]["tmp_name"], $target_file)) {
        $relative_path = basename($_FILES["placement_image"]["name"]);
        $sql = "INSERT INTO placements (image_path) VALUES ('$relative_path')";
        $conn->query($sql);
    } else {
        echo "<div class='alert alert-danger'>Error uploading file.</div>";
    }
}

// Handle image deletion
if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $image_id = $_GET['delete'];

    $sql = "SELECT image_path FROM placements WHERE id='$image_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    if ($row) {
        $file_path = "../uploads/placements/" . $row['image_path'];
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        $sql = "DELETE FROM placements WHERE id='$image_id'";
        $conn->query($sql);
        echo "<div class='alert alert-success'>Image deleted successfully.</div>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Our Placements</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    
    <style>
    .placement-image-wrapper:hover img {
        transform: scale(1.05);
    }
    .delete-btn:hover {
        background-color: #ff0000;
    }
    .placement-image-wrapper img {
        transition: transform 0.3s ease;
    }
    /* Existing Media Queries */
    @media (max-width: 768px) {
        .placement-image-wrapper img {
            width: 200px;
            height: 200px;
        }
    }
    @media (max-width: 576px) {
        .placement-image-wrapper img {
            width: 150px;
            height: 150px;
        }
    }
    
    /* Additional Media Queries for Responsiveness */
    @media (max-width: 1200px) {
        .placement-image-wrapper img {
            width: 200px;
            height: 200px;
        }
    }

    @media (max-width: 992px) {
        .placement-image-wrapper img {
            width: 180px;
            height: 180px;
        }

        .content-header {
            padding: 10px;
        }

        .form-group {
            margin: 10px 0;
        }
    }

    @media (max-width: 768px) {
        .placement-image-wrapper img {
            width: 150px;
            height: 150px;
        }
        
        .btn {
            font-size: 14px;
        }

        .content-header {
            margin: 0 15px;
        }
    }

    @media (max-width: 576px) {
        .placement-image-wrapper img {
            width: 100px;
            height: 100px;
        }

        .form-group {
            margin: 5px 0;
        }
    }

   
</style>

</head>

<body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">

    <?php

    include 'header.php';

    ?>
  

        <div class="content-wrapper" style="margin-left: 0px;">
            <section class="content-header">
                <h1 class="text-center mb-4" style="font-weight: 700; color: #4CAF50;">Our Placements</h1>

                <!-- Form to upload a new placement image -->
                <form action="placements.php" method="post" enctype="multipart/form-data" class="mb-5 mx-auto" style="max-width: 500px; background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);">
                    <div class="form-group">
                        <label for="placement_image" style="font-weight: 600; font-size: 16px;">Upload Placement Image:</label>
                        <input type="file" name="placement_image" required class="form-control-file" style="padding: 10px; border: 2px solid #ddd; border-radius: 5px; width: 100%;">
                    </div>
                    <button type="submit" class="btn btn-primary w-100" style="background-color: #4CAF50; border: none; padding: 10px 0; font-size: 16px; border-radius: 5px;">Upload</button>
                </form>
            </section>

            <!-- Display the uploaded placement images -->
            <section id="our-placements" class="content-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text-center mb-4" style="font-weight: 700; color: #333;">Uploaded Placement Images</h3>
                            <div class="d-flex flex-wrap justify-content-center">
                                <?php
                                // Fetch image paths from the 'placements' table
                                $sql = "SELECT id, image_path FROM placements";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<div class="placement-image-wrapper position-relative" style="margin: 15px;">';
                                        echo '<img src="../uploads/placements/' . $row['image_path'] . '" alt="Placement Image" style="width: 250px; height: 250px; object-fit: cover; border-radius: 10px; box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease;">';
                                        echo '<a href="placements.php?delete=' . $row['id'] . '" class="delete-btn" title="Delete Image" style="position: absolute; top: 10px; right: 10px; background: #ff4444; color: #fff; border-radius: 50%; padding: 8px; text-decoration: none; font-size: 18px; transition: background-color 0.3s ease;">&times;</a>';
                                        echo '</div>';
                                    }
                                } else {
                                    echo '<p class="text-center" style="color: #888; font-size: 18px;">No images available.</p>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


    <script>
    const hamburger = document.querySelector(".hamburger");
    const navMenu = document.querySelector(".nav-menu");

    hamburger.addEventListener("click", mobileMenu);

    function mobileMenu() {
        hamburger.classList.toggle("active");
        navMenu.classList.toggle("active");
    }
</script>


    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    
</body>

</html>
