<?php
require_once 'core/dbConfig.php';

$stmt = $pdo->query(
    'SELECT item_id, item_name, item_name, category, unit_price
     FROM grocery_items
     ORDER BY category, item_name
     LIMIT 15'
);
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<h2>fetchAll (first 15 records)</h2>';
echo '<pre>';
print_r($items);
echo '</pre>';
?>