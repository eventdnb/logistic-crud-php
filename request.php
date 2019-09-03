<?php include ('server_request.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Інформаційні запити до ІС транспортної логістики підприємства</title>
</head>
<body>
    <h1>ІС - транспортної логістики підприємства</h1>
    <form class="index-form">
        <a href="drivers.php" class="btn">Водії</a>
        <a href="cars.php" class="btn">Автомобілі</a>
        <a href="roadlist.php" class="btn">Путівкові листи</a>
        <a href="request.php" class="btn">Інформаційні запити до ІС</a>
    </form>
    <table>
        <thead>
            <td>Грузові автомобілі підприємства</td>    
            <tr>
                <th>Назва</th>
                <th>Тип авто</th>
                <th>Номерний знак</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($results_IN)) { ?>
                <tr>
                    <td><?php echo $row['name_car'] ?></td>
                    <td><?php echo $row['name_type']?></td>
                    <td><?php echo $row['number_car'] ?></td>
                </tr>
           <?php }?>
        </tbody>
    </table>
    <table>
        <thead>
            <td>Водії із Черкас</td>    
            <tr>
                <th>ПІБ</th>
                <th>Номер телефону</th>
                <th>Додаткова інформація</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($results_LIKE)) { ?>
                <tr>
                    <td><?php echo $row['pib'] ?></td>
                    <td><?php echo $row['phone_number']?></td>
                    <td><?php echo $row['data_driver'] ?></td>
                </tr>
           <?php }?>
        </tbody>
    </table>
    <table>
        <thead>
            <td>Виїзди за першу половину 2019 року</td>    
            <tr>
                <th>Водій</th>
                <th>Автомобіль</th>
                <th>Дата</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($results_BETWEEN)) { ?>
                <tr>
                    <td><?php echo $row['pib'] ?></td>
                    <td><?php echo $row['name_car'] ?></td>
                    <td><?php echo $row['dates'] ?></td>
                </tr>
           <?php }?>
        </tbody>
    </table>
    <table>
        <thead>
            <td>Загальна кількість виїздів</td>    
            <tr>
                <th>Кільіксть виїздів</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($results_COUNT)) { ?>
                <tr>
                    <td><?php echo $row['count_road'] ?></td>
                </tr>
           <?php }?>
        </tbody>
    </table>
    <table>
        <thead>
            <td>Грузові та пасажирські автомобілі підприємства</td>    
            <tr>
                <th>Назва</th>
                <th>Тип авто</th>
                <th>Номерний знак</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($results_OR)) { ?>
                <tr>
                    <td><?php echo $row['name_car'] ?></td>
                    <td><?php echo $row['name_type']?></td>
                    <td><?php echo $row['number_car'] ?></td>
                </tr>
           <?php }?>
        </tbody>
    </table>
    <table>
        <thead>
            <td>Дані про водіїв без повторів</td>    
            <tr>
                <th>ПІБ</th>
                <th>Номер телефону</th>
                <th>Додаткова інформація</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($results_DISTINC)) { ?>
                <tr>
                    <td><?php echo $row['pib'] ?></td>
                    <td><?php echo $row['phone_number']?></td>
                    <td><?php echo $row['data_driver'] ?></td>
                </tr>
           <?php }?>
        </tbody>
    </table>
    <table>
        <thead>
            <td>Типи авто</td>    
            <tr>
                <th>Тип автомобіля</th>
                <th>Автомобіль</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($results_INNER_JOIN)) { ?>
                <tr>
                    <td><?php echo $row['name_type'] ?></td>
                    <td><?php echo $row['name_car']?></td>
                </tr>
           <?php }?>
        </tbody>
    </table>
    <table>
        <thead>
            <td>Дні в які працювали водії</td>    
            <tr>
                <th>Водій</th>
                <th>Дата</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($results_LEFT_JOIN)) { ?>
                <tr>
                    <td><?php echo $row['pib'] ?></td>
                    <td><?php echo $row['dates']?></td>
                </tr>
           <?php }?>
        </tbody>
    </table>
    <table>
        <thead>
            <td>Середня ціна вартості виїздів</td>    
            <tr>
                <th>Середня ціна</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($results_AVG)) { ?>
                <tr>
                    <td><?php echo $row['avg_price']?></td>
                </tr>
           <?php }?>
        </tbody>
    </table>
    <table>
        <thead>
            <td>Мінімальна та макисальна ціна вартості виїзду</td>    
            <tr>
                <th>Мінімальна ціна</th>
                <th>Максимальна ціна</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($results_MINMAX)) { ?>
                <tr>
                    <td><?php echo $row['min_price']?></td>
                    <td><?php echo $row['maxprice']?></td>
                </tr>
           <?php }?>
        </tbody>
    </table>
</body>
</html>