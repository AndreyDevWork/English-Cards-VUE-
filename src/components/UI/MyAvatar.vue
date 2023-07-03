<template>
  <div>
    <img
      v-if="src"
      class="avatar"
      alt="avatar"
      :src="src" 
      >
      <div class="avatar__upload">
        <form 
          v-on:submit.prevent
          class="header__form">
          <button
          class="header__upload-btn"
          v-on:click="activateInput"
          >
            Обновить фото
          </button>
          <input 
            v-on:change="sendAvatarMethod"
            ref="avatarInput" 
            class="header__input" 
            type="file" 
            name="avatar" 
            accept="Обновить"
          >
        </form>
      </div>
  </div>
</template>

<script>
import getMyAvatar from '@/services/getMyAvatar'
import sendMyAvatar from '@/services/sendMyAvatar'
export default {
  name: 'my-avatar',
  data() {
    return {
      src: '',
    }
  },
  methods: {
    async takePath() {
      const response = await getMyAvatar()
      this.src = response
    },
    activateInput() {
      this.$refs.avatarInput.click();
    },
    async sendAvatarMethod(event) {
      const file = event.target.files[0]
      const response = await sendMyAvatar(file);
      console.log(response)
    }
  },
  mounted() {
    this.takePath()
  }
}
</script>

<style lang="scss" scoped>
  .avatar {
    width: 100%;
    height: 100%;
    -o-object-fit: cover;
    object-fit: cover;
    &__upload {
      width: 100%;
      background-color: rgba(0,0,0,.72);
      text-align: center;
      transition: .5s all;
    }
  }
</style>