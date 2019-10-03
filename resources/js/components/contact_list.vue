<template>
  <div class="contacts">
    <!-- Модальное онко -->
    <transition name="fade">
      <modal v-if="addform" @off="modalOff" @updatecontacts="setData" :edit="updateForm.edit" :upData="updateForm.data"/>
    </transition>
    <template v-if="compcontacts && compcontacts.length > 0">
      <transition-group name="fade" mode="out-in">       
        <div 
          class="contacts-user"
          v-for="(user, i) in compcontacts"
          :key="user.id"
        >
          <button class="pure-button contact-update" @click="updateFormAction(i)">edit</button>
          <button class="pure-button contact-delete" @click="deleteContact(i)">delete</button>
          <b>{{user.name}}</b>
          <p>{{user.phone}}</p>
        </div>
      </transition-group>
    </template>
    <template v-else-if="compcontacts && compcontacts.length == 0">
      <h1 class="empty-msg">Your list are empty :)</h1>
    </template>
    <template v-else-if="compcontacts == null">
      <loader />
    </template>
    <button class="pure-button add-contact" @click="addform = true">+</button>
  </div>
</template>
<script>
  import modal from "./modal";
  import loader from './loader'
  export default {
    props:['queryName', 'queryPhone'],
    components:{
      modal,
      loader
    },
    data: ()=>({
      addform: false,
      contacts: null,
      updateForm: {
        edit: false,
        data: {}
      }
    }),
    mounted(){
      this.setData()
    },
    computed: {
     compcontacts(){
      if(this.queryName.length || this.queryPhone.length){
        return this.filterByName();
      }
      return this.contacts;
     }
    },
    methods:{
      async setData(){
        const resp = await axios.get('/api/contacts')
        this.contacts = resp.data.data
      },
      async deleteContact(id){
        let res = await axios.delete(`/api/contacts/${this.contacts[id].id}`);
        if (res.data.success) {
          this.contacts.splice(id, 1)
        }
      },
      filterByName(){
        return this.contacts.filter(person => {
          return person.phone.toLowerCase().indexOf(this.queryPhone) !== -1 && person.name.toLowerCase().indexOf(this.queryName) !== -1
        })
      },
      updateFormAction(id){
        this.updateForm.edit = true;
        this.updateForm.data = this.contacts[id];
        this.addform = true;
      },
      modalOff(){
        this.addform = false;
        this.updateForm.edit = false;
        this.updateForm.data = {};
      }
    }
  }
</script>
<style lang="scss">
.contacts{
  position: relative;
  margin-top: 2rem;
  min-height: 100vh;
}
.contacts-user{
  position: relative;
  display: flex;
  flex-direction: column;
  justify-content: center;
  min-height: 5rem;
  font-size: 1rem;
  padding: 1rem 0;
  border-bottom: .1px solid black;
}
.add-contact{
 position: fixed;
  bottom: 3rem;
  right: 10%;
  color: #fff;
  font-size: 2rem;
  padding: .75rem .75em;
  font-weight: 600;
  border-radius: 50%;
  background-color: rgba(28, 217, 85, 1);
}
.contact-delete{
  position: absolute;
  background-color: rgba(232, 19, 19, 1);
  font-size: .75rem;
  color: #fff;
  font-weight: 600;
  border-radius: 5%;
  right: 3rem;
  top: 20%;
  padding: .25rem 1rem;
}
.contact-update{
  position: absolute;
  background-color: rgba(117, 117, 4, 1);
  font-size: .75rem;
  color: #fff;
  font-weight: 600;
  border-radius: 5%;
  right: 7rem;
  top: 20%;
  padding: .25rem 1rem;
}
.empty-msg{
  text-align: center;
  opacity: .5;
}
.fade-enter-active, .fade-leave-active {
  transition: opacity .25s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active до версии 2.1.8 */ {
  opacity: 0;
}
</style>