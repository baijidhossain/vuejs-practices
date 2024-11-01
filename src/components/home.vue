<template>

<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input v-model="Admin.email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input v-model="Admin.password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>

  <button type="button" class="btn btn-primary"  @click="onLogin()" >Submit</button>
</form>



</template>


<script>

import axios from 'axios';

export default {
  name: 'home',
  data() {
    return {
      Admin: {
        email: "admin@admin.com",
        password: "adminadmin"
      }
    };
  },
  methods: {
    onLogin() {
      // Create a new FormData object
      const data = new FormData();
      data.append('email', this.Admin.email);
      data.append('password', this.Admin.password);

 axios.post('http://localhost/vue-project/src/api/api.php', data)
  .then(response => {
    // Handle the response
    console.log(response.data);
  })
  .catch(error => {
    // Handle the error
    console.error(error);
  });
    }
  }
}




</script>


