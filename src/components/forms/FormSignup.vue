<template>
  <form 
    class="form"
    v-on:submit.prevent="sendForm"
    >
    <h1 class="form__title title title__fz32 title__bold700">Регистрация</h1>
    <div class="form__subtitle title title__fz16">
      Уже есть аккаунт? <span v-on:click="$router.push('/login')" class="form__span title__bold700">Войти</span>
    </div>
    <input-name v-on:postValue="takeValue"></input-name>
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
    <p class="title title__fz10 policy">Нажимая «Зарегестрироваться», вы принимаете <span>пользовательское соглашение</span> и <span>политику конфиденциальности</span>, и подтверждаете, что вам не менее 18 лет</p>
  </form>
</template>
<script>
import sendFormSignUp  from '@/services/registration'
import router from "@/router/router"
export default {
  data() {
    return {
      name: '',
      email: '',
      password: '',
      suspenseServer: false,
      value: 'Зарегестрироваться',
    }
  },
  methods: {
    takeValue(value, name) {
      this[name] = value;
    },
    async sendForm() {
      this.suspenseServer = true
      this.value = ''
      const response = await sendFormSignUp(this.name, this.email, this.password)
      if (response?.data == 'Ok') {
        this.$store.commit('signupTrue')
        router.push('/login');
      }
      this.suspenseServer = false
      this.value = 'Зарегестрироваться'
    },
  }
  
}
</script>
<style lang="scss" scoped>

</style>