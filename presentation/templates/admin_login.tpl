{load_presentation_object filename="admin_pipelining" assign="obj"}

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles/header.css">
    <link rel="stylesheet" type="text/css" href="styles/explore.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer src="js/admin.js"></script>
    <title>Zarc</title>
</head>
<body>
    <div class="container-fluid p-0">
      <nav class="navbar navbar-expand-lg main-navbar px-4">
        <div class="d-flex align-items-center">
          <a class="navbar-brand nav-name" href="#">ZARC</a>
        </div>
      </nav>
    </div>

      <div class="popUp">
            <form class="loginForm">
                <h2>Admin Login</h2>
                <div class="input-box">
                    <label for="agent_email">Email</label><br>
                    <input type="text" id="agent_email" class="formInput" placeholder="enter registered email" />
                </div>
                <div class="input-box">
                    <label for="pass">Password</label><br>
                    <input type="password" id="pass" class="formInput" placeholder="enter password">
                </div>
                <input type="submit" name="login" class="formBtn" value="LOGIN" />
            </form>
        </div>
    
</body>
</html>