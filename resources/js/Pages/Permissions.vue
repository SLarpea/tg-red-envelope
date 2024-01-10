<template>
    <Head :title="$t('permissions')" />
    <AppLayout>

        <div class="pagetitle">
            <h1><i class="bi bi-person-vcard"></i> {{ $t('permissions') }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">{{ $t('system') }}</li>
                    <li class="breadcrumb-item">{{ $t('permissions') }}</li>
                    <li class="breadcrumb-item active">{{ $t('list_of_permissions') }}</li>
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
                                                $t('list_of_permissions') }}</h5>
                                        </div>
                                        <div class="col-lg-6">
                                            &nbsp;
                                        </div>
                                    </div>

                                    <SearchLayout :data="{ routeLink: 'permissions.index', filters: filters }" />

                                    <table class="table table-sm table-striped table-hover">
                                        <colgroup>
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col">{{ $t('name') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in permissions.data" :key="item.id">
                                                <td class="text-center">{{ permissions.from + index }}</td>
                                                <td>{{ $t(item.name) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <PaginationLayout
                                        :data="{ links: permissions.links, from: permissions.from, to: permissions.to, total: permissions.total }" />

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
import { Head, router } from '@inertiajs/vue3';
import AppLayout from '../Layouts/AppLayout.vue';
import SearchLayout from "../Layouts/SearchLayout.vue";
import PaginationLayout from "../Layouts/PaginationLayout.vue";

export default {
    data() {
        return {
            modalShow: false,
            form: {
                name: null,
                status: 1,
            },
        };
    },
    props: {
        permissions: Object,
        filters: Object,
        response: null,
    },
    components: {
        Head, AppLayout, SearchLayout, PaginationLayout,
    },

}

</script>
