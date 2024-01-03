<template>
    <Head :title="$t('withdraw_record')" />
    <AppLayout>

        <div class="pagetitle">
            <h1><i class="bi bi-box-arrow-up-left"></i> {{ $t('withdraw_record') }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">{{ $t('mine_management') }}</li>
                    <li class="breadcrumb-item">{{ $t('withdraw_record') }}</li>
                    <li class="breadcrumb-item active">{{ $t('list_of_withdraw') }}</li>
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
                                            <h5 class="card-title"><i class="bi bi-list-ol"></i> {{ $t('list_of_withdraw')
                                            }}</h5>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex justify-content-end align-items-center action-container">
                                                <a href="/withdraw" class="btn btn-secondary btn-sm"><i
                                                        class="bi bi-recycle"></i> {{ $t('refresh') }}</a>
                                            </div>
                                        </div>
                                    </div>

                                    <SearchLayout :data="{ routeLink: 'tg-users.index', filters: filters }" />

                                    <table class="table table-sm table-striped table-hover">
                                        <colgroup>

                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col">{{ $t('user_id') }}</th>
                                                <th scope="col">{{ $t('username') }}</th>
                                                <th scope="col">{{ $t('amount') }}</th>
                                                <th scope="col">{{ $t('type') }}</th>
                                                <th scope="col">{{ $t('nickname') }}</th>
                                                <th scope="col">{{ $t('group_id') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in withdraw.data" :key="item.id"
                                                @dblclick.prevent="selectAction(item, 'show', null)">
                                                <td class="text-center">{{ withdraw.from + index }}</td>
                                                <td>{{ item.tg_id }}</td>
                                                <td>{{ item.username }}</td>
                                                <td>{{ item.amount }}</td>
                                                <td>{{ item.addr_type }}</td>
                                                <td>{{ item.first_name }}</td>
                                                <td>{{ item.group_id }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <PaginationLayout
                                        :data="{ links: withdraw.links, from: withdraw.from, to: withdraw.to, total: withdraw.total }" />

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
