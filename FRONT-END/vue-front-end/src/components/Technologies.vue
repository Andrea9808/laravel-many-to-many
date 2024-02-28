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
                },
                // save current page
                currentPage: 1,
                pageLinks: [],

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
                    console.log(data);
                    // if(data.status == 'success'){
                        this.currentPage = data.technologies.current_page;
                        this.pageLinks = data.technologies.links;
                        this.technologies = data.technologies.data;
                    // }

                })
                .catch(err=>{
                    console.log(err);
                })
            },
            changePage(url){
                axios.get(url)
                .then(res=>{
                    const data = res.data;
                    console.log(data);
                   
                    this.currentPage = data.technologies.current_page;
                    this.pageLinks = data.technologies.links;
                    this.technologies = data.technologies.data;
                   

                })
                .catch(err=>{
                    console.log(err);
                })
            }
        },


        mounted(){
            this.getTechnologies();
            this.changePage();
        }
    }

</script>

<template>
    <div>
      <h1 class="main-heading">Technologies:</h1>
      <form v-if="visibilityForm" @submit.prevent="submitNewTechnology" class="form-container">
        <h2>Form</h2>
        <label for="name">Name:</label><br>
        <input type="text" name="name" id="name" v-model="newTechnology.name">
        <br>
        <label for="description">Description:</label><br>
        <input type="text" name="description" id="description" v-model="newTechnology.description">
        <br>
        <input type="submit" value="Create" class="submit-button">
      </form>
      <div v-else class="technology-list-container">
        <button @click="toggleCreateNewTechnology" class="toggle-button">Insert new Technology</button>
        <ul class="technology-list">
          <li v-for="technology in technologies" :key="technology.id" class="technology-item">
            <hr>
            <h3>Name Technology: {{ technology.name }}</h3>
            <p>Description Technology: {{ technology.description }}</p>
            <hr>
          </li>
        </ul>
      </div>
  
      <div class="pagination-container">
        <ul class="pagination-list">
          <li v-for="link in pageLinks" :key="link" class="pagination-item">
            <button
              @click="changePage(link.url)"
              v-html="link.label"
              :class="link.active ? 'text-light' : ''"
              class="pagination-button"
            />
          </li>
        </ul>
      </div>
    </div>
  </template>

<style>
  .main-heading {
    color: #fafafa;
  }

  .form-container {
    margin: 20px;
    padding: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }

  .submit-button {
    background-color: #007bff;
    color: #fff;
    padding: 8px 12px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
  }


  .toggle-button {
    background-color: rgb(147, 50, 147);
    color: #fff;
    padding: 8px 12px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
  }

  .technology-list {
    list-style: none;
  }

  .technology-item {
    margin-bottom: 20px;
  }

  .pagination-container {
    margin-top: 20px;
    display: flex;
    justify-content: center;
  }

  .pagination-list {
    list-style: none;
    padding: 0;
    display: flex;
  }

  .pagination-item {
    margin-right: 5px;
  }

  .pagination-button {
    background-color: white;
    color: black;
    padding: 8px 12px;
    border-radius: 3px;
    cursor: pointer;
  }

  .text-light {
    color: #fff;
  }
</style>