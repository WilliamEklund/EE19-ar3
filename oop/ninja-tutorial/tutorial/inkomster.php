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
    class PersonIncome
    {
      public $firstName = '';
      public $lastName = '';
      public $hourlyWage = 0;
      public $totalHours = 0;

      public function printSalary()
      {
        $salary = $this->hourlyWage * $this->totalHours;
        echo "<p>$this->firstname $this->lastname monthly salary is $salary</p>";
      }
    }

    $employee1 = new PersonIncome();
    $employee1->firstName = 'Milli';
    $employee1->lastName = 'Vanilli';
    $employee1->hourlyWage = 200;
    $employee1->totalHours = 30;

    $employee2 = new PersonIncome();
    $employee2->firstName = 'Stefan';
    $employee2->lastName = 'Svensson';
    $employee2->hourlyWage = 200;
    $employee2->totalHours = 150;
    $employee1->printSalary();
    $employee2->printSalary();

    ?>

    <script> </script>
</body>
</html>