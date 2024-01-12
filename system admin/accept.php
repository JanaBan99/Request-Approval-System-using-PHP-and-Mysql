<?php
include 'inc/config.php';
include 'send_email.php'; // Include the send_email.php file

if (isset($_POST['approve'])) {
    $appid = $_POST['appid'];

    // Retrieve email from the database
    $getEmailQuery = "SELECT email FROM projects_to_be_approved WHERE id = '$appid'";
    $getEmailResult = mysqli_query($con, $getEmailQuery);

    if ($getEmailResult && mysqli_num_rows($getEmailResult) > 0) {
        $row = mysqli_fetch_assoc($getEmailResult);
        $recipientEmail = $row['email'];

        // Update the database
        $updateQuery = "UPDATE projects_to_be_approved SET status3='1' WHERE id = '$appid'";
        $updateResult = mysqli_query($con, $updateQuery);

        if ($updateResult) {
            // Application approved, send email
            $subject = 'Application Approved';
            $message = 'Your application has been approved.';

            if (sendEmail($recipientEmail, $subject, $message)) {
                echo "<script> 
                        alert('Application Approved and Email Sent');
                        window.open('dashboard.php','_self');
                      </script>";
            } else {
                echo "<script> 
                        alert('Application Approved, but Failed to Send Email');
                        window.open('dashboard.php','_self');
                      </script>";
            }
        } else {
            echo "<script> 
            alert('Failed To Approve');
            </script>";
        }
    } else {
        echo "<script> 
        alert('Email not found in the database');
        </script>";
    }
}
?>
