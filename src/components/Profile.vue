<template>
  <div class="profile">
    <my-avatar class="profile__avatar">
    </my-avatar>
  </div>
</template>
<script>
export default {

  
}
</script>
<style lang="scss">
  .profile {
    &__avatar {
      width: 180px;
      height: 180px;
      overflow: hidden;
      border-radius: 100%;
      margin: auto;
      transition: 1.5s all;
    }
  }
</style>