<template>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center">
                <img src="../../../public/images/logo.png" alt="" />
                <span class="d-none d-lg-block">{{ ($page.props.user.locale === 'zh_CN' ? '宏宝管理员' : 'Hongbao Admin') }}</span>
            </a>
            <i class="bi toggle-sidebar-btn" :class="this.toggleShow == true
                ? 'bi-text-indent-right'
                : 'bi-text-indent-left'
                " id="btn-toggle" @click.prevent="toggle"></i>
        </div>

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown" v-tippy="($page.props.user.locale === 'zh_CN' ? '中国人' : 'English')">
                        <i class="bi bi-translate"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications lang-drop">

                        <li :class="`notification-item ` + ($page.props.user.locale === 'zh_CN' ? 'active' : '')" @click="setLocale('zh_CN')">
                            <i class="bi bi-arrow-right-short"></i> 中国人
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li :class="`notification-item ` + ($page.props.user.locale === 'en' ? 'active' : '')" @click="setLocale('en')">
                            <i class="bi bi-arrow-right-short"></i> English
                        </li>
                    </ul>

                </li>
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img :src="$page.props.auth.user.profile_photo_url" alt="Profile"
                            class="rounded-circle thumb-prof" />
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{
                            Array.from($page.props.auth.user.name)[0] +
                            ". " +
                            $page.props.auth.user.name.split(" ").splice(-1)
                        }}</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ $page.props.auth.user.name }}</h6>
                            <span>{{ $page.props.user.roles[0] }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" :href="route('profile.show')">
                                <i class="bi bi-person"></i>
                                <span>{{ $t('my_profile') }}</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#" @click.prevent="help()">
                                <i class="bi bi-question-circle"></i>
                                <span>{{ $t('need_help') }}</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <li>
                            <form @submit.prevent="logout">
                                <button type="submit" class="dropdown-item d-flex align-items-center">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>{{ $t('sign_out') }}</span>
                                </button>
                            </form>
                        </li>
                        <hr>
                        &nbsp;
                    </ul>
                </li>
            </ul>
        </nav>
    </header>

    <transition name="modal-fade">
            <div class="modal custom-modal" v-if="helpShow">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                <i class="bi bi-arrow-return-right"></i> {{ $t('need_help') }}
                            </h5>
                            <button type="button" class="btn-close" @click.prevent="closeModal"></button>
                        </div>
                        <div class="modal-body">
                            <h1 class="text-center">{{ $t('under_construction') }}</h1>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click.prevent="closeModal">
                                <i class="bi bi-x-circle"></i> {{ $t('close') }}
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </transition>

        <LoadingLayout v-if="loading" />

</template>

<script>
import { Link, router } from "@inertiajs/vue3";
import LoadingLayout from "./LoadingLayout.vue";

export default {
    data() {
        return {
            loading: false,
            isHiddenHelp: false,
            toggleShow: true,
            helpShow: false,
        };
    },
    components: {
        Link, LoadingLayout,
    },
    methods: {
        closeModal() {
            this.helpShow = false;
        },
        logout() {
            this.$swal({
                text: this.$t('are_you_sure_you_want_to_signout'),
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#512da8",
                cancelButtonText: this.$t('no')+' <i class="bi bi-hand-thumbs-down"></i>',
                confirmButtonText: '<i class="bi bi-hand-thumbs-up"></i> '+this.$t('yes')
            }).then((result) => {
                if (result.isConfirmed) {
                    sessionStorage.clear();
                    this.$inertia.post(route("logout"));
                }
            });
        },
        toggle() {
            const body = document.getElementById("body");
            body.classList.toggle("toggle-sidebar");
            this.toggleShow = !this.toggleShow;
        },
        help() {
            this.helpShow = true;
        },
        escape(event) {
            if (event.keyCode === 27) {
                this.isHiddenHelp = false;
            }
        },
        async setLocale(lang) {
            if (this.$page.props.user.locale === lang) return false
            this.loading = true;
            this.transText = (lang == 'en') ? 'Translating...' : '翻译...';
            await new Promise(resolve => setTimeout(resolve, 1000));
            router.post(route('post.setlocale'), { lang: lang }, {
                onSuccess: (response) => {
                    location.reload();
                },
                onError: (error) => {
                    console.log(error, "error")
                },
            });
        }
    },
    created() {
        window.addEventListener("keydown", this.escape);
    },
};
</script>
