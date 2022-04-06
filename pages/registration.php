<?php

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $name = $_POST['name'];
    $pareigybe = $_POST['pareigybe'];
    $code = $_POST['code'];
    $errors = [];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'][] = 'Neteisingas el. pastas';
    }
    if (strlen($password) < 9) {
        $errors['password'][] = 'slaptazodis turi buti ilgesnis nei 9 simboliai';
    }
    if (!preg_match('/[A-Za-z]/', $password) || !preg_match('/[0-9]/', $password)) {
        $errors['password'][] = 'slaptazodyje turi buti raide ir skaicius';
    }

    if (strlen($name) < 3 || strlen($name) > 60) {
        $errors['name'][] = 'vardas yra per ilgas arba per trumpas';
    }
    if ($email == $password) {
        $errors['password'][] = 'slaptazodis ir emailas negali buti vienodi';
    }
    if ($password != $password2) {
        $errors['password2'][] = 'Slaprazodiai nesutampa';
    }

    $checkEmail = mysqli_query($database, 'select * from darbuotojai where pastas = "' . $email . '"');
    $checkEmail = mysqli_fetch_row($checkEmail);
    if ($checkEmail != null) {
        $errors['email'][] = 'Pastas uzimtas';

    }
    if ($_SESSION['code'] != $code) {
        $errors['code'] = 'Blogas saugos kodas';
    }

    if (empty($errors)) {
        $user = mysqli_query($database, 'insert into darbuotojai (vardas, pareigybe, slaptazodis, pastas) value ("' .
            $name . '", "' . $pareigybe . '", "' . $password . '", "' . $email . '")');
        if ($user != false) {
            header('Location: index.php?page=login&email=' . $email);
        } else {
            echo 'Nepavyko sukurti vartotojo';
        }
    }
}
$_SESSION['code'] = rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);
?>
<h1>Registracija</h1>
<form action="index.php?page=register" method="post">
    <table>
        <tr>
            <td>
                Vardas:
            </td>
            <td>
                <input type="text" name="name" value="<?php echo $name ?? null ?>">
            </td>
            <td>
                <?php
                if (isset($errors['name'])) {
                    echo implode(',', $errors['name']);
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                Pareigybe:
            </td>
            <td>
                <input type="text" name="pareigybe">
            </td>

        </tr>
        <tr>
            <td>
                Paštas:
            </td>
            <td>
                <input type="text" name="email" value="<?php echo $email ?? null ?>">
            </td>
            <td>
                <?php
                if (isset($errors['email'])) {
                    echo implode(',', $errors['email']);
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                Slaptažodis:
            </td>
            <td>
                <input type="password" name="password">
            </td>
            <td>
                <?php
                if (isset($errors['password'])) {
                    echo implode(',', $errors['password']);
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                Pakartoti slaptažodi:
            </td>
            <td>
                <input type="password" name="password2">
            </td>
            <td>
                <?php
                if (isset($errors['password2'])) {
                    echo implode(',', $errors['password2']);
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                Saugos kodas: <?php echo $_SESSION['code'] ?>
            </td>
            <td>
                <input type="text" name="code">
            </td>
            <td>
                <?php
                if (isset($errors['code'])) {
                    echo $errors['code'];
                }
                ?>
            </td>
        </tr>
    </table>
    <button type="submit">Registruotis</button>
</form>