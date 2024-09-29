<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sierpniowy kalendarz</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <header id="header">
        <section id="header1">
            <h1>Organizer: SIERPIEŃ</h1>
        </section>

        <section id="header2">
            <form method="post" action="organizer.php">
                Zapisz wydarzenie: <input type="text" name="save"/> 
                <input type="submit" name="submit" value="OK"/>
            </form>

            <?php
                $connection = mysqli_connect("localhost", "root", '', "kalendarz");
                if (isset($_POST["submit"])) {
                    $event = $_POST["save"];
                    $query = "update zadania set wpis='$event' where dataZadania='2020-08-09';";
                    mysqli_query($connection, $query);
                }
            ?>
        </section>

        <section id="header3">
            <img src="logo2.png" alt="sierpień"/>
        </section>
    </header>

    <main>
        <section id="main">
            <?php
                $query = "select dataZadania, wpis from zadania where miesiac='Sierpien';";
                $result = mysqli_query($connection, $query);
                
                while ($row = mysqli_fetch_array($result)) {
                    echo "<article class='event'>
                        <h5>$row[0]</h5>
                        <p>$row[1]</p>
                    </article>";
                }

                mysqli_close($connection);
            ?>
        </section>
    </main>

    <footer id="footer">
        <p>Stronę wykonal: 00000000000</p>
    </footer>
</body>
</html>