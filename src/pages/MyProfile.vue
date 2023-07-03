<template >
  <div class="header-profile">
    <div><logo-app></logo-app></div>
    <profile></profile>
  </div>
</template>
<script>
import Profile  from '@/components/Profile.vue'
export default {
  components: { Profile }
}
</script>
<style lang="scss" scoped>
  .header-profile {
    min-height: 300px;
    background-color: var(--white-color);
    padding: 25px 25px 35px 25px;
    display: grid;
    grid-template-columns: 40px 280px 40px;
    justify-content: space-between;

  }
</style>