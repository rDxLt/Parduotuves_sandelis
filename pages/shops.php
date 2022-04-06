<h1>Parduotuvės</h1>
<table>
    <tr>
        <td>
            Pasirinkite parduotuvę:
        </td>
        <td>
            <select name="parduotuves" value=""><br/>
                <?php
                $result = mysqli_query($database, 'select * from parduotuves');
                $parduotuves = mysqli_fetch_all($result, MYSQLI_ASSOC);
                foreach ($parduotuves as $parduotuve) { ?>
                    <option value="<?php echo $parduotuve['pavadinimas'] ?>"><?php echo $parduotuve['pavadinimas'] ?></option>
                <?php } ?>
            </select><br/>
        </td>
    </tr>
</table>