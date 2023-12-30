<template>
    <Head title="Dashboard" />
    <AppLayout>

        <div class="pagetitle">
            <h1><i class="bi bi-grid"></i> Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div>

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card info-card primary-card">
                                <div class="card-body">
                                    <h5 class="card-title">今日新增用户</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ dashboard.today_user }}</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card info-card primary-card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        今日发包数
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-file-earmark-zip"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ dashboard.today_package }}</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card info-card primary-card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        今日发包总额
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-folder"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ dashboard.today_outsourcing }}</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card info-card primary-card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        今日中雷率
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-lightning-charge"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ dashboard.today_thunder_rate }}</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card info-card primary-card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        今日盈利
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cash-coin"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ dashboard.today_profit }}</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card info-card primary-card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        今日发出奖励(豹/顺)
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-bookmark-star"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ dashboard.today_rewards }}</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card info-card primary-card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        今日充值
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-box-arrow-in-right"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ dashboard.today_recharge }}</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card info-card primary-card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        今日提现
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-box-arrow-left"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ dashboard.today_withdraw }}</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card info-card primary-card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        累计总用户
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ dashboard.all_users }}</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card info-card primary-card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        累计发包数
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-archive"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ dashboard.all_package }}</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card info-card primary-card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        累计发包总额
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-folder2-open"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ dashboard.all_outsourcing }}</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card info-card primary-card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        发出奖励(豹/顺)汇总
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-journal-bookmark"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ dashboard.all_rewards }}</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card info-card primary-card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        充值汇总
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-list-check"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ dashboard.all_recharge }}</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card info-card primary-card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        提现汇总
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-list-nested"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ dashboard.all_withdraw }}</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="card info-card primary-card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        累计总收益
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-piggy-bank"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ dashboard.total_revenue }}</h6>
                                            <span class="text-muted small pt-2 ps-1"><i class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        系统信息
                                    </h5>

                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered no-margin">
                                            <colgroup>
                                                <col width="260">
                                                <col width="*">
                                            </colgroup>
                                            <tbody>
                                                <tr>
                                                    <td>程序版本 :</td>
                                                    <td><strong class="default-color">1.0</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>PHP版本 :</td>
                                                    <td><strong class="default-color">8.2</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Laravel版本 :</td>
                                                    <td><strong class="default-color">10.10</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>数据库版本 :</td>
                                                    <td><strong class="default-color">8.0</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>REDIS版本 :</td>
                                                    <td><strong class="default-color">5.0</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>供电 :</td>
                                                    <td><strong class="default-color">Feiwin</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
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
        dashboard: Object,
    },
}

</script>
