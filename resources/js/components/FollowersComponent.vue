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
		 <follower :user="follower" :onlyView="onlyView"></follower>
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
		username(){
			return this.name
		},
		pfp(){
			return this.onlyView!=1 ? '../'+this.user.pfp : '../../'+this.user.pfp;
		},
		lastSixFollowers(){
			return this.followers.reverse().slice(0, 6).filter(item => item!= null);
		},
		followersTitle(){
			return `Followers (${this.followers.length})`;
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
		axios.get(`/getFollowers/${this.user.name}`).then(response => {
			 this.followers = response.data;
		})
		}
		else{
			axios.get(`/getFollowers`).then(response => {
				 this.followers = response.data;
			})
		}
	}
}
</script>
