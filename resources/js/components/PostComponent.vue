<template>
	<b-card-body
		body-bg-variant="light"
	>

	<b-media>
		 <template v-slot:aside>
			 <b-avatar
 			variant="info"
 			:src="pfp"
			:href="url"
 			style="margin-right:10px"
 			size="4rem"
 			></b-avatar>
		 </template>

		 <h5 class="mt-0">{{ data.user.name }}</h5>
		 <small class="text-muted">{{ timeAgo == "0 seconds ago" ? "just now" : timeAgo }}</small>
		 <p>
				{{ data.content }}
				<b-card-img
					v-if="data.image"
					:src="data.image"
					alt="Image"
				>
				</b-card-img>
		 </p>
	</b-media>

	<div style="margin-top: 5px">
	</div>
	</b-card-body>

</template>

<script>
  export default {
    props:{
  		data: {},
  	},
    name: 'Counter',
    data() {
      return {

      }
    },
    methods: {
      increment() {
        this.count += 1;
      },
      decrement() {
        this.count -= 1;
      }
    },
		computed: {
			url(){
				return `${window.location.origin}/profile/${this.data.user.name}`;
			},
			pfp(){
  			return this.data.onlyView!=1 ? '../'+this.data.user.pfp : '../../'+this.data.user.pfp;
  		},
			timeAgo(){
				var now = +new Date();
				var date = new Date(this.data.created_at);
				var offset = date.getTimezoneOffset() * 60 * 1000;

				var result = parseInt(((now - (date-offset))/1000));

				return result<3600 ? ((result)>60 ? `${parseInt((result/60))} minutes ago`: `${result} seconds ago`) :
				 (parseInt((result/60)/60)>24 ? parseInt((result/60)/60)>48 ? `${parseInt(((result/60)/60)/24)} days ago`:`${parseInt(((result/60)/60)/24)} day ago`
				 : parseInt((result/60)/60)>1 ? `${parseInt((result/60)/60)} hours ago`:`${parseInt((result/60)/60)} hour ago`);
			}

		}
  }
</script>
