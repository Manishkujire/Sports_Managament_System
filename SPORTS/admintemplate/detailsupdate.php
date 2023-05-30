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
include 'admin.php';
// $control->isLogged( 'admin', 'admin/index' );
?>
<!DOCTYPE html>
<html>

<head>
    <title>DETAILS</title>
    <link rel='stylesheet' href='css/style.css'>
    <link rel='stylesheet' href='css/add.css'>
</head>

<body>

    <?php
$pid = $_GET [ 'id' ];
$stmt = $admin->ret( 'SELECT * FROM `player` where `pid`="'.$pid.'";' );
$row = $stmt->fetch( PDO::FETCH_ASSOC );
?>
    <div class='container'>
        <form action="Controller/detailsupdate.php?id=<?php echo $row['pid']; ?>" method='POST'>
            <h1>UPDATE PLAYER DETAILS</h1>
            <br>
            <div class='row'>
                <label>PID</label>
                <label>
                    <?php echo $pid;
?>
                </label>
            </div>
            <div class='row'>
                <label>NAME</label>
                <input type='text' name='name' placeholder='enter the name' value="<?php echo $row['name'];?>"
                    pattern='[A-Za-z]+' required title='letters only'>
            </div>
            <div class='row'>
                <label>AGE</label>
                <input type='number' name='age' placeholder='Enter the age' value='<?php echo $row['age']; ?>'>
            </div>
            <div class='row'>
                <label>DOB</label>
                <input type='date' name='dob' placeholder='Enter the dob' value='<?php echo $row['dob']; ?>'>
            </div>
            <div class='row'>
                <label>GENDER</label>
                <select name='gender' value='<?php echo $row['gender']; ?>'>
                    <option value='Male'>Male</option>
                    <option value='Female'>Female</option>
                </select>
            </div>
            <div class='row'>
                <label>ADDRESS</label>
                <input type='text' name='address' placeholder='Enter the address' value='<?php echo $row['address'];
                    ?>'>
            </div>
            <div class='row'>
                <label>PHONE NUMBER</label>
                <input type='text' name='phone' placeholder='Enter phone number' value='<?php echo $row['phone'];
                    ?>'pattern = "^\d{10}$" required title = '10 numeric characters only'
                >
            </div>
            <div class='row'>
                <label>SPORT</label>
                <select name='sport' value='<?php echo $row['sport']; ?>'>
                    <?php
$query = $admin->ret( 'SELECT * FROM `sport`' );
while( $sport = $query->fetch( PDO::FETCH_ASSOC ) ) {
    ?>
                    <option value='<?php echo $sport['sname'];?>'>
                        <?php echo $sport[ 'sname' ];
    ?>
                    </option>
                    <?php }
    ?>
                </select>
            </div>
            <div class='row'>
                <label>EMAIL</label>
                <input type='email' name='email' placeholder='Enter the email' value='<?php echo $row['email'];
                    ?>'pattern = "[a-z0-9._%+-]+@[a-z]+\.[a-z]{2,}$">
            </div>
            <div class='row'>
                <label>PASSWORD</label>
                <input type='text' name='password' placeholder='Enter the password' value='<?php echo $row['password'];
                    ?>'>
            </div>
            <br>
            <div class='row'>

                <input type='submit' name='update' value='SUBMIT' class='btn btn-danger'>
            </div>
        </form>
    </div>
</body>

</html>