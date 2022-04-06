<?php
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $errors = [];

    if (empty($email) || empty($password)) {
        $errors[] = 'Yra tusciu lauku';
    }

    /** @var TYPE_NAME $database */
    $checkUser = mysqli_query($database, 'select * from users where email = "' . $email . '" and password = "' . $password . '"');
    $checkUser = mysqli_fetch_row($checkUser);

    if ($checkUser == null) {
        $errors[] = 'Blogi prisijungimo duomenys';
    }

    if (empty($errors)) {
        $_SESSION['email'] = $email;
        header('Location: index.php');
    }
}
?>
<h1>Login</h1>

<form action="index.php?page=login" method="post">
    <table>
        <tr>
            <td>
                Paštas:
            </td>
            <td>
                <input type="text" name="email" value="<?php echo $_GET['email'] ?? null ?>">
            </td>
        </tr>
        <tr>
            <td>
                Slaptažodis:
            </td>
            <td>
                <input type="password" name="password">
            </td>
        </tr>
    </table>
    <br/><br/>
    <button type="submit">Prisijungti</button>
</form>