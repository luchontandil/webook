<template>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<p>Results:</p>
			<b-list-group style="max-width: 600px;">
				<div v-if="users[0] == undefined">
					No users found with that name :(
				</div>
				<div v-for="item in users">
				<search-item-component
					:user="item"
				>
				</search-item-component>
				</div>
			</b-list-group>

		</div>
	</div>
</div>
</template>

<script>
export default {
	props:{
		users: String,
		searchText: String
	},
	name: 'Counter',
	data() {
		return {

		}
	},
	methods: {
		search() {
			this.users = 1;
			//lamado a la api
		}
	}
}
</script>
