<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Товари</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body class = "background-image">
    <div class="green-banner">
        <p>Вітаємо!</p>
    </div>
    
    <table cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td colspan="3" class="header">
                <img src="Images/img1.jpeg" alt="Header image" />
            </td>
        </tr>
        <tr>
            <td class="left_col">
                <ul>
                    <li><a href="index.php">Повернутися на головну</a></li>
                </ul>
            </td>
            <td class="center_col">
                <h1>Товари</h1>

                <table cellpadding="5" cellspacing="0" width="100%">
                    <tr>
                        <th>Код товару</th>
                        <th>Найменування товару</th>
                        <th>Опис</th>
                        <th>Ціна</th>
                        <th>Одиниця виміру</th>
                        <th>Кількість в наявності</th>
                    </tr>
                    <?php
                    // Підключення до бази даних
                    $conn = mysqli_connect("localhost", "root", "", "nuzp_proj2");

                    // Перевірка наявності помилок при підключенні
                    if (!$conn) {
                        die("Помилка підключення: " . mysqli_connect_error());
                    }

                    // Запит до бази даних
                    $sql = "SELECT * FROM products";
                    $result = mysqli_query($conn, $sql);

                    // Послідовне перебирання результатів запиту
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['product_name']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['unit']; ?></td>
                            <td><?php echo $row['quantity_in_stock']; ?></td>
                        </tr>
                        <?php
                    }

                    // Закриття з'єднання з базою даних
                    mysqli_close($conn);
                    ?>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="footer"> © 2023 </td>
        </tr>
    </table>
</body>

</html>
