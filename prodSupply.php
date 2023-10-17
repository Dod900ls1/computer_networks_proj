<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Постачання товарів</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body class="background-image">
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
                <h1>Постачання товарів за 2023 рік</h1>

                <table cellpadding="5" cellspacing="0" width="100%">
                    <tr>
                        <th>Код запису</th>
                        <th>Код товару</th>
                        <th>Дата вступу</th>
                        <th>Ціна придбання товару за одиницю виміру</th>
                        <th>Код постачальника</th>
                    </tr>

                    <?php
                    // Підключення до бази даних
                    $conn = mysqli_connect("localhost", "root", "", "nuzp_proj2");
                    if (!$conn) {
                        die("Couldn't connect: " . mysqli_connect_error());
                    }

                    // Запит до бази даних
                    $sql = "SELECT * FROM prodsupply WHERE date_of_entry BETWEEN '2023-01-01' AND '2023-12-31'";
                    $result = mysqli_query($conn, $sql);

                    // Послідовне перебирання результатів запиту
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Вивести запис на екран
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['product_code']}</td>
                            <td>{$row['date_of_entry']}</td>
                            <td>{$row['purchase_price']}</td>
                            <td>{$row['supplier_code']}</td>
                        </tr>";
                    }

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