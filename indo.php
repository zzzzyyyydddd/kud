<?php require_once 'core/dbConfig.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Grocery Items</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        tr:nth-child(even) { background-color: #fafafa; }
    </style>
</head>
<body>
    <h2>Indonesian Grocery Items</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Item Name</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Supplier</th>
            <th>Expiry Date</th>
        </tr>
        <?php
        // Query grocery_items table
        $sql = "SELECT item_id, item_name, category, quantity, unit_price, supplier, expiry_date FROM grocery_items";
        $stmt = $pdo->query($sql);

        if ($stmt->rowCount() > 0) {
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                        <td>".$row["item_id"]."</td>
                        <td>".$row["item_name"]."</td>
                        <td>".$row["category"]."</td>
                        <td>".$row["quantity"]."</td>
                        <td>".$row["unit_price"]."</td>
                        <td>".$row["supplier"]."</td>
                        <td>".$row["expiry_date"]."</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No items found</td></tr>";
        }
        ?>
    </table>
</body>
</html>