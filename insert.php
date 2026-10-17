<?php

require_once 'core/dbConfig.php';

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO grocery_items (item_name, category, quantity, unit_price, supplier, expiry_date, date_added) 
            VALUES (:item_name, :category, :quantity, :unit_price, :supplier, :expiry_date, :date_added)";

    $stmt = $pdo->prepare($sql);

    $newItem = [
        ':item_name'   => 'Indomie Special Chicken (INSERT)',
        ':category'    => 'Instant Noodles',
        ':quantity'    => 150,
        ':unit_price'  => 3500.00,
        ':supplier'    => 'Indofood',
        ':expiry_date' => '2027-01-01',
        ':date_added'  => date('Y-m-d H:i:s')
    ];

    $stmt->execute($newItem);

    $lastId = $pdo->lastInsertId();

    echo "<h3>Record Inserted Successfully!</h3>";
    echo "Inserted Item ID: " . $lastId . "<br>";
    echo "Item Name: " . $newItem[':item_name'] . "<br>";
    echo "Category: " . $newItem[':category'] . "<br>";
    echo "Price: Rp " . number_format($newItem[':unit_price'], 2) . "<br>";

} catch (PDOException $e) {
    echo "Error inserting record: " . $e->getMessage();
}
?>