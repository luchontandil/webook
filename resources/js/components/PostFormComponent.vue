<template>
<div>
	<b-overlay :show="show" rounded="sm">
	<b-card-body body-bg-variant="light">
		<b-form @submit="onSubmit">
			<b-form-group id="input-group-1" label-for="input-1" description="Share something with your friends!">
				<div>
					<b-form-textarea
					id="post-content"
					placeholder="Write something here..."
					rows="3"
					v-model="post.content"
					no-resize
					:state="autenticatePost"
					>
					</b-form-textarea>
					<b-form-textarea
					id="link"
					placeholder="Paste your link here..."
					rows="1"
					v-model="link"
					no-resize
					:style="isHidden"
					>
					</b-form-textarea>
				</div>
				<div v-if="this.pfpPath">
					<b-img :src="this.pfpPath" fluid alt="Responsive image"></b-img>
				</div>
				<b-button
				type="submit"
				variant="outline-primary"
				style="float:right; margin-top:10px; margin-left:10px;"
				>Post</b-button>

				<b-button
					variant="outline-primary"
					@click="uploadPhoto"
					style="float:right; margin-top:10px;margin-left:10px;"
				>
					<!-- <b-overlay :show="show" rounded="sm"> -->
						Upload image
					<!-- </b-overlay> -->
				</b-button>
				<div style="visibility: hidden; height:0px;">
					 <b-form-file
						id="fileUploadPOST"
						v-model="pfpfile"
						class="mt-3"
						@input="uploadimage"
						accept="image/*"
						></b-form-file>
				</div>
				<b-button
					variant="outline-primary"
					@click="addLink"
					style="float:right; margin-top:10px; "
				>
					Youtube link
				</b-button>


			</b-form-group>
		</b-form>
	</b-card-body>

</b-overlay>
	<br>
</div>
</template>

<script>
export default {
	props:{
		user: {},
	},
	data() {
		return {
			post: {
				content: '',
			  autor: this.user,
				likedBy: []
			},
			pfpPath: null,
			pfpfile: null,
			show: false,
			autenticatePost: null,
			link: null,
			showLinkForm: false
		}
	},
	methods: {
		addLink(){
			this.showLinkForm = !this.showLinkForm;
			this.link = '';
		},
		onSubmit(evt) {
			evt.preventDefault();
			console.log(this.post.content)
			console.log(this.pfpPath)
			console.log(this.link)
			if((this.pfpPath) || (this.post.content) || (this.link)){
				console.log('ENTRE EN EL ENVIAR')
				this.show = true;
				const data = new FormData();
				data.append('content', this.post.content);
				data.append('likes',this.post.likedBy);
				data.append('imagePath',this.pfpPath);
				data.append('link', this.link ? `//www.youtube.com/embed/${this.getId(this.link)}`: this.link);

				this.$http.post("/post", data).then((response)=>{
					this.post.content = '';
					this.pfpPath = null;
					this.autenticatePost = null;
					this.link = '';
					setTimeout(()=>{this.show = false},100);
					this.$emit('update', response.data);
				});
			}
			else{
				this.autenticatePost = false;
			}
		},
		getId(url) {
	    const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
	    const match = url.match(regExp);

	    return (match && match[2].length === 11)
	      ? match[2]
	      : null;
		},
		uploadPhoto(){
				document.getElementById("fileUploadPOST").click();
		},
		uploadimage(){
			if(this.pfpfile){
				var fullPath = document.getElementById("fileUploadPOST").value;
				var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
				var filename = fullPath.substring(startIndex);
				if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
						filename = filename.substring(1);
				}
				const data = new FormData();
				data.append('ext', filename.split('.').pop());
				data.append('photo', this.pfpfile);
				this.show = true;
				this.$http.post("/uploadImage", data).then((response)=>{

					this.pfpPath = response.data;
				}).then(()=>{
					this.show = false;
					this.autenticatePost = true;
				});
			}
		},
	},
	computed: {
		isHidden(){
			return `visibility:${this.showLinkForm ? 'visible; height:auto;': 'hidden; height:0px;'};`;
		}
	}
}
</script>
