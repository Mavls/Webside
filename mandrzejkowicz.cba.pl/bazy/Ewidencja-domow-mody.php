<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title> Ewidencja domów mody </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="styl.css">
</head>

<body>

<?php
// Wypisywanie błędów
error_reporting(E_ALL);

// Połączenie z bazą danych
require('polaczenie-db.php');

// Wykonanie zapytania SQL
$stmt = $db->prepare('SELECT * FROM `ewidencja domów mody`');
$stmt->execute();

// Pobranie wyników z wykonanego zapytania SQL
$tabela = $stmt->fetchAll(PDO::FETCH_NUM);
?>

<table border="1">
  <thead>
    <th></th>
    <th>ID</th>
    <th>Adres</th>
    <th>Projektant</th>
    <th>Prestiż</th>
  </thead>
<?php
// Dla każdego wiersza tabeli
foreach($tabela as $wiersz) {
?>
  <tr>
    <td>
      <form action="baza-akcje.php" method="post">
        <input type="hidden" name="tabela" value="ewidencja domów mody"/>
        <input type="hidden" name="akcja" value="usun"/>
        <input type="hidden" name="id" value="<?php echo $wiersz[0]?>"/>
        <input type="submit" value="Usun"/>
      </form>
    </td>
<?php
  foreach($wiersz as $wartosc) {
    echo "<td>$wartosc</td>";
  }
  echo '</tr>';

} ?>
</table>

</body>
</html>