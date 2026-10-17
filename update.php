<?php
// Include database configuration file
require_once 'core/dbConfig.php';

try {
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL UPDATE statement with named placeholders
    $sql = "UPDATE grocery_items 
            SET unit_price = :unit_price, 
                quantity = :quantity 
            WHERE item_id = :item_id";

    // Prepare the statement
    $stmt = $pdo->prepare($sql);

    // Execute statement with updated field values
    $stmt->execute([
        ':unit_price' => 3800.00,  // Updated unit price
        ':quantity'   => 175,      // Updated quantity
        ':item_id'    => 1         // Indomie Mi Goreng
    ]);

    // Verify row update count
    if ($stmt->rowCount() > 0) {
        echo "Record updated successfully!";
    } else {
        echo "No record was updated or values remained unchanged.";
    }

} catch (PDOException $e) {
    // Handle error execution
    echo "Error updating record: " . $e->getMessage();
}
?>