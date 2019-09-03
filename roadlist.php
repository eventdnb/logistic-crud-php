<?php include ('server_roadlist.php'); 

    if (isset($_GET['edit'])) {
        $id_list = $_GET['edit'];
        $edit_state  = true;
        $rec = mysqli_query($db, "SELECT * FROM road_list WHERE id_list=$id_list");
        $record = mysqli_fetch_array($rec);
        $id_del = $record['id_del'];
        $id_driver = $record['id_driver'];
        $id_car = $record['id_car'];
        $dates = $record['dates'];
        $price = $price['price'];
        $id_list = $record['id_list'];
    }

    $get = mysqli_query($db, "SELECT name_del, id_del FROM deliveries");
    $option = '';
    while($row = mysqli_fetch_assoc($get))
    {
        $option .= '<option value = "'.$row['id_del'].'">'.$row['name_del'].'</option>';
    }

    $get_driver = mysqli_query($db, "SELECT pib, id_driver FROM drivers");
    $option_driver  = '';
    while($row = mysqli_fetch_assoc($get_driver))
    {
        $option_driver .= '<option value = "'.$row['id_driver'].'">'.$row['pib'].'</option>';
    }

    $get_car = mysqli_query($db, "SELECT name_car, id_car FROM cars");
    $option_car = '';
    while($row = mysqli_fetch_assoc($get_car))
    {
        $option_car .= '<option value = "'.$row['id_car'].'">'.$row['name_car'].'</option>';
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Путівкові листи - транспортної логістики підприємства</title>
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
                <th>Тип путівки</th>
                <th>Водій</th>
                <th>Автомобіль</th>
                <th>Дата</th>
                <th>Вартість</th>
                <th colspan="2">Операції</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($results)) { ?>
                <tr>
                    <td><?php echo $row['name_del'] ?></td>
                    <td><?php echo $row['pib']?></td>
                    <td><?php echo $row['name_car'] ?></td>
                    <td><?php echo $row['dates'] ?></td>
                    <td><?php echo $row['price'] ?></td>
                    <td>
                        <a href="roadlist.php?edit=<?php echo $row['id_list']; ?>" class="edit_btn">Редагувати</a>
                    </td>
                    <td>
                        <a href="server_roadlist.php?del=<?php echo $row['id_list']; ?>" class="del_btn">Видалити</a>
                    </td>
            </tr>
           <?php }?>
        </tbody>
    </table>
    <form method="post" action="server_roadlist.php">
        <input type="hidden" name="id_list" value="<?php echo $id_list; ?>">
            <div class="input-group">
                <label>Тип путівки</label>
                <select name="id_del" value="<?php echo $id_del; ?>"><?php echo $option; ?></select>
            </div>
            <div class="input-group">
                <label>Водій</label>
                <select name="id_driver" value="<?php echo $id_driver; ?>"><?php echo $option_driver; ?></select>
            </div>
            <div class="input-group">
                <label>Автомобіль</label>
                <select name="id_car" value="<?php echo $id_car; ?>"><?php echo $option_car; ?></select>
            </div>
            <div class="input-group">
                <label>Дата</label>
                <input type="text" name="dates" value="<?php echo $dates; ?>">
            </div>
            <div class="input-group">
                <label>Вартість</label>
                <input type="text" name="price" value="<?php echo $price; ?>">
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