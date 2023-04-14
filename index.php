<?

/*$name = "Petro";
echo "Hello <br>";
print $name;*/

session_start();

/*echo $_SESSION['MyName'] . '<br>';
var_dump($_SESSION['mySettings']);
echo '<br>';*/

if (!isset($_SESSION['access']))
    die('You are not an Admin');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>



    <?php
    // echo "You are an admin";
    require_once 'team.php';
        ?>
        
</body>

</html>