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
  <script src="/assets/js/vuelidate.min.js"></script>
  <script src="/assets/js/validators.min.js"></script>
  <link href="/assets/toasty/dist/toasty.min.css" rel="stylesheet">
  <script>
    Vue.use(window.vuelidate.default);
  </script>
</head>

<body>
  <div id="main">
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
    <div class="container col-md-8 mt-5">
      <?php $this->content() ?>
    </div>
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
              path: "/users/logout"
            }
          ],
          pathname: window.location.pathname
        }),
        created: () => {
          [...<?= $this->errors ?>].forEach(e => {
            toast.error(e);
          });

          [...<?= $this->success ?>].forEach(e => {
            toast.error(e);
          });
        }
      });
    })();
  </script>
</body>

</html>