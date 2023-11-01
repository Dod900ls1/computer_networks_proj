<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $unit = ($_POST['unit'] === 'Custom') ? $_POST['custom_unit'] : $_POST['unit'];
    $quantity_in_stock = $_POST['quantity_in_stock'];

    $conn = mysqli_connect("localhost", "root", "", "nuzp_proj2");
    if (!$conn) {
        die("Couldn't connect: " . mysqli_connect_error());
    }

    // Insert the product into the 'products' table
    $sql = "INSERT INTO products (product_name, description, price, unit, quantity_in_stock) 
            VALUES ('$product_name', '$description', '$price', '$unit', '$quantity_in_stock')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Product added successfully!";
        echo '<br><a href="adm.php">Повернутися на сторінку адміністратора</a>';
        echo '<br><a href="../../index.php">Повернутися на головну сторінку</a>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
