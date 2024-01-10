<template>
    <Head :title="$t('report')" />
    <AppLayout>
        <div class="pagetitle">
            <h1><i class="bi bi-graph-up-arrow"></i> {{ $t('report') }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">{{ $t('mine_management') }}</li>
                    <li class="breadcrumb-item">{{ $t('report') }}</li>
                    <li class="breadcrumb-item active">
                        {{ $t('generation_of_reports') }}
                    </li>
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
                                            <div class="d-flex gap-1 justify-content-start align-items-center action-container form-header"
                                                @click="showFilter()">
                                                <div><i class="bi bi-funnel"></i> {{ $t('filter') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="col-lg-12">
                                                    <label for="status" class="col-form-label">{{ $t('report_choice')
                                                    }}</label>
                                                    <div class="col-lg-12">
                                                        <select class="form-select" v-model="filter_form.report_choice"
                                                            aria-label="Default select example" id="status" name="status">
                                                            <option value="0" selected>{{ $t('all') }}</option>
                                                            <option value="1">{{ $t('number_of_registered_users') }}
                                                            </option>
                                                            <option value="2">{{ $t('quantity_of_contract') }}</option>
                                                            <option value="3">{{ $t('platform_commission_amount') }}
                                                            </option>
                                                            <option value="4">{{ $t('reward_amount') }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="group_id" class="col-sm-12 col-form-label">{{ $t('group_id')
                                                }}</label>
                                                <div class="col-sm-12">
                                                    <select class="form-select" v-model="filter_form.group_id"
                                                        aria-label="Default select example" id="group_id" name="group_id">
                                                        <option value="" selected>{{ $t('all') }}</option>
                                                        <option v-for="item in group_ids" :key="item.id"
                                                            :value="item.group_id">
                                                            {{ item.group_id }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="start_date" class="col-sm-12 col-form-label">{{ $t('start_date')
                                                }}</label>
                                                <div class="col-sm-12">
                                                    <input id="start_date" v-model="filter_form.start_date"
                                                        name="start_date" type="date" class="form-control "
                                                        autocomplete="off" />
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="end_date" class="col-sm-12 col-form-label">{{ $t('end_date')
                                                }}</label>
                                                <div class="col-sm-12">
                                                    <input id="end_date" v-model="filter_form.end_date" name="end_date"
                                                        type="date" class="form-control " autocomplete="off" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="d-flex gap-1 justify-content-end align-items-center ">
                                                <button class="btn btn-secondary btn-sm" type="button"
                                                    @click.prevent="resetFilterForm()">
                                                    <i class="bi bi-arrow-clockwise"></i> {{ $t('reset') }}
                                                </button>
                                                <button class="btn btn-custom btn-sm" type="button"
                                                    @click.prevent="searchReport()">
                                                    <i class="bi bi-search"></i> {{ $t('search') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div :class="'col-lg-6 mx-auto'"
                            v-show="filter_form.report_choice == 1 || filter_form.report_choice == 0">
                            <div class="card">
                                <div class="card-body pl-1 pb-0">
                                    <div class="row">
                                        <div class="mt-3">
                                            <h5 class="report-header" @click="reportToggleCollapse('users_reports')">
                                                {{ $t('number_of_registered_users') }}
                                            </h5>
                                        </div>
                                        <div v-show="isUserReportCollapsed === false">
                                            <table class="table table-sm table-striped table-hover">
                                                <colgroup width="30%, 30%, 30%"></colgroup>
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-center">#</th>
                                                        <th scope="col" class="text-center">{{ $t('group_id') }}</th>
                                                        <th scope="col" class="text-center">{{ $t('total') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(item, index) in users_reports.data" :key="item.id">
                                                        <td class="text-center">{{ users_reports.from + index }}</td>
                                                        <td class="text-center">{{ item.group_id }}</td>
                                                        <td class="text-center">{{ item.total }}</td>
                                                    </tr>
                                                    <tr v-if="!users_reports?.data || users_reports.data.length <= 0">
                                                        <td colspan="3" class="text-center">{{ $t('no_records_to_display')
                                                        }}</td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td></td>
                                                        <td class="text-right"><strong>{{ $t('total') }}:</strong></td>
                                                        <td class="text-center"><strong>{{ summation.users_reports
                                                        }}</strong></td>
                                                    </tr>
                                                </tfoot>
                                            </table>

                                            <PaginationLayout v-show="(users_reports.total ?? 0) > 0"
                                                :data="{ links: users_reports.links, from: users_reports.from, to: users_reports.to, total: users_reports.total, plf: 1 }" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div :class="'col-lg-6 mx-auto'"
                            v-show="filter_form.report_choice == 2 || filter_form.report_choice == 0">
                            <div class="card">
                                <div class="card-body pl-1 pb-0">
                                    <div class="row">
                                        <div class="mt-3">
                                            <h5 class="report-header" @click="reportToggleCollapse('lucky_money_reports')">
                                                {{ $t('quantity_of_contracts') }}</h5>
                                        </div>
                                        <div v-show="isLuckyMoneyReports === false">
                                            <table class="table table-sm table-striped table-hover">
                                                <colgroup width="30%, 30%, 30%0%"></colgroup>
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-center">#</th>
                                                        <th scope="col" class="text-center">{{ $t('group_id') }}</th>
                                                        <th scope="col" class="text-center">{{ $t('total') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(item, index) in lucky_money_reports.data" :key="item.id">
                                                        <td class="text-center">{{ lucky_money_reports.from + index }}</td>
                                                        <td class="text-center">{{ item.group_id }}</td>
                                                        <td class="text-center">{{ item.total }}</td>
                                                    </tr>
                                                    <tr
                                                        v-if="!lucky_money_reports?.data || lucky_money_reports.data.length <= 0">
                                                        <td colspan="3" class="text-center ">{{ $t('no_records_to_display')
                                                        }}</td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td></td>
                                                        <td class="text-right"><strong>{{ $t('total') }}:</strong></td>
                                                        <td class="text-center"><strong>{{ summation.lucky_money_reports
                                                        }}</strong></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <PaginationLayout v-show="(lucky_money_reports.total ?? 0) > 0"
                                                :data="{ links: lucky_money_reports.links, from: lucky_money_reports.from, to: lucky_money_reports.to, total: lucky_money_reports.total, plf: 2 }" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div :class="'col-lg-6 mx-auto'"
                            v-show="filter_form.report_choice == 3 || filter_form.report_choice == 0">
                            <div class="card">
                                <div class="card-body pl-1 pb-0">
                                    <div class="row">
                                        <div class="mt-3">
                                            <h5 class="report-header"
                                                @click="reportToggleCollapse('platform_commission_amount_reports')">
                                                {{ $t('platform_commission_amount') }}
                                            </h5>
                                        </div>
                                        <div v-show="isPlatformCommissionAmountReports === false">
                                            <table class="table table-sm table-striped table-hover">
                                                <colgroup width="30%, 30%, 30%0%"></colgroup>
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-center">#</th>
                                                        <th scope="col" class="text-center">{{ $t('group_id') }}</th>
                                                        <th scope="col" class="text-center">{{ $t('total') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(item, index) in platform_commission_amount_reports.data">
                                                        <td class="text-center">{{ platform_commission_amount_reports.from +
                                                            index }}</td>
                                                        <td class="text-center">{{ item.group_id }}</td>
                                                        <td class="text-center">{{ item.total }}</td>
                                                    </tr>
                                                    <tr
                                                        v-if="!platform_commission_amount_reports?.data || platform_commission_amount_reports.data.length <= 0">
                                                        <td colspan="3" class="text-center ">{{ $t('no_records_to_display')
                                                        }}</td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td></td>
                                                        <td class="text-right"><strong>{{ $t('total') }}:</strong></td>
                                                        <td class="text-center"><strong>{{
                                                            summation.platform_commission_amount_reports }}</strong>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <PaginationLayout v-show="(platform_commission_amount_reports.total ?? 0) > 0"
                                                :data="{ links: platform_commission_amount_reports.links, from: platform_commission_amount_reports.from, to: platform_commission_amount_reports.to, total: platform_commission_amount_reports.total, plf: 3 }" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div :class="'col-lg-6 mx-auto'"
                            v-show="filter_form.report_choice == 4 || filter_form.report_choice == 0">
                            <div class="card">
                                <div class="card-body pl-1 pb-0">
                                    <div class="row">
                                        <div class="mt-3">
                                            <h5 class="report-header"
                                                @click="reportToggleCollapse('reward_amount_reports')">
                                                {{ $t('reward_amount') }}
                                            </h5>
                                        </div>
                                        <div v-show="isRewardAmountReports === false">
                                            <table class="table table-sm table-striped table-hover">
                                                <colgroup width="30%, 30%, 30%0%"></colgroup>
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-center">#</th>
                                                        <th scope="col" class="text-center">{{ $t('group_id') }}</th>
                                                        <th scope="col" class="text-center">{{ $t('total') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(item, index) in reward_amount_reports.data" :key="item.id">
                                                        <td class="text-center">{{ reward_amount_reports.from + index }}
                                                        </td>
                                                        <td class="text-center">{{ item.group_id }}</td>
                                                        <td class="text-center">{{ item.total }}</td>
                                                    </tr>
                                                    <tr
                                                        v-if="!reward_amount_reports?.data || reward_amount_reports?.data.length <= 0">
                                                        <td colspan="3" class="text-center ">{{ $t('no_records_to_display')
                                                        }}</td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td></td>
                                                        <td class="text-right"><strong>{{ $t('total') }}:</strong></td>
                                                        <td class="text-center"><strong>{{ summation.reward_amount_reports
                                                        }}</strong></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <PaginationLayout v-show="(reward_amount_reports.total ?? 0) > 0"
                                                :data="{ links: reward_amount_reports.links, from: reward_amount_reports.from, to: reward_amount_reports.to, total: reward_amount_reports.total, plf: 4 }" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <LoadingLayout v-if="loading" />
    </AppLayout>
</template>

<script>
import { Head } from "@inertiajs/vue3";
import AppLayout from "../Layouts/AppLayout.vue";
import SearchLayout from "../Layouts/SearchLayout.vue";
import PaginationLayout from "../Layouts/PaginationLayout.vue";
import LoadingLayout from "../Layouts/LoadingLayout.vue";
import _ from 'lodash';

export default {
    data() {
        // initialize dates
        const today = new Date();
        const oneMonthLater = new Date(today);
        oneMonthLater.setMonth(today.getMonth() + 1);

        return {
            loading: false,
            // form filteres and models
            filter_form: {
                report_choice: this.$page.props.request.report_choice ?? 0,
                group_id: this.$page.props.request.group_id ?? '',
                start_date: this.$page.props.request.start_date ?? today.toISOString().substr(0, 10), // Set to today's date
                end_date: this.$page.props.request.end_date ?? oneMonthLater.toISOString().substr(0, 10), // Set to one month from today
            },

            routeLink: 'reports',

            // collapsible booleans
            filterShow: true,
            isUserReportCollapsed: false,
            isPlatformCommissionAmountReports: false,
            isRewardAmountReports: false,
            isLuckyMoneyReports: false,
        };
    },
    props: {
        users_reports: Object,
        platform_commission_amount_reports: Object,
        reward_amount_reports: Object,
        lucky_money_reports: Object,
        filters: Object,
        response: null,
        group_ids: Array,
        summation: Object
    },
    components: {
        Head,
        AppLayout,
        SearchLayout,
        PaginationLayout,
        LoadingLayout
    },
    methods: {
        searchReport: _.throttle(async function () {
            try {

                await this.$inertia.replace(route(this.routeLink, this.filter_form), {
                    // Before sending the request
                    onBefore: () => {
                        this.loading = true;
                    },
                    onFinish: () => {
                        this.loading = false;
                    },
                });
            } catch (error) {
                // Handle any errors if needed
                console.error(error);
            }
        }, 200),
        resetReport: _.throttle(async function () {
            try {
                await this.$inertia.replace(route(this.routeLink, this.filter_form));
            } catch (error) {
                // Handle any errors if needed
                console.error(error);
            }
        }, 200),

        resetFilterForm() {
            const today = new Date();
            const oneMonthLater = new Date(today);
            oneMonthLater.setMonth(today.getMonth() + 1);

            // Reset filter_form properties
            this.filter_form.report_choice = 0;
            this.filter_form.group_id = '';
            this.filter_form.start_date = today.toISOString().substr(0, 10);
            this.filter_form.end_date = oneMonthLater.toISOString().substr(0, 10);

            this.$inertia.replace(route(this.routeLink));
        },

        showFilter() {
            this.filterShow = !this.filterShow;
        },

        reportToggleCollapse(opt) {
            if (opt === 'users_reports') {
                this.isUserReportCollapsed = !this.isUserReportCollapsed;
            }

            if (opt === 'platform_commission_amount_reports') {
                this.isPlatformCommissionAmountReports = !this.isPlatformCommissionAmountReports;
            }

            if (opt === 'reward_amount_reports') {
                this.isRewardAmountReports = !this.isRewardAmountReports;
            }

            if (opt === 'lucky_money_reports') {
                this.isLuckyMoneyReports = !this.isLuckyMoneyReports;
            }
        }
    }

};
</script>

<style scoped>
.report-header,
.form-header {
    margin-bottom: 0;
    font-weight: 500;
    color: #512da8;
    cursor: pointer;
}
</style>
