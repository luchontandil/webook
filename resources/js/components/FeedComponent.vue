<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
              <div>

                <post-form
                v-if="onlyView!=1"
                :user="user"
                	@update="updateparent"
                ></post-form>

                <div
                v-if="posts"
                :v-bind="posts"
             		 v-for="postData in posts"
             		>
                 <post :data="postData"></post>
                 <br>
             	 </div>

              <div
               v-if="!posts[0]"
               >
               <p class="text-muted text-center">This user doesn't have any posts yet :(</p>
              </div>


                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    props:{
  		data: {},
  	},
    name: 'Counter',
    data() {
      return {
        posts: [],
      }
    },
    methods: {
      updateparent(data) {
  			this.posts.unshift(data[0]);
  		},
    },
    computed: {
      postsFeed(){
        return this.posts.reverse();
      },
      user(){
  			return Object.assign({},this.data)[0];
  		},
  		onlyView(){
  			return Object.assign({},this.data)[1];
  		},
  		pfp(){
  			return this.onlyView!=1 ? '../'+this.user.pfp : '../../'+this.user.pfp;
  		}
    },
    mounted(){
      axios.get('/getPosts/'+this.user.name).then(response => {
         this.posts = response.data;
      })
    }
  }
</script>
