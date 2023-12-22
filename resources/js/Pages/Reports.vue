<template>
    <Head title="Report" />
    <AppLayout>
        <div class="pagetitle">
            <h1><i class="bi bi-wallet2"></i> Report</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Mine Management</li>
                    <li class="breadcrumb-item">Report</li>
                    <li class="breadcrumb-item active">
                        Generation of reports
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
                                        <div class="col-lg-7">
                                            <div
                                                class="d-flex gap-1 justify-content-start  align-items-center action-container">
                                                <button class="btn btn-outline-secondary" type="button">
                                                    <i class="bi bi-arrow-repeat"></i> Refresh
                                                </button>
                                                <button class="btn btn-outline-secondary" type="button">
                                                    <i class="bi bi-funnel"></i> Filter
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="col-lg-12">
                                                    <label for="status" class="col-form-label">Report Choice
                                                    </label>
                                                    <div class="col-lg-12">
                                                        <select class="form-select" v-model="filter_form.report_choice"
                                                            aria-label="Default select example" id="status" name="status">
                                                            <option value="0" selected>All</option>
                                                            <option value="1">Number Of Registered Users</option>
                                                            <option value="2">Quantity Of Contract</option>
                                                            <option value="3">Platform Commission Amount</option>
                                                            <option value="4">Reward Amount</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="group_id" class="col-sm-12 col-form-label">Group Id
                                                </label>
                                                <div class="col-sm-12">
                                                    <select class="form-select" v-model="filter_form.group_id"
                                                        aria-label="Default select example" id="group_id" name="group_id">
                                                        <option v-for="item in group_ids" :value="item.group_id">
                                                            {{ item.group_id }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="start_date" class="col-sm-12 col-form-label">Start Date
                                                </label>
                                                <div class="col-sm-12">
                                                    <input id="start_date" v-model="filter_form.start_date"
                                                        name="start_date" type="date" class="form-control "
                                                        autocomplete="off" />
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="end_date" class="col-sm-12 col-form-label">End Date
                                                </label>
                                                <div class="col-sm-12">
                                                    <input id="end_date" v-model="filter_form.end_date" name="end_date"
                                                        type="date" class="form-control " autocomplete="off" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="d-flex gap-1 justify-content-end  align-items-center ">
                                                <button class="btn btn-secondary" type="button">
                                                    <i class="bi bi-arrow-clockwise"></i> Reset
                                                </button>
                                                <button class="btn btn-custom" type="button"
                                                    @click.prevent="searchReport()">
                                                    <i class="bi bi-search"></i> Search
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" v-show="filter_form.report_choice == 1 || filter_form.report_choice == 0">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="mt-3">
                                            <h5 class="report-header">Number of Registered Users</h5>
                                        </div>
                                        <table class="table table-sm table-striped table-hover">
                                            <colgroup width="5%, 20%, 30%">
                                            </colgroup>
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-left">#</th>
                                                    <th scope="col" class="text-center">Group Id </th>
                                                    <th scope="col" class="text-center">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(item, index) in users_reports.data" :key="item.id"
                                                    @dblclick.prevent="selectAction(item, 'show', null)">
                                                    <td class="text-left">{{ users_reports.from + index }}</td>
                                                    <td class="text-center">{{ item.group_id }}</td>
                                                    <td class="text-center">{{ item.total }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <PaginationLayout
                                            :data="{ links: users_reports.links, from: users_reports.from, to: users_reports.to, total: users_reports.total }" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" v-show="filter_form.report_choice == 2 || filter_form.report_choice == 0">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="mt-3">
                                            <h5 class="report-header">Quantity of contracts</h5>
                                        </div>
                                        <table class="table table-sm table-striped table-hover">
                                            <colgroup width="5%, 20%, 30%">
                                            </colgroup>
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-left">#</th>
                                                    <th scope="col" class="text-center">Group Id</th>
                                                    <th scope="col" class="text-center">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(item, index) in lucky_money_reports.data" :key="item.id"
                                                    @dblclick.prevent="selectAction(item, 'show', null)">
                                                    <td class="text-left">{{ lucky_money_reports.from + index }}</td>
                                                    <td class="text-center">{{ item.group_id }}</td>
                                                    <td class="text-center">{{ item.total }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <PaginationLayout
                                            :data="{ links: lucky_money_reports.links, from: lucky_money_reports.from, to: lucky_money_reports.to, total: lucky_money_reports.total }" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" v-show="filter_form.report_choice == 3 || filter_form.report_choice == 0">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="mt-3">
                                            <h5 class="report-header">Platform commission amount</h5>
                                        </div>
                                        <table class="table table-sm table-striped table-hover">
                                            <colgroup width="5%, 20%, 30%">
                                            </colgroup>
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-left">#</th>
                                                    <th scope="col" class="text-center">Group Id</th>
                                                    <th scope="col" class="text-center">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(item, index) in platform_commission_amount_reports.data"
                                                    :key="item.id" @dblclick.prevent="selectAction(item, 'show', null)">
                                                    <td class="text-left">{{ platform_commission_amount_reports.from + index
                                                    }}</td>
                                                    <td class="text-center">{{ item.group_id }}</td>
                                                    <td class="text-center">{{ item.total }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <PaginationLayout
                                            :data="{ links: platform_commission_amount_reports.links, from: platform_commission_amount_reports.from, to: platform_commission_amount_reports.to, total: platform_commission_amount_reports.total }" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" v-show="filter_form.report_choice == 4 || filter_form.report_choice == 0">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="mt-3">
                                            <h5 class="report-header">Reward amount</h5>
                                        </div>
                                        <table class="table table-sm table-striped table-hover">
                                            <colgroup width="5%, 20%, 30%">
                                            </colgroup>
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-left">#</th>
                                                    <th scope="col" class="text-center">Group Id</th>
                                                    <th scope="col" class="text-center">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(item, index) in reward_amount_reports.data" :key="item.id"
                                                    @dblclick.prevent="selectAction(item, 'show', null)">
                                                    <td class="text-left">{{ reward_amount_reports.from + index }}</td>
                                                    <td class="text-center">{{ item.group_id }}</td>
                                                    <td class="text-center">{{ item.total }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <PaginationLayout
                                            :data="{ links: reward_amount_reports.links, from: reward_amount_reports.from, to: reward_amount_reports.to, total: reward_amount_reports.total }" />
                                    </div>
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
import { Head } from "@inertiajs/vue3";
import AppLayout from "../Layouts/AppLayout.vue";
import SearchLayout from "../Layouts/SearchLayout.vue";
import PaginationLayout from "../Layouts/PaginationLayout.vue";
import _ from 'lodash';

export default {
    data() {
        const today = new Date();
        const oneMonthLater = new Date(today);
        oneMonthLater.setMonth(today.getMonth() + 1);

        return {
            filter_form: {
                report_choice: 0,
                group_id: String,
                start_date: today.toISOString().substr(0, 10), // Set to today's date
                end_date: oneMonthLater.toISOString().substr(0, 10), // Set to one month from today
            },
            routeLink: 'reports'
        };
    },
    props: {
        users_reports: Object,
        platform_commission_amount_reports: Object,
        reward_amount_reports: Object,
        lucky_money_reports: Object,
        filters: Object,
        response: null,
        group_ids: Array
    },
    components: {
        Head,
        AppLayout,
        SearchLayout,
        PaginationLayout,
    },
    methods: {
        searchReport: _.throttle(async function () {
            try {
                await this.$inertia.replace(route(this.routeLink, this.filter_form));
            } catch (error) {
                // Handle any errors if needed
                console.error(error);
            }
        }, 200),
    }

};
</script>

<style scoped>
.report-header {
    margin-bottom: 0;
    font-weight: 500;
    color: #512da8;
}
</style>
