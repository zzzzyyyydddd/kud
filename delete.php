<?php
// Include database configuration file
require_once 'core/dbConfig.php';

try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $itemIdToDelete = 100; 

    $sql = "DELETE FROM grocery_items WHERE item_id = :item_id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([':item_id' => $itemIdToDelete]);

    if ($stmt->rowCount() > 0) {
        echo "Record with ID {$itemIdToDelete} deleted successfully!";
    } else {
        echo "No record found with ID {$itemIdToDelete}.";
    }

} catch (PDOException $e) {
    echo "Error deleting record: " . $e->getMessage();
}
?>