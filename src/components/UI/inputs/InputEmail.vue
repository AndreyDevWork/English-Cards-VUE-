<template>
    <div class="input-block">
      <label 
        class="input-block__label title__bold700" 
        for="email"
      >
        {{ placeholder }}
      </label>
      <input 
        required
        pattern="^[\w.\s\-]{1,120}@[a-zA-Z0-9_\-]{1,120}(?:\.[a-zA-Z0-9_\-]{1,120}){1,2}$"
        class="title title__fz16 title_letter-spacing input-block__input" 
        :id="name"
        :name="name" 
        :type="type" 
        :placeholder="placeholder"
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
    name: 'input-email',
    mixins: [inputs],
    data() {
      return {
        name: 'email',
        type: 'email',
        placeholder: 'Email',
        regex: /^[\w.\s\-]{1,120}@[a-zA-Z0-9_\-]{1,120}(?:\.[a-zA-Z0-9_\-]{1,120}){1,2}$/,
        maxLength: 120,
        minLength: 1,
      }
    },
  }
</script>
<style lang="scss">


</style>