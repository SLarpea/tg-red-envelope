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
                                            <span class="text-muted small pt-2 ps-1">Description</span>
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
                                            <span class="text-muted small pt-2 ps-1">Description</span>
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
                                            <span class="text-muted small pt-2 ps-1">Description</span>
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
                                            <span class="text-muted small pt-2 ps-1">Description</span>
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
                                            <h6>{{ dashboard.toda_profit }}</h6>
                                            <span class="text-muted small pt-2 ps-1">Description</span>
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
                                            <span class="text-muted small pt-2 ps-1">Description</span>
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
                                            <span class="text-muted small pt-2 ps-1">Description</span>
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
                                            <span class="text-muted small pt-2 ps-1">Description</span>
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
                                            <span class="text-muted small pt-2 ps-1">Description</span>
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
                                            <span class="text-muted small pt-2 ps-1">Description</span>
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
                                            <span class="text-muted small pt-2 ps-1">Description</span>
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
                                            <span class="text-muted small pt-2 ps-1">Description</span>
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
                                            <span class="text-muted small pt-2 ps-1">Description</span>
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
                                            <span class="text-muted small pt-2 ps-1">Description</span>
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
                                            <span class="text-muted small pt-2 ps-1">Description</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        Recent Activity <span>| Today</span>
                                    </h5>

                                    <div class="activity">
                                        <div class="activity-item d-flex">
                                            <div class="activite-label">32 min</div>
                                            <i class="bi bi-circle-fill activity-badge text-success align-self-start"></i>
                                            <div class="activity-content">
                                                Quia quae rerum
                                                <a href="#" class="fw-bold text-dark">explicabo officiis</a>
                                                beatae
                                            </div>
                                        </div>

                                        <div class="activity-item d-flex">
                                            <div class="activite-label">56 min</div>
                                            <i class="bi bi-circle-fill activity-badge text-danger align-self-start"></i>
                                            <div class="activity-content">
                                                Voluptatem blanditiis blanditiis eveniet
                                            </div>
                                        </div>

                                        <div class="activity-item d-flex">
                                            <div class="activite-label">2 hrs</div>
                                            <i class="bi bi-circle-fill activity-badge text-primary align-self-start"></i>
                                            <div class="activity-content">
                                                Voluptates corrupti molestias voluptatem
                                            </div>
                                        </div>

                                        <div class="activity-item d-flex">
                                            <div class="activite-label">1 day</div>
                                            <i class="bi bi-circle-fill activity-badge text-info align-self-start"></i>
                                            <div class="activity-content">
                                                Tempore autem saepe
                                                <a href="#" class="fw-bold text-dark">occaecati voluptatem</a>
                                                tempore
                                            </div>
                                        </div>

                                        <div class="activity-item d-flex">
                                            <div class="activite-label">2 days</div>
                                            <i class="bi bi-circle-fill activity-badge text-warning align-self-start"></i>
                                            <div class="activity-content">
                                                Est sit eum reiciendis exercitationem
                                            </div>
                                        </div>

                                        <div class="activity-item d-flex">
                                            <div class="activite-label">4 weeks</div>
                                            <i class="bi bi-circle-fill activity-badge text-muted align-self-start"></i>
                                            <div class="activity-content">
                                                Dicta dolorem harum nulla eius. Ut quidem quidem sit
                                                quas
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
        dashboard: Object,
    },
}

</script>
