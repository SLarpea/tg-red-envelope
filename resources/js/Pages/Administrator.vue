<template>
    <Head :title="$t('administrator')" />
    <AppLayout>
        <div class="pagetitle">
            <h1><i class="bi bi-people"></i> {{ $t('administrator') }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">{{ $t('system') }}</li>
                    <li class="breadcrumb-item">{{ $t('administrator') }}</li>
                    <li class="breadcrumb-item active">{{ $t('list_of_administrator') }}</li>
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
                                                {{ $t('list_of_administrator') }}
                                            </h5>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex justify-content-end align-items-center action-container">
                                                <a href="/administrator" class="btn btn-secondary btn-sm"><i
                                                        class="bi bi-recycle"></i> {{ $t('refresh') }}</a>
                                                <button class="btn btn-custom btn-sm" type="button"
                                                    @click.prevent="resetForm"
                                                    >
                                                    <i class="bi bi-plus-circle"></i>
                                                    {{ $t('new_administrator') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <SearchLayout :data="{
                                        routeLink: 'administrator.index',
                                        filters: filters,
                                    }" />

                                    <table class="table table-sm table-striped table-hover">
                                        <colgroup></colgroup>
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col">{{ $t('name') }}</th>
                                                <th scope="col">{{ $t('email_address') }}</th>
                                                <th scope="col">Telegram ID</th>
                                                <th scope="col" class="text-center">{{ $t('status') }}</th>
                                                <th scope="col" class="text-center">{{ $t('action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in   administrator.data  " :key="item.id"
                                                @dblclick.prevent="selectAction(item, 'show', null)">
                                                <td class="text-center">
                                                    {{ administrator.from + index }}
                                                </td>
                                                <td>{{ item.name }}</td>
                                                <td>{{ item.email }}</td>
                                                <td>{{ item.tg_id }}</td>
                                                <td class="list-status-container text-center">
                                                    <button :class="item.status == 1
                                                        ? 'btn btn-outline-success btn-status'
                                                        : 'btn btn-outline-danger btn-status'
                                                        " @click.prevent="formAction(item, 'status')">
                                                        {{ item.status == 1 ? $t('active') : $t('inactive') }}
                                                    </button>
                                                </td>
                                                <td class="list-action-container text-center">
                                                    <i class="bi bi-eye text-info" v-tippy="$t('view')"
                                                        @click.prevent="selectAction(item, 'show', null)"
                                                        v-if="$page.props.user.permissions.includes('view_administrator')"></i>
                                                    <i class="bi bi-pencil-square text-success" v-tippy="$t('edit')"
                                                        @click.prevent="selectAction(item, 'update', 'all')"
                                                        v-if="$page.props.user.permissions.includes('edit_administrator')"></i>
                                                    <i class="bi bi-trash text-danger" v-tippy="$t('delete ')"
                                                        @click.prevent="selectAction(item, 'delete', null)"
                                                        v-if="$page.props.user.permissions.includes('delete_administrator')"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <PaginationLayout :data="{
                                            links: administrator.links,
                                            from: administrator.from,
                                            to: administrator.to,
                                            total: administrator.total,
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
                <div class="modal-dialog modal-dialog-centered modal-lg">
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
                                            <label for="name" class="col-sm-4 col-form-label">{{ $t('name') }}: <span class="text-danger">*</span> </label>
                                            <div class="col-sm-8">
                                                <input id="name" name="name" v-model="form.name" type="text"
                                                    :class="`form-control ${error_form.name ? 'is-invalid' : ''}`"
                                                    autocomplete="off" />
                                                <div class="invalid-feedback" v-if="error_form.name">{{ error_form.name }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="email" class="col-sm-4 col-form-label">{{ $t('email_address')
                                            }}: <span class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <input id="email" name="email" v-model="form.email" type="text"
                                                    :class="`form-control ${error_form.email ? 'is-invalid' : ''}`"
                                                    autocomplete="off" />
                                                <div class="invalid-feedback" v-if="error_form.email">{{ error_form.email
                                                }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="tg_id" class="col-sm-4 col-form-label">{{ $t('tg_id') }}: <span class="text-danger">*</span> </label>
                                            <div class="col-sm-8">
                                                <input id="tg_id" name="tg_id" v-model="form.tg_id" type="text"
                                                    :class="`form-control ${error_form.tg_id ? 'is-invalid' : ''}`"
                                                    autocomplete="off" />
                                                <div class="invalid-feedback" v-if="error_form.tg_id">{{ error_form.tg_id }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="password" class="col-sm-4 col-form-label">{{ $t('password')
                                            }}:</label>
                                            <div class="col-sm-8">
                                                <input id="password" name="password" v-model="form.password"
                                                    type="password"
                                                    :class="`form-control ${error_form.password ? 'is-invalid' : ''}`"
                                                    autocomplete="off" />
                                                <div class="invalid-feedback" v-if="error_form.password">{{
                                                    error_form.password }}</div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="password_confirmation" class="col-sm-4 col-form-label">{{
                                                $t('confirm_password') }}:</label>
                                            <div class="col-sm-8">
                                                <input id="password_confirmation" name="password_confirmation"
                                                    v-model="form.password_confirmation" type="password"
                                                    :class="`form-control ${error_form.password_confirmation ? 'is-invalid' : ''}`"
                                                    autocomplete="off" />
                                                <div class="invalid-feedback" v-if="error_form.password_confirmation">{{
                                                    error_form.password_confirmation }}</div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">

                                            <label for="role" class="col-sm-4 col-form-label">{{ $t('role') }}: <span class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <select :class="`form-select ${error_form.role ? 'is-invalid' : ''}`"
                                                    aria-label="Default select example" id="role" name="role"
                                                    v-model="form.role">
                                                    <option v-for=" item  in  roles " :key="item.id" :value="item.name">
                                                        {{
                                                            item.name }}</option>
                                                </select>
                                                <div class="invalid-feedback" v-if="error_form.role">{{ error_form.role }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="status" class="col-sm-4 col-form-label">{{ $t('status') }}: <span class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <select :class="`form-select ${error_form.status ? 'is-invalid' : ''}`"
                                                    aria-label="Default select example" id="status" name="status"
                                                    v-model="form.status">
                                                    <option selected>{{ $t('select_status') }}</option>
                                                    <option value="1">{{ $t('enable') }}</option>
                                                    <option value="0">{{ $t('disable') }}</option>
                                                </select>
                                                <div class="invalid-feedback" v-if="error_form.status">{{
                                                    error_form.status
                                                }}</div>
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

        <LoadingLayout v-if="loading" />

    </AppLayout>
</template>

<script>
import { Head, router } from "@inertiajs/vue3";
import AppLayout from "../Layouts/AppLayout.vue";
import SearchLayout from "../Layouts/SearchLayout.vue";
import PaginationLayout from "../Layouts/PaginationLayout.vue";
import LoadingLayout from "../Layouts/LoadingLayout.vue";
import toastr from 'toastr';

export default {
    data() {
        return {
            loading: false,
            modalShow: false,
            editMode: false,
            form: {
                name: null,
                email: null,
                tg_id: null,
                password: "Password123!@#",
                password_confirmation: null,
                role: null,
                status: 1,
            },
            error_form: {}
        };
    },
    props: {
        administrator: Object,
        roles: Object,
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
                tg_id: null,
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
                this.form.role = data['roles'][0].name ?? '';
                this.editMode = true;
                this.modalShow = true;
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
                routeURL = "administrator.store";
                msgText = this.$t("item_saved");
                data.id = null;
            } else if (this.action == "update") {
                text = this.$t("confirm_update_item");
                confirmButtonColor = "#198754";
                method = "PUT";
                routeURL = "administrator.update";
                msgText = this.$t("item_updated");
            } else {
                text = this.$t("confirm_delete_item");
                confirmButtonColor = "#D81B60";
                method = "DELETE";
                routeURL = "administrator.destroy";
                msgText = this.$t("item_deleted");
            }

            this.$swal({
                text: text,
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: confirmButtonColor,
                cancelButtonText: this.$t('no')+' <i class="bi bi-hand-thumbs-down"></i>',
                confirmButtonText: '<i class="bi bi-hand-thumbs-up"></i> '+this.$t('yes')
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

<style scoped>.invalid-feedback {
    font-size: .775em;
}</style>
