<template>
  <div>
    <nav class="navbar">
      <a class="tab" @click="stores">History</a>
      <a class="tab link-active">Contacts</a>
    </nav>
  </div>
</template>
<script>
export default {
  methods:{
    stores(){
      console.log(this)
    }
  }
}

</script>
<style>
.navbar {
  display: flex;
  width: 100%;
  justify-content: center;
  text-align: center;
  background-color: rgba(34, 94, 121, 1);
}

a.tab {
  padding: 1rem 2rem;
  border-right: 1px solid rgba(166, 166, 166, .25);
  transition: .5s;
  text-decoration: none;
  color: #fff;
  font-size: 1rem;
}

.tab:first-child {
  border-left: 1px solid rgba(166, 166, 166, .25);
}

.tab:hover {
  color: white;
  background-color: rgb(89%, 29%, 8%, .6);
  cursor: pointer;
}
.link-active{
  color: white;
  background-color: rgb(89%, 29%, 8%, .6);
}
</style>
