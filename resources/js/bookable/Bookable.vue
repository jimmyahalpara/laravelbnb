<template>
    <div>
        <div v-if="loading">
            loading ...
        </div>
        <div v-else class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2>{{ bookable.title }}</h2>
                        <hr>
                        <article>
                            {{ bookable.description }}
                        </article>
                    </div>
                </div>
                <review-list :bookable-id="Number(this.$route.params.id)"></review-list>
            </div>
            <div class="col-md-4">
                <availablility :bookable-id="Number(this.$route.params.id)"></availablility>
            </div>
        </div>
    </div>
</template>

<script>
import Availablility from './Availablility';
import ReviewList from './ReviewList';
export default {
    components: {
        Availablility,
        ReviewList
    },
    data() {
        return {
            bookable: null,
            loading: false
        }
    },
    created() {
        this.loading = true;
        console.log(this.$route.params.id);

        axios.get(`/api/bookables/${this.$route.params.id}`)
        .then(response => {
            this.bookable = response.data.data;
            this.loading = false;
        });
    },
}
</script>