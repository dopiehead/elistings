<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require 'configure.php';

if (isset($_POST['category']) && !empty($_POST['category'])) {
    $rawCategory = html_entity_decode(trim($_POST['category']));
    $stmt = $conn->prepare("SELECT subcategory FROM categories WHERE e_auto_categories = ?");
    $stmt->bind_param("s", $rawCategory);
    $stmt->execute();
    $result = $stmt->get_result();
    echo "<select style='font-size:14px !important;' name='subcategory' id='subcategory' class='subcategory form-control'>";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $subcategories = json_decode($row['subcategory'], true);
            if (is_array($subcategories)) {
                foreach ($subcategories as $subcategory) {
                    echo "<option value='" . htmlspecialchars($subcategory) . "'>" . htmlspecialchars($subcategory) . "</option>";
                }
            } else {
                echo "<option disabled>No subcategories found</option>";
            }
        }
    } else {
        echo "<option disabled>No matching category found</option>";
    }
    echo "</select><br>";
    $stmt->close();
}
?>
