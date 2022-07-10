<template>
  <div class="row">
    <fatal-error v-if="error"></fatal-error>
    <div v-else class="row">
      <div :class="[{ 'col-md-4': twoColumn }, { 'd-none': oneColumn }]">
        <div class="card">
          <div class="card-body">
            <div v-if="loading">Loading ...</div>
            <div v-if="booking && !loading">
              <p>
                Stayed at
                <router-link
                  :to="{
                    name: 'bookable',
                    params: { id: booking.bookable.id },
                  }"
                >
                  {{ booking.bookable.title }}
                </router-link>
              </p>
              <p>From {{ booking.from }} to {{ booking.to }}</p>
            </div>
          </div>
        </div>
      </div>
      <div :class="[{ 'col-md-8': twoColumn }, { 'col-md-12': oneColumn }]">
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
              <textarea
                v-model="review.content"
                class="form-control"
                name="content"
                cols="30"
                rows="10"
                :class="[{ 'is-invalid': errorFor('content') }]"
              >
              </textarea>
              <div
                class="invalid-feedback"
                v-for="(error, index) in errorFor('content')"
                :key="'content' + index"
              >
                {{ error }}
              </div>
            </div>
            <button
              @click.prevent="submit"
              :disabled="sending"
              class="btn btn-lg btn-primary btn-block w-100 mt-2"
            >
              Submit
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import { is422, is404 } from "../shared/utils/response";

export default {
  data() {
    return {
      review: {
        id: null,
        rating: 5,
        content: null,
      },
      existingReview: null,
      loading: false,
      booking: null,
      error: false,
      errors: null,
      sending: false
    };
  },
  created() {
    this.review.id = this.$route.params.id;
    this.loading = true;
    axios
      .get(`/api/reviews/${this.$route.params.id}`)
      .then((response) => {
        this.existingReview = response.data.data;
      })
      .catch((err) => {
        if (is404(err)) {
          return axios
            .get(`/api/booking-by-review/${this.$route.params.id}`)
            .then((response) => {
              this.booking = response.data.data;
            })
            .catch((err) => {
              this.error = !is404(err);
            });
        }

        this.error = true;
      })
      .then(() => {
        this.loading = false;
      });
  },
  computed: {
    alreadyReviewed() {
      return this.hasReview || !this.hasBooking;
    },
    hasReview() {
      return this.existingReview != null;
    },
    hasBooking() {
      return this.booking != null;
    },
    oneColumn() {
      return !this.loading && this.alreadyReviewed;
    },
    twoColumn() {
      return this.loading || !this.alreadyReviewed;
    },
  },
  methods: {
    submit() {
      this.errors = null;
      this.sending = true;
      axios
        .post(`/api/reviews`, this.review)
        .then((response) => {
          console.log(response);
        })
        .catch((error) => {
          if (is422(error)) {
            const errors = error.response.data.errors;

            if (errors["content"] && _.size(errors) == 1) {
              this.errors = errors;
              return;
            } else {
              this.error = true;
            }

            return;
          } else {
            this.error = true;
          }
        })
        .then(() => {
          this.sending = false;
        });
    },
    errorFor(field){
      return this.errors != null && this.errors[field] ? this.errors[field] : null;
    }
  },
};
</script>