<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
              <div>
                  <b-card-body
                    body-bg-variant="light"
                  >

                  <div class="row">
                    <b-avatar
                    variant="info"
                    src="https://placekitten.com/300/300"
                    style="margin-right:10px"
                    ></b-avatar>
                    <div style="font-weight:bold">
                        {{ username }}
                    </div>
                  </div>

                    <b-card-text>
                      Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </b-card-text>

                    <b-card-img
                      src="https://picsum.photos/600/300/?image=25"
                      alt="Image"
                    >
                    </b-card-img>

                    <div style="margin-top: 5px">
                    </div>

                  </b-card-body>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    name: 'Counter',
    data() {
      return {
        username: "pepito",
      }
    },
    methods: {
      increment() {
        this.count += 1;
      },
      decrement() {
        this.count -= 1;
      }
    }
  }
</script>
