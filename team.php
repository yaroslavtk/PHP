<?php

require_once 'db.php';

/*if ($db)
echo "Db connection succes";
else
echo "Db coneection error";*/
// wrong!!!

/*mysqli_set_charset($db, 'utf8') or die('Wrong charset');
echo mysqli_connect_error();*/
// wrong!!!

//$bills = mysqli_real_escape_string($db, "Bill's"); //words with ` or ' 

//$insert = "INSERT INTO team (name, email, date) VALUES ('$bills', 'bill@.gm.com', '2022-12-21');";
//$insert = mysqli_query($db,"INSERT INTO `team` (`names`, `email`, `date`) VALUES ('Bill', 'bill@.gm.com', '2022-12-21')");
// alternative!
//$update = "UPDATE `team` SET `text` = 'hello' WHERE `id` = 6";
//$delete = "DELETE FROM team WHERE id= 5";

$select = "SELECT `id`,`name`,`email`,`date` FROM team LIMIT 20";

$query = mysqli_query($db, $select);
$team = mysqli_fetch_all($query, MYSQLI_ASSOC);

if ($query) { ?>
    <h2>Our team</h2>
    <style>
        td {
            padding: 10px;
        }
    </style>
    <table style="text-align:center; border:1px;">
        <thead style="background:lightgrey;">
            <td>ID</td>
            <td>NAME</td>
            <td>EMAIL</td>
            <td>DATE</td>
            <td>DELETE</td>
            <td>Update</td>
        </thead>
        <?php
        foreach ($team as $member) { ?>
            <tr>
                <td>
                    <?php echo $member['id']; ?>
                </td>
                <td>
                    <?php echo $member['name']; ?>
                </td>
                <td>
                    <?php echo $member['email']; ?>
                </td>
                <td>
                    <?php echo $member['date']; ?>
                </td>
                <td><a href="delete.php?id_member=<?php echo $member['id']; ?>">Delete</a></td>
                <td><a href="team.php?update_member=<?php echo $member['id']; ?>">Edit</a></td>
            </tr>
        <?php } ?>
    </table>
    <?php
}

if (!empty($_GET['update_member'])) { ?>
    <h2>Edit team member</h2>
    <style>
        label {
            display: block;
        }
    </style>
    <form action="update.php" method="post">
        <?php foreach ($team as $member) {
            if ($member['id'] == $_GET['update_member']) { ?>
                <label for="name">Name</label>
                <input type="text" name="name" value="<?php echo $member['name'] ?>"><br>
                <label for="email">Email</label>
                <input type="email" name="email" value="<?php echo $member['email'] ?>"><br>
                <label for="text">Date</label>
                <input type="text" name="date" value="<?php echo $member['date'] ?>"><br>
            <?php }
        } ?>
        <input type="hidden" name="id" value="<?php echo $_GET['update_member'] ?>"><br>
        <button style="margin-top:5px;">Send</button>
    </form>
<?php } else {

    ?>

    <h2>Add team member</h2>
    <style>
        label {
            display: block;
        }
    </style>
    <form action="add.php" method="post">
        <label for="name">Name</label>
        <input type="text" name="name"><br>
        <label for="email">Email</label>
        <input type="email" name="email"><br>
        <label for="text">Date</label>
        <input type="text" name="date"><br>
        <button style="margin-top:5px;">Send</button>
    </form>

<?php }
/*if($update) echo "Succesfuly updated -";
else echo "Update error ";*/

// var_dump(mysqli_fetch_all($query, MYSQLI_ASSOC));
// select

/*if ($query) var_dump($query);
else echo "error";*/

/*if($update) echo "Succesfuly updated -";
else echo "Update error ";*/
// wrong - works only if true!!!

/*if($db->query($query) === TRUE) echo "Succesfuly insert";
else echo "Insert error";*/
//wrong - works only if true!!!

//echo mysqli_error($db);
// wrong!!!

// var_dump($db);
?>