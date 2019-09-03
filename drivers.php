<?php include ('server.php'); 

    if (isset($_GET['edit'])) {
        $id_driver = $_GET['edit'];
        $edit_state  = true;
        $rec = mysqli_query($db, "SELECT * FROM drivers WHERE id_driver=$id_driver");
        $record = mysqli_fetch_array($rec);
        $pib = $record['pib'];
        $phone_number = $record['phone_number'];
        $data_driver = $record['data_driver'];
        $id_driver = $record['id_driver'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Водії - транспортної логістики підприємства</title>
</head>
<body>
    <?php if (isset($_SESSION['msg'])): ?>
        <div class="msg">
            <?php
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            ?>
        </div>
    <?php endif ?>

    <table>
        <thead>
            <tr>
                <th>ПІБ</th>
                <th>Номер телефону</th>
                <th>Додаткова інформація</th>
                <th colspan="2">Операції</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($results)) { ?>
                <tr>
                    <td><?php echo $row['pib'] ?></td>
                    <td><?php echo $row['phone_number'] ?></td>
                    <td><?php echo $row['data_driver'] ?></td>
                    <td>
                        <a href="drivers.php?edit=<?php echo $row['id_driver']; ?>" class="edit_btn">Редагувати</a>
                    </td>
                    <td>
                        <a href="server.php?del=<?php echo $row['id_driver']; ?>" class="del_btn">Видалити</a>
                    </td>
            </tr>
           <?php }?>
        </tbody>
    </table>
    <form method="post" action="server.php">
        <input type="hidden" name="id_driver" value="<?php echo $id_driver; ?>">
            <div class="input-group">
                <label>ПІБ</label>
                <input type="text" name="pib" value="<?php echo $pib; ?>">
            </div>
            <div class="input-group">
                <label>Номер телефону</label>
                <input type="text" name="phone_number" value="<?php echo $phone_number; ?>">
            </div>
            <div class="input-group">
                <label>Додаткова інформація</label>
                <input type="text" name="data_driver" value="<?php echo $data_driver; ?>">
            </div>
            <div class="input-group">
                <?php if($edit_state == false): ?>
                    <button type="submit" name="save" class="btn">Зберегти</button>
                <?php else: ?>
                    <button type="submit" name="update" class="btn">Редагувати</button>
                <?php endif ?>
                    <a href="index.php" class="btn">Назад</a>
            </div>
        </form>
</body>
</html>