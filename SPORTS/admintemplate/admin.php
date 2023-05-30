<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel='stylesheet'
        href='https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200' />
</head>
<title>ADMIN</title>

<body>
    <div class='player_pag'>
        <nav class='sidebar'>
            <div>
                <a href='admin.php' class='brand'>
                    <span class='material-symbols-outlined'>

                    </span>
                    <span>SPORTS MANAGEMENT</span>
                </a>
                <small class='menu-heading'>
                    <span>Admin Tools</span>
                </small>
                <ul class='tools'>
                    <li>
                        <a href='viewdetails.php'>
                            <span class='material-symbols-outlined'>person</span>
                            <span>PLAYERS</span></a>
                        <a class="add" href="adddetails.php"> <span class='material-symbols-outlined'>add</span>
                    </a>
                    </li>
                    <li>
                        <a href='viewcoach.php'>
                            <span class='material-symbols-outlined'>games</span>
                            <span>COACH</span> </a>

                        <a class="add" href="addcoach.php"> <span class='material-symbols-outlined'>add</span>

                        </a>
                    </li>
                    <li>
                        <a href='viewsport.php'>
                            <span class='material-symbols-outlined'>sprint</span>
                            <span>SPORTS</span> </a>

                        <a class="add" href="addsport.php"> <span class='material-symbols-outlined'> add</span>
                        </a>
                    </li>
                    <li>
                        <a href='viewevent.php'>
                            <span class='material-symbols-outlined'>event</span>
                            <span>EVENT</span>
                        </a>
                        <a class="add" href="addevent.php"> <span class='material-symbols-outlined'> add</span>
                        </a>
                    </li>
                    <li>
                        <a href='viewachive.php'>
                            <span class='material-symbols-outlined'>workspace_premium</span>
                            <span>ACHIVEMENT</span>
                        </a>
                        <a class="add" href="addachive.php"> <span class='material-symbols-outlined'> add</span>
                        </a>
                    </li>
                    <li>
                        <a href='viewatt.php'>
                            <span class='material-symbols-outlined'>stadium</span>
                            <span>ATTENDANVE</span></a>
                            <a class="add" href="addattendance.php"> <span class='material-symbols-outlined'> add</span>

                            </a>
</li>
<li>
                        <a href='viewteam.php'>
                            <span class='material-symbols-outlined'>group</span>
                            <span>TEAM</span></a>
                            <a class="add" href="#"> <span class='material-symbols-outlined'> add</span>

                            </a>
</li>
                <div class='profile'>
                    <a href='#'>

                        <img src='../images/admin.jpeg' alt='image'>

                    </a>
                    <div>

                        <h4> ADMIN </h4>
                    </div>
                    <span class='material-symbols-outlined'>verified_user</span>
                </div>
                <div class='logout'>
                    <a class="log" href='../login.php'>
                        <span class='logout'>logout</span>
                        <i class="material-symbols-outlined">
logout
</i></a>
                </div>
            </div>
        </nav>
    </div>
</body>

</html>