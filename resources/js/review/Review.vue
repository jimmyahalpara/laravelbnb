<template>
  <div>
    <div v-if="loading">Loading ...</div>
    <div v-else>
      <div v-if="alreadyReviewed">
        <h3>You've already left a review for this booking!</h3>
      </div>
      <div v-else>
        <div class="form-group">
          <label class="text-muted">
            Select the star rating (1 is worst - 5 is best)
          </label>
          <star-rating v-model="review.rating" class="fa-3x">
            <label for="content"></label>
          </star-rating>
        </div>
        <div class="form-group">
          <label for="content" class="text-muted">
            Describe your experience with
          </label>
          <textarea class="form-control" name="content" cols="30" rows="10">
          </textarea>
        </div>
        <button class="btn btn-lg btn-primary btn-block w-100 mt-2">
          Submit
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      review: {
        rating: 5,
        content: null,
      },
      existingReview: null,
      loading: false,
    };
  },
  created() {
    this.loading = true;
    axios
      .get(`/api/reviews/${this.$route.params.id}`)
      .then((response) => {
        this.existingReview = response.data.data;
      })
      .catch((err) => {})
      .then(() => {
        this.loading = false;
      });
  },
  computed: {
    alreadyReviewed() {
      return this.existingReview != null;
    },
  },
};
</script>