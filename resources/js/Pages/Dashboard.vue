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
                                    <h5 class="card-title">
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
