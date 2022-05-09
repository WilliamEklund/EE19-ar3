<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>OOP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    class User
    {
      public $name = '';
      public $email = '';

      public function __construct($name, $email)
      {
        $this->name = $name;
        $this->email = $email;
      }
      public function AddFriend()
      {
        return "Added friends";
      }
    }

    $userOne = new User("Willy", "MilliVanilli@mail.com");
    $userTwo = new User("Anders", "Anders@mail.com");

    echo get_class($userOne) . '<br>';

    echo 'Name: ' . $userOne->name . '<br>' .  'Email: ' . $userOne->email . '<br>';
    echo $userOne->AddFriend();
    ?>
</body>
</html>