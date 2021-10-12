<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php include("./header.php"); ?>

    <section class="kontainer grey-text">
        <h4 class="center">Add a Pizza</h4>
        <form action="./add.php" method="POST" class="white">
            <label for="">Din Epost:</label>
            <input type="text" name="mejl">
            <label for="">Pizza namn</label>
            <input type="text" name="namn">
            <label for="">Ingredienser</label>
            <input type="text" name="ingredienser">

            <div class="center">
                <input type="submit" name="skicka" value="skicka" class="btn btn-primary">
            </div>
        </form>
    </section>

    <?php include("./footer.php"); ?>

    <?php
        if (isset($_POST['skicka'])) {

                echo $_POST['mejl'];
                echo $_POST['namn'];
                echo $_POST['ingredienser'];
        }

        ?>

</body>
</html>