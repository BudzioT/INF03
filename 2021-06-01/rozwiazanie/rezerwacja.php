<?php
    $con = mysqli_connect("localhost", "root", '', "baza");
    $date = $_POST["date"];
    $amount = $_POST["amount"];
    $number = $_POST["number"];
    
    $query = "insert into rezerwacje(nr_stolika, data_rez, liczba_osob, telefon) values(NULL, $date, $amount, $number)";
    mysqli_query($con, $query);
    echo "Dodano rezerwację do bazy";

    mysqli_close($con);
?>