<template>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center">
                <img src="../../../public/images/logo.png" alt="" />
                <span class="d-none d-lg-block">{{ ($page.props.user.locale === 'zh_CN' ? '宏宝管理员' : 'Hongbao Admin')
                }}</span>
            </a>
            <i class="bi toggle-sidebar-btn" :class="this.toggleShow == true
                    ? 'bi-text-indent-right'
                    : 'bi-text-indent-left'
                " id="btn-toggle" @click.prevent="toggle"></i>
        </div>

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown" ref="notificationLink">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number" v-if="notificationCount > 0">{{ notificationCount
                        }}</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications ">
                        <li class="dropdown-header">
                            {{ $t('you_have_new_notification').replace(':notif_count', notificationCount) }}
                            <!-- You have {{ notificationCount }} new notifications -->
                            <a href="javascript:;" @click="handleNotifReadClick('all')"><span
                                    class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>

                        <div class="notifications-list">
                            <div v-for="(item, k) in slicedNotificationList" :key="k"
                                @click="handleNotifReadClick(item.id)">
                                <li class="notification-item">
                                    <i :class="`bi ${getNotifIcon(item?.type)}`"></i>
                                    <div>
                                        <h4>{{ item?.title }}</h4>
                                        <p>{{ item?.message }}</p>
                                        <p>{{ moment(item?.created_at).fromNow() }}</p>
                                    </div>
                                </li>

                                <li
                                    v-if="(slicedNotificationList.length != (k + 1) || notifList.length > 4)">
                                    <hr class="dropdown-divider" />
                                </li>
                            </div>
                        </div>
                        <li v-if="notifList.length > 4" class="dropdown-footer"
                            @click="handleClickNotif('showallnotif')">
                            <a href="javascript:;">
                                {{ $t('show_' + (isShowAllNotification ? 'less' : 'all') + '_notifications') }}
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown"
                        v-tippy="($page.props.user.locale === 'zh_CN' ? '中国人' : 'English')">
                        <i class="bi bi-translate"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications lang-drop">

                        <li :class="`notification-item ` + ($page.props.user.locale === 'zh_CN' ? 'active' : '')"
                            @click="setLocale('zh_CN')">
                            <i class="bi bi-arrow-right-short"></i> 中国人
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li :class="`notification-item ` + ($page.props.user.locale === 'en' ? 'active' : '')"
                            @click="setLocale('en')">
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
import pusher from './../pusher';
import moment from "moment";

export default {
    data() {
        return {
            loading: false,
            isHiddenHelp: false,
            toggleShow: true,
            helpShow: false,

            notifCount: this.$page.props.notifications.length,
            notifList: this.$page.props.notifications,
            isShowAllNotification: false,
            preventCloseFlag: true,

            moment: moment
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
                cancelButtonText: this.$t('no') + ' <i class="bi bi-hand-thumbs-down"></i>',
                confirmButtonText: '<i class="bi bi-hand-thumbs-up"></i> ' + this.$t('yes')
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
        },
        initializePusher() {
            const channel = pusher.subscribe('public');

            channel.bind('telegram_notification', (res) => {
                this.notificationCount = res.data.notif_count;

                if (res.data.id) {
                    this.notificationList = res.data;
                } else {
                    if (res.data.read_id) {
                        // Find the index of the element with matching id in this.notificationList
                        const indexToRemove = this.notificationList.findIndex(notification => notification.id === res.data.read_id);
                        // If the element is found, remove it from the array
                        if (indexToRemove !== -1) {
                            this.notificationList.splice(indexToRemove, 1);
                        }
                    }
                }
            });
        },
        getNotifIcon(errorType) {
            switch (errorType) {
                case 'success':
                    return 'bi-check-circle text-success';
                case 'error':
                    return 'bi-x-circle text-danger';
                case 'warning':
                    return 'bi-exclamation-circle text-warning';
                default:
                    return 'bi-info-circle text-primary';
            }
        },
        handleClickNotif(opt) {
            if (opt === 'showallnotif') {
                this.isShowAllNotification = !this.isShowAllNotification;
                // this.preventCloseFlag = true;

                setTimeout(() => {
                    this.$refs.notificationLink.click();
                }, 100);
            }
        },
        formatHuman(strDate) {
            moment(strDate).fromNow();
        },
        handleNotifReadClick(id) {
            console.log(id !== 'all');
            if (id !== 'all') {
                return router.get(route("get.notifications.index"), { id });
            }
            return router.get(route("get.notifications.index"));
            // router.post(route("post.notifications.read", id), { _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content') });
        }
    },
    created() {
        this.initializePusher();
        window.addEventListener("keydown", this.escape);
    },
    computed: {
        notificationCount: {
            get() {
                // Getter function for computed property
                return this.notifCount;
            },
            set(newValue) {
                // Setter function for computed property
                this.notifCount = newValue;
            }
        },
        notificationList: {
            get() {
                // Getter function for computed property
                return this.notifList;
            },
            set(newValue) {
                // Setter function for computed property
                this.notifList.unshift(newValue);
            }
        },
        slicedNotificationList() {
            if (this.isShowAllNotification !== true && this.notificationList.length !== undefined) {
                console.log(this.notificationList.length, "this.notificationList")
                return this.notificationList.slice(0, 4);
            }
            return this.notificationList;
        }
    }
};
</script>


<style scoped>
.notifications-list {
    overflow-y: auto;
    max-height: 40rem;
}

.unread-message {
    background: #00000015;
}
</style>
