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

        <?php
        if (isset($_SESSION['email'])) {

            function getEmployeesData($email, $data)
            {
                $database = mysqli_connect('127.0.0.1', 'root', '', 'parduotuve_sandelis');
                $get_user = mysqli_query($database, "SELECT * FROM darbuotojai WHERE pastas = '$email'");
                $get_user = mysqli_fetch_object($get_user);
                return $get_user->$data;
            }

            $email = $_SESSION['email'];
            $get_role = getEmployeesData($email, 'pareigybe');
            var_dump($get_role);

            if (isLoged() === true) { ?>
                <td>
                    <a href="index.php?page=shops">Parduotuvės</a>
                </td>
                <!--                --><?php //if ($warehouse_person === $checkPareigybe) { ?>
                <?php if ($get_role === 'sandelio_darbuotojas') { ?>
                    <td>
                        <a href="index.php?page=warehouse">Sandėlys</a>
                    </td>
                <?php } else { ?>
                    <td>
                        <a href="index.php?page=products">Produktai</a>
                    </td>
                <?php } ?>
                <td>
                    <a href="index.php?page=logout">Atsijungti</a>
                </td>
            <?php } ?>
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
} elseif ($page === 'shops') {
    include 'pages/shops.php';
} elseif ($page === 'warehouse') {
    include 'pages/warehouse.php';
} elseif ($page === 'products') {
    include 'pages/products.php';
}
?>

<br/><br/>
<!--footer-->
<?php
echo date('Y-m-d H:i:s');
?>
</body>
</html>