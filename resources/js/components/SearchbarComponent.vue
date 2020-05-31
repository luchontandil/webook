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
			 text:String
		 } ,
     data() {
     	return {
    	}
    },
		computed: {
			href(){
				return `search/${this.text}`;
			}
		},
		methods: {
			debug() {
				console.log(this.text);
			}
		}

 }
 </script>
