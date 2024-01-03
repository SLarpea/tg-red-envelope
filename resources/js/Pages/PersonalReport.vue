<template>
    <Head :title="$t('personal_report')" />
    <AppLayout>

        <div class="pagetitle">
            <h1><i class="bi bi-bar-chart"></i> {{ $t('personal_report') }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">{{ $t('mine_management') }}</li>
                    <li class="breadcrumb-item"><a href="/tg-users">{{ $t('user_management') }}</a></li>
                    <li class="breadcrumb-item active">{{ $t('personal_report') }}</li>
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
                                    <h5 class="card-title"><i class="bi bi-list-ol"></i> {{ $t('list_of_reports') }}</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3" v-for="(key, item) in reportOptionValue" :key="key">
                                    <div class="card info-card primary-card card-no-border">
                                        <div class="filter">
                                            <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                    class="bi bi-three-dots"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <li class="dropdown-header text-start">
                                                    <h6>{{ $t('filter') }}</h6>
                                                </li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal(item, 1)">{{ $t('today') }}</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal(item, 7)">{{ $t('last_7_days') }}</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal(item, 15)">{{ $t('last_15_days') }}</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal(item, 30)">{{ $t('last_month') }}</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal(item, 180)">{{ $t('last_half') }}</a></li>
                                                <li><a class="dropdown-item" href="javascript:;"
                                                        @click="getReportTotal(item, 365)">{{ $t('last_year') }}</a></li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                {{ $t(item) }} <span>| {{ getLabelText(reportOptionValue[item]) }}</span>
                                            </h5>
                                            <div class="d-flex align-items-center">
                                                <div class="ps-3">
                                                    <h6>{{ response?.[item] ?? data[item] }}</h6>
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
                    finalTextLabel = this.$t('last_year');
                    // 直线
                    break;
                case 180:
                    finalTextLabel = this.$t('last_half');
                    // 直线
                    break;
                case 30:
                    finalTextLabel = this.$t('last_month');
                    // 直线
                    break;
                case 15:
                    finalTextLabel = this.$t('last_15_days');
                    // 直线
                    break;
                case 7:
                    finalTextLabel = this.$t('last_7_days');
                    break;
                case 1:
                default:
                    finalTextLabel = this.$t('today');
            }

            return finalTextLabel;
        }
    }
}

</script>
