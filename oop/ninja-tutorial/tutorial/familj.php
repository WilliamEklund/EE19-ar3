<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
    class Family
    {
      public $firstName = '';
      public $lastName = '';

      public function __construct($fName, $lName)
      {
        $this->firstName = $fName;
        $this->lastName = $lName;
      }
      public function printNames()
      {
        echo "<p>
       Förnamn: $this->firstName<br>
        Efternamn: $this->lastName<br>
        </p>";
      }
    }
    $user1 = new Family('Milli', 'Vanilli');
    $user2 = new Family('Branne', 'Coco');
    $user1->printNames();
    $user2->printNames();


    ?>

    <script> </script>
</body>
</html>