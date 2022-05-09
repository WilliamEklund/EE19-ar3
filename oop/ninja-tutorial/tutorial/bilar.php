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
    class car
    {
      public $model = '';
      public $price = '';
      public $color = '';
      public $year = '';

      public function __construct($m, $f, $c, $y)
      {
        $this->model = $m;
        $this->price = $f;
        $this->color = $c;
        $this->year = $y;
      }

      public function printCar()
      {
        echo "<p>
        Modell: $this->model<br>
        Pris: $this->price<br>
        Färg: $this->color<br>
        Årsmodell: $this->year<br>
        </p>";
      }
    }
    $car1 = new Car("Toyota Carola", "65 000", "Grå", 2009);
    $car1->printCar();

    $car2 = new car();
    $car2->model = 'Volvo V60';
    $car2->price = '120 000kr';
    $car2->color = 'Svart';
    $car2->year = '2016';
    $car2->printCar();
    ?>

    <script> </script>
</body>
</html>