<template>
  <div>
    <div v-if="loading">Data is loading ..</div>
    <div v-else>
      <div class="row mb-4" v-for="row in rows" :key="'row' + row">
        <div
          class="col d-flex align-items-streatch"
          v-for="(bookable, column) in bookablesInRow(row)"
          :key="'row' + row + column"
        >
          <bookable-list-item
            :item-title="bookable.title"
            :item-description="bookable.description"
            :price="200"
          >
          </bookable-list-item>
        </div>

        <div class="col" v-for="p in placeholderInRow(row)" :key="'placeholder' + row + p">

        </div>
      </div>
    </div>
  </div>
</template>

<script>
import BookableListItem from "./BookableListItem";
export default {
  components: {
    BookableListItem,
  },
  data() {
    return {
      bookables: null,
      loading: false,
      columns: 3,
    };
  },
  computed: {
    rows() {
      return this.bookables
        ? Math.ceil(this.bookables.length / this.columns)
        : 0;
    },
  },
  methods: {
    bookablesInRow(row) {
      return this.bookables.slice((row - 1) * this.columns, row * this.columns);
    },
    placeholderInRow(row){
      return this.columns - this.bookablesInRow(row).length 
    }
  },
  created() {
    this.loading = true;
    const request = axios.get('/api/bookables').then(response => {
      this.bookables = response.data;
      this.loading = false;
      });
    console.log(request);
  },
};
</script>