<?php
session_start();

/*$_SESSION['MyName'] = "Valiok";
$_SESSION['mySettings'] = ['test', 1234, true];
var_dump($_SESSION);
echo '<br>';
unset($_SESSION['MyName']);
var_dump($_SESSION);*/

// session_unset();
// session_destroy();

// var_dump($_SESSION);
if(isset($_GET['logout']) && $_GET['logout'] == 1) {
    session_unset();
    header("Location: session.php");
}; 

define("ADMINPASS", "12345");
$_SESSION['errors'] = "";

if (!empty($_POST['password_access'])) {
    if ($_POST['password_access'] === ADMINPASS) {
        $_SESSION['access'] = true;
        $_SESSION['errors'] = "Login success";
    } else {
        $_SESSION['errors'] = "WRONG PASSWORD!!!";
    }
}

 if (isset($_SESSION['access'])) {
    echo $_SESSION['errors'];
    echo ' <a href="session.php?logout=1 "><button>Logout</button></a>';
} else {
    echo $_SESSION['errors'];
    ?>

        <form action="" method="post">
            <input type="text" name="password_access" placeholder="Password">
            <button>Login</button>
        </form>
<?php } ?>