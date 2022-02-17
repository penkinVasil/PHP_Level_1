<?php
session_start();

$db = @mysqli_connect("127.0.0.1:3306", "root", "321", "shop") or die("Ошибка " . mysqli_connect_error());

$session = session_id();

$result  = mysqli_query($db, "SELECT COUNT(id_b) as count FROM `basket` WHERE 1");

$row = mysqli_fetch_assoc($result);

$count = $row['count'];
