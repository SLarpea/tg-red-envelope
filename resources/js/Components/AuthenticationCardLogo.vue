<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <Link :href="'/'">
        <div class="row" style="width: 400px; margin-left: 0px; margin-left: -105px;">
            <div class="col-sm-6">
                <img src="../../../public/images/logo.png" alt="" class="float-end" style="width: 80px;"/>
            </div>
            <div class="col-sm-6">
                <h5 style="color: #ffffff; vertical-align: middle; font-size: 23px; font-weight: 600; margin-top: 24px;">宏宝管理员</h5>
            </div>
        </div>
    </Link>
</template>
