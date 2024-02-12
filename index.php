<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Panel Vturias</title>
    <link rel='stylesheet' href='//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
    <link rel="stylesheet" href="./assets/form.css">
</head>
<body>

<div class="wrapper">
    <form class="form-signin" action="api/connect.php" method="POST">
        <h2 class="form-signin-heading">Panel Artiste</h2>
        <input type="text" class="form-control" name="email" placeholder="Adresse Email" required="" autofocus="" />
        <input type="password" class="form-control" name="password" placeholder="Mots de passe" required=""/>
        <label class="checkbox">
            <input type="checkbox" id="saveme" name="saveme"> Ce souvenir de moi
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
    </form>
</div>

</body>
</html>