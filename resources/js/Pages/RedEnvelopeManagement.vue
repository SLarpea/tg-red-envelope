<template>
    <Head title="Red Envelope Management" />
    <AppLayout>

        <div class="pagetitle">
        <h1><i class="bi bi-folder-check"></i> Red Envelope Management</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item">Mine Management</li>
            <li class="breadcrumb-item">Red Envelope Management</li>
            <li class="breadcrumb-item active">List of Envelopes</li>
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
                                            <h5 class="card-title"><i class="bi bi-list-ol"></i> List of Envelopes</h5>
                                        </div>
                                        <div class="col-lg-6">
                                            &nbsp;
                                        </div>
                                    </div>

                                    <SearchLayout :data="{ routeLink: 'red-envelopes.index', filters: filters }" />

                                    <table class="table table-sm table-striped table-hover">
                                        <colgroup>

                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col">Bao Master</th>
                                                <th scope="col">Red Envelope Amount</th>
                                                <th scope="col">Amount Received</th>
                                                <th scope="col">Red Envelope Number</th>
                                                <th scope="col">Number Of Packages</th>
                                                <th scope="col">Mine</th>
                                                <th scope="col">Group Id</th>
                                                <th scope="col">Sender Name</th>
                                                <th scope="col">Red Envelope Multiplier</th>
                                                <th scope="col">Type</th>
                                                <th scope="col">Status</th>
                                                <th scope="col" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in envelopes.data" :key="item.id" @dblclick.prevent="selectAction(item, 'show', null)">
                                                <td class="text-center">{{ envelopes.from + index }}</td>
                                                <td>{{ item.sender_id  }}</td>
                                                <td>{{ item.amount }}</td>
                                                <td>{{ item.received }}</td>
                                                <td>{{ item.number }}</td>
                                                <td>{{ item.lucky }}</td>
                                                <td>{{ item.thunder }}</td>
                                                <td>{{ item.chat_id  }}</td>
                                                <td>{{ item.sender_name  }}</td>
                                                <td>{{ item.red_list  }}</td>
                                                <td>{{ item.type  }}</td>
                                                <td>{{ item.status   }}</td>
                                                <td class="list-action-container text-center">
                                                    <i class="bi bi-eye text-primary" v-tippy="'View'" @click.prevent="selectAction(item, 'show', null)"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <PaginationLayout :data="{ links: envelopes.links, from: envelopes.from, to: envelopes.to, total: envelopes.total }" />

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
        envelopes: Object,
        filters: Object,
        response: null,
    },
   components: {
       Head, AppLayout, SearchLayout, PaginationLayout,
   },
}

</script>
