<script>
import axios from 'axios';

    export default{
        name: 'Technologies',
        data(){
            return{
                technologies: [],
            }
        },

        mounted(){
            axios.get('http://localhost:8000/api/v1/technologies')
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
    }

</script>

<template>
    <h1>Technologies:</h1>
    <ul>
        <li v-for="technology in technologies" :key="technology.id">
            <hr>
            <p>Name Technology: {{ technology.name }}</p>
            <p>Description Technology: {{ technology.description }}</p>
            <hr>
        </li>
    </ul>
</template>

<style scoped>

</style>