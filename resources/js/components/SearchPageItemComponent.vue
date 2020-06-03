<template>
	<b-list-group-item class="d-flex align-items-center">
		<b-avatar :key="forceRender" variant="info" :src="pfpPath" class="mr-3"></b-avatar>
		<span class="mr-auto">{{ user.name }}</span>
		<b-badge>13</b-badge>
	</b-list-group-item>
</template>

<script>
export default {
	name: 'search-item-component',
	props:{
		user: Object,

	},
	data() {
		return {
			forceRender : 0,
			pfpPath: null
		}
	},
	methods: {
		load() {
			this.pfp();
			this.forceRender++;
		},
		pfp(){
			this.pfpPath = `${window.location.origin}/${this.user.pfp}`;
		}
	},
	computed: {

	},
	mounted(){
		this.load();
	}
}
</script>
