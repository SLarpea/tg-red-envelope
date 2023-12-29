<template>
    <Head title="Reward Record" />
    <AppLayout>

        <div class="pagetitle">
            <h1><i class="bi bi-wallet2"></i> Reward Record</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Mine Management</li>
                    <li class="breadcrumb-item">Reward Record</li>
                    <li class="breadcrumb-item active">List of Reward</li>
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
                                            <h5 class="card-title"><i class="bi bi-list-ol"></i> List of Reward</h5>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex justify-content-end align-items-center action-container">
                                                <a href="/rewards" class="btn btn-secondary btn-sm"><i class="bi bi-recycle"></i> 刷新</a>
                                            </div>
                                        </div>
                                    </div>

                                    <SearchLayout :data="{ routeLink: 'rewards', filters: filters }" />

                                    <table class="table table-sm table-striped table-hover">
                                        <colgroup>

                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col">Red Envelope Id</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">User</th>
                                                <th scope="col">Group Id</th>
                                                <th scope="col">Remark</th>
                                                <th scope="col">Package Owner</th>
                                                <th scope="col">Winning Numbers</th>
                                                <th scope="col" class="text-center">Winning Type</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in reward.data" :key="item.id"
                                                @dblclick.prevent="selectAction(item, 'show', null)">
                                                <td class="text-center">{{ reward.from + index }}</td>
                                                <td>{{ item.lucky_id }}</td>
                                                <td>{{ item.amount }}</td>
                                                <td>{{ item?.user?.username ?? item?.user?.first_name ?? 'N/A' }}</td>
                                                <td>{{ item.group_id }}</td>
                                                <td>{{ item.remark }}</td>
                                                <td>{{ item?.sender?.username ?? item?.sender?.first_name ?? 'N/A' }}</td>
                                                <td>{{ item.reward_num }}</td>
                                                <td class="list-status-container text-center">
                                                    <button class="btn btn-outline-success btn-status">
                                                        {{ (item.status == 1) ? '=豹子' : '顺子' }}
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <PaginationLayout
                                        :data="{ links: reward.links, from: reward.from, to: reward.to, total: reward.total }" />

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
        reward: Object,
        filters: Object,
        response: null,
    },
    components: {
        Head, AppLayout, SearchLayout, PaginationLayout,
    },
}

</script>
