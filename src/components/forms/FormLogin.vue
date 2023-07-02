<template>
  <form 
      class="form"
      v-on:submit.prevent="sendForm"
    >
    <h1 class="form__title title title__fz32 title__bold700">Вход</h1>
    <div
      v-if="!$store.state.registration.signup"
      class="form__subtitle title title__fz16"
    >
      Нет аккаунта? <span v-on:click="$router.push('/')" class="form__span title__bold700">Зарегестрироваться!</span>
    </div>
    <div
      v-if="$store.state.registration.signup"
      class="form__subtitle title title__fz16"
    >
      Вы успешно зарегестрированы!
    </div>
    <input-email v-on:postValue="takeValue"></input-email>
    <input-password v-on:postValue="takeValue"></input-password>
    <Button 
      class="form__btn"
      :value=this.value
    >
      <suspense-server
      v-if="suspenseServer"
      >
      </suspense-server>
    </Button>
    <h2 class="form__footer-title title title__fz12">Войти с помощью </h2>
    <social-panel></social-panel>

  </form>
</template>
<script>
import sendFormLogin  from '@/services/login'
import router from "@/router/router"
export default {
  data() {
    return {
      email: '',
      password: '',
      suspenseServer: false,
      value: 'Войти',
    }
  },
  methods: {
    takeValue(value, name) {
      this[name] = value;
    },
    async sendForm() {
      this.suspenseServer = true
      this.value = ''
      const response = await sendFormLogin(this.email, this.password)
      if (response?.data == 'Ok') {
        router.push('/MyProfile');
      }
      this.suspenseServer = false
      this.value = 'Войти'
    },
  }
}
</script>
<style lang="scss">
  
</style>