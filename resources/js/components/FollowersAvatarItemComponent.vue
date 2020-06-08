<template>
	<div>
		<b-avatar
		:id="this.user._id"
		:src="pfp"
		:href="url"
		size="4rem"
		rounded>
		</b-avatar>
		<template>
			<b-popover :target="this.user._id" triggers="hover" placement="left">
				<template v-slot:title>{{ user.name }}</template>
			 {{ user.bio }}
			</b-popover>
		</template>
	</div>
</template>
<script>
export default {
	props:{
		user: Object,
		onlyView: Number
	},
	data() {
		return {

		}
	},
	watch: {
  },
	computed: {
		url(){
			return `${window.location.origin}/profile/${this.user.name}`;
		},
		pfp(){
			return this.onlyView!=1 ? this.user.pfp : `../${this.user.pfp}`; 
		}
	},
	methods: {
		forceRerender() {
      // this.forceRender++;
    },
		getFollowers(){

		}
	},
	mounted(){
		// // var getUrl = window.location;
		// // var baseUrl = getUrl .protocol + "/" + getUrl.host + "/";
		//
		// axios.get('/getFollowers').then(response => {
		// 	 console.log(response.data);
		//
		// 	 this.followers = response.data;
		// 	 // forceRerender();

	}
}
</script>
