<!doctype html>
<?php 
/**
 * Objet pour connexion à la base de donnée
 * les inputs sont mis en paramètre 
 * Sécurité renforcé grâce au "FILTER_SANITIZE_SPECIAL_CHARS" permet notament d'empecher les injéctions sql
 */
require_once 'auth.php';
    $try = new Database ;
    $try->check(
      filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS),
      filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS),
      filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS)
    );

    ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Signin Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href=https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form method = "POST" class="form-signin" >


  <img class="mb-4" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <label for="inputName" class="sr-only">Your name</label>
  <input type="name" name="nom" id="inputName" class="form-control" placeholder="Your Name" required autofocus>
  <label for="inputEmail" class="sr-only">Email address</label><br>
  <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label><br>
  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required><br>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button><br>
</form>
<a href="submit.php"><button class="btn btn-lg btn-primary btn-block" type="button">S'inscrire</button></a>

<p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
</body>
</html>