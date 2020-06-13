<template>
	<div>
	<b-card-body
		body-bg-variant="light"
	>

	<b-media>
		 <template v-slot:aside>
			 <b-avatar
 			variant="info"
 			:src="pfp"
			:href="url"
 			style="margin-right:10px"
 			size="4rem"
 			></b-avatar>
		 </template>
		 <div v-if="data.user._id == datos._id" class="h2 mb-0">
		 	<b-link style="float:right;" @click="deletePost">
		  	<b-icon style="color:black;" icon="x-square" font-scale="0.8"></b-icon>
			</b-link>
		 </div>
		 <h5 class="mt-0">{{ data.user.name }}</h5>
		 <small class="text-muted">{{ timeAgo == "0 seconds ago" ? "just now" : timeAgo }}</small>
		 <p>
			 <div style="word-break: break-all;">
				{{ data.content }}
				</div>
		 </p>
	</b-media>
		 <div
		 v-if="data.imagePath"
		 :src="data.imagePath"
		 alt="Image"
		 style="margin-bottom:10px;"
		 >
			 <b-img :src="imagePath" fluid alt="Responsive image"></b-img>
		 </div>
		 <ul class="list-unstyled"
		 	:v-bind="comments"
			v-for="(comment,i) in comments"
			:key="i"
		 >
		 <b-list-group-item>
			 <comment :loggedUser="loggedUser" :commentData="comment"></comment>
		 </b-list-group-item>
	 	</ul>


	<coment-form :user="datos" :postData="data" ></coment-form>
	</b-card-body>

		<div style="margin-top: 5px">
		</div>
	</div>
</template>

<script>
  export default {
    props:{
			loggedUser: {},
  		data: {},
			datos: {},
  	},
    name: 'Counter',
    data() {
      return {

      }
    },
    methods: {
      updatePost() {
				console.log('Estoy en el post');
      },
			deletePost(){
				const data = new FormData();
				data.append('post_id', this.data._id);

				this.$http.post("/deletePost", data).then((response)=>{
						if(response.data == 1){
							this.$root.$emit('deletePost',this.data._id);
						}
				});
			},
    },
		computed: {
			comments(){
				return this.data.comments;
			},
			url(){
				return `${window.location.origin}/profile/${this.data.user.name}`;
			},
			pfp(){
  			return this.data.onlyView!=1 ? '../'+this.data.user.pfp : '../../'+this.data.user.pfp;
  		},
			imagePath(){
  			return this.data.onlyView!=1 ? '../'+this.data.imagePath : '../../'+this.data.imagePath;
  		},
			timeAgo(){
				var now = +new Date();
				var date = new Date(this.data.created_at);
				var offset = date.getTimezoneOffset() * 60 * 1000;

				var result = parseInt(((now - (date-offset))/1000));

				return result<3600 ? ((result)>60 ? `${parseInt((result/60))} minutes ago`: `${result} seconds ago`) :
				 (parseInt((result/60)/60)>24 ? parseInt((result/60)/60)>48 ? `${parseInt(((result/60)/60)/24)} days ago`:`${parseInt(((result/60)/60)/24)} day ago`
				 : parseInt((result/60)/60)>1 ? `${parseInt((result/60)/60)} hours ago`:`${parseInt((result/60)/60)} hour ago`);
			},
		},
		mounted(){
			this.$root.$on('actualizarDatosdelquecomenta', data => {
					 // this.reload = !this.reload;
					 console.log('PFP en el POST '+data.pfp);
					 this.datos = data;
					 // this.$root.$emit('actualizarlascosasdelPOST', data);
			});
			this.$root.$on('appendComment', data => {
				if(data[0].post_id == this.data._id ){
					// console.log(data);
					this.data.comments.push(data[0]);
				}
			})
			this.$root.$on('deleteComment', data => {
				// this.data.comments.
				this.data.comments = this.data.comments.filter(item => item._id !== data)
        // this.reload = !this.reload;
			})
		}
  }
</script>
