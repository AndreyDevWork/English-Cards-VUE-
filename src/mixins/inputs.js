export default {
  data() {
    return {
      value: '',
      valid: '',
    }
  },
  methods: {
    validation() {
      if(this.regex.test(this.value)) {
        this.valid = 'valid';
      } else {
        this.valid = 'invalid';
      }
    },
    postValue() {
      this.$emit('postValue', this.value, this.name)
    }
  },
}