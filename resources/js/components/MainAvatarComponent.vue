<template>
	<b-card
		:user="user"
		:key="forceRender"
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
		data: Array,
	},
	name: 'user',
	data() {
		return {
			forceRender: 0,
		}
	},
	computed: {
		user(){
			return Object.assign({},this.data)[0];
		},
		onlyView(){
			return Object.assign({},this.data)[1];
		},
		username(){
			return this.name
		},
		pfp(){
			return this.onlyView!=1 ? '../'+this.user.pfp : '../../'+this.user.pfp;
		}
	},
	methods: {
		updateparent(data) {
			this.data[0] = data;
			this.forceRerender();
		},
		forceRerender() {
      this.forceRender++;
    }
	},
	mounted(){
		console.log(this.data)
	}
}
</script>
