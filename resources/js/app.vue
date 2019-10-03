<template>
    <div class="container">
        <navbar />
        <div class="inner">
            <form class="pure-form field-block">

                <input autofocus class="pure-input-1 serach-input" name='name' type="text" placeholder="Name" v-model="name" />
                <input autofocus class="pure-input-1 serach-input" name='phone' type="number" placeholder="Phone" v-model="phone" />

            </form>
            <br />
            <hr />
            <contact-list :queryName="queryName"  :queryPhone="queryPhone"/>
        </div>
    </div>
</template>

<script>
    import navbar from './components/navbar'
    import contactList from './components/contact_list';
    export default {
        data: ()=>({
            name: '',
            phone: '',
            queryName: '',
            queryPhone: '',
        }),
        components:{
          navbar,
          contactList
        },
        mounted(){
            this.setQueryName = _.debounce(this.setQueryName, 500)
            this.setQueryPhone = _.debounce(this.setQueryPhone, 500)
        },
        watch:{
            name(){
              this.setQueryName()
            },
            phone(){
              this.setQueryPhone()
            }
        },
        methods:{
            setQueryName(){
                this.queryName = this.name.toLowerCase()
            },
            setQueryPhone(){
                this.queryPhone = this.phone.toLowerCase()
            },
        }
    }
</script>
<style scoped>
    .container{
        max-width: 920px;
        width: 100%;
        margin: 0 auto;
    }
    .inner{
        margin: 2rem auto;
        width: 90%;
    }
    .field-block{
        display: flex;
        flex-direction: column;
    }
    .serach-input{
        margin: .5rem 1rem;
    }
</style>