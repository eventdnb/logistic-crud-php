<?php

    $db = mysqli_connect('localhost', 'root', '', 'logistics');

    $results_IN = mysqli_query($db, "SELECT * FROM cars, types WHERE cars.id_type = types.id_type AND name_type IN ('Freight')");

    $results_LIKE = mysqli_query($db, "SELECT * FROM drivers WHERE data_driver LIKE '%Cherkassy%'");

    $results_BETWEEN = mysqli_query($db, "SELECT * FROM road_list, cars, deliveries, drivers WHERE road_list.id_car = cars.id_car AND road_list.id_del = deliveries.id_del AND road_list.id_driver = drivers.id_driver AND dates IN (SELECT dates FROM road_list WHERE dates BETWEEN '2019-01-01' AND '2019-06-31')");

    $results_COUNT = mysqli_query($db, "SELECT COUNT(id_list) AS count_road FROM road_list");

    $results_OR = mysqli_query($db, "SELECT * FROM cars, types WHERE cars.id_type = types.id_type AND name_type IN (SELECT name_type FROM cars WHERE name_type = 'Freight' OR name_type = 'Passenger')");

    $results_DISTINC = mysqli_query($db, "SELECT DISTINCT pib, phone_number, data_driver FROM drivers");

    $results_INNER_JOIN = mysqli_query($db, "SELECT cars.name_car, types.name_type FROM cars INNER JOIN types ON cars.id_type = types.id_type");

    $results_LEFT_JOIN = mysqli_query($db, "SELECT drivers.pib, road_list.dates FROM road_list LEFT JOIN drivers ON drivers.id_driver = road_list.id_driver");

    $results_AVG = mysqli_query($db, "SELECT AVG(price) AS avg_price FROM road_list");

    $results_MINMAX = mysqli_query($db, "SELECT MIN(price) AS min_price, MAX(price) AS maxprice  FROM road_list");
?>