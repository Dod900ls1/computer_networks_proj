<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Постачальники</title>
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
            <?php
                include("menu.php");
                ?>
             </td>
             
            <td class="center_col">
                <h1>Постачальники</h1>

                <table cellpadding="5" cellspacing="0" width="100%">
                    <tr>
                        <th>Код постачальника</th>
                        <th>Назва постачальника</th>
                        <th>Адреса постачальника</th>
                        <th>Телефон постачальника</th>
                    </tr>

                    <!-- Suppliers table -->
                    <?php
                        // Підключення до бази даних
                        $conn = mysqli_connect("localhost", "root", "", "nuzp_proj2");
                        // Запит до бази даних
                        $sql = "SELECT * FROM suppliers";
                        $result = mysqli_query($conn, $sql);

                        // Послідовне перебирання результатів запиту
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                    <tr>
                        <td><?php echo $row['supplier_code']; ?></td>
                        <td><?php echo $row['supplier_name']; ?></td>
                        <td><?php echo $row['supploer_address']; ?></td>
                        <td><?php echo $row['supplier_phone']; ?></td>
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