<template>
	<div>
		<b-avatar
		:id="this.user.name"
		:src="pfp"
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
		},
	},
	methods: {
		forceRerender() {
      // this.forceRender++;
    },
		getFollowers(){

		}
	},
	mounted(){

	}
}
</script>
