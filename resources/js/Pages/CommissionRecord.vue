<template>
    <Head :title="$t('commission_record')" />
    <AppLayout>

        <div class="pagetitle">
            <h1><i class="bi bi-folder-check"></i> {{ $t('commission_record') }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">{{ $t('mine_management') }}</li>
                    <li class="breadcrumb-item">{{ $t('commission_record') }}</li>
                    <li class="breadcrumb-item active">{{ $t('list_of_commissions') }}</li>
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
                                            <h5 class="card-title"><i class="bi bi-list-ol"></i> {{
                                                $t('list_of_commissions') }}</h5>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex justify-content-end align-items-center action-container">
                                                <a href="/commissions" class="btn btn-secondary btn-sm"><i
                                                        class="bi bi-recycle"></i> {{ $t('refresh') }}</a>
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
                                                <th scope="col">{{ $t('red_envelope_id') }}</th>
                                                <th scope="col">{{ $t('amount_drawn') }}</th>
                                                <th scope="col">{{ $t('profit_amount') }}</th>
                                                <th scope="col">{{ $t('user') }}</th>
                                                <th scope="col">{{ $t('group_id') }}</th>
                                                <th scope="col">{{ $t('remarks') }}</th>
                                                <th scope="col">{{ $t('bao_master') }}</th>
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
