<template>
	<div>
		<b-avatar
		:id="this.user.name"
		:src="this.user.pfp"
		:href="url"
		size="4rem"
		rounded>
		</b-avatar>
		<template>
			<b-popover :target="this.user.name" triggers="hover" placement="left">
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
	},
	data() {
		return {

		}
	},
	watch: {
  },
	computed: {
		url(){
			return '/user/'+this.user.name;
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
