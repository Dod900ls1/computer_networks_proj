<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Оптовий сайт промислових товарів</title>
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
                <h1>Промислові Товари</h1>
                <h3>Заповніть необхідні поля та текст запитання</h3>

                <form method="POST" action="sendmail.php">

                    <p>Ваше ФІО<br>
                        <input type="text" name="fio">
                    </p>

                    <p>E-mail<br>
                        <input type="text" name="email">
                    </p>

                    <p> тема запитання <br>
                        <input type="text" name="topic">
                    </p>

                    <p> Текст запитання <br>
                        <textarea name="zapit" cols="50" rows="5"></textarea>
                    </p>

                    <input type="submit" value="Відправити">
                    <input type="reset" value="Очистити">
                </form>

            </td>
        </tr>
        <tr>
            <td colspan="3" class="footer"> © 2023 </td>
        </tr>
    </table>
</body>

</html>