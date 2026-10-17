<?php
require_once 'core/dbConfig.php';

$stmt = $pdo->prepare(
    'SELECT item_id, item_name, category, unit_price
     FROM grocery_items
     WHERE item_id = :item_id'
);
$stmt->execute(['item_id' => 1]);
$item = $stmt->fetch(PDO::FETCH_ASSOC);

echo '<h2>fetch one record</h2>';
echo '<pre>';
print_r($item);
echo '</pre>';
?>