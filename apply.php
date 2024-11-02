<?php
session_start();

if (empty($_SESSION['id_user'])) {
    header("Location: index.php");
    exit();
}

require_once("db.php");

if (isset($_GET['id'])) {
    $jobId = intval($_GET['id']);
    if ($jobId <= 0) {
        header("Location: user/index.php");
        exit();
    }

    // Fetch user data
    $stmt = $conn->prepare("SELECT hsc, ssc, ug, pg, qualification FROM users WHERE id_user = ?");
    $stmt->bind_param("i", $_SESSION['id_user']);
    $stmt->execute();
    $result1 = $stmt->get_result();

    if ($result1->num_rows > 0) {
        $row1 = $result1->fetch_assoc();

        // Validate and cast each field
        $hsc = isset($row1['hsc']) ? (float)$row1['hsc'] : 0;
        $ssc = isset($row1['ssc']) ? (float)$row1['ssc'] : 0;
        $ug = isset($row1['ug']) ? (float)$row1['ug'] : 0;
        $pg = isset($row1['pg']) ? (float)$row1['pg'] : 0;

        $sum = $hsc + $ssc + $ug + $pg;
        $total = ($sum / 4);
        $course1 = $row1['qualification'];
    } else {
        // Handle case where user data is not found
        header("Location: user/index.php");
        exit();
    }

    // Fetch job post data
    $stmt = $conn->prepare("SELECT maximumsalary, qualification, id_company FROM job_post WHERE id_jobpost = ?");
    $stmt->bind_param("i", $jobId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $eligibility = (float)$row['maximumsalary'];
        $course2 = $row['qualification'];
        $companyId = $row['id_company'];

        if ($total >= $eligibility && $course1 == $course2) {
            // Check if user has already applied
            $stmt = $conn->prepare("SELECT * FROM apply_job_post WHERE id_user = ? AND id_jobpost = ?");
            $stmt->bind_param("ii", $_SESSION['id_user'], $jobId);
            $stmt->execute();
            $result1 = $stmt->get_result();

            if ($result1->num_rows == 0) {
                // Apply for the job
                $stmt = $conn->prepare("INSERT INTO apply_job_post (id_jobpost, id_company, id_user) VALUES (?, ?, ?)");
                $stmt->bind_param("iii", $jobId, $companyId, $_SESSION['id_user']);

                if ($stmt->execute()) {
                    $_SESSION['jobApplySuccess'] = true;
                    $_SESSION['status1'] = "Congrats!";
                    $_SESSION['status_code1'] = "success";
                    header("Location: user/index.php");
                    exit();
                } else {
                    echo "Error: " . $stmt->error;
                }
            } else {
                // User has already applied
                $_SESSION['status'] = "You have already applied for this Drive.";
                $_SESSION['status_code'] = "success";
                header("Location: view-job-post.php?id=" . $jobId);
                exit();
            }
        } else {
            // Not eligible
            if ($total < $eligibility) {
                $_SESSION['status'] = "You are not eligible for this drive due to the overall percentage criteria. Update your marks in your profile, if you think you are eligible.";
            } else {
                $_SESSION['status'] = "You are not eligible for this drive due to the course criteria.";
            }
            $_SESSION['status_code'] = "success";
            header("Location: view-job-post.php?id=" . $jobId);
            exit();
        }
    } else {
        // Handle case where job post is not found
        header("Location: user/index.php");
        exit();
    }
} else {
    header("Location: user/index.php");
    exit();
}
?>
