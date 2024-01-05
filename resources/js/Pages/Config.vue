<template>
    <Head :title="$t('configs')" />
    <AppLayout>

        <div class="pagetitle">
            <h1><i class="bi bi-gear"></i> {{ $t('configs') }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">{{ $t('mine_management') }}</li>
                    <li class="breadcrumb-item">{{ $t('group_management') }}</li>
                    <li class="breadcrumb-item">{{ $t('configs') }}</li>
                    <li class="breadcrumb-item active">{{ $t('list_of_configs') }}</li>
                </ol>
            </nav>
        </div>

        <section class="section group-management">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h5 class="card-title"><i class="bi bi-list-ol"></i> {{ $t('list_of_configs') }}
                                            </h5>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex justify-content-end align-items-center action-container">
                                                <a class="btn btn-custom btn-sm" href="/groups">
                                                    <i class="bi bi-arrow-left-circle"></i> {{ $t('go_back') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <SearchLayout :data="{ routeLink: 'configs.index', filters: filters }" />
                                    <div class="table-responsive">
                                        <table class="table table-sm table-striped table-hover">
                                            <colgroup>
                                                <col width="4%">
                                                <col width="*">
                                                <col width="*">
                                                <col width="*">
                                                <col width="*">
                                                <col width="*">
                                                <col width="*">
                                                <col width="10%">
                                            </colgroup>
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-center">#</th>
                                                    <th scope="col">{{ $t('key') }}</th>
                                                    <th scope="col">{{ $t('description') }}</th>
                                                    <th scope="col">{{ $t('configuration_value') }}</th>
                                                    <th scope="col">{{ $t('group_id') }}</th>
                                                    <th scope="col">{{ $t('administrator') }}</th>
                                                    <th scope="col" class="text-center">{{ $t('update_time') }}</th>
                                                    <th scope="col" class="text-center">{{ $t('action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(item, index) in    configs.data   " :key="item.id"
                                                    @dblclick.prevent="selectAction(item, 'show', null)">
                                                    <td class="text-center">{{ configs.from + index }}</td>
                                                    <td>{{ item.name }}</td>
                                                    <td>{{ item.remark }}</td>
                                                    <td>{{ item.value }}</td>
                                                    <td>{{ item.group_id }}</td>
                                                    <td>{{ item.updated_at }}</td>
                                                    <td class="text-center">{{ new Date(item.updated_at).toLocaleString() }}
                                                    </td>
                                                    <td class="list-action-container text-center">
                                                        <i class="bi bi-eye text-info" v-tippy="$t('view')"
                                                            @click.prevent="selectAction(item, 'show', null)"></i>
                                                        <i class="bi bi-pencil-square text-success" v-tippy="$t('edit')"
                                                            @click.prevent="selectAction(item, 'update', 'all')"></i>
                                                        <!-- <i class="bi bi-trash text-danger" v-tippy="'{{ $t('delete') }}'"
                                                    @click.prevent="selectAction(item, 'delete', null)"></i> -->
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <PaginationLayout
                                        :data="{ links: configs.links, from: configs.from, to: configs.to, total: configs.total }" />

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
                                <i class="bi bi-arrow-return-right"></i> {{ $t('configuration') }}
                            </h5>
                            <button type="button" class="btn-close" @click.prevent="closeModal"></button>
                        </div>
                        <form @submit.prevent="formAction(form, 'all')">
                            <div class="modal-body">
                                <div class="row gx-4" v-if="editMode">
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            <label for="name" class="col-sm-4 col-form-label">{{ $t('key') }} :</label>
                                            <div class="col-sm-8">
                                                <input id="name" name="name" v-model="form.name" type="text"
                                                    :class="`form-control ${error_form.name ? 'is-invalid' : ''}`"
                                                    autocomplete="off" readonly />
                                                <div class="invalid-feedback" v-if="error_form.name">
                                                    {{ error_form.name }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="remark" class="col-sm-4 col-form-label">{{ $t('description') }}
                                                :</label>
                                            <div class="col-sm-8">
                                                <input id="remark" name="remark" v-model="form.remark" type="text"
                                                    class="form-control" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="value" class="col-sm-4 col-form-label">{{ $t('configuration_value')
                                            }} :</label>
                                            <div class="col-sm-8">
                                                <input id="value" name="value" v-model="form.value" type="text"
                                                :class="`form-control ${error_form.value ? 'is-invalid' : ''}`"
                                                    autocomplete="off" />
                                                <div class="invalid-feedback" v-if="error_form.value">
                                                    {{ error_form.value }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="group_id" class="col-sm-4 col-form-label">{{ $t('group_id') }}
                                                :</label>
                                            <div class="col-sm-8">
                                                <input id="group_id" name="group_id" v-model="form.group_id" type="text"
                                                    class="form-control" autocomplete="off" readonly />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gx-4" v-if="!editMode">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered no-margin">
                                            <colgroup>
                                                <col width="260">
                                                <col width="*">
                                            </colgroup>
                                            <tbody>
                                                <tr>
                                                    <td>{{ $t('key') }} :</td>
                                                    <td>{{ form.name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $t('description') }} :</td>
                                                    <td>{{ form.remark }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $t('configuration_value') }} :</td>
                                                    <td>{{ form.value }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $t('group_id') }} :</td>
                                                    <td>{{ form.group_id }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
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


    </AppLayout>
</template>

<script>
import { Head, Link, router } from '@inertiajs/vue3';
import AppLayout from '../Layouts/AppLayout.vue';
import SearchLayout from "../Layouts/SearchLayout.vue";
import PaginationLayout from "../Layouts/PaginationLayout.vue";
import toastr from 'toastr';

export default {
    data() {
        return {
            modalShow: false,
            editMode: false,
            action: 'new',
            editMode: false,
            form: {
                name: null,
                value: null,
                group_id: null,
                admin_id: null,
                remark: null,
            },
            error_form: {}
        };
    },
    props: {
        configs: Object,
        filters: Object,
        response: null,
    },

    components: {
        Head, Link, AppLayout, SearchLayout, PaginationLayout,
    },
    methods: {
        closeModal() {
            this.modalShow = false;
        },
        resetForm() {
            this.editMode = true;
            this.modalShow = !this.modalShow;
            this.action = 'new';
            this.form = {
                name: null,
                value: null,
                group_id: null,
                admin_id: null,
                remark: null,
            }
        },
        selectAction(data, action, type) {
            this.action = action;
            if (this.action == 'delete') {
                this.formAction(data, type);
            } else if (this.action == 'show') {
                this.form = Object.assign({}, data);
                this.modalShow = true;
                this.editMode = false;
            } else {
                this.form = Object.assign({}, data);
                this.modalShow = true;
                this.editMode = true;
            }
        },
        formAction(data, type) {
            this.action = (type == 'status') ? 'update' : this.action;
            let text = String;
            let confirmButtonColor = String;
            let method = String;
            let routeURL = String;
            let msgText = String;
            if (this.action == 'new') {
                text = "Are you sure you want to save this item?";
                confirmButtonColor = '#198754';
                method = 'POST';
                routeURL = 'configs.store';
                msgText = 'Work has been saved.';
                data.id = null;
            } else if (this.action == 'update') {
                text = "Are you sure you want to update this item?";
                confirmButtonColor = '#198754';
                method = 'PUT';
                routeURL = 'configs.update';
                msgText = 'Work has been updated.';
            }

            this.$swal({
                text: text,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: confirmButtonColor,
                cancelButtonText: 'No <i class="bi bi-hand-thumbs-down"></i>',
                confirmButtonText: '<i class="bi bi-hand-thumbs-up"></i> Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    data._method = method;
                    data._token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    data.update_type = type;
                    router.post(route(routeURL, data.id), data, {
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
            })

        },
        escape(event) {
            if (event.keyCode === 27) {
                this.modalShow = false;
            }
        },

    },
    created() {
        window.addEventListener('keydown', this.escape);
    },
    watch: {
        modalShow: function (oldVal, newVal) {
            this.error_form = {};
        }
    }

}

</script>
<style scoped>
.invalid-feedback {
    font-size: .775em;
}
</style>
