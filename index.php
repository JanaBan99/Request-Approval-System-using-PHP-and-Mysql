<?php
    Include('inc/head.php'); 

    if (isset($_POST['submit'])) {
        $user = $_POST['email'];
        $password = md5($_POST['password']);

        include 'inc/config.php';

       
        $tables = ['users', 'immediate_boss', 'head_of_department', 'system_admin', 'hr'];

       
        foreach ($tables as $table) {
            $sql = "SELECT * FROM $table WHERE email = '$user' AND password = '$password'";
            $run = mysqli_query($con, $sql);
            $check = mysqli_num_rows($run);

            if ($check == 1) {
                session_start();
                $_SESSION['email'] = $user;

                
                switch ($table) {
                    case 'users':
                        echo "<script>window.open('dashboard.php','_self');</script>";
                        break;
                    case 'immediate_boss':
                        echo "<script>window.open('IB/dashboard.php','_self');</script>";
                        break;
                    case 'head_of_department':
                        echo "<script>window.open('DH/dashboard.php','_self');</script>";
                        break;
                    case 'system_admin':
                        echo "<script>window.open('system admin/dashboard.php','_self');</script>";
                        break;
                    case 'hr':
                        echo "<script>window.open('hr/dashboard.php','_self');</script>";
                        break;
                    default:
                        
                        break;
                }
                
                break;
            }
        }

        
        echo "<script>alert('Email or Password Invalid'); window.open('index.php','_self');</script>";
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: sans-serif;
            background: url('img/img3.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            flex-direction: column;
            color: white;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        index {
            width: 100%;
            height: 75px;
            line-height: 75px;
            padding: 0px 100px;
            position: fixed;
            background-image: linear-gradient(#033747, #012733);
            z-index: 1;
            width: 100%;
        }
        index .logo{
            display: flex;
            align-items: center;
        
        }
        index .logo img{
            margin-right: 20px;
            max-height: 50px;
            padding-bottom: 10px;
        }

        index .logo p {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-size: 30px;
            font-weight: bold;
            float: iconv_strlen;
            color: white;
            text-transform: initial;
            letter-spacing: 1.5px;
            cursor: pointer;
        }
        index ul {
            float: right;
        }
        index li {
            display: inline-block;
            list-style: none;
        }
        index li a {
            font-size: 18px;
            text-transform: uppercase;
            padding: 0px 30px;
            color: white;
            text-decoration: none;
            word-spacing: 0ch;
        }
        index li a:hover {
            color: bisque;
            transition: all 0.4s ease 0s;
        }
        .content-items img {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-panel {
            background: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 300px;
            margin: 150px auto;
        }
        .login-panel label,
        .login-panel input,
        .login-panel button {
            margin: 10px 0;
        }

        #main-footer {
            background: #333;
            color: white;
            text-align: center;
            height: 30px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
<index>
        <div class="logo">
            <img src ="img/avatar.png" alt="Logo Image">
            <p>User Login</p>
        </div>
    </index>
    <div class="content-items">
        <div class="login-panel">
            
            <form action="" method="POST">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" />
                <br />
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" />
                <br />
                <input type="submit" name="submit" class="btn btn-primary" style="border-radius:0%;" value="Log In" />
            </form>
        </div>
    </div>
   <!----Section3 footer ---->
	<section id="main-footer" class="text-center text-white bg-inverse mt-4 p-4">
		<div class="container">
			<div class="row">
				<div class="col">
					<p class="lead">&copy; <?php echo date("Y")?> Nvision</p>
				</div>
			</div>
		</div>
	</section>
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor1');
    </script>

    
</body>

</html>
