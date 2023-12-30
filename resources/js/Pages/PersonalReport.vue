<template>
    <Head title="Dashboard" />
    <AppLayout>

        <div class="pagetitle">
            <h1><i class="bi bi-bar-chart"></i> Personal Report</h1>
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
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li class="dropdown-header text-start">
                                                    <h6>Filter</h6>
                                                </li>

                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('luck_num', 1)">Today</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('luck_num', 7)">Last 7 Days</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('luck_num', 15)">last 15 Days</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('luck_num', 30)">Last Month</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('luck_num', 180)">The Last Half</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('luck_num', 365)">Last Year</a></li>
                                            </ul>
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">发包数 <span>| {{ getLabelText(reportOptionValue.luck_num)
                                            }}</span></h5>

                                            <div class="d-flex align-items-center">
                                                <div class="ps-3">
                                                    <h6>{{ response?.luck_num ?? data.luck_num }}</h6>
                                                    <span class="text-muted small pt-2 ps-1"><i
                                                            class="bi bi-chevron-bar-up"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="card info-card primary-card card-no-border">

                                        <div class="filter">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('luck_num_thunder', 1)">Today</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('luck_num_thunder', 7)">Last 7 Days</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('luck_num_thunder', 15)">last 15 Days</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('luck_num_thunder', 30)">Last Month</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('luck_num_thunder', 180)">The Last Half</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('luck_num_thunder', 365)">Last Year</a></li>
                                            </ul>
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">
                                                发包雷数 <span>| {{ getLabelText(reportOptionValue.luck_num_thunder)
                                                }}</span></h5>

                                            <div class="d-flex align-items-center">
                                                <div class="ps-3">
                                                    <h6>{{ response?.luck_num_thunder ?? data.luck_num_thunder }}</h6>
                                                    <span class="text-muted small pt-2 ps-1"><i
                                                            class="bi bi-chevron-bar-up"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="card info-card primary-card card-no-border">

                                        <div class="filter">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_history', 1)">Today</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_history', 7)">Last 7 Days</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_history', 15)">last 15 Days</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_history', 30)">Last Month</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_history', 180)">The Last Half</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_history', 365)">Last Year</a></li>
                                            </ul>
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">
                                                抢包数 <span>| {{ getLabelText(reportOptionValue.lucky_history)
                                            }}</span>
                                            </h5>

                                            <div class="d-flex align-items-center">
                                                <div class="ps-3">
                                                    <h6>{{ response?.lucky_history ?? data.lucky_history }}</h6>
                                                    <span class="text-muted small pt-2 ps-1"><i
                                                            class="bi bi-chevron-bar-up"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="card info-card primary-card card-no-border">

                                        <div class="filter">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_history_thunder', 1)">Today</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_history_thunder', 7)">Last 7 Days</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_history_thunder', 15)">last 15 Days</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_history_thunder', 30)">Last Month</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_history_thunder', 180)">The Last Half</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_history_thunder', 365)">Last Year</a></li>
                                            </ul>
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">
                                                抢包中雷数 <span>| {{ getLabelText(reportOptionValue.lucky_history_thunder)
                                            }}</span>
                                            </h5>

                                            <div class="d-flex align-items-center">
                                                <div class="ps-3">
                                                    <h6>{{ response?.lucky_history_thunder ?? data.lucky_history_thunder }}</h6>
                                                    <span class="text-muted small pt-2 ps-1"><i
                                                            class="bi bi-chevron-bar-up"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="card info-card primary-card card-no-border">

                                        <div class="filter">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_amount', 1)">Today</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_amount', 7)">Last 7 Days</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_amount', 15)">last 15 Days</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_amount', 30)">Last Month</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_amount', 180)">The Last Half</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_amount', 365)">Last Year</a></li>
                                            </ul>
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">
                                                发包金额 <span>| {{ getLabelText(reportOptionValue.lucky_amount)
                                            }}</span>
                                            </h5>

                                            <div class="d-flex align-items-center">
                                                <div class="ps-3">
                                                    <h6>{{ response?.lucky_amount ?? data.lucky_amount }}</h6>
                                                    <span class="text-muted small pt-2 ps-1"><i
                                                            class="bi bi-chevron-bar-up"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="card info-card primary-card card-no-border">

                                        <div class="filter">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_thunder_amount', 1)">Today</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_thunder_amount', 7)">Last 7 Days</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_thunder_amount', 15)">last 15 Days</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_thunder_amount', 30)">Last Month</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_thunder_amount', 180)">The Last Half</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_thunder_amount', 365)">Last Year</a></li>
                                            </ul>
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">
                                                发包中雷盈利 <span>| {{ getLabelText(reportOptionValue.lucky_thunder_amount)
                                            }}</span>
                                            </h5>

                                            <div class="d-flex align-items-center">
                                                <div class="ps-3">
                                                    <h6>{{ response?.lucky_thunder_amount ?? data.lucky_thunder_amount }}</h6>
                                                    <span class="text-muted small pt-2 ps-1"><i
                                                            class="bi bi-chevron-bar-up"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="card info-card primary-card card-no-border">

                                        <div class="filter">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_history_amount', 1)">Today</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_history_amount', 7)">Last 7 Days</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_history_amount', 15)">last 15 Days</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_history_amount', 30)">Last Month</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_history_amount', 180)">The Last Half</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_history_amount', 365)">Last Year</a></li>
                                            </ul>
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">
                                                抢包金额 <span>| {{ getLabelText(reportOptionValue.lucky_history_amount)
                                            }}</span>
                                            </h5>

                                            <div class="d-flex align-items-center">
                                                <div class="ps-3">
                                                    <h6>{{ response?.lucky_history_amount ?? data.lucky_history_amount }}</h6>
                                                    <span class="text-muted small pt-2 ps-1"><i
                                                            class="bi bi-chevron-bar-up"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="card info-card primary-card card-no-border">

                                        <div class="filter">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_history_thunder_amount', 1)">Today</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_history_thunder_amount', 7)">Last 7 Days</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_history_thunder_amount', 15)">last 15 Days</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_history_thunder_amount', 30)">Last Month</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_history_thunder_amount', 180)">The Last Half</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('lucky_history_thunder_amount', 365)">Last Year</a></li>
                                            </ul>
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">
                                                抢包中雷损失 <span>| {{ getLabelText(reportOptionValue.lucky_history_thunder_amount)
                                            }}</span>
                                            </h5>

                                            <div class="d-flex align-items-center">
                                                <div class="ps-3">
                                                    <h6>{{ response?.lucky_history_thunder_amount ?? data.lucky_history_thunder_amount }}</h6>
                                                    <span class="text-muted small pt-2 ps-1"><i
                                                            class="bi bi-chevron-bar-up"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="card info-card primary-card card-no-border">

                                        <div class="filter">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('invite_amount', 1)">Today</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('invite_amount', 7)">Last 7 Days</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('invite_amount', 15)">last 15 Days</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('invite_amount', 30)">Last Month</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('invite_amount', 180)">The Last Half</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('invite_amount', 365)">Last Year</a></li>
                                            </ul>
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">
                                                邀请奖励金额 <span>| {{ getLabelText(reportOptionValue.invite_amount)
                                            }}</span>
                                            </h5>

                                            <div class="d-flex align-items-center">
                                                <div class="ps-3">
                                                    <h6>{{ response?.invite_amount ?? data.invite_amount }}</h6>
                                                    <span class="text-muted small pt-2 ps-1"><i
                                                            class="bi bi-chevron-bar-up"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="card info-card primary-card card-no-border">

                                        <div class="filter">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('reward_amount', 1)">Today</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('reward_amount', 7)">Last 7 Days</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('reward_amount', 15)">last 15 Days</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('reward_amount', 30)">Last Month</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('reward_amount', 180)">The Last Half</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('reward_amount', 365)">Last Year</a></li>
                                            </ul>
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">
                                                豹子顺子中奖金额 <span>| {{ getLabelText(reportOptionValue.reward_amount)
                                            }}</span>
                                            </h5>

                                            <div class="d-flex align-items-center">
                                                <div class="ps-3">
                                                    <h6>{{ response?.reward_amount ?? data.reward_amount }}</h6>
                                                    <span class="text-muted small pt-2 ps-1"><i
                                                            class="bi bi-chevron-bar-up"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="card info-card primary-card card-no-border">

                                        <div class="filter">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('share_amount', 1)">Today</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('share_amount', 7)">Last 7 Days</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('share_amount', 15)">last 15 Days</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('share_amount', 30)">Last Month</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('share_amount', 180)">The Last Half</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('share_amount', 365)">Last Year</a></li>
                                            </ul>
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">
                                                代理抽成金额 <span>| {{ getLabelText(reportOptionValue.share_amount)
                                            }}</span>
                                            </h5>

                                            <div class="d-flex align-items-center">
                                                <div class="ps-3">
                                                    <h6>{{ response?.share_amount ?? data.share_amount }}</h6>
                                                    <span class="text-muted small pt-2 ps-1"><i
                                                            class="bi bi-chevron-bar-up"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="card info-card primary-card card-no-border">

                                        <div class="filter">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('recharge_amount', 1)">Today</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('recharge_amount', 7)">Last 7 Days</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('recharge_amount', 15)">last 15 Days</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('recharge_amount', 30)">Last Month</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('recharge_amount', 180)">The Last Half</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('recharge_amount', 365)">Last Year</a></li>
                                            </ul>
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">
                                                充值金额 <span>| {{ getLabelText(reportOptionValue.recharge_amount)
                                            }}</span>
                                            </h5>

                                            <div class="d-flex align-items-center">
                                                <div class="ps-3">
                                                    <h6>{{ response?.recharge_amount ?? data.recharge_amount }}</h6>
                                                    <span class="text-muted small pt-2 ps-1"><i
                                                            class="bi bi-chevron-bar-up"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="card info-card primary-card card-no-border">

                                        <div class="filter">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('withdraw_amount', 1)">Today</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('withdraw_amount', 7)">Last 7 Days</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('withdraw_amount', 15)">last 15 Days</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('withdraw_amount', 30)">Last Month</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('withdraw_amount', 180)">The Last Half</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('withdraw_amount', 365)">Last Year</a></li>
                                            </ul>
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">
                                                提现金额 <span>| {{ getLabelText(reportOptionValue.withdraw_amount)
                                            }}</span>
                                            </h5>

                                            <div class="d-flex align-items-center">
                                                <div class="ps-3">
                                                    <h6>{{ response?.withdraw_amount ?? data.withdraw_amount }}</h6>
                                                    <span class="text-muted small pt-2 ps-1"><i
                                                            class="bi bi-chevron-bar-up"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="card info-card primary-card card-no-border">

                                        <div class="filter">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('commission_amount', 1)">Today</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('commission_amount', 7)">Last 7 Days</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('commission_amount', 15)">last 15 Days</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('commission_amount', 30)">Last Month</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('commission_amount', 180)">The Last Half</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('commission_amount', 365)">Last Year</a></li>
                                            </ul>
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">
                                                平台抽成 <span>| {{ getLabelText(reportOptionValue.commission_amount)
                                            }}</span>
                                            </h5>

                                            <div class="d-flex align-items-center">
                                                <div class="ps-3">
                                                    <h6>{{ response?.commission_amount ?? data.commission_amount }}</h6>
                                                    <span class="text-muted small pt-2 ps-1"><i
                                                            class="bi bi-chevron-bar-up"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="card info-card primary-card card-no-border">

                                        <div class="filter">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('to_share_amount', 1)">Today</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('to_share_amount', 7)">Last 7 Days</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('to_share_amount', 15)">last 15 Days</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('to_share_amount', 30)">Last Month</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('to_share_amount', 180)">The Last Half</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('to_share_amount', 365)">Last Year</a></li>
                                            </ul>
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">
                                                被上级抽成 <span>| {{ getLabelText(reportOptionValue.to_share_amount)
                                            }}</span>
                                            </h5>

                                            <div class="d-flex align-items-center">
                                                <div class="ps-3">
                                                    <h6>{{ response?.to_share_amount ?? data.to_share_amount }}</h6>
                                                    <span class="text-muted small pt-2 ps-1"><i
                                                            class="bi bi-chevron-bar-up"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="card info-card primary-card card-no-border">

                                        <div class="filter">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('jackpot_amount', 1)">Today</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('jackpot_amount', 7)">Last 7 Days</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('jackpot_amount', 15)">last 15 Days</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('jackpot_amount', 30)">Last Month</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('jackpot_amount', 180)">The Last Half</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('jackpot_amount', 365)">Last Year</a></li>
                                            </ul>
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">
                                                Jackpot抽成 <span>| {{ getLabelText(reportOptionValue.jackpot_amount)
                                            }}</span>
                                            </h5>

                                            <div class="d-flex align-items-center">
                                                <div class="ps-3">
                                                    <h6>{{ response?.jackpot_amount ?? data.jackpot_amount }}</h6>
                                                    <span class="text-muted small pt-2 ps-1"><i
                                                            class="bi bi-chevron-bar-up"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="card info-card primary-card card-no-border">

                                        <div class="filter">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('profit_amount', 1)">Today</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('profit_amount', 7)">Last 7 Days</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('profit_amount', 15)">last 15 Days</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('profit_amount', 30)">Last Month</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('profit_amount', 180)">The Last Half</a>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal('profit_amount', 365)">Last Year</a></li>
                                            </ul>
                                        </div>

                                        <div class="card-body">
                                            <h5 class="card-title">
                                                个人盈利汇总 <span>| {{ getLabelText(reportOptionValue.profit_amount)
                                            }}</span>
                                            </h5>

                                            <div class="d-flex align-items-center">
                                                <div class="ps-3">
                                                    <h6>{{ response?.profit_amount ?? data.profit_amount }}</h6>
                                                    <span class="text-muted small pt-2 ps-1"><i
                                                            class="bi bi-chevron-bar-up"></i></span>
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
import { Head, router } from '@inertiajs/vue3';
import AppLayout from '../Layouts/AppLayout.vue';

