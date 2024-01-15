<template>
    <Head :title="$t('roles')" />
    <AppLayout>

        <div class="pagetitle">
            <h1><i class="bi bi-file-earmark-person"></i> {{ $t('roles_page_title') }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">{{ $t('system') }}</li>
                    <li class="breadcrumb-item">{{ $t('roles') }}</li>
                    <li class="breadcrumb-item active">{{ $t('list_of_roles') }}</li>
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
                                            <h5 class="card-title"><i class="bi bi-list-ol"></i> {{
                                                $t('list_of_roles_title') }}</h5>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex justify-content-end align-items-center action-container">
                                                <a href="/roles" class="btn btn-secondary btn-sm"><i
                                                        class="bi bi-recycle"></i> {{ $t('refresh') }}</a>
                                                <button class="btn btn-custom btn-sm" type="button"
                                                    @click.prevent="resetForm">
                                                    <i class="bi bi-plus-circle"></i> {{ $t('new_role') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <SearchLayout :data="{ routeLink: 'roles.index', filters: filters }" />

                                    <table class="table table-sm table-striped table-hover">
                                        <colgroup>

                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col">{{ $t('name') }}</th>
                                                <th scope="col" class="text-center">{{ $t('status') }}</th>
                                                <th scope="col" class="text-center">{{ $t('action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in roles.data" :key="item.id"
                                                @dblclick.prevent="selectAction(item, 'show', null)">
                                                <td class="text-center">{{ roles.from + index }}</td>
                                                <td>{{ item.name }}</td>
                                                <td class="list-status-container text-center">
                                                    <button
                                                        :class="(item.status == 1) ? 'btn btn-outline-success btn-status' : 'btn btn-outline-danger btn-status'"
                                                        @click.prevent="formAction(item, 'status')">
                                                        {{ (item.status == 1) ? $t('active') : $t('inactive') }}
                                                    </button>
                                                </td>
                                                <td class="list-action-container text-center">
                                                    <i class="bi bi-eye text-info" v-tippy="'View'"
                                                        @click.prevent="selectAction(item, 'show', null)"></i>
                                                    <i class="bi bi-pencil-square text-success" v-tippy="'Edit'"
                                                        @click.prevent="selectAction(item, 'update', 'all')"></i>
                                                    <i class="bi bi-trash text-danger" v-tippy="'Delete'"
                                                        @click.prevent="selectAction(item, 'delete', null)"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <PaginationLayout
                                        :data="{ links: roles.links, from: roles.from, to: roles.to, total: roles.total }" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <transition name="modal-fade">
            <div class="modal custom-modal" v-if="modalShow">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                <i class="bi bi-arrow-return-right"></i> {{ (!editMode) ? $t('new_role') : $t('update_role')
                                }}
                            </h5>
                            <button type="button" class="btn-close" @click.prevent="closeModal"></button>
                        </div>
                        <form @submit.prevent="formAction(form, 'all')">
                            <div class="modal-body">
                                <div class="row gx-4">
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            <label for="name" class="col-sm-4 col-form-label">{{ $t('name') }}:</label>
                                            <div class="col-sm-8">
                                                <input id="name" name="name" v-model="form.name" type="text"
                                                    :class="`form-control ${error_form.name ? 'is-invalid' : ''}`"
                                                    autocomplete="off" />
                                                <div class="invalid-feedback" v-if="error_form.name">
                                                    {{ error_form.name }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="status" class="col-sm-4 col-form-label">{{ $t('status') }}:</label>
                                            <div class="col-sm-8">
                                                <select class="form-select" aria-label="Default select example" id="status"
                                                    name="status" v-model="form.status">
                                                    <option selected>{{ $t('select_status') }}</option>
                                                    <option value="1">{{ $t('enable') }}</option>
                                                    <option value="0">{{ $t('disable') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="name" class="col-sm-4 col-form-label">{{ $t('permissions')
                                            }}:</label>
                                            <div class="col-sm-8">
                                                <div class="form-check mb-1">
                                                    <input :id="'id_all'" class="form-check-input" type="checkbox"
                                                        @click="handClickAll(form.isAll)" v-model="form.isAll" value="true">
                                                    <label class="form-check-label" :for="'id_all'">
                                                        {{ $t('all') }}
                                                    </label>
                                                </div>
                                                <div class="permission-card-wrap mb-2" v-for="(moduleName, key) in modules"
                                                    :key="key">
                                                    <div class="row">
                                                        <div class="col-sm-12 ">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <p class="mt-1 permission-card-title"> {{ $t(moduleName)
                                                                    }} </p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6" v-for="(item) in permissions"
                                                                    :key="item.id"
                                                                    v-show="checkSameModules(item, moduleName)">
                                                                    <div class="form-check">
                                                                        <input :id="'id_' + item.id"
                                                                            class="form-check-input" type="checkbox"
                                                                            v-model="form.selectedOptions"
                                                                            :value="item.name">
                                                                        <label class="form-check-label"
                                                                            :for="'id_' + item.id">
                                                                            {{ $t(item.name) }}
                                                                        </label>
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
import { Head, router } from '@inertiajs/vue3';
import AppLayout from '../Layouts/AppLayout.vue';
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
            action: 'new',
            form: {
                name: null,
                status: 1,
                selectedOptions: [],
                isAll: false
            },
            error_form: {},
            modules: []
        };
    },
    props: {
        roles: Object,
        permissions: Object,
        filters: Object,
        response: null,
    },
    components: {
        Head, AppLayout, SearchLayout, PaginationLayout, LoadingLayout,
    },
    methods: {
        closeModal() {
            this.modalShow = false;
        },
        resetForm() {
            this.modalShow = !this.modalShow;
            this.action = 'new';
            this.form = {
                name: null,
                status: 1,
                selectedOptions: [],
            }
        },
        selectAction(data, action, type) {
            this.action = action;
            if (this.action == 'delete') {
                this.formAction(data, type);
            } else {
                this.form = Object.assign(this.form, data);
                this.form.selectedOptions = data.permissions.map(item => item.name)
                this.modalShow = true;
            }
        },
        formAction(data, type) {
            this.action = (type == 'status') ? 'update' : this.action;
            let text = '';
            let confirmButtonColor = '';
            let method = '';
            let routeURL = '';
            let msgText = '';
            if (this.action == 'new') {
                text = this.$t('confirm_save_item');
                confirmButtonColor = '#198754';
                method = 'POST';
                routeURL = 'roles.store';
                msgText = this.$t('work_saved');
                data.id = null;
            } else if (this.action == 'update') {
                text = this.$t('confirm_update_item');
                confirmButtonColor = '#198754';
                method = 'PUT';
                routeURL = 'roles.update';
                msgText = this.$t('work_updated');
            } else {
                text = this.$t('confirm_delete_item');
                confirmButtonColor = '#D81B60';
                method = 'DELETE';
                routeURL = 'roles.destroy';
                msgText = this.$t('work_deleted');
            }

            this.$swal({
                text: text,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: confirmButtonColor,
                cancelButtonText: this.$t('no') + ' <i class="bi bi-hand-thumbs-down"></i>',
                confirmButtonText: '<i class="bi bi-hand-thumbs-up"></i> ' + this.$t('yes')
            }).then((result) => {
                if (result.isConfirmed) {
                    data._method = method;
                    data._token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    data.update_type = type;
                    router.post(route(routeURL, data.id), data, {
                        onBefore: () => {
                            this.loading = true;
                        },
                        onSuccess: (response) => {
                            if (response.props.response == 'success') {
                                this.$swal({
                                    position: 'center',
                                    icon: 'success',
                                    text: msgText,
                                    showConfirmButton: false,
                                    timer: 2000
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
        checkSameModules(item, moduleName) {
            return item.module == moduleName;
        },
        handClickAll(isAllVal) {
            let currentIsAll = !isAllVal;
            if (currentIsAll === true) {
                const allNames = [...new Set(this.permissions.map((p) => p.name))];
                this.form.selectedOptions = allNames;
            } else {
                this.form.selectedOptions = [];
            }
        }
    },
    created() {
        window.addEventListener('keydown', this.escape);

        this.modules = [...new Set(this.permissions.map((p) => p.module))];
    },
    watch: {
        modalShow: function (oldVal, newVal) {
            this.error_form = {};

            if (this.permissions.length > 0 && this.form.selectedOptions.length === this.permissions.length) {
                this.form.isAll = true;
            }
        },
        'form.selectedOptions': function (oldVal, newVal) {
            if (this.permissions.length > 0 && this.form.selectedOptions.length === this.permissions.length) {
                this.form.isAll = true;
            } else {
                this.form.isAll = false;
            }
        },

    }
}

</script>
<style scoped>
.invalid-feedback {
    font-size: .775em;
}

.permission-card-wrap {
    background: #eee;
    border-radius: 4.1px;
    padding: 5px 5px 5px 5px;
    position: relative;
    border: 1px dashed #ccc;
}

.permission-card-title {
    font-weight: 500;
}
</style>
