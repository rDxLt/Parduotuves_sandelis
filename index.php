<?php
include_once 'config.php';
?>
<hr>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello, world!</title>
</head>
<body>
<style>
    table {
        padding: 10px;
    }

    td {
        padding: 10px;
    }
</style>
<!--menu-->
<table>
    <tr>
        <td>
            <a href="index.php">Home</a>
        </td>
        <?php if (isLoged() === false) { ?>
            <td>
                <a href="index.php?page=login">Prisijungimas</a>
            </td>
            <td>
                <a href="index.php?page=register">Registruotis</a>
            </td>
        <?php } ?>
        <?php if (isLoged() === true) { ?>
            <td>
                <a href="index.php?page=#">Sandėlys</a>
            </td>
            <td>
                <a href="index.php?page=logout">Atsijungti</a>
            </td>
        <?php } ?>
    </tr>
</table>

<?php
/** @var TYPE_NAME $page */
if ($page === null) {
    include 'pages/home.php';
} elseif ($page === 'register') {
    include 'pages/registration.php';
} elseif ($page === 'login') {
    include 'pages/login.php';
} elseif ($page === 'logout') {
    include 'pages/logout.php';
}
?>

<br/><br/>
<!--footer-->
<?php
echo date('Y-m-d H:i:s');
?>
</body>
</html>