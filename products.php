<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Товари</title>
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
            <?php
                include("menu.php");
                ?>
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
                    $conn = mysqli_connect("localhost", "root", "", "nuzp_proj2") or die("Помилка підключення: " . mysqli_connect_error());
                    $sql = "SELECT * FROM products";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)):
                        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['product_name']}</td>
            <td>{$row['description']}</td>
            <td>{$row['price']}</td>
            <td>{$row['unit']}</td>
            <td>{$row['quantity_in_stock']}</td>
          </tr>";
                    endwhile;

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