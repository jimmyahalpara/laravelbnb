<template>
    <div style="padding: 1.25rem" class="d-none d-md-block">
        <h6 class="text-uppercase text-secondary font-weight-bolder">Review List</h6>

        <div class="border-bottom m-2 mx-4" v-for="number in 3" :key="number">
            <div class="row pt-4">
                <div class="col-md-6">Piotr Jura</div>
                <div class="col-md-6 d-flex justify-content-end">STAR RATING</div>
            </div>
            <div class="row">
                <div class="col-md-12">Added 5 minutes ago</div>
            </div>
            <div class="row pb-4 pt-2">
                <div class="col-md-12">
                    Content of the review
                </div>
            </div>
        </div>
    </div>
</template>