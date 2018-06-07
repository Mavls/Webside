<?php
// Wypisywanie błędów
error_reporting(E_ALL);

// Połączenie z bazą danych
require('polaczenie-db.php');

if ($_POST['tabela'] === 'ewidencja domów mody') { // Jeżeli chcemy działać na tabeli "Ewidencja domow mody"
  if ($_POST['akcja'] === 'dodaj') { // Jeżeli chcemy dodać wpis
    $wartosci = [$_POST['Adres'], $_POST['Projektant'], $_POST['Prestiz']];
    $stmt = $db->prepare('INSERT INTO `ewidencja domów mody` (`Adres`, `Projektant`, `Prestiż`) VALUES (?, ?, ?)');
    $stmt->execute($wartosci);
  }
  if ($_POST['akcja'] === 'usun') { // Jeżeli chcemy usunąć wpis
    $stmt = $db->prepare('DELETE FROM `ewidencja domów mody` WHERE `ID` = ?');
    $stmt->execute([$_POST['id']]);
  }
}

// Powrót do strony z której przesłano formularz
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>