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

		 <h5 class="mt-0">{{ data.user.name }}</h5>
		 <small class="text-muted">{{ timeAgo == "0 seconds ago" ? "just now" : timeAgo }}</small>
		 <p>
				{{ data.content }}
				<b-card-img
					v-if="data.image"
					:src="data.image"
					alt="Image"
				>
				</b-card-img>
		 </p>
	</b-media>
	<coment-form :user="datos" :postData="data" ></coment-form>
	</b-card-body>

		<div style="margin-top: 5px">
		</div>
	</div>
</template>

<script>
  export default {
    props:{
  		data: {},
			datos: {}
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
    },
		computed: {
			url(){
				return `${window.location.origin}/profile/${this.data.user.name}`;
			},
			pfp(){
  			return this.data.onlyView!=1 ? '../'+this.data.user.pfp : '../../'+this.data.user.pfp;
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
		}
  }
</script>
