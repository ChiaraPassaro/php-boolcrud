<?php
    include_once 'functions.php';

    $connection = connectDB();
    $query = "SELECT * FROM ospiti";
    $results = getData($connection, $query, null, null);
    return $results;
?>

