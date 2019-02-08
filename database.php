<?php
    include_once 'functions.php';

    $connection = connectDB();
    $query = "SELECT * FROM ospiti";
    $results = getData($connection, $query, null, null);
    var_dump($results);
?>

