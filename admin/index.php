<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDU AIRLINES</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/css/bootstrap.min.css" integrity="sha512-CpIKUSyh9QX2+zSdfGP+eWLx23C8Dj9/XmHjZY2uDtfkdLGo0uY12jgcnkX9vXOgYajEKb/jiw67EYm+kBf+6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php
        session_start();

        if(isset($_SESSION['status']) && $_SESSION['status'] === "login"){
            header("location:/zenius2/admin/dashboard.php");
            die();
        }

        include '../connection.php';

        if(isset($_POST['username']) && $_POST['password']){
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM admins WHERE username='$username' and password='$password'";
            $data = $conn->query($sql);

            $check = mysqli_num_rows($data);

            if(isset($_POST['submit'])){
                if($check !=0){
                    $_SESSION['username'] = $username;
                    $_SESSION['status'] = "login";
                    header("location:/zenius2/admin/dashboard.php");
                    die();
                }else{
                    $_SESSION['error'] = "Gagal login, silahkan cek kembali username dan password Anda";
                }
            }
        }
    ?>

<div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-dark mt-5">Login Form</h2>
                <div class="text-center mb-5 text-dark">Edu Airlines</div>
                <div class="card my-5">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="card-body p-lg-5" style="background-color: #AFEEEE">
                        <div class="text-center">
                            <img src="../assets/pesawat.png" class="img-fluid img-thumbnail rounded-circle my-3" width="200px" alt="profile">
                        </div>
                        <br><br>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" require placeholder="Username">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="password" id="password" placeholder="Password" require>
                        </div>
                        <p style="color: red; font size: 12px;"><?php if(isset($_SESSION['error'])){ echo($_SESSION['error']);} ?></p>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-primary px-5 mb-5 w-100">Login</button>
                        </div>
                        <div id="emailHelp" class="form-text text-center mb-4 text-dark">
                            Not Registered?
                            <a href="#" class="text-dark fw-bold">Create an Account</a>
                            <br><br>
                            <a href="#" class="text-dark fw-bold">Back to Home</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <?php
    unset($_SESSION['error']);
    ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js" integrity="sha512-5BqtYqlWfJemW5+v+TZUs22uigI8tXeVah5S/1Z6qBLVO7gakAOtkOzUtgq6dsIo5c0NJdmGPs0H9I+2OHUHVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>