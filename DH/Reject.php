<?php
include 'inc/config.php';

if (isset($_POST['reject'])) {
    $appid = $_POST['appid'];

    // Display the modal
    echo '<html>
            <head>
			<div class="modal-title">
			<h5>Reason for Rejection</h5>
			</div>
            <br>
                <style>
                    body {
                        font-family: sans-serif, sans-serif;
                    }

                    .modal {
                        display: none;
                        position: fixed;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background-color: rgba(0, 0, 0, 0.5);
                    }

                    .modal-content {
                        background-color: #fefefe;
                        margin: 15% auto;
                        padding: 20px;
                        border: 1px solid #888;
                        width: 50%;
                        border-radius: 10px;
                        background-color:white;
                    }

                    textarea {
                        width: 100%;
                        height: 100px;
                        resize: none;
                        background-color: #e0e0e0;
                        border-radius: 10px;
                        outline :none;
                    }
                    form {
                        text-align :left;
                    }
                    
                    button {
                        margin-top: 10px;
                        padding: 10px;
                        background: linear-gradient(to right, #001f3f, #0d0d0d); 
                        border: none; 
                        color: white; 
                        border-radius: 10px;
                    }
                </style>
            </head>
            <body>
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <form method="post" action="">
                            <label for="rejectionReason">Reason for Rejection:</label>
                            <br><br>
                   
                            <textarea id="rejectionReason" name="rejectionReason" required></textarea>
                            <br>
                            <input type="hidden" name="appid" value="' . $appid . '">
                            <button type="submit" button class="btn btn-danger" style="border-radius:10px;" name="submitRejection">Submit</button>
                        </form>
                    </div>
                </div>

                <script>
                    document.getElementById("myModal").style.display = "block";
                </script>
            </body>
        </html>';
}

if (isset($_POST['submitRejection'])) {
    $appid = $_POST['appid'];
    $rejectionReason = $_POST['rejectionReason'];

    // Update the 'projects_to_be_approved' table
    $sql = "UPDATE projects_to_be_approved SET status2 ='34', comments ='$rejectionReason' WHERE id = '$appid'";
    $run = mysqli_query($con, $sql);

    if ($run == true) {
        echo "<script> 
                alert('Application Rejected');
                window.location.href = 'http://localhost/RA_System/IB/dashboard.php';
              </script>";
    } else {
        echo "<script> 
                alert('Failed To Reject');
                window.location.href = 'http://localhost/RA_System/IB/dashboard.php';
              </script>";
    }
}
?>
