<template>
    <Head :title="$t('notifications')" />
    <AppLayout>
        <div class="pagetitle">
            <h1><i class="bi bi-people"></i> {{ $t('notifications') }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">{{ $t('system') }}</li>
                    <li class="breadcrumb-item">{{ $t('administrator') }}</li>
                    <li class="breadcrumb-item active">{{ $t('list_of_notifications') }}</li>
                </ol>
            </nav>
        </div>


        <section class="section user-management">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h5 class="card-title">
                                                <i class="bi bi-list-ol"></i>
                                                {{ $t('list_of_notifications') }}
                                            </h5>
                                        </div>
                                    </div>

                                    <SearchLayout :data="{
                                        routeLink: 'get.notifications.index',
                                        filters: filters,
                                    }" />

                                    <table class="table table-sm table-striped table-hover">
                                        <colgroup></colgroup>
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col">{{ $t('title') }}</th>
                                                <th scope="col">{{ $t('message') }}</th>
                                                <th scope="col" class="text-center">{{ $t('is_read') }}</th>
                                                <th scope="col" class="text-center">{{ $t('date') }}</th>
                                                <th scope="col" class="text-center">{{ $t('action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in notifications_list.data  " :key="item.id"
                                                @click.prevent="selectAction(item, 'show', null)"
                                                :class="{ 'tr-bg-active': filters.id == item.id }">
                                                <td class="text-center">
                                                    {{ notifications_list.from + index }}
                                                </td>
                                                <td>{{ item.title }}</td>
                                                <td>{{ item.message }}</td>
                                                <td class="text-center">{{ $t(item.is_read ? 'yes' : 'no') }}</td>
                                                <td class="text-center">{{ moment(item?.created_at).fromNow() }}</td>

                                                <td class="list-action-container text-center">
                                                    <i class="bi bi-eye text-info" v-tippy="$t('view')"
                                                        @click.prevent="selectAction(item, 'show', null)"></i>
                                                    <i class="bi bi-trash text-danger" v-tippy="$t('delete ')"
                                                        @click.prevent="selectAction(item, 'delete', null)"
                                                        v-if="$page.props.user.permissions.includes('delete_administrator')"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <PaginationLayout :data="{
                                        links: notifications_list.links,
                                        from: notifications_list.from,
                                        to: notifications_list.to,
                                        total: notifications_list.total,
                                    }
                                        " />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <transition name="modal-fade">
            <div class="modal custom-modal" v-if="modalShow">
                <div class="modal-dialog modal-dialog-centered modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                <i class="bi bi-arrow-return-right"></i>
                                {{ !editMode ? $t('new_administrator') : $t('update_administrator') }}
                            </h5>
                            <button type="button" class="btn-close" @click.prevent="closeModal"></button>
                        </div>
                        <form @submit.prevent="formAction(form, 'all')">
                            <div class="modal-body">
                                <div class="row gx-4">
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            <label for="type" class="col-sm-4 col-form-label">{{ $t('type') }}:</label>
                                            <div class="col-sm-8">
                                                <label for="type" v-text="$t(form.type)"></label>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="title" class="col-sm-4 col-form-label">{{ $t('title')
                                            }}:</label>
                                            <div class="col-sm-8">
                                                <label for="title" v-text="$t(form.title)"></label>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="Message" class="col-sm-4 col-form-label">{{ $t('Message')
                                            }}:</label>
                                            <div class="col-sm-8">
                                                <label for="message" v-text="$t(form.message)"></label>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="is_read" class="col-sm-4 col-form-label">{{ $t('is_read')
                                            }}:</label>
                                            <div class="col-sm-8">
                                                <label for="message" v-text="$t(form.is_read ? 'yes' : 'no')"></label>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" @click.prevent="closeModal">
                                    <i class="bi bi-x-circle"></i> {{ $t('close') }}
                                </button>
                                <template v-if="action !== 'show'">
                                    <button type="submit" class="btn btn-custom" v-if="action === 'new'">
                                        <i class="bi bi-save2"></i> {{ $t('save') }}
                                    </button>
                                    <button type="submit" class="btn btn-custom" v-if="action === 'update'">
                                        <i class="bi bi-save2"></i> {{ $t('update') }}
                                    </button>
                                </template>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </transition>

        <LoadingLayout v-show="loading" />

    </AppLayout>
</template>

<script>
import { Head, router } from "@inertiajs/vue3";
import AppLayout from "../Layouts/AppLayout.vue";
import SearchLayout from "../Layouts/SearchLayout.vue";
import PaginationLayout from "../Layouts/PaginationLayout.vue";
import LoadingLayout from "../Layouts/LoadingLayout.vue";
import pusher from './../pusher';
import moment from "moment";
import toastr from 'toastr';

export default {
    data() {
        return {
            loading: false,
            modalShow: false,
            editMode: false,
            form: {
                type: null,
                title: null,
                message: "Password123!@#",
                is_read: null,
            },
            error_form: {},
            moment: moment
        };
    },
    props: {
        notifications_list: Object,
        filters: Object,
        response: null,
    },
    components: {
        Head,
        AppLayout,
        SearchLayout,
        PaginationLayout,
        LoadingLayout,
    },
    methods: {
        closeModal() {
            this.modalShow = false;
        },
        resetForm() {
            this.modalShow = !this.modalShow;
            this.action = "new";
            this.form = {
                name: null,
                email: null,
                password: "Password123!@#",
                password_confirmation: null,
                role: null,
                status: 1,
            };
            this.editMode = false;
        },
        selectAction(data, action, type) {
            this.action = action;
            if (this.action == "delete") {
                this.formAction(data, type);
            } else {
                this.form = Object.assign({}, data);
                this.form.password = '';
                // this.form.role = data['roles'][0].name ?? '';
                this.editMode = true;
                this.modalShow = true;

                this.handleReadClick(data.id, data.is_read);
                console.log(data, "data")
            }
        },
        formAction(data, type) {
            this.error_form = {};
            this.action = type == "status" ? "update" : this.action;
            let text = String;
            let confirmButtonColor = String;
            let method = String;
            let routeURL = String;
            let msgText = String;
            if (this.action == "new") {
                text = this.$t("confirm_save_item");
                confirmButtonColor = "#198754";
                method = "POST";
                routeURL = "notifications_list.store";
                msgText = this.$t("item_saved");
                data.id = null;
            } else if (this.action == "update") {
                text = this.$t("confirm_update_item");
                confirmButtonColor = "#198754";
                method = "PUT";
                routeURL = "notifications_list.update";
                msgText = this.$t("item_updated");
            } else {
                text = this.$t("confirm_delete_item");
                confirmButtonColor = "#D81B60";
                method = "DELETE";
                routeURL = "notifications_list.destroy";
                msgText = this.$t("item_deleted");
            }

            this.$swal({
                text: text,
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: confirmButtonColor,
                cancelButtonText: this.$t('no') + ' <i class="bi bi-hand-thumbs-down"></i>',
                confirmButtonText: '<i class="bi bi-hand-thumbs-up"></i> ' + this.$t('yes')
            }).then((result) => {
                if (result.isConfirmed) {
                    data._method = method;
                    data._token = document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content");
                    data.update_type = type;
                    router.post(route(routeURL, data.id), data, {
                        onBefore: () => {
                            this.loading = true;
                        },
                        onSuccess: (response) => {
                            if (response.props.response == "success") {
                                this.$swal({
                                    position: "center",
                                    icon: "success",
                                    text: msgText,
                                    showConfirmButton: false,
                                    timer: 2000,
                                });
                                this.modalShow = false;
                            }
                        },
                        onFinish: () => {
                            this.loading = false;
                        },
                        onError: (error) => {
                            try {
                                this.error_form = Object.assign(this.error_form, error);
                                Object.entries(error).forEach(([field, message]) => {
                                    toastr.error(`${message}`);
                                });
                            } catch (err) {
                                toastr.error(this.$t('unexpected_error'));
                            }
                        },
                    });
                }
            });
        },
        escape(event) {
            if (event.keyCode === 27) {
                this.modalShow = false;
            }
        },
        handleReadClick(id, isRead) {
            if (isRead == 0) {
                router.post(route("post.notifications.read", id), { _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content') });
            }
        }
    },
    created() {
        window.addEventListener("keydown", this.escape);
    },
    watch: {
        modalShow: function (oldVal, newVal) {
            this.error_form = {};
        }
    }
};
</script>

<style scoped>
.invalid-feedback {
    font-size: .775em;
}

.tr-bg-active td {
    background: #F1E9FB;
}
</style>
