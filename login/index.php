<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="../assets/css/admin.css">
        <title>Login</title>
    </head>
    <body>
        <?php

include './config/connection.php';
session_start();
if(isset($_SESSION['login'])){
    header("location:adminPage.php");
    exit;
}

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM akun WHERE username = '$username' && password = '$password'";
    $query = mysqli_query($conn,$sql);

    if (mysqli_num_rows($query) === 1) {
        $data = mysqli_fetch_assoc($query);
        $_SESSION['login'] = true;
        header('location:adminPage.php');
            exit();
        // if (password_verify($password, $data['password'])) {
        //     $_SESSION['login'] = true;
        //     header('location:adminPage.php');
        //     exit();
        // }else{
        //     echo "<script>
        //     alert('Username atau Password salah');
        //     window.location = 'login.php';
        //     </script>";
        // }
    }
    else {
            echo "<script>
            alert('Username atau Password salah');
            window.location = 'index.php';
            </script>";
    }
}
?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <table class="table">
                <tr>
                    <td colspan="2"><h2>Sign in</h2></td>
                </tr>
                <tr>
                    <td>Username</td>
                    </tr>
                    <tr>
                    <td><input type="text" name="username" id="username" class="username" placeholder="masukkan username anda"></td>
                    </tr>
                </tr>
                <tr>
                    <td>Password</td>
                    </tr>
                    <tr>
                    <td><input type="password" name="password" id="password" class="password" placeholder="masukkan password anda"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="login" value="login" class="login"></td>
                </tr>
            </table>
        </form>
    </body>
</html>