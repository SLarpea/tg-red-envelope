<template>
    <Head title="Dashboard" />
    <AppLayout>

        <div class="pagetitle">
            <h1><i class="bi bi-grid"></i> Personal Report</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Mine Management</li>
                    <li class="breadcrumb-item"><a href="/tg-users">User Managment</a></li>
                    <li class="breadcrumb-item active">Personal Report</li>
                </ol>
            </nav>
        </div>

        <section class="section personal-report">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5 class="card-title"><i class="bi bi-list-ol"></i> List of Reports</h5>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-lg-3">
                                    <div class="card info-card primary-card card-no-border">

                                        <div class="filter">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li class="dropdown-header text-start">
                                                <h6>Filter</h6>
                                                </li>

                                                <li><a class="dropdown-item" href="#">Today</a></li>
                                                <li><a class="dropdown-item" href="#">Last 7 Days</a></li>
                                                <li><a class="dropdown-item" href="#">last 15 Days</a></li>
                                                <li><a class="dropdown-item" href="#">Last Month</a></li>
                                                <li><a class="dropdown-item" href="#">The Last Half</a></li>
                                                <li><a class="dropdown-item" href="#">Last Year</a></li>
                                            </ul>
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">发包数 <span>| Today</span></h5>

                                            <div class="d-flex align-items-center">
                                                <div class="ps-3">
                                                    <h6>1</h6>
                                                    <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                            <div class="card info-card primary-card card-no-border">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">Last 7 Days</a></li>
                                        <li><a class="dropdown-item" href="#">last 15 Days</a></li>
                                        <li><a class="dropdown-item" href="#">Last Month</a></li>
                                        <li><a class="dropdown-item" href="#">The Last Half</a></li>
                                        <li><a class="dropdown-item" href="#">Last Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">
                                        发包雷数 <span>| Today</span>
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>1</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card info-card primary-card card-no-border">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">Last 7 Days</a></li>
                                        <li><a class="dropdown-item" href="#">last 15 Days</a></li>
                                        <li><a class="dropdown-item" href="#">Last Month</a></li>
                                        <li><a class="dropdown-item" href="#">The Last Half</a></li>
                                        <li><a class="dropdown-item" href="#">Last Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">
                                        抢包数 <span>| Today</span>
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>1</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card info-card primary-card card-no-border">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">Last 7 Days</a></li>
                                        <li><a class="dropdown-item" href="#">last 15 Days</a></li>
                                        <li><a class="dropdown-item" href="#">Last Month</a></li>
                                        <li><a class="dropdown-item" href="#">The Last Half</a></li>
                                        <li><a class="dropdown-item" href="#">Last Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">
                                        抢包中雷数 <span>| Today</span>
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>1</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card info-card primary-card card-no-border">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">Last 7 Days</a></li>
                                        <li><a class="dropdown-item" href="#">last 15 Days</a></li>
                                        <li><a class="dropdown-item" href="#">Last Month</a></li>
                                        <li><a class="dropdown-item" href="#">The Last Half</a></li>
                                        <li><a class="dropdown-item" href="#">Last Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">
                                        发包金额 <span>| Today</span>
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>1</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card info-card primary-card card-no-border">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">Last 7 Days</a></li>
                                        <li><a class="dropdown-item" href="#">last 15 Days</a></li>
                                        <li><a class="dropdown-item" href="#">Last Month</a></li>
                                        <li><a class="dropdown-item" href="#">The Last Half</a></li>
                                        <li><a class="dropdown-item" href="#">Last Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">
                                        发包中雷盈利 <span>| Today</span>
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>1</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card info-card primary-card card-no-border">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">Last 7 Days</a></li>
                                        <li><a class="dropdown-item" href="#">last 15 Days</a></li>
                                        <li><a class="dropdown-item" href="#">Last Month</a></li>
                                        <li><a class="dropdown-item" href="#">The Last Half</a></li>
                                        <li><a class="dropdown-item" href="#">Last Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">
                                        抢包金额 <span>| Today</span>
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>1</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card info-card primary-card card-no-border">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">Last 7 Days</a></li>
                                        <li><a class="dropdown-item" href="#">last 15 Days</a></li>
                                        <li><a class="dropdown-item" href="#">Last Month</a></li>
                                        <li><a class="dropdown-item" href="#">The Last Half</a></li>
                                        <li><a class="dropdown-item" href="#">Last Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">
                                        抢包中雷损失 <span>| Today</span>
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>1</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card info-card primary-card card-no-border">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">Last 7 Days</a></li>
                                        <li><a class="dropdown-item" href="#">last 15 Days</a></li>
                                        <li><a class="dropdown-item" href="#">Last Month</a></li>
                                        <li><a class="dropdown-item" href="#">The Last Half</a></li>
                                        <li><a class="dropdown-item" href="#">Last Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">
                                        邀请奖励金额 <span>| Today</span>
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>1</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card info-card primary-card card-no-border">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">Last 7 Days</a></li>
                                        <li><a class="dropdown-item" href="#">last 15 Days</a></li>
                                        <li><a class="dropdown-item" href="#">Last Month</a></li>
                                        <li><a class="dropdown-item" href="#">The Last Half</a></li>
                                        <li><a class="dropdown-item" href="#">Last Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">
                                        豹子顺子中奖金额 <span>| Today</span>
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>1</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card info-card primary-card card-no-border">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">Last 7 Days</a></li>
                                        <li><a class="dropdown-item" href="#">last 15 Days</a></li>
                                        <li><a class="dropdown-item" href="#">Last Month</a></li>
                                        <li><a class="dropdown-item" href="#">The Last Half</a></li>
                                        <li><a class="dropdown-item" href="#">Last Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">
                                        代理抽成金额 <span>| Today</span>
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>1</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card info-card primary-card card-no-border">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">Last 7 Days</a></li>
                                        <li><a class="dropdown-item" href="#">last 15 Days</a></li>
                                        <li><a class="dropdown-item" href="#">Last Month</a></li>
                                        <li><a class="dropdown-item" href="#">The Last Half</a></li>
                                        <li><a class="dropdown-item" href="#">Last Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">
                                        充值金额 <span>| Today</span>
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>1</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card info-card primary-card card-no-border">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">Last 7 Days</a></li>
                                        <li><a class="dropdown-item" href="#">last 15 Days</a></li>
                                        <li><a class="dropdown-item" href="#">Last Month</a></li>
                                        <li><a class="dropdown-item" href="#">The Last Half</a></li>
                                        <li><a class="dropdown-item" href="#">Last Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">
                                        提现金额 <span>| Today</span>
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>1</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card info-card primary-card card-no-border">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">Last 7 Days</a></li>
                                        <li><a class="dropdown-item" href="#">last 15 Days</a></li>
                                        <li><a class="dropdown-item" href="#">Last Month</a></li>
                                        <li><a class="dropdown-item" href="#">The Last Half</a></li>
                                        <li><a class="dropdown-item" href="#">Last Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">
                                        平台抽成 <span>| Today</span>
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>1</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card info-card primary-card card-no-border">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">Last 7 Days</a></li>
                                        <li><a class="dropdown-item" href="#">last 15 Days</a></li>
                                        <li><a class="dropdown-item" href="#">Last Month</a></li>
                                        <li><a class="dropdown-item" href="#">The Last Half</a></li>
                                        <li><a class="dropdown-item" href="#">Last Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">
                                        被上级抽成 <span>| Today</span>
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>1</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card info-card primary-card card-no-border">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">Last 7 Days</a></li>
                                        <li><a class="dropdown-item" href="#">last 15 Days</a></li>
                                        <li><a class="dropdown-item" href="#">Last Month</a></li>
                                        <li><a class="dropdown-item" href="#">The Last Half</a></li>
                                        <li><a class="dropdown-item" href="#">Last Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">
                                        Jackpot抽成 <span>| Today</span>
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>1</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card info-card primary-card card-no-border">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">Last 7 Days</a></li>
                                        <li><a class="dropdown-item" href="#">last 15 Days</a></li>
                                        <li><a class="dropdown-item" href="#">Last Month</a></li>
                                        <li><a class="dropdown-item" href="#">The Last Half</a></li>
                                        <li><a class="dropdown-item" href="#">Last Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">
                                        个人盈利汇总 <span>| Today</span>
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div class="ps-3">
                                            <h6>1</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
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
import { Head } from '@inertiajs/vue3';
import AppLayout from '../Layouts/AppLayout.vue';

export default {
    components: {
        AppLayout, Head,
    },
    props: {

    },
}

</script>
