<template>
  <v-app app>
    <v-main class="fundo">
      <nuxt />
    </v-main>
  </v-app>
</template>

<script>
export default {
  data () {
    return {
    }
  }
}
</script>
<style scoped>
 *{
    font-family: 'Roboto Mono', monospace;;
  }

  .fundo{
    background-image: url('~@/assets/fundo.jpg');
    background-size: cover;
  }
</style>
