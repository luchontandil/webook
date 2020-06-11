<template>
	<div>

		<b-media>
			<template v-slot:aside style="margin:0px 0px 0px 0px;">
				 <b-avatar
		 			variant="info"
		 			:src="pfp"
					:href="url"
		 			style="margin:20px 0px 0px 0px;"
		 			size="3rem"
	 				></b-avatar>
			</template>
			<b-card-body body-bg-variant="light" body-class="commentFormStyle" body-tag="p">
		 		<b-form @submit="onSubmit">
		 			<b-form-group id="input-group-1" label-for="input-1">
		 				<div>
		 					<b-form-textarea
		 					id="coment-content"
		 					placeholder="Write something here..."
		 					rows="2"
		 					v-model="coment.content"
		 					no-resize
		 					required>
		 					</b-form-textarea>
		 				</div>
		 				<b-button
		 				type="submit"
		 				variant="outline-primary"
		 				style="float:right; margin-top:10px;"
		 				>Comment</b-button>
		 			</b-form-group>
		 		</b-form>
		 	</b-card-body>
		</b-media>
	</div>

</template>

<script>
export default {
	props:{
		user: {},
		postData: {}
	},
	data() {
		return {
			coment: {
				content: '',
			  autor: this.user,
				likedBy: []
			},
			show: false,
			updatear: false
		}
	},
	computed:{
		url(){
			return `${window.location.origin}/profile/${this.user.name}`;
		},
		pfp(){
			return this.updatear ? (this.onlyView!=1 ? '../'+this.user.pfp : '../../'+this.user.pfp) :(this.onlyView!=1 ? '../'+this.user.pfp : '../../'+this.user.pfp);
		},
	},
	methods: {
		onSubmit(evt) {
			evt.preventDefault()
			console.log(this.user);
			console.log(this.coment.content);
			console.log(this.postData._id);

			// const data = new FormData();
			// data.append('content', this.coment.content);
			// data.append('likes',this.coment.likedBy);
			//
			// this.$http.post("/post", data).then((response)=>{
			// 	this.coment.content = '';
			// 	setTimeout(()=>{this.show = false},100);
			// 	this.$emit('update', response.data);
			// });
		},
	},
	mounted(){
		this.$root.$on('actualizarDatosdelquecomenta', data => {
		 // this.reload = !this.reload;
		 console.log('Esta es la que tenia el coment form'+this.user.pfp);
		 this.user = data;
		 this.updatear = !this.updatear;
		 console.log('PFP que le llega al coment form'+this.user.pfp);
		 console.log('estoy dentro del post form xD 2')
		 // this.$root.$emit('actualizarlascosasdelPOST', data);
		});
	}
}
</script>
