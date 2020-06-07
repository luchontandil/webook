<template>
<div>
	<b-overlay :show="show" rounded="sm">
	<b-card-body body-bg-variant="light">
		<b-form @submit="onSubmit" @reset="onReset">
			<b-form-group id="input-group-1" label-for="input-1" description="Share something with your friends!">
				<div>
					<b-form-textarea
					id="post-content"
					placeholder="Write something here..."
					rows="3"
					v-model="post.content"
					no-resize
					required>
					</b-form-textarea>
				</div>
				<b-button
				type="submit"
				variant="outline-primary"
				style="float:right; margin-top:10px;"
				>Post</b-button>
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
			show: false
		}
	},
	methods: {
		onSubmit(evt) {
			this.show = true;
			evt.preventDefault()
			// alert(JSON.stringify(this.post))
				const data = new FormData();
				data.append('content', this.post.content);
				data.append('likes',this.post.likedBy);

				this.$http.post("/post", data).then((response)=>{
					this.post.content = '';
					setTimeout(()=>{this.show = false},100);
				});
		},
		onReset(evt) {
			evt.preventDefault()
			// Reset our form values
			this.form.email = ''
			this.form.name = ''
			this.form.food = null
			this.form.checked = []
			// Trick to reset/clear native browser form validation state
			this.show = false
			this.$nextTick(() => {
				this.show = true
			})
		}
	}
}
</script>
