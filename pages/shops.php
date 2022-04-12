<?php
$results = mysqli_query($database, 'select * from parduotuves');
$parduotuves = mysqli_fetch_all($results, MYSQLI_ASSOC);

$result = mysqli_query($database, 'select * from produktai join parduotuves_prekes on produktai.id = parduotuves_prekes.produkto_id');
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

//print_r();


if (isset($_POST['products'])) {
    $id = $_POST['parduotuves_id'];
    $products = $_POST['products'];
    $amount = $_POST['amount'];


    $sql = 'insert into parduotuves_prekes (parduotuve_id, kiekis, produkto_id, utilizuota) value ("' . $id . '","' . $amount . '","' . $products . '","' . 0 . '")';
    $result = mysqli_query($database, $sql);

}
?>

<h1>Parduotuvės prekės</h1>
<table border="1px">
    <form action="#" method="post">
        <tr>
            <td>
                Pasirinkite parduotuvę:
            </td>
            <td>
                <select align="center" name="parduotuves_id"><br/>
                    <?php foreach ($parduotuves as $parduotuve) { ?>

                        <option value="<?php echo $parduotuve['id'] ?>">

                            <?php echo $parduotuve['pavadinimas'] ?>
                        </option>

                    <?php } ?>
                </select>
                <br/>
            </td>
        </tr>
        <tr>
            <td>
                Parduotuvės prekės:
            </td>
            <td>
                <select name="products"><br/>
                    <?php foreach ($products

                    as $product) { ?>

                    <option value="<?php echo $product['id'] ?>">
                        <?php echo $product['pavadinimas'] ?>
                        (<?php echo $product['kiekis'] ?>)
                        <?php } ?>
                    </option>
                </select>
                <br/>
            </td>
        </tr>
        <tr>
            <td>
                Norimas kiekis:
            </td>
            <td>
                <input type="number" name="amount" value="">
            </td>
        </tr>
</table>
<br/>
<button type="submit">Pridėti</button>
<br/>
</form>
