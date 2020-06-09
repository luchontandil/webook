<template>
	<b-card
		:user="user"
		:title="user.name"
		 style="margin-bottom:15px"
		:img-src="pfp"
		img-alt="Image"
		img-top
	>
    <b-card-text v-if="!user.bio">
      This is where your bio goes.
			Tell others about you :)
    </b-card-text>
		<b-card-text v-else>
      {{ user.bio }}
    </b-card-text>
    <template v-slot:footer>
			<sidebar-component
				v-if="onlyView!=1"
				:userdata=user
			>
			</sidebar-component>
      <small class="text-muted"> Welcome to WeBook</small>
    </template>
  </b-card>
</template>

<script>
export default {
	props:{
		userdata: {},
	},
	data() {
		return {
			forceRender: true,
		}
	},
	computed: {
		user(){
			return this.forceRender ? Object.assign({},this.userdata)[0] : Object.assign({},this.userdata)[0];
		},
		onlyView(){
			return Object.assign({},this.userdata)[1];
		},
		username(){
			return this.name
		},
		pfp(){
			return this.onlyView!=1 ? '../'+this.user.pfp : '../../'+this.user.pfp;
		}
	},
	methods: {
		forceRerender() {
      this.forceRender= !this.forceRender;
    }
	},
	mounted(){
		this.$root.$on('update',data => {
			this.userdata[0] =  data;
			// this.userdata.splice(this.forceRender+2)
			this.forceRerender();
			this.$root.$emit('sendData', data);
    });
	}
}
</script>
