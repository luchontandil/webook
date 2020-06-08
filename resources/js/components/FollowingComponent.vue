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
		 <followingItem :user="follower" :onlyView="onlyView"></followingItem>
	 </div>
	 </b-card-body>
 </div>
</template>
<script>
export default {
	props:{
		data: {},
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
		lastSixFollowers(){
			return this.followers.reverse().slice(0, 6).filter(item => item!= null);
		},
		followersTitle(){
			return `Following (${this.followers.length})`;
		},
		onlyView(){
			return Object.assign({},this.data)[1];
		},
		user(){
			return Object.assign({},this.data)[0];
		},
	},
	methods: {
		forceRerender() {
      this.forceRender++;
    },
		getFollowers(){

		}
	},
	mounted(){
		if(this.onlyView == 1){
		axios.get(`/getFollowing/${this.user.name}`).then(response => {
			 console.log(response.data);
			 this.followers = response.data;
		})
		}
		else{
			axios.get(`/getFollowing`).then(response => {
				 console.log(response.data);
				 this.followers = response.data;
			})
		}
	}
}
</script>
