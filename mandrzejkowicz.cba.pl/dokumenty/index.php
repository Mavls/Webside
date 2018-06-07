<?php
session_start();
$strona = 1;
function page_switch() { // Ta funkcja zwraca to co powinno być w <main>
    global $strona;
    
    if (isset($_GET['page']) && ctype_digit($_GET['page'])) { // Jeżeli żadana jest określona strona i jest ona prawidłowa
        $strona = intval($_GET['page']);
    }
    
    switch($strona) { // Wybór akcji w zależności od strony
        case '1':
            echo 'To jest strona główna';
            break;
        case '2':
            form_page();
            break;
        case '3':
            session_content_page();
            break;
        case '4':
            employee_list_page();
            break;
        default:
            echo 'Strona nie istnieje.';
            break;
    }
}

function form_page() { // Strona z formularzem
  /* Jeżeli formularz został przesłany */
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    /* Walidacja */
    $isValid = true;
    if (empty($_POST['imie']) || empty($_POST['nazwisko']) || empty($_POST['plec']) || empty($_POST['nazwisko_panienskie']) || empty($_POST['email']) || empty($_POST['kod_pocztowy'])) { // Jeżeli jakiekolwiek pole zostało niewypełnione
      $isValid = false;
      echo '<p class="blad">Wszystkie pola muszą zostać uzupełnione.</p>';
    }
    else { // Jeżeli wszystkie pola zostały wypełnione
      if (!preg_match('/^[a-zA-Z0-9_.+-]{1,250}@[a-zA-Z0-9-]{1,250}\.[a-zA-Z0-9-.]{1,250}$/', $_POST['email'])) { // Jeżeli adres email jest nieprawidłowy
        $isValid = false;
        echo '<p class="blad">Nieprawidłowy adres email.</p>';
      }
      if (!preg_match('/^\d{2}\-\d{3}$/', $_POST['kod_pocztowy'])) { // Jeżeli kod pocztowy jest nieprawidłowy
        $isValid = false;
        echo '<p class="blad">Nieprawidłowy kod pocztowy.</p>';
      }
    }
  }
  
  /* Jeżeli formularz nie został przesłany albo został przesłany, ale jest nieprawidłowy */
  if (!($_SERVER['REQUEST_METHOD'] === 'POST') || ($_SERVER['REQUEST_METHOD'] === 'POST' && !$isValid)) {
    // Wyświetlanie formularza
    echo <<<'EOD'
  <form method="POST" action="">
      <div>
        <p>Nazwa Towaru </p>
        <p>Kod Towaru</p>
        <p id="plec">Płeć</p>
        <p id="nazwisko_panienskie">Nazwisko panieńskie</p>
        <p>Email</p>
        <p>Kod pocztowy</p>
      </div>
      <div>
        <p>
          <input type="text" name="imie"/>
        </p>
        <p>
          <input type="text" name="nazwisko"/>
        </p>
        <p>
          <input type="radio" id="kobieta" name="plec" value="kobieta"/>
          <label for="kobieta">kobieta</label>
        </p>
        <p>
          <input type="radio" id="mezczyzna" name="plec" value="mezczyzna"/>
          <label for="mezczyzna">mężczyzna</label>
        </p>
        <p>
          <input type="text" name="nazwisko_panienskie"/>
        </p>
        <p>
          <input type="text" name="email"/>
        </p>
        <p>
          <input type="text" name="kod_pocztowy"/>
        </p>
      </div>
      <p>
        <input type="submit" value="Wyślij"/>
      </p>
    </form>

EOD;
  }
  /* Jeżeli formularz został przesłany i jest prawidłowy */
  else {
    /* Baza danych */
    $mysqli = mysqli_connect("127.0.0.1", "mandrzejkowicz", "maciek130", "mandrzejkowicz"); // Łączenie
    if (!$mysqli) { // Jeżeli nie można się połączyć
        echo "<p>Formularz został przesłany i wszystkie pola zostały wypełnione prawidłowo, ale nie można uzyskać połączenia z bazą danych.</p>" . PHP_EOL;
        echo "<p>Errno: " . mysqli_connect_errno() . "</p>" . PHP_EOL;
        echo "<p>Error: " . mysqli_connect_error() . "</p>" . PHP_EOL;
        return;
    }
    $statement = $mysqli->prepare("INSERT INTO `pracownicy` (`imie`, `nazwisko`, `plec`, `nazwisko_panienskie`, `email`, `kod_pocztowy`) VALUES (?, ?, ?, ?, ?, ?)");
    $statement->bind_param("ssisss", $imie, $nazwisko, $plec, $nazwisko_panienskie, $email, $kod_pocztowy);
    
    // Przyporządkowywanie danych do zmiennych
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $plec = ($_POST['plec'] === "kobieta" ? "0" : "1"); // Kobieta jest zapisywana w bazie jako 0, mężczyzna jako 1
    $nazwisko_panienskie = $_POST['nazwisko_panienskie'];
    $email = $_POST['email'];
    $kod_pocztowy = $_POST['kod_pocztowy'];
    
    $statement->execute(); // Wykonanie zapytania
    $statement->close();
    $mysqli->close();
    
    /* Sesja */
    // Inkrementacja licznika dodanych osób
    if (!isset($_SESSION['counter'])) { // Jeżeli nikogo wcześniej w sesji nie dodawaliśmy
      $_SESSION['counter'] = 1;
    }
    else { // Jeżeli licznik dodanych osób już istnieje
      $_SESSION['counter']++;
    }

    // Zapisywanie danych z przesłanego formularza w zmiennej sesyjnej
    $_SESSION['posts'][$_SESSION['counter'] - 1] = $_POST; // Zapisywanie tablicy $_POST na pozycji $_SESSION['counter'] - 1 tablicy $_SESSION['posts']

    // Wypisywanie przesłanych danych
    echo '<p>Imię: <span class="bold">' . $_POST['imie'] . "</span></p>\n";
    echo '<p>Nazwisko: <span class="bold">' . $_POST['nazwisko'] . "</span></p>\n";
    echo '<p>Płeć: <span class="bold">' . ($_POST['plec'] === "mezczyzna" ? "mężczyzna" : "kobieta") . "</span></p>\n";
    echo '<p>Nazwisko panieńskie: <span class="bold">' . $_POST['nazwisko_panienskie'] . "</span></p>\n";
    echo '<p>Email: <span class="bold">' . $_POST['email'] . "</span></p>\n";
    echo '<p>Kod pocztowy: <span class="bold">' . $_POST['kod_pocztowy'] . "</span></p>\n";
  }
}

