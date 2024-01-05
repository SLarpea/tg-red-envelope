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
                        <div class="col-lg-3" v-for=" (key, item)  in  dashboard " :key="key">
                            <div class="card info-card primary-card">
                                <div class="card-body">
                                    <h5 class="dash card-title">
                                        {{ $t(item) }}
                                    </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i :class="dashboard[item]['icon']"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ dashboard[item]['value'] }}</h6>
                                            <span class="text-muted small pt-2 ps-1"><i
                                                    class="bi bi-chevron-bar-up"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5 class="card-title"><i class="bi bi-graph-up-arrow"></i> Chart</h5>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="d-flex justify-content-end align-items-center action-container">
                                            <Link href="/dashboard" class="btn btn-secondary btn-sm" preserve-scroll><i
                                                    class="bi bi-recycle"></i> {{ $t('refresh') }}</Link>
                                                    <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                        2024
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                        <li><Link class="dropdown-item" href="/dashboard" method="post" :data="{year:2024}">2024</Link></li>
                                                        <li><Link class="dropdown-item" href="/dashboard" method="post" :data="{year:2025}">2025</Link></li>
                                                        <li><Link class="dropdown-item" href="/dashboard" method="post" :data="{year:2026}">2026</Link></li>
                                                    </ul>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="chart-container">
                                    <div id="chart_line" style="width: 100%; height:100%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h5 class="card-title"><i class="bi bi-cpu"></i> System Information</h5>
                                </div>
                                <div class="col-lg-6">
                                    &nbsp;
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <colgroup>
                                        <col width="30%">
                                        <col width="*">
                                    </colgroup>
                                    <tbody>
                                        <tr>
                                            <td>{{ $t("program_version") }}</td>
                                            <td>1.0</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $t("php_version") }}</td>
                                            <td>8.2.7</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $t("laravel_version") }}</td>
                                            <td>10.10</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $t("mysql_version") }}</td>
                                            <td>8.0.32</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $t("redis_version") }}</td>
                                            <td>5.0.14</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $t("powered_by") }}</td>
                                            <td>Feiwin</td>
                                        </tr>
                                    </tbody>
                                </table>
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
import { Head, Link } from '@inertiajs/vue3';
import AppLayout from '../Layouts/AppLayout.vue';
import * as echarts from 'echarts';

export default {
    components: {
        AppLayout, Head, Link,
    },
    props: {
        dashboard: Object,
    },
    methods: {
        line() {
            var myChart = echarts.init(document.getElementById('chart_line'));

            var aspectRatio = 3;
            var container = document.getElementById('chart_line');
            container.style.height = container.offsetWidth / aspectRatio + 'px';
            myChart.resize();

            myChart.setOption({
                title: {
                    text: 'Telegram Activity'
                },
                tooltip: {
                    trigger: 'axis'
                },
                legend: {
                    data: ['Group ID 1', 'Group ID 2', 'Group ID 3', 'Group ID 4', 'Group ID 5']
                },
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '3%',
                    containLabel: true
                },
                toolbox: {
                    feature: {
                    saveAsImage: {}
                    }
                },
                xAxis: {
                    type: 'category',
                    boundaryGap: false,
                    data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                },
                yAxis: {
                    type: 'value'
                },
                series: [
                    {
                    name: 'Group ID 1',
                    type: 'line',
                    data: [120, 132, 101, 134, 90, 230, 210]
                    },
                    {
                    name: 'Group ID 2',
                    type: 'line',
                    data: [220, 182, 191, 234, 290, 330, 310]
                    },
                    {
                    name: 'Group ID 3',
                    type: 'line',
                    data: [150, 232, 201, 154, 190, 330, 410]
                    },
                    {
                    name: 'Group ID 4',
                    type: 'line',
                    data: [320, 332, 301, 334, 390, 330, 320]
                    },
                    {
                    name: 'Group ID 5',
                    type: 'line',
                    data: [820, 932, 901, 934, 1290, 1330, 1320]
                    }
                ]
            });

        },
    },
    mounted() {
        this.line();
    },
}

</script>
