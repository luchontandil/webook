<template>
	<b-card
		:title="username"
		style="margin-bottom:15px"
		img-src="https://placekitten.com/g/300/450"
		img-alt="Image"
		img-top>
    <b-card-text>
      This is a wider card with supporting text below as a natural lead-in to additional content.
      This content is a little bit longer.
    </b-card-text>
    <template v-slot:footer>
			<sidebar-component></sidebar-component>
      <small class="text-muted">Last updated 3 mins ago</small>
    </template>
  </b-card>
</template>

<script>
export default {
	props:{
		user: String,
	},
	name: 'user',
	data() {
		return {

		}
	},
	computed: {
		username(){
			return JSON.parse(this.user).name
		}
	},
	methods: {
		placeholder() {

		}
	}
}
</script>
