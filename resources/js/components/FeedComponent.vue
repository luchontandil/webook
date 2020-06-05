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
                    size="4rem"
                    ></b-avatar>
                    <div style="font-weight:bold">
                        {{ username }} <br>
                        <small class="text-muted"> 15 minutes ago</small>

                    </div>
                  </div>

                    <b-card-text>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas suscipit velit voluptatum autem eaque eum itaque voluptates excepturi corporis sunt ad minus nam vel modi, numquam nesciunt. Sunt, ipsa ipsam?
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
