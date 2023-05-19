<!DOCTYPE html>
<html>
    <head>
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
            <table>
                <tr>
                    <td>username</td>
                    <td><input type="text" name="username" id="username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" id="password"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="login" value="login"></td>
                </tr>
            </table>
        </form>
    </body>
</html>