<template>
  <div class="container">
    <Header/>
    <Nav :links="navLinks"/>
    <main>
      <!-- rendering -->
      <router-view></router-view>
    </main>
  </div>
</template>


<script>
import Header from './Header.vue';
import Nav from './Nav.vue';

export default {
  name: "App",
  components: {
    Header,
    Nav
  },
  data(){
    return {
      navLinks: undefined
    }
  },
  mounted(){
    this.getNavLinks();
  },
  methods: {
    async getNavLinks(){
      try{
        let response = await axios('api/nav-top');
        this.navLinks = response.data;
      } catch(error){
        console.log(error);
      }
    }
  }

};
</script>


<style lang="scss" scoped>
</style>