<template>
	<b-card
		:user="user"
		:key="forceRender"
		:title="user.name"
		style="margin-bottom:15px"
		:img-src="user.pfp"
		img-alt="Image"
		img-top
	>
    <b-card-text>
      This is where your bio goes.
			Tell others about you :)
    </b-card-text>
    <template v-slot:footer>
			<sidebar-component
				:userdata=user
				@update="updateparent"
			>
			</sidebar-component>
      <small class="text-muted"> Welcome to WeBook</small>
    </template>
  </b-card>
</template>

<script>
export default {
	props:{
		user: Object
	},
	name: 'user',
	data() {
		return {
			forceRender: 0,
		}
	},
	computed: {
		username(){
			return this.name
		},
		pfp(){
			return '../'+this.user.pfp;
		}
	},
	methods: {
		updateparent(data) {
			console.log(data);
			if(data.pfp){
				this.user.pfp = data.pfp;
				this.forceRerender();
			}
		},
		forceRerender() {
      this.forceRender++;
    }
	}
}
</script>
