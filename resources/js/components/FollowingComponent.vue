<template>
	<div >
		<b-card-body
		class="row"
			body-bg-variant="light"
			:title="followersTitle"
		>
		<div
 	 	class="col-4 col-sm-4"
 		>
	</div>
	 <div
	 	class="col-4 col-sm-4"
		v-for="follower in lastSixFollowers"
		style="font-size: 1.2rem; padding:10px 0px 0px 0px;"
		>
		 <followingItem :user="follower"></followingItem>
	 </div>
	 </b-card-body>
 </div>
</template>
<script>
export default {
	props:{
		user: Object,
	},
	name: 'user',
	data() {
		return {
			forceRender: 0,
			followers: [],
		}
	},
	watch: {
    followers: function () {
      this.getFollowers();
    }
  },
	computed: {
		username(){
			return this.name
		},
		pfp(){
			return '../'+this.user.pfp;
		},
		lastSixFollowers(){
			return this.followers.reverse().slice(0, 6).filter(item => item!= null);
		},
		followersTitle(){
			return `Following (${this.followers.length})`;
		}
	},
	methods: {
		forceRerender() {
      this.forceRender++;
    },
		getFollowers(){

		}
	},
	mounted(){
		// var getUrl = window.location;
		// var baseUrl = getUrl .protocol + "/" + getUrl.host + "/";

		axios.get('/getFollowing').then(response => {
			 console.log(response.data);

			 this.followers = response.data;
			 // forceRerender();
		})
	}
}
</script>
