<?php
include './oop/ninja-tutorial/validator/user-validator.php';
$username = filter_input(INPUT_POST, "username");
$email = filter_input(INPUT_POST, "email");
if ($username && $email) {
    echo "$username $email";

    $controll = new UserValidator($_POST);
    $controll->validateUsername();
    $controll->validateEmail();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title></title>
    <!-- JavaScript Bundle with Popper -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Formulär</h1>
        <form action="#" method="post">
            <div class="mb-3">
                <label for="exampleInputName1" class="form-label">Username</label>
                <input type="text" class="form-control" id="exampleInputName1" name="username">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script> </script>
</body>
</html>