<template>
  <div class="input-block">
    <label 
      class="input-block__label title__bold700" 
      for="name"
    >
      {{ placeholder }}
    </label>
    <input 
      required
      pattern="^[a-zA-Zа-яА-Я\s]{2,32}$"
      class="title title__fz16 title_letter-spacing input-block__input" 
      :id="name"
      :name="name" 
      :type="type" 
      :placeholder="placeholder"
      :title="title"
      :maxlength="maxLength"
      :minlength="minLength"
      v-model="value"
      v-on:input="postValue"
      v-on:blur="validation"
      v-bind:class="{invalid: valid=='invalid', valid: valid=='valid'}"
    >
    
  </div>
</template>
<script>
  import inputs from '@/mixins/inputs'
  export default {
    name: 'input-name',
    mixins: [inputs],
    data() {
      return {
        name: 'name',
        type: 'text',
        placeholder: 'Имя',
        regex: /^[a-zA-Zа-яА-Я\s]{2,32}$/,
        maxLength: 32,
        minLength: 2,
        title: 'Введите от 2 до 32 символов, используя только буквы'
      }
    },
  }
</script>
<style lang="scss">


</style>