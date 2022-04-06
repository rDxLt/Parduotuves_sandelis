<?php


?>

<form action="/action_page.php" method="post">
    <fieldset>
        <legend>Prisijungimas:</legend>
        <table>
            <tr>
                <td>
                    Paštas:
                </td>
                <td>
                    <input type="email" id="email" name="email">
                </td>
            </tr>
            <br>
            <tr>
                <td>
                    Slaptažodis:
                </td>
                <td>
                    <input type="password" id="password" name="password">
                </td>
            </tr>
        </table>
        <br>
        <input type="submit" value="Prisijungti">
        <hr>
        <a href="#">Registracija</a>
    </fieldset>
</form>
