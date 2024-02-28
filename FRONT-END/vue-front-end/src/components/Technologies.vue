<script>
import axios from 'axios';

    export default{
        name: 'Technologies',
        data(){
            return{
                //array technology
                technologies: [],
                //visibility form
                visibilityForm: false,
                //new technology
                newTechnology: {
                    name: 'Insert Name',
                    description: 'Insert Description',
                }

            }
        },

        methods: {
            toggleCreateNewTechnology(){
                this.visibilityForm = true;
            },
            submitNewTechnology(){
                axios.post('http://localhost:8000/api/v1/technologies/create',
                this.newTechnology)
                    .then(res =>{
                      
                        this.getTechnologies();
                        this.visibilityForm = false;
                        
                    })
                    .catch(err=>{
                        console.log(err);
                    });
            },
            getTechnologies(){
                axios.get('http://localhost:8000/api/v1/technologies/index')
                .then(res=>{
                    const data = res.data;
                    
                    if(data.status == 'success'){
                        this.technologies = data.technologies;
                    }

                })
                .catch(err=>{
                    console.log(err);
                })
            }
        },


        mounted(){
            this.getTechnologies();
        }
    }

</script>

<template>
    <h1>Technologies:</h1>
    <form v-if="visibilityForm"
        @submit.prevent="submitNewTechnology"
    >
        <h2>Form</h2>
        <label for="name">Name:</label><br>
        <input type="text" name="name" id="name" v-model="newTechnology.name">
        <br>
        <label for="description">Description:</label><br>
        <input type="text" name="description" id="description" v-model="newTechnology.description">
        <br>
        <input  type="submit" value="Create">
    </form>
    <div v-else >
        <button @click="toggleCreateNewTechnology">Insert new Technology</button>
        <ul>
            <li v-for="technology in technologies" :key="technology.id">
                <hr>
                <h3>Name Technology: {{ technology.name }}</h3>
                <p>Description Technology: {{ technology.description }}</p>
                <hr>
            </li>
        </ul> 
    </div>
   
</template>

<style scoped>

</style>