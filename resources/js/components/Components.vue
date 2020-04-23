<template>
  <div class="card mt-5 p-5">
    <div class="media" v-for="comment in comments.data" :key="comment.id">
      <avatar :username="comment.user.name" class="mr-3" :size="30"></avatar>

      <div class="media-body">
        <h6 class="mt-0">
          {{ comment.user.name }}
        </h6>
        <small>
          {{ comment.body }}
        </small>
        <div class="form-inline my-4 w-full">
          <input type="text" class="form-control form-control-sm w-80" />
          <button class="btn btn-sm btn-primary">
            <small>Add comment</small>
          </button>
        </div>

        <div class="media mt-3">
          <a class="mr-3" href="#">
            <img
              width="30"
              height="30"
              class="rounded-circle mr-3"
              src="https://picsum.photos/id/42/200/200"
            />
          </a>
          <div class="media-body">
            <h6 class="mt-0">Media heading</h6>
            <small
              >Cras sit amet nibh libero, in gravida nulla. Nulla vel metus
              scelerisque ante sollicitudin. Cras purus odio, vestibulum in
              vulputate at, tempus viverra turpis. Fusce condimentum nunc ac
              nisi vulputate fringilla. Donec lacinia congue felis in
              faucibus.</small
            >

            <div class="form-inline my-4 w-full">
              <input type="text" class="form-control form-control-sm w-80" />
              <button class="btn btn-sm btn-primary">
                <small>Add comment</small>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="text-center">
      <button
        v-if="comments.next_page_url"
        @click="fetchComments"
        class="btn btn-success"
      >
        Load More
      </button>
      <span v-else>No more comments to show.</span>
    </div>
  </div>
</template>

<script>
export default {
  components: {
    Avatar,
  },
  props: ["video"],
  data() {
    return {
      comments: {
        data: [],
      },
    }
  },
  methods: {
    fetchComments() {
      const url =
        this.comments.next_page_url ??  // for pagination
        `/videos/${this.video.id}/comments` // for first time loading

      axios.get(url).then(({ data }) => {
        this.comments = {
          ...data,
          data: [...this.comments.data, ...data.data],
        }
      })
    },
  },
  mounted() {
    this.fetchComments()
  },
}
</script>
