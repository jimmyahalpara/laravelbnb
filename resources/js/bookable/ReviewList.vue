<template>
    <div style="padding: 1.25rem" class="d-none d-md-block">
        <h6 class="text-uppercase text-secondary font-weight-bolder">Review List</h6>

        <div v-if="loading">
            loading...
        </div>
        <div v-else>
            <div class="border-bottom m-2 mx-4" v-for="(review, index) in reviews" :key="index">
            <div class="row pt-4">
                <div class="col-md-6">Piotr Jura</div>
                <div class="col-md-6 d-flex justify-content-end">
                    {{ review.rating }}
                    <star-rating></star-rating>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">{{ review.created_at | fromNow }}</div>
            </div>
            <div class="row pb-4 pt-2">
                <div class="col-md-12">
                    {{ review.content  }}
                </div>
            </div>
        </div>
        </div>
        
    </div>
</template>


<script>
// import axios from 'axios'
// import moment from 'moment';

export default {
    props: {
        bookableId: Number
    },
    data() {
        return {
            loading: false,
            reviews: null
        }
    },
    created() {
        this.loading = true,
        axios.get(`/api/bookables/${this.bookableId}/reviews`).then(response => {
            this.reviews = response.data.data;
        }).then(() => {
            this.loading = false;
        });
    },
    
}
</script>