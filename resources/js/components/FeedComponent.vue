<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
              <div>

                <post-form :user="user"></post-form>

                <div
             		v-for="postData in postsFeed"
             		>
                 <post :data="postData"></post>
                 <br>
             	 </div>


                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    props:{
  		user: {},
  	},
    name: 'Counter',
    data() {
      return {
        posts: [],
      }
    },
    methods: {
      increment() {
        this.count += 1;
      },
      decrement() {
        this.count -= 1;
      }
    },
    computed: {
      postsFeed(){
        return this.posts.reverse();
      }
    },
    mounted(){
      axios.get('/getPosts').then(response => {
         this.posts = response.data;
      })
    }
  }
</script>