function session_content_page() { // Strona z zawartością sesji
  if (count($_SESSION['posts']) === 0) {
      echo "<p>W trakcie trwania tej sesji nie dodano żadnych pracowników.</p>";
      return;
  }
  
  foreach ($_SESSION['posts'] as $post) { // Dla każdego elementu tablicy $_SESSION['posts']
    echo '<p>Imię: <span class="bold">' . $post['imie'] . "</span></p>\n";
    echo '<p>Nazwisko: <span class="bold">' . $post['nazwisko'] . "</span></p>\n";
    echo '<p>Płeć: <span class="bold">' . ($post['plec'] === "mezczyzna" ? "mężczyzna" : "kobieta") . "</span></p>\n";
    echo '<p>Nazwisko panieńskie: <span class="bold">' . $post['nazwisko_panienskie'] . "</span></p>\n";
    echo '<p>Email: <span class="bold">' . $post['email'] . "</span></p>\n";
    echo '<p>Kod pocztowy: <span class="bold">' . $post['kod_pocztowy'] . "</span></p>\n";
    echo "<hr/>\n";
  }
}

function employee_list_page() {
    $mysqli = mysqli_connect("127.0.0.1", "mandrzejkowicz", "maciek130", "mandrzejkowicz"); // Łączenie
    if (!$mysqli) { // Jeżeli nie można się połączyć
        echo "<p>Nie można uzyskać połączenia z bazą danych.</p>" . PHP_EOL;
        echo "<p>Errno: " . mysqli_connect_errno() . "</p>" . PHP_EOL;
        echo "<p>Error: " . mysqli_connect_error() . "</p>" . PHP_EOL;
        return;
    }
        
    /* Wyszukiwanie */
    $search_valid = false;
    $search_query = '';
    if (isset($_GET["search"]) && !empty($_GET["search"])) {
        $search_field = explode(' ', $_GET["search"]);
        $search_valid = true;
        foreach ($search_field as $value) {
          if (preg_match('/^[a-ząĄćĆęĘłŁńŃóÓśŚżŻźŹ-]+$/i', $value) !== 1) {
            echo '<p>Niepoprawne zapytanie – nazwiska powinny zawierać jedynie litery lub myślnik i być oddzielone spacją, jeżeli jest ich więcej niż 1.</p>';
            $search_valid = false;
            break;
          }
        }
        if ($search_valid) {
          $search_query = " WHERE `nazwisko` REGEXP '" . implode('|', $search_field) . "' ";
        }
        else {
          $search_query = '';
        }
    }
	
	/* Zapytanie do bazy danych */
	$offset = isset($_GET["offset"]) && !empty($_GET["offset"]) ? intval($_GET["offset"]) : 0; // Wiersz bazy danych, od którego chcemy wyświetlać; "strona"
	// Wbrew pozorom, poniższa linijka nie zawiera SQL injection, $search_query może zawierać tylko ściśle określone znaki, tak samo $offset
    $stmt = $mysqli->query("SELECT * FROM `pracownicy` " . $search_query . "ORDER BY `id` LIMIT 10 OFFSET " . $offset);
    if ($stmt->num_rows === 0) { // Jeżeli zapytanie zwróciło 0 wyników
		if ($search_valid) { // Jeżeli wykonujemy wyszukiwanie
			echo "<p>Nie znaleziono pasujących pracowników.</p>";
		}
		else { // Jeżeli nie wykonujemy wyszukiwania
			echo "<p>Baza pracowników jest pusta.</p>";
		}
    }
    else { // Jeżeli zapytanie zwróciło jakieś wyniki
	?>
<table>
            <thead>
              <tr>
                <td>ID</td>
                <td>Imię</td>
                <td>Nazwisko</td>
                <td>Płeć</td>
                <td>Nazwisko panieńskie</td>
                <td>Email</td>
                <td>Kod pocztowy</td>
              </tr>
            </thead>
            <tbody><?php
        while($row = $stmt->fetch_array(MYSQLI_NUM)) {
            printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",
                htmlspecialchars($row[0], ENT_QUOTES | ENT_HTML5),
                htmlspecialchars($row[1], ENT_QUOTES | ENT_HTML5),
                htmlspecialchars($row[2], ENT_QUOTES | ENT_HTML5),
                htmlspecialchars($row[3] == 0 ? 'kobieta' : 'mężczyzna', ENT_QUOTES | ENT_HTML5),
                htmlspecialchars($row[4], ENT_QUOTES | ENT_HTML5),
                htmlspecialchars($row[5], ENT_QUOTES | ENT_HTML5),
                htmlspecialchars($row[6], ENT_QUOTES | ENT_HTML5)
          );
        }
		$stmt->close();
        echo "</tbody></table>";

        /* Paginacja */
	    $needed_pages_query_row = $mysqli->query("SELECT COUNT(*) FROM `pracownicy`" . $search_query)->fetch_array(MYSQLI_NUM);
        $needed_pages = intval($needed_pages_query_row[0] / 10);
		$mysqli->close();
        if ($needed_pages > 0) { // Jeżeli paginacja jest potrzebna
			// Wbrew pozorom w poniższej linijce nie ma XSS. $_GET['search'] zostanie wykorzystany tylko jeżeli $search_valid, czyli tylko jeżeli $_GET['search'] zawiera określony zestaw znaków, który nie może wywołać XSS
			$search_phrase = $search_valid ? "search=" . $_GET['search'] . "&" : '';
			if ($offset > 0) { // Jeżeli nie jesteśmy na pierwszej stronie
				printf("<a href=\"?page=4&%soffset=%s\"><-</a>\n", str_replace(' ', '+', $search_phrase), $offset - 10); // Strzałka do poprzednej strony
			}
			for ($i = 0; $i <= $needed_pages; $i++) {
				if ($offset / 10 !== $i) { // Jeżeli chcemy wypisać stronę inną niż ta, na której jesteśmy
					printf("<a href=\"?page=4&%soffset=%s\">%s</a>\n", str_replace(' ', '+', $search_phrase), $i * 10, $i + 1); // Link do pewnej strony
				}
				else { // Jeżeli chcemy wypisać numer stron na której obecnie jesteśmy
					printf("%s\n", $i + 1);
				}
			}
			if ($offset / 10 < $needed_pages) { // Jeżeli nie jesteśmy na ostatniej stronie
				printf("<a href=\"?page=4&%soffset=%s\">-></a>\n", str_replace(' ', '+', $search_phrase), $offset + 10); // Strzałka do następnej strony
			}
        }
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="dokumenty.css"/>
    <title>Strona</title>
  </head>
<body>
  <header>LOGO</header>
  <aside>
    <a href="index.php?page=1">Strona główna</a>
    <a href="index.php?page=2">Formularz</a>
    <a href="index.php?page=3">Zawartość sesji</a>
    <a href="index.php?page=4">Baza pracowników</a>
  </aside>
  <main>
  <?php page_switch(); ?>
  </main>
  <aside>
  <?php // Jeżeli nie jesteśmy na stronie z listą pracowników
    if ($strona !== 4) { ?>
    <ul>
      <li>
        <a href="http://google.com" target="_blank">google.com</a>
      </li>
      <li>
        <a href="http://wp.pl" target="_blank">www.wp.pl</a>
      </li>
    </ul>
    <?php
    } // Jeżeli jesteśmy na stronie z listą pracowników
    else { ?>
        <form action="index.php">
            <input type="hidden" name="page" value="4"/>
            <input type="text" name="search" placeholder="Szukaj..." maxlength="50"/>
            <input type="submit" value="Szukaj"/>
        </form>
    <?php } ?>
  </aside>
  <footer>
<?php // Wyświetlanie liczby pracowników jeżeli jest niezerowa
  if (!isset($_SESSION['counter'])) {
    echo 'Stopka';
  }
  else {
    echo 'Liczba dodanych pracowników: ' . $_SESSION['counter'];
  }
?>
  </footer>
</body>
</html>