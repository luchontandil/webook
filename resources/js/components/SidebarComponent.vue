<template>
  <div>
    <b-button v-b-toggle.sidebar-backdrop>
      Preferences
      <b-icon icon="wrench"></b-icon>
    </b-button>

    <b-sidebar
      id="sidebar-backdrop"
      title="User Preferences"
      :backdrop-variant="variant"
      backdrop
      shadow
      @hidden="update"
      @shown="reset"
    >
      <div class="px-3 py-2">
        <!-- <b-form-group label="Backdrop variant" label-for="backdrop-variant">
          <b-form-select id="backdrop-variant" v-model="variant" :options="variants"></b-form-select>
        </b-form-group> -->
         <h5 class="mt-0">Profile Picture</h5>

          <b-button
            :variant="this.variantUploadImage"
            @click="changepfp"
          >
            <b-overlay :show="show" rounded="sm">
              Upload
            </b-overlay>
          </b-button>
        <div style="visibility: hidden; height:0px;">
           <b-form-file
            id="fileUpload"
            v-model="pfpfile"
            class="mt-3"
            @input="uploadpfp"
            accept="image/*"
            ></b-form-file>
        </div>
        <b-overlay :show="overlayBio" rounded="sm">
          <div class="mt-3">
            <h5 class="mt-0">Edit your biography</h5>
            <b-form-textarea
             id="textarea"
             v-model="userdata.bio"
             placeholder="Enter something..."
             rows="3"
             no-resize
             style="margin-bottom:10px;margin-right:10px;width:90%;"
           ></b-form-textarea>
           <b-button
             :variant="this.variantChangeBio"
             @click="saveBio"
           >Save Biography
           </b-button>
          </div>
        </b-overlay>
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
        show:false,
        overlayBio:false,
        pfpPath: null,
        pfpfile: null,
        variant: 'dark',
        variantUploadImage: 'info',
        variantChangeBio: 'info',
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
      saveBio(){
        this.overlayBio = true;
        let text = document.querySelector("#textarea").value;
        this.userdata.bio = text;

        const data = new FormData();
        data.append('bio', text);
        data.append('userid', this.userdata._id);

        this.$http.post("/updateBio", data).then((response)=>{
            this.userdata.bio = response.data;
            this.variantChangeBio = 'success';
            this.overlayBio = false;
        });
      },
			changepfp() {
  			document.getElementById("fileUpload").click();
			},
      update(){
        this.$root.$emit('update', this.userdata);
      },
      reset(){
        this.variantUploadImage = 'info';
        this.variantChangeBio = 'info';
      },
      uploadpfp(){
        if(this.pfpfile){
          var fullPath = document.getElementById("fileUpload").value;
          var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
          var filename = fullPath.substring(startIndex);
          if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
              filename = filename.substring(1);
          }
          const data = new FormData();
          data.append('ext', filename.split('.').pop());
          data.append('photo', this.pfpfile);
          data.append('userid', this.userdata._id);
          this.show = true;
          this.$http.post("/updatePFP", data).then((response)=>{

              this.pfpPath = response.data;
              this.userdata.pfp = response.data;
          }).then(()=>{
              this.show = false;
              this.variantUploadImage = 'success';
          });

        }
      },

		},
    created(){
      this.variantUploadImage = 'info';
    }
  }
</script>
