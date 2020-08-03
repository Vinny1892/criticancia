<template>
  <div class="fill-height">
    <v-row justify="center" align="start">
      <v-col cols="12" lg="7" style="position:fixed">
        <v-alert
          v-model="showAlert"
          icon="mdi-shield-lock-outline"
          type="success"
          dense
          dismissible
          prominent
          transition="scale-transition"
        >
          Avaliação salva com sucesso
        </v-alert>
      </v-col>
    </v-row>
    <v-container class="fill-height">
      <v-row justify="center">
        <v-col
          cols="12"
          lg="7"
          sm="7"
          md="7"
          justify="center"
          align="center"
        >
          <Form />
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script>
import Form from '@/components/Form.vue'
export default {
  components: {
    Form
  },
  computed: {
    showAlert: {
      get () { return this.$store.getters.showAlert.showAlert },
      set (val) { this.$store.commit('showAlert', val) }
    }
  }
}
</script>

<style lang="scss" scoped>

</style>
