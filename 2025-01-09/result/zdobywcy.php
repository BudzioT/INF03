<?php
    $conn = mysqli_connect("localhost", "root", "", "zdobywcy");
    if (!$conn) {
        die("Błąd połączenia z bazą danych");
    }


    if (isset($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['fns'])) {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $fns = $_POST['fns'];

        if (!empty($name) && !empty($surname) && !empty($email) && !empty($fns)) {
            $query = "INSERT INTO osoby(nazwisko, imie, funkcja, email) VALUES ('$surname', '$name', '$fns', '$email');";
            $result = mysqli_query($conn, $query);
        }
    }

    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZDOBYWCY GÓR</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <header id="header">
        <h1>Klub zdobywców gór polskich</h1>
    </header>

    <nav id="nav">
        <a href="kw1.png">kwerenda1</a>
        <a href="kw2.png">kwerenda2</a>
        <a href="kw3.png">kwerenda3</a>
        <a href="kw4.png">kwerenda4</a>
    </nav>

    <main id="main">
        <img src="logo.png" alt="logo zdobywcy">
        <h3>razem z nami:</h3>
        <ul>
            <li>wyjazdy</li>
            <li>szkolenia</li>
            <li>rekreacja</li>
            <li>wypoczynek</li>
            <li>wyzwania</li>
        </ul>
    </main>

    <aside id="aside">
        <h2>Dołącz do naszego zespołu!</h2>
        <p>Wpisz swoje dane do formularza:</p>
        
        <form action="zdobywcy.php" method="post">
            <label for="surname">Nazwisko: </label>
            <input name="surname">
            <label for="name">Imię: </label>
            <input name="name">
            <label for="fns">Funkcja: </label>
            <select name="fns">
                <option value="uczestnik">uczestnik</option>
                <option value="przewodnik">przewodnik</option>
                <option value="zaopatrzenowiec">zaopatrzeniowiec</option>
                <option value="organizator">organizator</option>
                <option value="ratownik">ratownik</option>
            </select>
            <label for="email">Email: </label>
            <input type="email" name="email">
            <input type="submit" value="Dodaj">

            <table>
                <tr>
                    <th>Nazwisko</th>
                    <th>Imię</th>
                    <th>Funkcja</th>
                    <th>Email</th>
                </tr>
                <?php 
                    $conn = mysqli_connect("localhost", "root", "", "zdobywcy");
                    if (!$conn) {
                        die("Błąd połączenia z bazą danych");
                    }
                    $query = "SELECT nazwisko, imie, funkcja, email FROM osoby;";
                    $result = mysqli_query($conn, $query);
                    
                    while ($row = mysqli_fetch_row($result)) {
                        echo("<tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                            </tr>");
                    }

                    mysqli_close($conn);
                ?>
            </table>
        </form>
    </aside>

    <footer id="footer">
        <p>Stronę wykonał: Bartosz Budnik</p>
    </footer>
</body>
</html>