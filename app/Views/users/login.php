<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Template de login</title>

  <!-- Principal CSS do Bootstrap -->
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/toasty/dist/toasty.min.css" rel="stylesheet">

</head>

<body class="text-center">
  <form class="form-signin" action="/users/auth" method="POST">
    <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>

    <label for="inputEmail" class="sr-only">Endereço de email</label>
    <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Seu email" autofocus>
    <label for="inputPassword" class="sr-only">Senha</label>
    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Senha">
    <div class="checkbox mb-3">
      <label>
        <p>Não tem uma conta? <a href="/users/register">Crie uma</a></p>
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017 - <?= date('Y') ?></p>
  </form>
  <style>
    html,
    body {
      height: 100%;
    }

    body {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-align: center;
      align-items: center;
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f5f5f5;
    }

    .form-signin {
      width: 100%;
      max-width: 330px;
      padding: 15px;
      margin: auto;
    }

    .form-signin .checkbox {
      font-weight: 400;
    }

    .form-signin .form-control {
      position: relative;
      box-sizing: border-box;
      height: auto;
      padding: 10px;
      font-size: 16px;
    }

    .form-signin .form-control:focus {
      z-index: 2;
    }

    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }
  </style>
  <script src="/assets/toasty/dist/toasty.min.js"></script>
  <script>
    (function() {
      const toast = new Toasty();

      <?php if ($this->errors) :
        foreach ($this->errors as $error) : ?>
          toast.error("<?= $error ?>");
      <?php endforeach;
      endif;    ?>

      <?php if ($this->success) :
        foreach ($this->success as $success) : ?>
          toast.success("<?= $success ?>");
      <?php endforeach;
      endif;    ?>


    })();
  </script>
</body>

</html>