<template>
    <Head title="Withdraw Record" />
    <AppLayout>

        <div class="pagetitle">
        <h1>Withdraw Record</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Mine Management</a></li>
            <li class="breadcrumb-item">Withdraw Record</li>
            <li class="breadcrumb-item active">List of Withdraw</li>
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
                                            <h5 class="card-title">List of Withdraw</h5>
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
                                                <th scope="col">Type</th>
                                                <th scope="col">Nickname</th>
                                                <th scope="col">Group ID</th>
                                                <th scope="col" class="text-center">Status</th>
                                                <th scope="col" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in withdraw.data" :key="item.id" @dblclick.prevent="selectAction(item, 'show', null)">
                                                <td class="text-center">{{ withdraw.from + index }}</td>
                                                <td>{{ item.tg_id  }}</td>
                                                <td>{{ item.username }}</td>
                                                <td>{{ item.amount }}</td>
                                                <td>{{ item.type }}</td>
                                                <td>{{ item.first_name }}</td>
                                                <td>{{ item.group_id }}</td>
                                                <td class="list-status-container text-center">
                                                    <button :class="(item.status == 1) ? 'btn btn-outline-success btn-status' : 'btn btn-outline-danger btn-status'"
                                                        @click.prevent="formAction(item, 'status')">
                                                        {{ (item.status == 1) ? 'Active' : 'Inactive' }}
                                                    </button>
                                                </td>
                                                <td class="list-action-container text-center">
                                                    <i class="bi bi-eye text-primary" v-tippy="'View'" @click.prevent="selectAction(item, 'show', null)"></i>
                                                    <i class="bi bi-pencil-square text-success" v-tippy="'Edit'" @click.prevent="selectAction(item, 'update', 'all')"></i>
                                                    <i class="bi bi-trash text-danger" v-tippy="'Delete'" @click.prevent="selectAction(item, 'delete', null)"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <PaginationLayout :data="{ links: withdraw.links, from: withdraw.from, to: withdraw.to, total: withdraw.total }" />

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
        withdraw: Object,
        filters: Object,
        response: null,
    },
   components: {
       Head, AppLayout, SearchLayout, PaginationLayout,
   },
}

</script>
