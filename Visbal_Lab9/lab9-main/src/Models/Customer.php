<?php

namespace App\Models;

use PDO;

class Customer {
   
    public static function getAll() {
        global $conn;
        if ($conn) {
            $stmt = $conn->query("SELECT * FROM customers");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return [];
    }

   
    public static function getById($id) {
        global $conn;
        if ($conn) {
            $stmt = $conn->prepare("SELECT * FROM customers WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return null;
    }

  
    public static function update($id, $name, $email, $phone, $address) {
        global $conn;
        if ($conn) {
            $stmt = $conn->prepare("UPDATE customers SET name = :name, email = :email, phone = :phone, address = :address WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':address', $address);
            $stmt->execute();
        }
    }
}
