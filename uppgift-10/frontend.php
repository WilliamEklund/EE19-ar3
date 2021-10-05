<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uppgift-10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="kontainer">
        <h3>Hur varmt är det?</h3>
        <form action="./backend.php" method="post" enctype="multipart/form">
            <div class="mb-3">
                <label for="temp" class="form-label">Ange tempratur</label>
                <input type="text" class="form-control" id="temp" name="temp" value="cf">
            </div>

            <div class="kol2">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="cf" name="riktning">
                    <label class="form-check-label" for="cf">&deg;C till &deg;F</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="fc" name="riktning" value="fc">
                    <label class="form-check-label" for="fc">&deg;F till &deg;C</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>