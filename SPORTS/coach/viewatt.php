<?php
define( 'DIR', '' );
require_once DIR . 'config.php';
$control = new Controller();
$admin = new Admin();
include 'index.php';
$id= $_SESSION['id'];
$stmt = $admin->ret( 'SELECT * FROM `coaches` where `cid`='.$id.'' );
$row = $stmt->fetch( PDO::FETCH_ASSOC );
$sport= $row['sport'];
?>
<!DOCTYPE html>
<html lang = 'en'>

<head>
<link rel = 'stylesheet' href = 'css/attendance.css'>

</head>

<body>
<div class = 'container'>
<h3>ADD ATTENDANCE</h3>
        <div>
            <a href='index.php'>
            <span class="material-symbols-outlined back">
arrow_back
</span></a>
<br>
<br>
        </div>
<form action = '' method = 'POST'>
<div class = 'row'>
<select name = 'month'>
<option>Select Month</option>
<option value = '1'>January</option>
<option value = '2'>February</option>
<option value = '3'>March</option>
<option value = '4'>April</option>
<option value = '5'>May</option>
<option value = '6'>June</option>
<option value = '7'>July</option>
<option value = '8'>August</option>
<option value = '9'>September</option>
<option value = '10'>October</option>
<option value = '11'>November</option>
<option value = '12'>December</option>
</select>
</div>
<div class = 'row'>
<select name = 'year'>
<option>Select Year</option>
<option value = '2022'>2022</option>
<option value = '2023'>2023</option>
<option value = '2024'>2024</option>
<option value = '2025'>2025</option>
<option value = '2026'>2026</option>
<option value = '2027'>2027</option>
<option value = '2028'>2028</option>
<option value = '2029'>2029</option>
<option value = '2030'>2030</option>
</select>
</div>
<div class = 'row'>
<input class = 'btn btn-danger' type = 'submit' name = 'search' value = 'Search'>
</div>
</form>
<div class = 'row'>
<label>Month and Year</label>
<?php
if ( isset( $_POST[ 'search' ] ) ) {
    $mn = $_POST[ 'month' ];
    $year = $_POST[ 'year' ];

    ?>
    <input type = 'text' name = 'today' value = "<?php echo $mn." -".$year;?> " readonly = ''>
    <?php

} else {
    ?>
    <input type = 'text' name = 'today' value = "<?php $todaydate=date('n-Y'); echo $todaydate;?> " readonly = ''>
    <?php
    $m = date( 'n' );
    $y = date( 'y' );
    $ddate = cal_days_in_month( CAL_GREGORIAN, $m, $y );

}
?>
</div>

<?php
if ( isset( $_POST[ 'search' ] ) ) 
 {

    $number = cal_days_in_month( CAL_GREGORIAN, $mn, $year );

    ?>
    <table class = 'content-table '>
    <thead>
    <tr>
    <th rowspan = '2'>SN</th>
    <th rowspan = '2'>PID</th>
    <th rowspan = '2'>Player Name</th>
    <th colspan = "<?php echo $number; ?>">Date</th>
    </tr>
    <tr>
    <?php
    for ( $d = 1; $d <= $number; $d++ )
 {
        ?>
        <td>
        <?php echo $d;
        ?>
        </td>
        <?php
    }
    ?>
    </tr>
    </thead>
    <tbody>
    <?php
    $i = 1;
    $stmt = $admin->ret( "SELECT * FROM `player`where sport='$sport'" );
    while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ) 
 {
        $wid = $row[ 'pid' ];
        ?>
        <tr>
        <td>
        <?php echo $i++;
        ?>
        </td>
        <td>
        <?php echo $row[ 'pid' ];
        ?>
        </td>
        <td>
        <?php echo $row[ 'name' ];
        ?>
        </td>
        <?php
        for ( $t = 1; $t <= $number; $t++ )
 {

            $stmts = $admin->ret( "SELECT * from attendance where  MONTH(date)='$mn'  and YEAR(date)='$year' and Day(date)='$t' and pid='$wid'" );
            $read = $stmts->fetch( PDO::FETCH_ASSOC );

            $rows = $stmts->rowCount();

            ?>
            <td>
            <?php if ( $rows == 1 )
 {
                $status = $read[ 'status' ];
                if ( $status == 'absent' ) {
                    ?><span style = 'color: red; font-weight: bold;'>A</span>
                    <?php } else {
                        ?> <span style = 'color: green; font-weight: bold;'>P</span>
                        <?php  }
                    } else {
                        echo '-';
                    }
                    ?>
                    </td>
                    <?php
                }
            }

            ?>
            </tr>
            <?php
            ?>
            </tbody>
            </table>
            <?php
        } else {

            ?>
            <table class = 'content-table '>
            <thead>
            <tr>
            <th rowspan = '2'>SN</th>
            <th rowspan = '2'>PID</th>
            <th rowspan = '2'>Player Name</th>
            <th colspan = "<?php echo $ddate; ?>">Date</th>
            </tr>
            <tr>
            <?php
            for ( $d = 1; $d <= $ddate; $d++ )
 {
                ?>
                <td>
                <?php echo $d;
                ?>
                </td>
                <?php
            }
            ?>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 1;
            $stmt = $admin->ret( "SELECT * FROM `player`where sport='$sport'" );
            while( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ) 
 {

                $wid = $row[ 'pid' ];
                ?>
                <tr>
                <td>
                <?php echo $i++;
                ?>
                </td>
                <td>
                <?php echo $row[ 'pid' ];
                ?>
                </td>
                <td>
                <?php echo $row[ 'name' ];
                ?>
                </td>
                <?php
                $m1 = date( 'm' );

                for ( $t = 1; $t <= $ddate; $t++ )
 {
                    $stmts = $admin->ret( "SELECT * from attendance where  MONTH(date)='$m1' and Day(date)='$t' and pid='$wid'" );
                    $read = $stmts->fetch( PDO::FETCH_ASSOC );

                    $rows = $stmts->rowCount();

                    ?>
                    <td>
                    <?php if ( $rows == 1 )
 {
                        $status = $read[ 'status' ];
                        if ( $status == 'absent' ) 
 {
                            ?><span style = 'color: red; font-weight: bold;'>A</span>
                            <?php } else {
                                ?> <span style = 'color: green; font-weight: bold;'>P</span>
                                <?php  }
                            } else {
                                echo '-';
                            }
                            ?>
                            </td>
                            <?php
                        }
                        ?>
                        </tr>
                        <?php
                    }
                    ?>

                    </tbody>
                    </table>
                    <?php

                }
                ?>

                </div>
                </body>

                </html>
                <!-- end document-->