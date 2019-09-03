<?php

    session_start();
    $name_car = "";
    $id_type = "";
    $number_car = "";
    $id_car = 0;   
    $edit_state = false;

    $db = mysqli_connect('localhost', 'root', '', 'logistics');

    if(isset($_POST['save'])) {
        $name_car = $_POST['name_car'];
        $id_type = $_POST['id_type'];
        $number_car = $_POST['number_car'];

        mysqli_query($db, "INSERT INTO cars (name_car, id_type, number_car) VALUES ('$name_car', '$id_type', '$number_car')");
        $_SESSION['msg'] = "Інформація збережена!";
        header('location: cars.php'); 
    }

    if(isset($_POST['update'])) {
        $name_car = mysqli_real_escape_string($db, $_POST['name_car']);
        $id_type = mysqli_real_escape_string($db, $_POST['id_type']);
        $number_car = mysqli_real_escape_string($db, $_POST['number_car']);
        $id_car  = mysqli_real_escape_string($db, $_POST['id_car']);
        
        mysqli_query($db, "UPDATE cars SET name_car='$name_car', id_type='$id_type', number_car='$number_car' WHERE id_car='$id_car'");
        $_SESSION['msg'] = "Інформація оновлена!";
        header('location: cars.php'); 
    }

    if(isset($_GET['del'])) {
        $id_car = $_GET['del'];

        mysqli_query($db, "DELETE FROM cars WHERE id_car=$id_car");
        $_SESSION['msg'] = "Інформація видалена!";
        header('location: cars.php');
    }

    $results = mysqli_query($db, "SELECT * FROM cars, types WHERE cars.id_type = types.id_type");
?>