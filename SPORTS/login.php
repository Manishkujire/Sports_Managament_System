<?php
/**
* Created by PhpStorm.
* User: your name
* Date: todays date
* Time: todays time
*/
define( 'DIR', '' );
require_once DIR . 'config.php';

$control = new Controller();

$admin = new Admin();
//$control->isLogged( 'admin', 'admin/index' );

?>

<!DOCTYPE html>
<html lang = 'en'>

<head>
<title>Webpage Design</title>
<link rel = 'stylesheet' href = 'style.css'>
</head>

<body>
<div>
<form  action = '' method = 'POST'>
<div class = 'page'>
<div class = 'form' autocomplete = 'off'>
<h2>LOGIN HERE</h2>
<select name = 'type'>
<option selected disabled>Type of login</option>
<option value = 'admin'>ADMIN</option>
<option value = 'coach'>COACH</option>
<option value = 'player'>PLAYER</option>
</select>
<input type = 'email'  name = 'username' placeholder = 'Enter Username Here'  pattern = "[a-z0-9._%+-]+@[a-z]+\.[a-z]{2,}$">
<div class = 'email'>
</div>

<input type = 'password' autocomplete="off" name = 'password' placeholder = 'Enter Password Here'>
<button class = 'btnn' name = 'sub' type = 'submit'>LOGIN</button><br><br>
<?php
if ( isset( $_POST[ 'sub' ] ) ) 
 {$name = $_POST[ 'username' ];
    $password = md5($_POST[ 'password' ]);
    if ( $_POST[ 'type' ] == 'admin' ) {
        
        $stmt = $admin->ret( "SELECT * FROM `admin` where email='$name' and pass='$password'" );
        $row = $stmt->fetch( PDO::FETCH_ASSOC );

        $num = $stmt->rowCount();
        if ( $num ) {
            $_SESSION[ 'id' ] = $row[ 'id' ];
            $admin->redirect( 'admintemplate/admin' );
        } else {
            echo 'please check your username and password';
        }
    } elseif ( $_POST[ 'type' ] == 'coach' ) {
        $stmt = $admin->ret( "SELECT * FROM `coaches` where username='$name' and `password`='$password'" );
        $row = $stmt->fetch( PDO::FETCH_ASSOC );
        $num = $stmt->rowCount();
        if ( $num ) {
            $_SESSION[ 'id' ] = $row[ 'cid' ];
            $admin->redirect( 'coach/index' );
        } else {
            echo 'please check your username and password';
        }
    } elseif ( $_POST[ 'type' ] == 'player' ) {

        $stmt = $admin->ret( "SELECT * FROM `player` where email='$name' and `password`='$password'" );
        $row = $stmt->fetch( PDO::FETCH_ASSOC );

        $num = $stmt->rowCount();
        if ( $num ) {
            $_SESSION[ 'id' ] = $row[ 'pid' ];
            $admin->redirect( 'player/index' );
        } else {
            echo 'please check your username and password';

        }
    }
}?>
</div>
</div>
<style>
* {
    margin: 0;
    padding: 0;
}
body {
    background: linear-gradient( to top, rgba( 0, 0, 0, 0.5 )50%, rgba( 0, 0, 0, 0.5 )50% ), url( images/img1.jpg )no-repeat center fixed;
    background-size: cover;
}
.page {
    display:grid;
    place-items: center;
    margin:100px;

}
.form {
    position:relative;
    width: 520px;
    height: 580px;
    background: linear-gradient( to top, rgba( 0, 0, 0, 0.6 )50%, rgba( 0, 0, 0, 0.6 )50% );
    border-radius: 10px;
    padding: 50px;
    padding-top: 100px;
    color:#fff;

}

.form h2 {
    width: 420px;
    font-family: sans-serif;
    text-align: center;
    color: #ff7200;
    font-size: 22px;
    background-color: #fff;
    border-radius: 10px;
    margin: 2px;
    padding: 8px;
}

.form input {
    width: 430px;
    height: 35px;
    background: transparent;
    border-bottom: 1px solid #ff7200;
    border-top: none;
    border-right: none;
    border-left: none;
    color: #fff;
    font-size: 15px;
    letter-spacing: 1px;
    margin-top: 30px;
    font-family: sans-serif;
    border-radius:15px;
    padding-left:10px;
}

.form input:focus {
    outline: none;
}

::placeholder {
    color: #fff;
    font-family: Arial;
}
select {
    width: 430px;
    height: 35px;
    background: transparent;
    border-bottom: 1px solid #ff7200;
    border-top: none;
    border-right: none;
    border-left: none;
    color: #fff;
    font-size: 15px;
    letter-spacing: 1px;
    margin-top: 30px;
    font-family: sans-serif;
    border-radius:15px;
    padding-left:10px;
}
.btnn {
    width: 440px;
    height: 40px;
    background: #ff7200;
    border: none;
    margin-top: 30px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color: #fff;
    transition: 0.4s ease;
}
.btnn:hover {
    background: #fff;
    color: #ff7200;
}
.email {
    color: white;
    font-size: 20px;
    padding-left:0px;
    padding-top:3px;
    position: absolute;
}
.btnn a {
    text-decoration: none;
    color: #000;
    font-weight: bold;
}
.form .link {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 17px;
    padding-top: 20px;
    text-align: center;
}
.form .link a {
    text-decoration: none;
    color: #ff7200;
}
.liw {
    padding-top: 15px;
    padding-bottom: 10px;
    text-align: center;
}
.icons a {
    text-decoration: none;
    color: #fff;
}
.icons ion-icon {
    color: #fff;
    font-size: 30px;
    padding-left: 14px;
    padding-top: 5px;
    transition: 0.3s ease;
}
.icons ion-icon:hover {
    color: #ff7200;
}
</style>
</form>
</div>
</body>

</html>
