<template>
	<b-list-group-item class="d-flex align-items-center">
		<b-avatar :key="forceRender" variant="info" :src="pfpPath" class="mr-3" size="6rem"></b-avatar>
		<h4 class="mr-auto">{{ user.name }}</h4>

		<span class="mr-auto">{{ user.bio }}</span>
		<b-button :variant="variant" @click="follow()">
			{{ status }}
	 	</b-button>
	</b-list-group-item>
</template>

<script>
export default {
	name: 'search-item-component',
	props:{
		user: Object,
		variants: [
			'transparent',
			'white',
			'light',
			'dark',
			'primary',
			'secondary',
			'success',
			'danger',
			'warning',
			'info',
		]
	},
	data() {
		return {
			forceRender : 0,
			pfpPath: null,
			variant: 'info',
			isFollow: '0',
		}
	},
	methods: {
		load() {
			this.pfp();
			this.forceRender++;
		},
		pfp(){
			this.pfpPath = this.user.pfp != "/images/default.png" ? `${window.location.origin}/${this.user.pfp}` :`${window.location.origin}/images/default.png`;
		},
		follow(){
			const data = new FormData();
			data.append('userid', this.user._id);

			this.$http.post("/follow", data).then((response)=>{
					console.log(response.data);
					this.isFollow = response.data;
					if(this.isFollow){
					 	this.variant = 'info'
					}
					else{
						this.variant = 'danger'
	 			 	}
			});
		}
	},
	computed: {
		status(){
			return this.isFollow ? "follow" : "unfollow";
		}
	},
	mounted(){
		var getUrl = window.location;
		var baseUrl = getUrl .protocol + "//" + getUrl.host + "/";
		axios.get(baseUrl+'/getID').then(response => {
		   if(this.user.followers.includes(String(response.data))){
				 this.isFollow = 0;
				 this.variant = 'danger'
			 }
			 else{
				  this.variant = 'info'
			 }
		})
		this.load();
	}
}
</script>
