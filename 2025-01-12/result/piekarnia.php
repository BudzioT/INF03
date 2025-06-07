<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIEKARNIA</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <img src="wypieki.png" alt="Produkty naszej piekarni">
    
    <nav id="nav">
        <a href="kw1.png">KWERENDA1</a>
        <a href="kw2.png">KWERENDA2</a>
        <a href="kw3.png">KWERENDA3</a>
        <a href="kw4.png">KWERENDA4</a>
    </nav>

    <header id="header">
        <h1>WITAMY</h1>
        <h4>NA STRONIE PIEKARNI</h4>
        <p>
            Od 31 lat oferujemy najwyższej jakości pieczywo. Naturalnie świeże, naturalnie smaczne. 
            Pieczemy wyłącznie wypieki na naturalnym zakwasie bez polepszaczy i zagęstników. 
            Korzystamy wyłącznie z najlepszych ziaren pochodzących z ekologicznych upraw położonych w rejonach 
            zgierskim i ozorkowskim.
        </p>
    </header>

    <main id="main">
        <h4>Wybierz rodzaj wypieków:</h4>
        <form action="piekarnia.php" method="post">
            <select name="category">
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "piekarnia");
                    if (!$conn) {
                        die("Nie udało się połączyć z bazą danych");
                    }

                    $query = "SELECT DISTINCT Rodzaj FROM wyroby ORDER BY Rodzaj DESC;";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_row($result)) {
                        echo "<option value='$row[0]'>$row[0]</option>";
                    }

                    mysqli_close($conn);
                ?>
            </select>
            <input type="submit" value="Wybierz">
        </form>
        
        <table>
            <tr>
                <th>Rodzaj</th>
                <th>Nazwa</th>
                <th>Gramatura</th>
                <th>Cena</th>
            </tr>
            <?php
                if (isset($_POST["category"]) && !empty($_POST["category"])) {
                    $conn = mysqli_connect("localhost", "root", "", "piekarnia");
                    if (!$conn) {
                        die("Nie udało się połączyć z bazą danych");
                    }
                    $category = $_POST['category'];

                    $query = "SELECT Rodzaj, Nazwa, Gramatura, Cena FROM wyroby WHERE Rodzaj = '$category';";
                    $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_row($result)) {
                        echo("
                        <tr>
                            <td>$row[0]</td>
                            <td>$row[1]</td>
                            <td>$row[2]</td>
                            <td>$row[3]</td>
                        </tr>
                        ");
                    }

                    mysqli_close($conn);
                }
            ?>
        </table>
    </main>

    <footer id="footer">
        <p>AUTOR: Bartosz Budnik</p>
        <p>Data: 06.07.2025</p>
    </footer>
</body>
</html>