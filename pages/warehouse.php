<?php

if (isset($_POST['name'])) {
    $id = $_POST['id'];
    $category = $_POST['category'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $useBy_date = $_POST['useBy_date'];

    $sql = mysqli_query($database, 'insert into produktai (id, kategorija, pavadinimas, kaina, galiojimo_dienos) value ("' . $id . '","' . $category . '","' . $name . '","' . $price . '","' . $useBy_date . '")');
}
?>

<h1>Sandėlys</h1>
<h3>Produkto pridėjimo forma</h3>
<form action="#" method="post">
    <table>
        <tr>
            <td>
                Prekės ID:
            </td>
            <td>
                <input type="number" name="id" value="">
            </td>
        </tr>
        <tr>
            <td>
                Kategorija:
            </td>
            <td>
                <input type="text" name="category" value="">
            </td>
        </tr>
        <tr>
            <td>
                Pavadinimas:
            </td>
            <td>
                <input type="text" name="name" value="">
            </td>
        </tr>
        <tr>
            <td>
                Kaina:
            </td>
            <td>
                <input type="text" name="price" value=""><br/>
            </td>
        </tr>
        <tr>
            <td>
                Galiojimo dienos:
            </td>
            <td>
                <input type="number" name="useBy_date" value=""><br/>
            </td>
        </tr>
        <br/>
    </table>
    <br/>
    <button type="submit">Pridėti</button>