<template>

<div class="row">
    <div class="col-lg-4">
        <div class="input-group input-group-sm mb-2">
            <input type="text" class="form-control" placeholder="Search" v-model="data.filters.term" @keyup.enter="searchItem">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2" v-tippy="'Search'" @click.prevent="searchItem">&nbsp;<i class="bi bi-search"></i>&nbsp;</button>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="show-items-container"> Show
            <select class="show-items" v-model="show" @change="searchItem">
                <option value="15">15</option>
                <option value="30">30</option>
                <option value="45">45</option>
                <option value="60">60</option>
                <option value="75">75</option>
                <option value="90">90</option>
                <option value="100">All</option>
            </select> Entries </div>
    </div>
</div>

</template>

<script>
import { defineComponent } from "vue";
import _ from 'lodash';

export default defineComponent({
    data() {
        return {
            show: (this.data.filters.show == null) ? 15 : this.data.filters.show,
        }
    },
    props: {
        data: Object,
    },
    methods: {
        searchItem: _.throttle(function () {
            this.$inertia.replace(route(this.data.routeLink, { term: this.data.filters.term, show: this.show }));
        }, 200),
    },
});

</script>
