<div class="mx-auto">
  <form id="form" action="/todos/store" method="POST">
  <h4 class="text-center">Crie uma Nova Tarefa</h4>
  <div class="form-group">
    <label>Nome da Tarefa *</label>
    <input :class="['form-control', { 'is-invalid': $v.taskName.$error }]" name="taskname" v-model.trim="$v.taskName.$model">
    <div v-if="!$v.taskName.required" class="invalid-feedback">
      Nome da Tarefa é obrigatório.
    </div>
  </div>
  <div class="form-group">
    <label>Descrição *</label>
    <textarea :class="['form-control', { 'is-invalid': $v.description.$error }]" rows="3" name="description" v-model.trim="$v.description.$model"></textarea>
    <div v-if="!$v.description.required" class="invalid-feedback">
      Descrição é Obrigatória
    </div>
  </div>
  <button type="submit" class="btn btn-primary" :disabled="$v.$invalid">Enviar</button>
  </form>
</div>

<script>
  (function() {
    const { required } = window.validators;
    const form = new Vue({
      el: "#form",
      data: () => ({
        taskName: "",
        description: ""
      }),
      validations: {
        taskName: {
          required,
        },
        description: {
          required,
        }
      }
    });
  })()
</script>