<?php
$action = $_GET['action'] ?? null;

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $amount = $_POST['likutis'];

    $sql = 'insert into sandelio_produktai (produkto_id, likutis) value ("' . $id . '","' . $amount . '")';
    $result = mysqli_query($database, $sql);
//    echo '<pre>';
//    print_r($sql);
//    echo '</pre>';

}

?>

<h3>Produkto užsakymo forma</h3>
<form action="#" method="post">
    <table border="1px">
        <tr>
            <td>
                Prekė:
            </td>
            <td>
                <select type="number" name="id" value=""><br/>
                    <?php
                    $result = mysqli_query($database, 'select * from produktai');
                    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    foreach ($products as $product) { ?>
                        <option value="<?php echo $product['id'] ?>"><?php echo $product['pavadinimas'] ?></option>
                    <?php } ?>
                </select><br/>
            </td>
        </tr>
        <tr>
            <td>
                Kiekis:
            </td>
            <td>
                <input type="number" name="likutis" value="">
            </td>
        </tr>
    </table>
    <br/>
    <button type="submit">Pridėti</button>
    <br/>
</form>
<br/>
<br/>
<br/>
<h2>
    Produktų sąrašas sandėlyje:
</h2>
<form action="index.php?page=warehouse&action=id" method="post" name="id">
    <!--   isemiau is action --><?php //echo $id ?>
    <table border=1px>
        <tr>
            <!--            <th>ID</th>-->
            <th>Pavadinimas</th>
            <th>Likutis</th>
            <th>Action</th>
        </tr>
        <?php
        $result = mysqli_query($database, 'select * from produktai');
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($products

        as $product) {
        ?>
        <tr>
            <td align="center">
                <?php echo $product['pavadinimas'] ?>
            </td>
            <td>
                <?php
                $id = mysqli_query($database, 'select likutis from sandelio_produktai');
                $amount = mysqli_fetch_all($id, MYSQLI_ASSOC);
                foreach ($amount as $amounts) {
//                    echo $amounts['likutis'];
                    print_r($amounts);
                } ?>
            </td>
            <td>
                <a href="delete.php?=id">Delete</a>
            </td>
            <?php } ?>
        </tr>
    </table>
    <br/>
    <button type="submit">Atnaujinti likučius</button>
</form>

