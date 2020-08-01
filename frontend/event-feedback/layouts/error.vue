<template>
  <v-app app>
    <div class="fill-height fundo">
      <div v-if="error.statusCode === 404">
        <v-row justify="center">
          <v-col align="center" cols="12">
            <h1 style="opacity: 0.9;">
              Pagina não encontrada - 404
            </h1>
          </v-col>
        </v-row>
      </div>
      <div v-else-if="error.statusCode === 500">
        <v-row justify="center" align="center">
          <h1 style="opacity: 0.9;">
            Erro no Servidor - 500
          </h1>
        </v-row>
      </div>
      <div v-else>
        <v-row justify="center" align="center">
          <h1 style="opacity: 0.9;">
            Erro ao computar voto
          </h1>
        </v-row>
      </div>
      </v-container>
    </div>
  </v-app>
</template>

<script>
export default {
  props: {
    // eslint-disable-next-line
    error: {
      statusCode: Number
    }
  },
  data () {
    return {
      ServerError: '500',
      pageNotFound: '404',
      otherError: ' Error'
    }
  },
  head () {
    let title = ''
    if (this.error.statusCode === 404) {
      title = this.pageNotFound
    } else if (this.error.statusCode >= 500) {
      title = this.ServerError
    } else {
      title = this.otherError
    }
    return title
  }
}
</script>

<style scoped>
h1 {
  font-size: 70px;
}
.fundo {
  color:whitesmoke;
  background-image: linear-gradient(to right,#858585, #3F3F3F);

}
</style>
