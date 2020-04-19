<div class="mx-auto">
  <h1 class="text-center">Lista de Tarefas</h1>
  <div id="tarefas">
  <h4 class="text-center" v-if="!tarefas.length">Nenhuma Tarefa Encontrada :)</h4>
  <div class="col-md-12 pb-3" v-else v-for="tarefa in tarefas" :key="tarefa.id">
    <div class="card">
        <div class="card-body">
          {{ tarefa.title }}
          <span
            :class="[
              'badge badge-pill float-right',
              tarefa.status === 'EM PROGRESSO' ? 'badge-info':
              tarefa.status === 'FINALIZADA' ? 'badge-success':
              tarefa.status === 'ABERTA' ? 'badge-secondary':
              '']
            ">
            {{ tarefa.status }}
          </span>
        </div>
    </div>
  </div>
  </div>
<script>
 (function(){
  const tarefas = new Vue({
    el: "#tarefas",
    data: () => ({
      tarefas: <?= $this->view->tarefas ?>
    })
  });
 })()
</script>