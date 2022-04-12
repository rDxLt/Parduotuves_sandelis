<?php

if (isset($_POST['name'])) {
//    $id = $_POST['id'];
    $category = $_POST['category'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $useBy_date = $_POST['useBy_date'];

    $sql = mysqli_query($database, 'insert into produktai ( kategorija, pavadinimas, kaina, galiojimo_dienos) value ("' . $category . '","' . $name . '","' . $price . '","' . $useBy_date . '")');
//    $result = mysqli_query($database, $sql);
}


?>
<h1>Produktai</h1>
<h2>
    Produktų sąrašas:
</h2>
<table border=1px>
    <tr>
        <th>ID</th>
        <th>Kategorija</th>
        <th>Pavadinimas</th>
        <th>Kaina €</th>
        <th>Galiojimo dienos</th>
    </tr>
    <?php
    $result = mysqli_query($database, 'select * from produktai join sandelio_produktai on produktai.id = sandelio_produktai.produkto_id');
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach ($products as $product) { ?>
        <tr>
            <td>
                <?php echo $product['id'] ?>
            </td>
            <td align="center">
                <?php echo $product['kategorija'] ?>
            </td>
            <td align="center">
                <?php echo $product['pavadinimas'] ?>
            </td>
            <td align="center">
                <?php echo $product['kaina'] ?>
            </td>
            <td align="center">
                <?php echo "<b>" . $product['galiojimo_dienos'] . "<b>" ?>
            </td>
        </tr>
    <?php } ?>
</table>

<h3>Produkto pridėjimo forma</h3>
<form action="#" method="post">
    <table border=1px>
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
    </table>
    <br/>
    <button type="submit">Pridėti</button>

