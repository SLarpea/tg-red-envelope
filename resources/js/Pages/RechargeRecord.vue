<template>
    <Head title="Recharge Record" />
    <AppLayout>

        <div class="pagetitle">
            <h1><i class="bi bi-wallet2"></i> Recharge Record</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Mine Management</li>
                    <li class="breadcrumb-item">Recharge Record</li>
                    <li class="breadcrumb-item active">List of Recharge</li>
                </ol>
            </nav>
        </div>

        <section class="section user-management">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h5 class="card-title"><i class="bi bi-list-ol"></i> List of Recharge</h5>
                                        </div>
                                        <div class="col-lg-6">
                                            &nbsp;
                                        </div>
                                    </div>

                                    <SearchLayout :data="{ routeLink: 'tg-users.index', filters: filters }" />

                                    <table class="table table-sm table-striped table-hover">
                                        <colgroup>

                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col">User ID</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col" class="text-center">Type</th>
                                                <th scope="col">Nickname</th>
                                                <th scope="col">Group ID</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in recharge.data" :key="item.id"
                                                @dblclick.prevent="selectAction(item, 'show', null)">
                                                <td class="text-center">{{ recharge.from + index }}</td>
                                                <td>{{ item.tg_id }}</td>
                                                <td>{{ item.username }}</td>
                                                <td>{{ item.amount }}</td>
                                                <td class="text-center td-type">
                                                    {{ getTextType(item.type) }}
                                                </td>
                                                <td>{{ item.first_name }}</td>
                                                <td>{{ item.group_id }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <PaginationLayout
                                        :data="{ links: recharge.links, from: recharge.from, to: recharge.to, total: recharge.total }" />

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </AppLayout>
</template>

<script>
import { Head } from '@inertiajs/vue3';
import AppLayout from '../Layouts/AppLayout.vue';
import SearchLayout from "../Layouts/SearchLayout.vue";
import PaginationLayout from "../Layouts/PaginationLayout.vue";

export default {
    props: {
        recharge: Object,
        filters: Object,
        response: null,
    },
    components: {
        Head, AppLayout, SearchLayout, PaginationLayout,
    },
    methods: {
        getTextType(type) {
            switch (type) {
                case 1:
                    return 'Background recharge';
                case 2:
                    return 'Automatic recharge';
                default:
                    return 'Automatic recharge';
            }
        }
    }
}

</script>
<style scoped>
.td-type button {
    padding: 0px 5px !important;
    font-size: 12px;
    border-radius: 0.25rem;
}
</style>
