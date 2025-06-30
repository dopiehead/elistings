<?php
// Sample product data
$cartItems = [
    ['product' => 'Laptop', 'quantity' => 1, 'price_per_unit' => 1200],
    ['product' => 'Headphones', 'quantity' => 2, 'price_per_unit' => 150],
    ['product' => 'Mouse', 'quantity' => 1, 'price_per_unit' => 50],
    ['product' => 'Keyboard', 'quantity' => 1, 'price_per_unit' => 100],
];

// Initialize total cost
$totalCost = 0;

echo "<table border='1'>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price per Unit</th>
            <th>Total Cost</th>
        </tr>";

// Loop through each cart item to display the data
foreach ($cartItems as $item) {
    $totalCostForItem = $item['quantity'] * $item['price_per_unit'];
    $totalCost += $totalCostForItem;

    echo "<tr>
            <td>{$item['product']}</td>
            <td>{$item['quantity']}</td>
            <td>\${$item['price_per_unit']}</td>
            <td>\$$totalCostForItem</td>
          </tr>";
}

// Display the total cost
echo "<tr>
        <td colspan='3'><strong>Total</strong></td>
        <td><strong>\$$totalCost</strong></td>
      </tr>";

echo "</table>";

// Example of additional calculations
$discountRate = 0.1; // 10% discount
$discountAmount = $totalCost * $discountRate;
$finalTotal = $totalCost - $discountAmount;

echo "<p>Subtotal: \$$totalCost</p>";
echo "<p>Discount (10%): \$$discountAmount</p>";
echo "<p><strong>Final Total: \$$finalTotal</strong></p>";
?>