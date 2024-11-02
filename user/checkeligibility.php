<?php

// To Handle Session Variables on This Page
session_start();

if (empty($_SESSION['id_user'])) {
    header("Location: index.php");
    exit();
}

// Including Database Connection From db.php file to avoid rewriting in all files
require_once("../db.php");

// Check if 'id' is set in $_GET
if (isset($_GET['id'])) {

    // Validate 'id' parameter to ensure it's a positive integer
    $jobId = intval($_GET['id']);
    if ($jobId <= 0) {
        // Handle invalid job ID
        $_SESSION['status'] = "Invalid job ID.";
        $_SESSION['status_code'] = "error";
        header("Location: ../view-job-post.php?id=0"); // Redirect to a safe page
        exit();
    }

    // Prepare statement to fetch user data securely
    $stmt = $conn->prepare("SELECT hsc, ssc, ug, pg, qualification FROM users WHERE id_user = ?");
    if ($stmt === false) {
        // Handle prepare error
        $_SESSION['status'] = "Database error: " . $conn->error;
        $_SESSION['status_code'] = "error";
        header("Location: ../view-job-post.php?id=" . $jobId);
        exit();
    }
    $stmt->bind_param("i", $_SESSION['id_user']);
    $stmt->execute();
    $result1 = $stmt->get_result();

    if ($result1->num_rows > 0) {
        $row1 = $result1->fetch_assoc();
        
        // Explicitly cast to float
        $hsc = isset($row1['hsc']) ? floatval($row1['hsc']) : 0;
        $ssc = isset($row1['ssc']) ? floatval($row1['ssc']) : 0;
        $ug = isset($row1['ug']) ? floatval($row1['ug']) : 0;
        $pg = isset($row1['pg']) ? floatval($row1['pg']) : 0;

        $sum = $hsc + $ssc + $ug + $pg;
        $total = ($sum / 4);
        $course1 = isset($row1['qualification']) ? htmlspecialchars(trim($row1['qualification'])) : '';
    } else {
        // Handle case where user data is not found
        $_SESSION['status'] = "User data not found.";
        $_SESSION['status_code'] = "error";
        header("Location: index.php");
        exit();
    }

    // Prepare statement to fetch job post data securely
    $stmt = $conn->prepare("SELECT maximumsalary, qualification FROM job_post WHERE id_jobpost = ?");
    if ($stmt === false) {
        // Handle prepare error
        $_SESSION['status'] = "Database error: " . $conn->error;
        $_SESSION['status_code'] = "error";
        header("Location: ../view-job-post.php?id=" . $jobId);
        exit();
    }
    $stmt->bind_param("i", $jobId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $eligibility = isset($row['maximumsalary']) ? floatval($row['maximumsalary']) : 0;
        $course2 = isset($row['qualification']) ? htmlspecialchars(trim($row['qualification'])) : '';

        // Compare total percentage with eligibility and course qualifications
        if ($total >= $eligibility) {
            if ($course1 === $course2) { // Strict comparison
                $_SESSION['status'] = "You are eligible for this drive, apply if you are interested.";
                $_SESSION['status_code'] = "success";
            } else {
                $_SESSION['status'] = "You are not eligible for this drive due to the course criteria. Check out other drives.";
                $_SESSION['status_code'] = "warning";
            }
        } else {
            $_SESSION['status'] = "You are not eligible for this drive either due to the overall percentage criteria or course criteria. Update your marks in your profile, if you think you are eligible.";
            $_SESSION['status_code'] = "warning";
        }

        // Redirect to the job post view page with status message
        header("Location: ../view-job-post.php?id=" . $jobId);
        exit();
    } else {
        // Handle case where job post data is not found
        $_SESSION['status'] = "Job post not found.";
        $_SESSION['status_code'] = "error";
        header("Location: ../view-job-post.php?id=0"); // Redirect to a safe page
        exit();
    }
} else {
    // If 'id' is not set in $_GET, redirect to a safe page
    header("Location: user/index.php");
    exit();
}

?>
