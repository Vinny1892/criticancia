<template>
  <div>
    <v-card :loading="loading" elevation="20" style="background-color:aliceblue">
      <v-row justify="center" align="center">
        <v-card-title class="display-1">
          Criticancia
        </v-card-title>
      </v-row>
      <v-card-subtitle class="pb-0">
        Avalie o Minicurso
      </v-card-subtitle>
      <v-card-text>
        <v-rating
          v-model="nota"
          color="orange"
          background-color="orange lighten-3"
          half-increments
          size="14"
          large
        />
      </v-card-text>
      <v-card-actions>
        <v-row justify="center" align="center">
          <v-col cols="12" lg="2" md="2" sm="4">
            <v-btn color="blue-grey" @click="reset">
              Resetar
            </v-btn>
          </v-col>
          <v-col cols="12" lg="2" md="4" sm="4">
            <v-btn color="amber" @click="submit">
              Votar
            </v-btn>
          </v-col>
          <v-col cols="12" lg="2" md="4" sm="4">
            <v-btn outlined to="/">
              Voltar
            </v-btn>
          </v-col>
        </v-row>
      </v-card-actions>
    </v-card>
  </div>
</template>

<script>
/* eslint-disable */
export default {
  data:()=>({
        loading:false,
        hover:true,
        nota:0,

  }),
  methods:{
      async submit(){
        let response;
        try{
            this.loading = true;
             response =  await this.$axios.post('api/' , {"vote" : this.nota } );
            this.loading = false;
            if( response.status  === 200 ){
              this.$store.commit("showAlert" , true);
            }
        }catch(e){
            return this.$nuxt.error({ statusCode: 500 });
        }
      },

      reset(){
        this.nota = 0;
      }
  }
}
</script>

<style  scoped>
 *{
    font-family: 'Roboto Mono', monospace;;
  }

</style>
