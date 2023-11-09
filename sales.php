<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Продаж товарів</title>
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
                <h1>Продаж товарів</h1>

                <!-- Price Filter -->
                <form method="post">
                    <label for="min_price">Мінімальна ціна:</label>
                    <input type="number" name="min_price" id="min_price">
                    <label for="max_price">Максимальна ціна:</label>
                    <input type="number" name="max_price" id="max_price">
                    <input type="submit" value="Фільтрувати за ціною">
                </form>

                <!-- Date Filter -->
                <form method="post">
                    <label for="start_date">Початкова дата:</label>
                    <input type="date" name="start_date" id="start_date">
                    <label for "end_date">Кінцева дата:</label>
                    <input type="date" name="end_date" id="end_date">
                    <input type="submit" value="Фільтрувати за датою">
                </form>

                <!-- Reset Filters Button -->
                <form method="post">
                    <input type="submit" name="reset_filters" value="Скинути фільтри">
                </form>

                <table cellpadding="5" cellspacing="0" width="100%">
                    <tr>
                        <th>Код товару</th>
                        <th>Місяць продажу</th>
                        <th>Продана кількість за місяць</th>
                        <th>Ціна продажу товару</th>
                    </tr>

                    <!-- Sales table with filtering -->
                    <?php
                    // Connect to the database
                    $conn = mysqli_connect("localhost", "root", "", "nuzp_proj2");

                    // Check which form was submitted
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        if (isset($_POST['min_price']) || isset($_POST['max_price'])) {
                            // Price filter form submitted
                            $min_price = $_POST['min_price'];
                            $max_price = $_POST['max_price'];
                            $sql = "SELECT product_name, month_of_sale, sold_quantity, sale_price FROM sales INNER JOIN products ON sales.product_code = products.id WHERE sale_price >= $min_price AND sale_price <= $max_price";
                        } else if (isset($_POST['start_date']) || isset($_POST['end_date'])) {
                            // Date filter form submitted
                            $start_date = $_POST['start_date'];
                            $end_date = $_POST['end_date'];
                            $sql = "SELECT product_name, month_of_sale, sold_quantity, sale_price FROM sales INNER JOIN products ON sales.product_code = products.id WHERE month_of_sale >= '$start_date' AND month_of_sale <= '$end_date'";
                        } else if (isset($_POST['reset_filters'])) {
                            // Reset button clicked
                            $sql = "SELECT product_name, month_of_sale, sold_quantity, sale_price FROM sales INNER JOIN products ON sales.product_code = products.id";
                        }
                    } else {
                        // If no filters are applied, retrieve all data
                        $sql = "SELECT product_name, month_of_sale, sold_quantity, sale_price FROM sales INNER JOIN products ON sales.product_code = products.id";
                    }

                    $result = mysqli_query($conn, $sql);

                    // Sequentially iterate through the query results
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                        <tr>
                            <td><?php echo $row['product_name']; ?></td>
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
