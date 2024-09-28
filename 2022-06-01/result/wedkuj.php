<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wędkowanie</title>
    <link rel="stylesheet" href="styl_1.css">
</head>
<body>
    <header id="header">
        <h1>Portal dla wędkarzy</h1>
    </header>

    <main>
        <section id="leftTop">
            <h3>Ryby zamieszkujące rzeki</h3>
            <ol>
                <?php
                    $connection = mysqli_connect("localhost", "root", '', "baza");
                    $query = "select ryby.nazwa, lowisko.akwen, lowisko.wojewodztwo 
                        from lowisko inner join ryby on ryby.id=lowisko.ryby_id where lowisko.rodzaj=3;";
                    $result = mysqli_query($connection, $query);
                    
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<li>$row[0] pływa w rzece $row[1], $row[2]</li>";
                    }
                ?>
            </ol>
        </section>

        <section id="right">
            <img src="ryba1.jpg" alt="Sum"/><br/>
            <a href="kwerendy.txt">Pobierz kweredny</a>
        </section>

        <section id="leftBottom">
            <h3>Ryby drapieżne naszych wód</h3>
            <table>
                <tr>
                    <th>L.p.</th><th>Gatunek</th><th>Występowanie</th>
                </tr>
                
                <?php
                    $query = "select id, nazwa, wystepowanie from ryby where styl_zycia=1;";
                    $result = mysqli_query($connection, $query);
                    
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
                    }
                    
                    mysqli_close($connection);
                ?>
            </table>
        </section>
    </main>

    <footer id="footer">
        <p>Stronę wykonał: 00000000000</p>
    </footer>
</body>
</html>