<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Адміністратор</title>
</head>
<body>
<div align="center">
    <h3>Сторінка адміністратора</h3>
    <table cellpadding="20" cellspacing="0" border="1">
        <tr valign="top">
            <td>
                <h4>Додати в базу новий продукт</h4>
                <form method="POST" action="insert_product.php">
                    <p> Назва продукту <br>
                        <textarea name="product_name" cols="40" rows="2"></textarea>
                    </p>
                    <p> Опис <br>
                        <textarea name="description" cols="40" rows="4"></textarea>
                    </p>
                    <p> Ціна <br>
                        <input type="text" name="price">
                    </p>
                    <p> Одиниця виміру <br>
                        <select name="unit">
                            <option value="Each">Each</option>
                            <option value="Set">Set</option>
                            <option value="Pair">Pair</option>
                            <option value="Custom">Custom</option>
                        </select>
                        <input type="text" name="custom_unit" placeholder="Введіть власну одиницю виміру" style="display: none;">
                    </p>
                    <p> Кількість в наявності <br>
                        <input type="text" name="quantity_in_stock">
                    </p>
                    <p>
                        <input type="submit" value="Додати">
                    </p>
                </form>
            </td>
        </tr>
        <tr>
            <td>
                <h4>Видалити продукт з бази</h4>
                <form method="POST" action="delete_product.php">
                    <select name="id">
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "nuzp_proj2");
                        if (!$conn) {
                            die("Неможливо підключитись до серверу");
                        }

                        $sql = "SELECT * FROM products"; // Modify this query to select products
                        $result = mysqli_query($conn, $sql);

                        while ($product = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$product['id']}'>{$product['product_name']}</option>\n";
                        }

                        mysqli_close($conn);
                        ?>
                    </select>
                    <p>
                        <input type="submit" value="Видалити">
                    </p>
                </form>
            </td>
        </tr>
    </table>
    <br>
    <a href="../index.php">Повернутися на головну сторінку</a>
</div>

<script>
    // JavaScript to show/hide the custom unit input based on the selected option
    const unitSelect = document.querySelector("select[name='unit']");
    const customUnitInput = document.querySelector("input[name='custom_unit']");

    unitSelect.addEventListener("change", function () {
        if (unitSelect.value === "Custom") {
            customUnitInput.style.display = "block";
        } else {
            customUnitInput.style.display = "none";
        }
    });
</script>
</body>
</html>
