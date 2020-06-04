<template>
	<b-input-group
	class="mt-2 row justify-content-center"
	style="text-aling:center, width:50%"
	>
    <b-form-input v-model="text"></b-form-input>
    <b-input-group-append>
      <b-button variant="info" @click=debug() :href="href">Search</b-button>
    </b-input-group-append>
	</b-input-group>
</template>

<script>
 export default {
     props:{
			 route:String,
		 } ,
     data() {
     	return {
 			 text: ''
    	}
    },
		computed: {
			href(){
				return this.text ? `${window.location.origin}/search/${this.text}` : `${window.location.origin}/home`;
			}
		},
		methods: {
			debug() {
				console.log(this.text);
			}
		}

 }
 </script>
