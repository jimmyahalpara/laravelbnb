<template>
  <div>
    <h6 class="text-uppercase text-secondary font-weight-bolder">
      Check Availablity
    </h6>

    <div class="row">
      <div class="form-group col-md-6">
        <label for="from">From</label>
        <input
          type="text"
          name="from"
          class="form-control form-control-sm"
          placeholder="Start Date"
          id="from"
          v-model="from"
          @keyup.enter="check"
        />
      </div>

      <div class="form-group col-md-6">
        <label for="to">To</label>
        <input
          type="text"
          name="to"
          class="form-control form-control-sm"
          placeholder="End Date"
          id="to"
          v-model="to"
          @keyup.enter="check"
        />
      </div>
    </div>
    <button class="btn btn-secondary btn-block w-100 my-2" @click="check" :disabled="loading">Check!</button>
  </div>
</template>

<style scoped>
label {
  font-size: 0.7rem;
  text-transform: uppercase;
  color: grey;
  font-weight: bolder;
}
</style>

<script>
// import axios from 'axios';

export default {
  data() {
    return {
      from: null,
      to: null,
      loading: false,
      status: null,
      errors: null
    }
  },
  methods: {
    check(){
      this.loading = true;
      this.errors = null;
      axios.get(`/api/bookables/${this.$route.params.id}/availability?from=${this.from}&to=${this.to}`)
      .then(response => {
        this.status = response.status
        
      }).catch(error => {
        if (422 == error.response.status){
          this.errors = error.response.data.errors;
        }
        this.status = error.response.status;
      }).then(() => this.loading = false);
    }
  },

  computed: {
    hasErorrs() {
      return 422 == this.status &&  this.error != null;
    },

    hasAvailability(){
      return 200 == this.status;
    },

    noAvailability(){
      return 400 == this.status;
    }
  }
}
</script>