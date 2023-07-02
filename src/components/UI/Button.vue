<template>
  <button class="btn title title__fz16">{{ this.value }}
    <slot></slot>
  </button>
</template>
<script>

export default {
  name: 'Button',
  props: {
    value: {
      type: String,
      required: true
    }
  },

}
</script>

<style lang="scss">
  .btn {
  padding: 0 30px;
  height: 50px;
  background: var(--main-color);
  border: none;
  border-radius: 20px;
  color: var(--white-color);
  &:hover {
    background: var(--main-color_hover);
  }
  }
</style>