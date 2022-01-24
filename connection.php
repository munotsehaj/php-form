<?php
    $host_name = "localhost:3308";
    $database = "form_entriesdb";
    $username = "formdb_user";
    $password = "abc123";

    //////// Do not Edit below /////////
    try {
    $dbo = new PDO('mysql:host='.$host_name.';dbname='.$database, $username, $password);
    } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
    }
?>