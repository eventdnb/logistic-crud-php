<?php

    session_start();
    $id_del = "";
    $id_car = "";
    $id_driver = "";
    $dates = "";
    $price = "";
    $id_list = 0;   
    $edit_state = false;

    $db = mysqli_connect('localhost', 'root', '', 'logistics');

    if(isset($_POST['save'])) {
        $id_del = $_POST['id_del'];
        $id_driver = $_POST['id_driver'];
        $id_car = $_POST['id_car'];
        $dates = $_POST['dates'];
        $price = $_POST['price'];

        mysqli_query($db, "INSERT INTO road_list (id_del, id_driver, id_car, dates, price) VALUES ('$id_del', '$id_driver', '$id_car', '$dates', '$price')");
        $_SESSION['msg'] = "Інформація збережена!";
        header('location: roadlist.php'); 
    }

    if(isset($_POST['update'])) {
        $id_del = mysqli_real_escape_string($db, $_POST['id_del']);
        $id_driver = mysqli_real_escape_string($db, $_POST['id_driver']);
        $id_car = mysqli_real_escape_string($db, $_POST['id_car']);       
        $dates  = mysqli_real_escape_string($db, $_POST['dates']);
        $price = mysqli_real_escape_string($db, $_POST['price']);
        $id_list = mysqli_real_escape_string($db, $_POST['id_list']);
        
        mysqli_query($db, "UPDATE road_list SET id_del='$id_del', id_driver='$id_driver',  id_car='$id_car', dates='$dates', price='$price' WHERE id_list='$id_list'");
        $_SESSION['msg'] = "Інформація оновлена!";
        header('location: road_list.php'); 
    }

    if(isset($_GET['del'])) {
        $id_car = $_GET['del'];

        mysqli_query($db, "DELETE FROM road_list WHERE id_list=$id_list");
        $_SESSION['msg'] = "Інформація видалена!";
        header('location: road_list.php');
    }

    $results = mysqli_query($db, "SELECT * FROM road_list, cars, deliveries, drivers WHERE road_list.id_car = cars.id_car AND road_list.id_del = deliveries.id_del AND road_list.id_driver = drivers.id_driver");
?>