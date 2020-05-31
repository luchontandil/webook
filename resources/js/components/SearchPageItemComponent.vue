<template>
	<b-list-group-item class="d-flex align-items-center">
		<b-avatar variant="info" src="https://placekitten.com/300/300" class="mr-3"></b-avatar>
		<span class="mr-auto">{{ user.name }}</span>
		<b-badge>13</b-badge>
	</b-list-group-item>
</template>

<script>
export default {
	name: 'search-item-component',
	props:{
		user: Object
	},
	data() {
		return {

		}
	},
	methods: {
		debug() {
			console.log(this.name);
		}
	}
}
</script>
