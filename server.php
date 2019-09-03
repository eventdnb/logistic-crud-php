<?php

    session_start();
    $pib = "";
    $phone_number = "";
    $data_driver = "";
    $id_driver = 0; 
    $edit_state = false;

    $db = mysqli_connect('localhost', 'root', '', 'logistics');

    if(isset($_POST['save'])) {
        $pib = $_POST['pib'];
        $phone_number = $_POST['phone_number'];
        $data_driver = $_POST['data_driver'];

        mysqli_query($db, "INSERT INTO drivers (pib, phone_number, data_driver) VALUES ('$pib', '$phone_number', '$data_driver')");
        $_SESSION['msg'] = "Інформація збережена!";
        header('location: drivers.php'); 
    }

    if(isset($_POST['update'])) {
        $pib = mysqli_real_escape_string($db, $_POST['pib']);
        $phone_number = mysqli_real_escape_string($db, $_POST['phone_number']);
        $data_driver = mysqli_real_escape_string($db, $_POST['data_driver']);
        $id_driver = mysqli_real_escape_string($db, $_POST['id_driver']);
        
        mysqli_query($db, "UPDATE drivers SET pib='$pib', phone_number='$phone_number', data_driver='$data_driver' WHERE id_driver ='$id_driver'");
        $_SESSION['msg'] = "Інформація оновлена!";
        header('location: drivers.php'); 
    }

    if(isset($_GET['del'])) {
        $id_driver = $_GET['del'];

        mysqli_query($db, "DELETE FROM drivers WHERE id_driver=$id_driver");
        $_SESSION['msg'] = "Інформація видалена!";
        header('location: drivers.php');
    }

    $results = mysqli_query($db, "SELECT * FROM drivers");
?>