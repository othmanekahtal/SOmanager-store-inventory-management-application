<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>login | SOmanager store management application</title>
  <link rel="stylesheet" href="css/login.css" />
  <link rel="stylesheet" href="css/login-dark.css" />
  <link rel="icon" href="images/SVG/logo.svg" />
</head>

<body>
  <main class="main">
    <div class="login-box">
      <div class="logo-box">
        <a href="#" class="logo">
          <img src="images/SVG/logo.svg" alt="logo" />
        </a>
        <div class="illustration-login">
          <img src="images/SVG/Thinking.svg" alt="Thinking" />
        </div>
      </div>
      <div class="form-box">
        <h1 class="primary-heading">user login</h1>
        <form action="aut.php" method="POST" class="form">
          <div class="input">
            <svg class="input__icon">
              <use href="images/SVG/sprite.svg#profile-user" />
            </svg>
            <input class="input-login input-user" type="text" name="username" id="username" placeholder="Username"
              required />
            <!-- <div class="error username"><h6>check username</h6></div> -->
          </div>
          <div class="input">
            <svg class="input__icon">
              <use href="images/SVG/sprite.svg#padlock" />
            </svg>
            <input class="input-login input-password" type="password" name="password" id="password"
              placeholder="Password" required />
            <!-- <div class="error password"><h6>check password</h6></div> -->
          </div>

          <input id="submitLogin" type="submit" value="login" class="btn login-btn btn__primary" />
        </form>
      </div>
    </div>
  </main>
  <script src="scripts/validation.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>

</html>