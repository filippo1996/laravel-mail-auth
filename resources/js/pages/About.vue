<template>
  <div>
    <h1>Contattaci</h1>
    <form id="contact">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="name">
        <div id="name" class="form-text">Inserisci il tuo nome</div>
      </div>
      <div class="mb-4">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="email">
      </div>
      <div class="mb-3">
        <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
        <label class="form-check-label" for="message">Inserisci il messaggio</label>
      </div>
      <button type="submit" class="btn btn-primary">Invia</button>
    </form>
  </div>
</template>


<script>
export default {
  name: "About",
  data(){
    return {
      name: '',
      email: '',
      message: '',
      url: 'api/contact'
    }
  },
  mounted(){
    this.senForm( this.callAxiosApi );
  },
  methods: {
    senForm(callback){
      let form = document.querySelector('#contact');
      form.addEventListener('submit', function(event){
        event.preventDefault();
        ['name','email','message'].forEach(ele => {
          this[ele] = form.querySelector(`[name="${ele}"]`).value;
        });

        if(typeof callback === 'function'){
          callback()
            .then(response => {
              if(response){
                this.name = '';
                this.email = '';
                this.message = '';
                form.reset();
                alert('messaggio inviato');
              }else{
                alert('messaggio non inviato, riprova');
              }
            })
            .catch(err => {
              console.log(err);
            });
        }
      }.bind(this));
    },
    async callAxiosApi(){
      try{
        let response = await axios.post(this.url, {
          name: this.name,
          email: this.email,
          message: this.message
        });
        return response.data.success;
      } catch(err){
        console.log(err);
      }
    }
  }
};
</script>


<style lang="scss" scoped>
</style>