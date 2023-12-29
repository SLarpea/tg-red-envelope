<template>
    <Head title="Recharge Record" />
    <AppLayout>

        <div class="pagetitle">
            <h1><i class="bi bi-list-check"></i> Robbing Record</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Mine Management</li>
                    <li class="breadcrumb-item"><a href="/tg-users">User Management</a></li>
                    <li class="breadcrumb-item active">Robbing Record</li>
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
                                            <h5 class="card-title"><i class="bi bi-list-ol"></i> List of Records of <span class="badge bg-custom" v-tippy="user_details.first_name">{{ user_details.username }} ({{ user_details.tg_id }})</span></h5>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex justify-content-end align-items-center action-container">
                                                <a class="btn btn-custom btn-sm" href="/tg-users">
                                                    <i class="bi bi-arrow-left-circle"></i> 后退
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <SearchLayout :data="{ routeLink: 'tg-users.index', filters: filters }" /> -->

                                    <table class="table table-sm table-striped table-hover">
                                        <colgroup>

                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col">Receive User ID</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Red Envelope ID</th>
                                                <th scope="col">Is It Zhonglei</th>
                                                <th scope="col">Package Amount</th>
                                                <th scope="col">Loss Amount</th>
                                                <th scope="col">Creation Time</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in lucky.data" :key="item.id">
                                                <td class="text-center">{{ lucky.from + index }}</td>
                                                <td>{{ item.user_id }}</td>
                                                <td>{{ item.first_name }}</td>
                                                <td>{{ item.lucky_id }}</td>
                                                <td>{{ item.is_thunder }}</td>
                                                <td>{{ item.amount }}</td>
                                                <td>{{ item.lose_money }}</td>
                                                <td>{{ item.created_at }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <PaginationLayout
                                        :data="{ links: lucky.links, from: lucky.from, to: lucky.to, total: lucky.total }" />

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
        lucky: Object,
        user_details: Array,
    },
    components: {
        Head, AppLayout, SearchLayout, PaginationLayout,
    },
}

</script>
<style scoped>
.td-type button {
    padding: 0px 5px !important;
    font-size: 12px;
    border-radius: 0.25rem;
}
</style>
