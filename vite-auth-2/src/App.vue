<template>
  <section class="bg-black">
    <nav>
      <router-link  class="text-black text-decoration-none" to="/">Home</router-link>
      <router-link class="text-black text-decoration-none" to="/blog">Blog</router-link>
    </nav>

    <router-view></router-view>
  </section>
</template>

<script>


  export default {
    data (){
      return {
        message: 'Progetto Front-office'
      }
    },
    
  }
</script>

<style lang="scss">

@use './style/scss/general.scss'
</style>
