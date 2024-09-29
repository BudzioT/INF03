<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wycieczki po Europie</title>
        <link rel="stylesheet" href="styl4.css">
    </head>

    <body>
        <header id="header">
            <h1>BIURO TURYSTYCZNE</h1>
        </header>

        <main>
            <section id="data">
                <h3>Wycieczki, na które są wolne miejsca</h3>
                <ul>
                    <?php
                        $connection = mysqli_connect("localhost", "root", '', "biuro");
                        
                        $query = "select id, dataWyjazdu, cel, cena from wycieczki where dostepna=1;";
                        $result = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_array($result)) {
                            echo "<li>$row[0]. dnia $row[1] jedziemy do $row[2], cena: $row[3]</li>";
                        }
                    ?>
                </ul>
            </section>

            <section id="left">
                <h2>Bestselery</h2>
                <table>
                    <tr>
                        <td>Wenecja</td><td>kwiecień</td>
                    </tr>
                    <tr>
                        <td>Londyn</td><td>lipiec</td>
                    </tr>
                    <tr>
                        <td>Rzym</td><td>wrzesień</td>
                    </tr>
                </table>
            </section>

            <section id="middle">
                <h2>Nasze zdjęcia</h2>
                <?php
                    $query = "select nazwaPliku, podpis from zdjecia order by podpis desc;";
                    $result = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_array($result)) {
                        echo "<img src='$row[0]' alt='$row[1]'/>";
                    }

                    mysqli_close($connection);
                ?>
            </section>

            <section id="right">
                <h2>Skontaktuj się</h2>
                <a href="mailto:turysta@wycieczki.pl">napisz do nas</a>
                <p>telefon: 111222333</p>
            </section>
        </main>

        <footer id="footer">
            <p>Stronę wykonał 00000000000</p>
        </footer>
    </body>
</html>