export default {
    components: {
        AppLayout, Head,
    },
    props: {
        response: null,
        data: Object,
        filters: Object,
        reportOptionValue: Object
    },
    methods: {
        getReportTotal(reportType, optionType) {
            sessionStorage.setItem(reportType + '_optionType', optionType)
            router.post(route('post.personal-report'), { reportType: reportType, optionType: optionType, tg_id: this.filters.tg_id }, {
                onSuccess: (response) => {
                    console.log(response, "response");
                    console.log(this.response, "this.response");
                    console.log(response.props.luck_num, "response");
                    // if (response.props.response == 'success') {
                    //     this.$swal({
                    //         position: 'center',
                    //         icon: 'success',
                    //         text: msgText,
                    //         showConfirmButton: false,
                    //         timer: 2000
                    //     });
                    //     this.modalShow = false;
                    // }
                },
                onError: (error) => {

                },
            });
        },
        getLabelText(optionValue) {
            let finalTextLabel = '';
            switch (optionValue) {
                case 365:
                    finalTextLabel = 'Last Year';
                    // 直线
                    break;
                case 180:
                    finalTextLabel = 'The Last Half';
                    // 直线
                    break;
                case 30:
                    finalTextLabel = 'Last Month';
                    // 直线
                    break;
                case 15:
                    finalTextLabel = 'Last 15 Days';
                    // 直线
                    break;
                case 7:
                    finalTextLabel = 'Last 7 Days';
                    break;
                case 1:
                default:
                    finalTextLabel = 'Today';
            }

            return finalTextLabel;
        }
    }
}

</script>
