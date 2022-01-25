<!DOCTYPE html>
<html lang="sv">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Skriv ut csv-fil</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital@1&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="kontainer">
      <h1>NTI lunchrestauranger</h1>
      <form class="bg-light" action="" method="POST">
        <label>Ange filnamn</label>
        <input class="form-control" type="text" name="filnamn" />
        <button type="submit" class="btn btn-primary">Läs in</button>
      </form>
      <?php
              $file_input = filter_input(INPUT_POST, 'filnamn', FILTER_SANITIZE_STRING);
              $submit = filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_STRING);

              
     $filnamn = 'resturanger.txt';
     $rader = file($filnamn);
   if (isset($_POST['submit']) && $file_input == $filnamn) {
   // Loopa igenom alla rader
   foreach ($rader as $rad) { 
    echo "<table>";
    echo "<tr><th>Restaurang</th></tr>";
    echo $rad;
    echo "</table>";
   }

   }
         // Skriv ut raden
        ?>
    </div>
  </body>
</html>
