<template>
	<div >
	  <b-modal centered hide-footer id="modal-1" :title="followersTitle" @hidden="updateFollowing">
	    <!-- <p class="my-4">Hello from modal!</p> -->
				<b-list-group class="my-2"
					v-for="(follower,i) in followers"
					:key="i"
				>
					<search-item-component
						:user="follower"
					>
					</search-item-component>
			</b-list-group>
	  </b-modal>
		<b-card-body
		class="row"
			body-bg-variant="light"
			:title="followersTitle"
		>
		<div class="col-4 col-sm-4">
			<b-link style="float:right;">
				<b-button v-b-modal.modal-1 variant="outline-info"><b-icon style="color:black;" icon="people-fill" font-scale="1"></b-icon></b-button>
			</b-link>
		</div>
	 <div
	 	class="col-4 col-sm-4"
		v-for="(follower,i) in lastSixFollowers"
		:key="i"
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

		},
		updateFollowing(){
			this.$root.$emit('updateList');
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
