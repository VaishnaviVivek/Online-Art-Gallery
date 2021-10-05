<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Auth Sign In</title>
    <!-- Custom styles for this template -->
    <link href="/online_art_gallery/auth/dashboard/css/login.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <h1>Admin Login</h1><br>    
    <div class="login">    
      <form class="form-signin" id="login" method="POST" action="./includes/auth.sign.php">    
          <label><b>User Name     
          </b>    
          </label>    
          <input type="text" name="auth_username" id="Uname" placeholder="Username">    
          <br><br>    
          <label><b>Password     
          </b>    
          </label>    
          <input type="Password" name="auth_password" id="Pass" placeholder="Password">    
          <br><br>    
          <button type="submit" name="auth-login">Log In</button>       
      </form>     
    </div>
  </body>
</html>
