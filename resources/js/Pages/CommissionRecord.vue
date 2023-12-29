<template>
    <Head title="commissions Record" />
    <AppLayout>

        <div class="pagetitle">
            <h1><i class="bi bi-folder-check"></i> Commission Record</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Mine Management</li>
                    <li class="breadcrumb-item">Commission Record</li>
                    <li class="breadcrumb-item active">List of Commissions</li>
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
                                            <h5 class="card-title"><i class="bi bi-list-ol"></i> List of Commissions</h5>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex justify-content-end align-items-center action-container">
                                                <a href="/commissions" class="btn btn-secondary btn-sm"><i class="bi bi-recycle"></i> 刷新</a>
                                            </div>
                                        </div>
                                    </div>

                                    <SearchLayout :data="{ routeLink: 'commissions.index', filters: filters }" />

                                    <table class="table table-sm table-striped table-hover">
                                        <colgroup>

                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col">Red Envelope Id</th>
                                                <th scope="col">Amount Drawn</th>
                                                <th scope="col">Profit Amount</th>
                                                <th scope="col">User</th>
                                                <th scope="col">Group Id</th>
                                                <th scope="col">Remarks</th>
                                                <th scope="col">Bao Master</th>
                                                <th scope="col" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in commissions.data" :key="item.id"
                                                @dblclick.prevent="selectAction(item, 'show', null)">
                                                <td class="text-center">{{ commissions.from + index }}</td>
                                                <td>{{ item.lucky_id }}</td>
                                                <td>{{ item.amount }}</td>
                                                <td>{{ item.profit_amount }}</td>
                                                <td>{{ item.user.first_name }}</td>
                                                <td>{{ item.group_id }}</td>
                                                <td>{{ item.remark }}</td>
                                                <td>{{ item.sender.first_name }}</td>
                                                <td class="list-action-container text-center">
                                                    <i class="bi bi-eye text-primary" v-tippy="'View'"
                                                        @click.prevent="selectAction(item, 'show', null)"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <PaginationLayout
                                        :data="{ links: commissions.links, from: commissions.from, to: commissions.to, total: commissions.total }" />

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
        commissions: Object,
        filters: Object,
        response: null,
    },
    components: {
        Head, AppLayout, SearchLayout, PaginationLayout,
    },
}

</script>
