<template>
    <transition name="modal-fade">
        <div class="lang-loading">
            <div class="row">
                <div class="col-lg-12 loading-container">
                    <img src="../../../public/images/loader.gif" alt="">
                </div>
                <div class="col-lg-12 text-center">
                    <h4>{{ $t('loading') }}</h4>
                </div>
            </div>
        </div>
    </transition>
</template>
