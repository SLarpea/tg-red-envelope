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
                                            <div class="d-flex gap-1 justify-content-start  align-items-center action-container">
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
                                                    <select class="form-select " aria-label="Default select example" id="status" name="status">
                                                        <option selected>Select Status</option>
                                                        <option value="1">All</option>
                                                        <option value="1">Number Of Registered People</option>
                                                        <option value="0">Quantity Of Contract</option>
                                                        <option value="0">Platform Commission Amount</option>
                                                        <option value="0">Reward Amount</option>
                                                    </select>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="status" class="col-sm-12 col-form-label">Group Id
                                                </label>
                                                <div class="col-sm-12">
                                                    <select class="form-select " aria-label="Default select example" id="status" name="status">
                                                        <option selected>Select Status</option>
                                                        <option value="1">Enable</option>
                                                        <option value="0">Disable</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="start_date" class="col-sm-12 col-form-label">Start Date
                                                </label>
                                                <div class="col-sm-12">
                                                    <input id="start_date" name="start_date"  type="date" class="form-control " autocomplete="off" />
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="end_date" class="col-sm-12 col-form-label">End Date
                                                </label>
                                                <div class="col-sm-12">
                                                    <input id="end_date" name="end_date"  type="date" class="form-control " autocomplete="off" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="d-flex gap-1 justify-content-end  align-items-center ">
                                                <button class="btn btn-secondary" type="button">
                                                    <i class="bi bi-arrow-clockwise"></i> Reset
                                                </button>
                                                <button class="btn btn-custom" type="button">
                                                    <i class="bi bi-search"></i> Search
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="mt-3">
                                            <h2>Number of Choice</h2>
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
                                                <tr>
                                                    <td class="text-left">1</td>
                                                    <td class="text-center">-1231231231231</td>
                                                    <td class="text-center">100</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- <PaginationLayout :data="{ links: recharge.links, from: recharge.from ?? 1, to: recharge.to ??, total: recharge.total ?? 100 }" /> -->
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

export default {
    props: {
        recharge: Object,
        filters: Object,
        response: null,
    },
    components: {
        Head,
        AppLayout,
        SearchLayout,
        PaginationLayout,
    },
};
</script>
