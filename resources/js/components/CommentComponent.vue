<template>
	<b-media tag="li">
      <template v-slot:aside>
				<b-avatar
				 variant="info"
				 :src="pfp"
				 :href="url"
				 style="margin:20px 0px 0px 0px;"
				 size="3rem"
				 ></b-avatar>
      </template>

      <h5 class="mt-0">{{ user.name }}</h5>
			<small class="text-muted">{{ timeAgo == "0 seconds ago" ? "just now" : timeAgo }}</small>
      <p class="mb-0" style="word-break: break-all;">
				{{ commentData.content }}
      </p>
    </b-media>
</template>

<script>
export default {
	props:{
		commentData: {}
	},
	data() {
		return {
			coment: {
				content: '',
				likedBy: []
			},
			show: false,
			updatear: false
		}
	},
	computed:{
		user(){
			return this.commentData.user;
		},
		url(){
			return `${window.location.origin}/profile/${this.user.name}`;
		},
		pfp(){
			return this.updatear ? (this.onlyView!=1 ? '../'+this.user.pfp : '../../'+this.user.pfp) :(this.onlyView!=1 ? '../'+this.user.pfp : '../../'+this.user.pfp);
		},
		timeAgo(){
			var now = +new Date();
			var date = new Date(this.commentData.created_at);
			var offset = date.getTimezoneOffset() * 60 * 1000;

			var result = parseInt(((now - (date-offset))/1000));

			return result<3600 ? ((result)>60 ? `${parseInt((result/60))} minutes ago`: `${result} seconds ago`) :
			 (parseInt((result/60)/60)>24 ? parseInt((result/60)/60)>48 ? `${parseInt(((result/60)/60)/24)} days ago`:`${parseInt(((result/60)/60)/24)} day ago`
			 : parseInt((result/60)/60)>1 ? `${parseInt((result/60)/60)} hours ago`:`${parseInt((result/60)/60)} hour ago`);
		},
	},
	methods: {

	},
	mounted(){
		// this.$root.$on('actualizarDatosdelquecomenta', data => {
		//  // this.reload = !this.reload;
		//  this.user = data;
		//  this.updatear = !this.updatear;
		//  // this.$root.$emit('actualizarlascosasdelPOST', data);
		// });
	}
}
</script>
