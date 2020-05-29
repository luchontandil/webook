<template>
	<b-input-group
	class="mt-2 row justify-content-center"
	style="text-aling:center, width:50%"
	>
    <b-form-input></b-form-input>
    <b-input-group-append>
      <b-button variant="info" @click=debug() :href="this.route" >Search</b-button>
    </b-input-group-append>
	</b-input-group>
</template>

<script>
 export default {
     props: ['route'],
     data() {
     	return {
        message: ''
    	}
    },
		methods: {
			debug() {
				console.log(this.route);
			}
		}

 }
 </script>
