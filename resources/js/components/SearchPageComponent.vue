<template>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<p>Results:</p>
			<b-list-group style="max-width: 600px;">
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
	name: 'Counter',
	data() {
		return {
			users: [
				{name:"luchito"},
				{name:"tobito"}
			],
		}
	},
	methods: {
		increment() {
			this.count += 1;
		}
	}
}
</script>
