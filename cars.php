<?php include ('server_cars.php'); 

    if (isset($_GET['edit'])) {
        $id_car = $_GET['edit'];
        $edit_state  = true;
        $rec = mysqli_query($db, "SELECT * FROM cars WHERE id_car=$id_car");
        $record = mysqli_fetch_array($rec);
        $name_car = $record['name_car'];
        $id_type = $record['id_type'];
        $number_car = $record['number_car'];
        $id_car = $record['id_car'];
    }

    $get=mysqli_query($db, "SELECT name_type, id_type FROM types");
    $option = '';
    while($row = mysqli_fetch_assoc($get))
    {
        $option .= '<option value = "'.$row['id_type'].'">'.$row['name_type'].'</option>';
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Автомобілі - транспортної логістики підприємства</title>
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
                <th>Назва</th>
                <th>Тип авто</th>
                <th>Номерний знак</th>
                <th colspan="2">Операції</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($results)) { ?>
                <tr>
                    <td><?php echo $row['name_car'] ?></td>
                    <td><?php echo $row['name_type']?></td>
                    <td><?php echo $row['number_car'] ?></td>
                    <td>
                        <a href="cars.php?edit=<?php echo $row['id_car']; ?>" class="edit_btn">Редагувати</a>
                    </td>
                    <td>
                        <a href="server_cars.php?del=<?php echo $row['id_car']; ?>" class="del_btn">Видалити</a>
                    </td>
            </tr>
           <?php }?>
        </tbody>
    </table>
    <form method="post" action="server_cars.php">
        <input type="hidden" name="id_car" value="<?php echo $id_car; ?>">
            <div class="input-group">
                <label>Назва</label>
                <input type="text" name="name_car" value="<?php echo $name_car; ?>">
            </div>
            <div class="input-group">
                <label>Тип</label>
                <select name="id_type" value="<?php echo $id_type; ?>"><?php echo $option; ?></select>
            </div>
            <div class="input-group">
                <label>Номерний знак</label>
                <input type="text" name="number_car" value="<?php echo $number_car; ?>">
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