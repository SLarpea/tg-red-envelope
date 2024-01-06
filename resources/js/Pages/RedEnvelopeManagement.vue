<template>
    <Head :title="$t('red_envelope_management')" />
    <AppLayout>

        <div class="pagetitle">
            <h1><i class="bi bi-folder-check"></i> {{ $t('red_envelope_management') }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">{{ $t('mine_management') }}</li>
                    <li class="breadcrumb-item">{{ $t('red_envelope_management') }}</li>
                    <li class="breadcrumb-item active">{{ $t('list_of_envelopes') }}</li>
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
                                            <h5 class="card-title"><i class="bi bi-list-ol"></i> {{ $t('list_of_envelopes') }}
                                            </h5>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex justify-content-end align-items-center action-container">
                                                <a href="/red-envelopes" class="btn btn-secondary btn-sm"><i
                                                        class="bi bi-recycle"></i> {{ $t('refresh') }}</a>
                                            </div>
                                        </div>
                                    </div>

                                    <SearchLayout :data="{ routeLink: 'red-envelopes.index', filters: filters }" />

                                    <table class="table table-sm table-striped table-hover">
                                        <colgroup>
                                            <col width="2%">
                                            <col width="*">
                                            <col width="*">
                                            <col width="*">
                                            <col width="*">
                                            <col width="*">
                                            <col width="*">
                                            <col width="*">
                                            <col width="*">
                                            <col width="10%">
                                            <col width="*">
                                            <col width="4%">
                                            <col width="4%">
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">{{ $t('#') }}</th>
                                                <th scope="col">{{ $t('bao_master') }}</th>
                                                <th scope="col">{{ $t('red_envelope_amount') }}</th>
                                                <th scope="col">{{ $t('amount_received') }}</th>
                                                <th scope="col">{{ $t('red_envelope_number') }}</th>
                                                <th scope="col">{{ $t('number_of_packages') }}</th>
                                                <th scope="col">{{ $t('mine') }}</th>
                                                <th scope="col">{{ $t('group_id') }}</th>
                                                <th scope="col">{{ $t('sender_name') }}</th>
                                                <th scope="col">{{ $t('red_envelope_multiplier') }}</th>
                                                <th scope="col" class="text-center">{{ $t('type') }}</th>
                                                <th scope="col" class="text-center">{{ $t('status') }}</th>
                                                <th scope="col" class="text-center">{{ $t('action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in  envelopes.data " :key="item.id"
                                                @dblclick.prevent="selectAction(item, 'show', null)">
                                                <td class="text-center">{{ envelopes.from + index }}</td>
                                                <td>{{ item.sender_name }}</td>
                                                <td>{{ item.amount }}</td>
                                                <td>{{ item.received }}</td>
                                                <td>{{ item.number }}</td>
                                                <td>{{ item.lucky }}</td>
                                                <td>{{ item.thunder }}</td>
                                                <td>{{ item.chat_id }}</td>
                                                <td>{{ item.sender_name }}</td>
                                                <td class="text-center" v-html="formatRedEnvelope(item.red_list)"></td>
                                                <td class="text-center td-type">
                                                    {{ getTextType(item.type) }}
                                                </td>
                                                <td class="text-center td-status">
                                                    {{ getTextStatus(item.status) }}
                                                </td>
                                                <td class="list-action-container text-center">
                                                    <i class="bi bi-eye text-primary" v-tippy="$t('view')"
                                                        @click.prevent="selectAction(item, 'show', null)"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <PaginationLayout
                                        :data=" { links: envelopes.links, from: envelopes.from, to: envelopes.to, total: envelopes.total } " />

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
    methods: {
        getTextStatus(statusId) {
            switch (statusId) {
                case 1:
                    return 'Normal';
                case 2:
                    return 'Collected';
                case 3:
                    return 'Expired';
                default:
                    return '';
            }
        },
        getTextType(type) {
            switch (type) {
                case 1:
                    return 'Thunder Packet';
                case 2:
                    return 'Welfare Red Packet';
                default:
                    return '';
            }
        },
        formatRedEnvelope(array) {
            try {
                const parsedArray = JSON.parse(array);
                let mines = [];
                let lucky = [];
                let redEnvelopeHtml = '';

                parsedArray.forEach(element => {
                    (typeof element === 'string' ? mines : lucky).push(element);
                });

                if (lucky.length > 0) {
                    redEnvelopeHtml += `<u class="fw-medium">Lucky</u> <br> <span class="text-success">${lucky.join(', ')}</span> <br />`;
                }

                if (mines.length > 0) {
                    redEnvelopeHtml += `<u class="fw-medium">Mines</u> <br> <span class="text-danger">${mines.join(', ')}</span> <br />`;
                }

                return redEnvelopeHtml;
            } catch (error) {
                console.error('Error parsing red envelope array:', error);
                return ''; // Handle the case where array parsing fails
            }
        }

    }
}

</script>

<style scoped>
.td-status button,
.td-type button {
    padding: 0px 5px !important;
    font-size: 12px;
    border-radius: 0.25rem;
}
</style>
