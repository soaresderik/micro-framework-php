<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Tasks </title>

  <link href="/assets/css/style.css" rel="stylesheet">
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
</head>

<body>
  <header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="/">Navbar</a>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav" v-for="item in navbar" :key="item.name">
          <li :class="['nav-item', pathname === item.path ? 'active' : '']">
            <a class="nav-link" :href="item.path">{{ item.name }}</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <div class="container col-md-8">
    <?php $this->content() ?>
  </div>

  <script src="/assets/toasty/dist/toasty.min.js"> </script>
  <script>
    (function() {
      const toast = new Toasty();

      const header = new Vue({
        el: "#header",
        data: () => ({
          navbar: [
            {
              name: "Tarefas",
              path: "/todos"
            },
            {
              name: "Criar",
              path: "/todos/create"
            },
            {
              name: "Sair",
              path: "/todos/logout"
            }
          ],
          pathname: window.location.pathname
        })
      });

      <?php if ($this->errors) :
        foreach ($this->errors as $error) : ?>
          toast.error("<?= $error ?>", 4000);
      <?php endforeach;
      endif;    ?>

      <?php if ($this->success) :
        foreach ($this->success as $success) : ?>
          toast.success("<?= $success ?>", 4000);
      <?php endforeach;
      endif;    ?>
    })();
  </script>
</body>

</html>