<?php

include "../includes/database.php";
global $conn;

$query="CREATE TABLE IF NOT EXISTS register(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY,
  email VARCHAR(12),
  passcode TEXT(16),
  position TEXT(64)
  )ENGINE myISAM";
  $result=mysqli_query($conn,$query);
  if ($result){
    $ans='successfully created table register';
    echo "<pre>".$ans ."</pre>";
  }else {
    $ans='An error occurred while creating table register';
    echo "<pre>".$ans ."</pre>";
  }

  $query="CREATE TABLE IF NOT EXISTS categories(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY,
    name VARCHAR(12),
    description TEXT(64)
    )ENGINE myISAM";
    $result=mysqli_query($conn,$query);
    if ($result){
      $ans='successfully created table categories';
      echo "<pre>".$ans ."</pre>";
    }else {
      $ans='An error occurred while creating table categories';
      echo "<pre>".$ans ."</pre>";
    }

  $query="CREATE TABLE IF NOT EXISTS products(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY,
    name VARCHAR(4096),
    category VARCHAR(4096),
    image TEXT(64),
    price int(11),
    description VARCHAR(150),
    sizes VARCHAR(100),
    manufacturer TEXT(26),
    created_date DATETIME,
    publish TINYINT(6)
    )ENGINE myISAM";
    $result=mysqli_query($conn,$query);
    if ($result){
      $ans='successfully created table products';
      echo "<pre>".$ans ."</pre>";
    }else {
      $ans='An error occurred while creating table products';
      echo "<pre>".$ans ."</pre>";
    }


    $query="CREATE TABLE IF NOT EXISTS carts(
      id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY,
      product_id int(11),
      user_id int(11),
      category VARCHAR(4096),
      price int(11),
      quantity int(11),
      created_date DATETIME
      )ENGINE myISAM";
      $result=mysqli_query($conn,$query);
      if ($result){
        $ans='successfully created table carts';
        echo "<pre>".$ans ."</pre>";
      }else {
        $ans='An error occurred while creating table carts';
        echo "<pre>".$ans ."</pre>";
      }
      $query="CREATE TABLE IF NOT EXISTS details(
        id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY,
        firstname VARCHAR(60),
        lastname VARCHAR(60),
        email text(60),
        telephone text(20),
        user_id int(11),
        address1 VARCHAR(4096),
        address2 VARCHAR(4096),
        company VARCHAR(200),
        created_date DATETIME
        )ENGINE myISAM";
        $result=mysqli_query($conn,$query);
        if ($result){
          $ans='successfully created table details';
          echo "<pre>".$ans ."</pre>";
        }else {
          $ans='An error occurred while creating table details';
          echo "<pre>".$ans ."</pre>";
        }

            $query="CREATE TABLE IF NOT EXISTS orders(
      id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY,
      product_id int(11),
      user_id int(11),
      category VARCHAR(4096),
      price int(11),
      quantity int(11),
      created_date DATETIME
      )ENGINE myISAM";
      $result=mysqli_query($conn,$query);
      if ($result){
        $ans='successfully created table orders';
        echo "<pre>".$ans ."</pre>";
      }else {
        $ans='An error occurred while creating table orders';
        echo "<pre>".$ans ."</pre>";
      }
//     $query="CREATE TABLE IF NOT EXISTS subscribers(
//       id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY,
//       email VARCHAR(4096)
//       )ENGINE myISAM";
//       $result=mysqli_query($conn,$query);
//       if ($result){
//         $ans='successfully created table subscribers';
//         echo "<pre>".$ans ."</pre>";
//       }else {
//         $ans='An error occurred while creating table subscribers';
//         echo "<pre>".$ans ."</pre>";
//       }
?>
