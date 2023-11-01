<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['id'];

    $conn = mysqli_connect("localhost", "root", "", "nuzp_proj2");
    if (!$conn) {
        die("Couldn't connect: " . mysqli_connect_error());
    }

    // Delete the selected product from the 'products' table
    $sql = "DELETE FROM products WHERE id = '$product_id'";

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
