<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Продаж товарів</title>
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
                <h1>Продаж товарів</h1>

                <table cellpadding="5" cellspacing="0" width="100%">
                    <tr>
                        <th>Код товару</th>
                        <th>Місяць продажу</th>
                        <th>Продана кількість за місяць</th>
                        <th>Ціна продажу товару</th>
                    </tr>

                    <!-- Sales table -->
                    <?php
                        // Підключення до бази даних
                        $conn = mysqli_connect("localhost", "root", "", "nuzp_proj2");

                        // Запит до бази даних
                        $sql = "SELECT * FROM sales";
                        $result = mysqli_query($conn, $sql);

                        // Послідовне перебирання результатів запиту
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                    <tr>
                        <td><?php echo $row['product_code']; ?></td>
                        <td><?php echo $row['month_of_sale']; ?></td>
                        <td><?php echo $row['sold_quantity']; ?></td>
                        <td><?php echo $row['sale_price']; ?></td>
                    </tr>

                    <?php } ?>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="footer"> © 2023 </td>
        </tr>
    </table>

</body>

</html>