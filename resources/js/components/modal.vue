<template>
  <div @click.self="$emit('off')" class="modal">
    <div class="contain">
      <form class="pure-form modal-form">
        <button class="pure-button modal-close" @click.prevent="$emit('off')">x</button>
        <fieldset class="pure-group">
            <input type="text" class="pure-input-1 modal-input" require placeholder="Username" v-model="form.name">
            <input type="tel" class="pure-input-1 modal-input" require placeholder="Phone" v-model="form.phone">
        </fieldset>
        <button 
          type="submit" 
          class="pure-button pure-input-1 pure-button-primary"
          @click.prevent="action"
        >
          {{edit ? 'Edit contact' : 'Save contact'}}
        </button>
      </form>
    </div>
  </div>
</template>
<script>
export default{
  props:['edit', 'upData'],
  data: ()=>({
    data: {}
  }),
  mounted(){
    if (this.upData) {
      this.data = Object.assign({}, this.upData);
      this.action = _.throttle(this.action, 500)
    }
  },
  computed:{
    form(){
      if(this.edit){
        return this.data;
      }else{
        return {
          name:'', 
          phone:'',
        }             
      }
    }
  },
  methods:{
    async action(){
      if(this.edit){
        await axios.put(`/api/contacts/${this.form.id}`, this.form)
      }else{
        await axios.post('/api/contacts', this.form);
      } 
      this.$emit('updatecontacts')
      this.$emit('off')
    }
  }
}
</script>
<style lang="scss" scoped>
  $contain: 0 calc(50vw - 400px);
  .modal{
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    width: 100%;
    top: 0;
    left: 0;
    background: rgba(0, 0, 0, .8);
    position: fixed;
    margin: 0 auto;
    z-index: 11;
  }
  .modal-form{
    position: relative;
    min-width: 400px;
    padding: 3rem;
    border-radius: 3%;
    background: rgba(230, 230, 230, 1);
  }
  .modal-input{
    margin: .5rem 0 !important;
  }
  .modal-close{
    position: absolute;
    background-color: rgba(232, 19, 19, 1);
    color: #fff;
    font-weight: 600;
    border-radius: 50%;
    right: 5%;
    top: 5%;
    padding: .1rem .6rem .35rem;
  }
</style>