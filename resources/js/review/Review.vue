<template>
    <div>
        <div class="form-group">
            <label class="text-muted">
                Select the star rating (1 is worst - 5 is best)
            </label>
            <star-rating v-model="review.rating" class="fa-3x">
                <label for="content"></label>
            </star-rating>
        </div>
        <div class="form-group">
            <label for="content" class="text-muted">Describe your experience with</label>
            <textarea class="form-control" name="content" cols="30" rows="10">

            </textarea>
        </div>
        <button class="btn btn-lg btn-primary btn-block w-100 mt-2">
            Submit
        </button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                review: {
                    rating: 5,
                    content: null
                }
            }
        },
        methods: {
            onRatingChange(rating){
                console.log(rating);
                this.review.rating = rating;
            }
        },
    }
</script>