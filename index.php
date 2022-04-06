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

            $checkPareigybe = mysqli_query($database, 'select pareigybe from darbuotojai where pastas = "' . $_SESSION['email'] . '"');
            $checkPareigybe = mysqli_fetch_array($checkPareigybe, MYSQLI_ASSOC);

            $warehouse_person = mysqli_query($database, 'select pareigybe from darbuotojai where pareigybe = "' . 'sandelio_darbuotojas' . '"');
            $warehouse_person = mysqli_fetch_array($warehouse_person, MYSQLI_ASSOC);

//            var_dump($checkPareigybe);
//            var_dump($_SESSION['email']);
//            var_dump($warehouse_person);

            if (isLoged() === true) { ?>
                <td>
                    <a href="index.php?page=shops">Parduotuvės</a>
                </td>
                <?php if ($warehouse_person === $checkPareigybe) { ?>
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