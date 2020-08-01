<template>
  <v-container class="fill-height fundo">
    <v-row justify="center">
      <v-col align="center">
        <h1 style="color:whitesmoke;">
          Bem Vindo ao Minicurso de Deploy de Aplicações Automatizadas
        </h1>
        <v-btn color="deep-purple" style="color:white" to="vote">
          deixe seu feedback
        </v-btn>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>

export default {
}
</script>
<style scoped>
.fundo{
    background-image: url('~@/assets/fundo.jpg');
    background-size: cover;
  }

</style>
