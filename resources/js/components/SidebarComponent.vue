<template>
  <div>
    <b-button v-b-toggle.sidebar-backdrop>Preferences</b-button>

    <b-sidebar
      id="sidebar-backdrop"
      title="User Preferences"
      :backdrop-variant="variant"
      backdrop
      shadow
      @hidden="update"
    >
      <div class="px-3 py-2">
        <!-- <b-form-group label="Backdrop variant" label-for="backdrop-variant">
          <b-form-select id="backdrop-variant" v-model="variant" :options="variants"></b-form-select>
        </b-form-group> -->
        <b-button
          variant="info"
          @click=changepfp
        >Change your profile pic</b-button>
        <div style=" visibility: hidden">
         <b-form-file
          id="fileUpload"
          v-model="pfpfile"
          class="mt-3"
          @input="uploadpfp"
          accept="image/*"
          ></b-form-file>
        </div>
      </div>
    </b-sidebar>
  </div>
</template>

<script>
  export default {
    props:{
      userdata: Object,
    },
    data() {
      return {
        pfpPath: null,
        pfpfile: null,
        variant: 'dark',
        variants: [
          'transparent',
          'white',
          'light',
          'dark',
          'primary',
          'secondary',
          'success',
          'danger',
          'warning',
          'info',
        ]
      }
    },
    methods: {
			changepfp() {
  			document.getElementById("fileUpload").click();
			},
      update(){
        this.userdata.pfp = this.pfpPath;
        this.$emit('update', this.userdata);
      },
      uploadpfp(){
        if(this.pfpfile){
          var fullPath = document.getElementById("fileUpload").value;
          var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
          var filename = fullPath.substring(startIndex);
          if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
              filename = filename.substring(1);
          }
          // alert(filename);

          const data = new FormData();
          data.append('ext', filename.split('.').pop());
          data.append('photo', this.pfpfile);
          data.append('userid', this.userdata._id);

          this.$http.post("/updatePFP", data).then((response)=>{
              this.pfpPath = response.data;
          }).then(()=>{
              console.log(this.pfpPath);
          });

        }
      },

		}
  }
</script>
