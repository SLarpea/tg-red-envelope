<template>
    <Head :title="$t('group_management')" />
    <AppLayout>

        <div class="pagetitle">
            <h1><i class="bi bi-diagram-3"></i> {{ $t('group_management') }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">{{ $t('mine_management') }}</li>
                    <li class="breadcrumb-item">{{ $t('group_management') }}</li>
                    <li class="breadcrumb-item active">{{ $t('list_of_groups') }}</li>
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
                                            <h5 class="card-title"><i class="bi bi-list-ol"></i> {{ $t('list_of_groups') }}</h5>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex justify-content-end align-items-center action-container">
                                                <a href="/groups" class="btn btn-secondary btn-sm"><i
                                                        class="bi bi-recycle"></i> {{ $t('refresh') }}</a>
                                                <button class="btn btn-custom btn-sm" type="button"
                                                    @click.prevent="resetForm">
                                                    <i class="bi bi-plus-circle"></i> {{ $t('new_group') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <SearchLayout :data="{ routeLink: 'groups.index', filters: filters }" />
                                    <div class="table-responsive">
                                        <table class="table table-sm table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="text-center">#</th>
                                                    <th scope="col">{{ $t('group_id') }}</th>
                                                    <th scope="col">{{ $t('name') }}</th>
                                                    <th scope="col">{{ $t('remarks') }}</th>
                                                    <th scope="col" class="text-center">{{ $t('customer_service_link') }}</th>
                                                    <th scope="col" class="text-center">{{ $t('recharge_link') }}</th>
                                                    <th scope="col" class="text-center">{{ $t('channel_link') }}</th>
                                                    <th scope="col" class="text-center">{{ $t('red_envelope_id') }}</th>
                                                    <th scope="col" class="text-center">{{ $t('update_time') }}</th>
                                                    <th scope="col" class="text-center">{{ $t('status') }}</th>
                                                    <th scope="col" class="text-center">{{ $t('action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(item, index) in groups.data" :key="item.id"
                                                    @dblclick.prevent="selectAction(item, 'show', null)">
                                                    <td class="text-center">{{ groups.from + index }}</td>
                                                    <td>{{ item.group_id }}</td>
                                                    <td>{{ item.name }}</td>
                                                    <td>{{ item.remark }}</td>
                                                    <td class="text-center service_url">
                                                        <a :href="item.service_url" v-tippy="item.service_url"
                                                            target="_blank" class="btn btn-outline-primary btn-sm">{{ $t('customer_service_link_label') }}</a>
                                                    </td>
                                                    <td class="text-center recharge_url">
                                                        <a :href="item.recharge_url" v-tippy="item.recharge_url"
                                                            target="_blank" class="btn btn-outline-primary btn-sm">{{ $t('recharge_link_label') }}</a>
                                                    </td>
                                                    <td class="text-center channel_url">
                                                        <a :href="item.channel_url" v-tippy="item.channel_url"
                                                            target="_blank" class="btn btn-outline-primary btn-sm">{{ $t('channel_link_label') }}</a>
                                                    </td>
                                                    <td class="text-center photo_id">
                                                        <button v-tippy="item.photo_id" @click.prevent="showImage(item.photo_id)"
                                                            class="btn btn-outline-primary btn-sm">{{ $t('red_envelope_id_label') }}</button>
                                                    </td>
                                                    <td class="text-center">{{ new Date(item.updated_at).toLocaleString() }}
                                                    </td>
                                                    <td class="list-status-container text-center">
                                                        <button
                                                            :class="(item.status == 1) ? 'btn btn-outline-success btn-status' : 'btn btn-outline-danger btn-status'"
                                                            @click.prevent="formAction(item, 'status')">
                                                            {{ (item.status == 1) ? $t('active') : $t('inactive') }}
                                                        </button>
                                                    </td>
                                                    <td class="list-action-container text-center">
                                                        <Link href="/configs" method="get"
                                                            :data="{ group_id: item.group_id }" preserve-state><i
                                                            class="bi bi-gear text-primary" v-tippy="'Configuration'"></i>
                                                        </Link>
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
                                    </div>
                                    <PaginationLayout
                                        :data="{ links: groups.links, from: groups.from, to: groups.to, total: groups.total }" />
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
                                <i class="bi bi-arrow-return-right"></i> {{ $t('group') }}
                            </h5>
                            <button type="button" class="btn-close" @click.prevent="closeModal"></button>
                        </div>
                        <form @submit.prevent="formAction(form, 'all')">
                            <div class="modal-body">
                                <div class="row gx-4" v-if="editMode">
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            <label for="group_id" class="col-sm-4 col-form-label">{{ $t('group_id') }} :
                                            </label>
                                            <div class="col-sm-8">
                                                <input id="group_id" name="group_id" v-model="form.group_id" type="text"
                                                    :class="`form-control ${error_form.group_id ? 'is-invalid' : ''}`"
                                                    autocomplete="off" />
                                                <div class="invalid-feedback" v-if="error_form.group_id">
                                                    {{ error_form.group_id }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="name" class="col-sm-4 col-form-label">{{ $t('name') }} :
                                            </label>
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
                                            <label for="remark" class="col-sm-4 col-form-label">{{ $t('remarks') }}
                                            </label>
                                            <div class="col-sm-8">
                                                <input id="remark" name="remark" v-model="form.remark" type="text"
                                                    :class="`form-control ${error_form.remark ? 'is-invalid' : ''}`"
                                                    autocomplete="off" />
                                                <div class="invalid-feedback" v-if="error_form.remark">
                                                    {{ error_form.remark }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="service_url" class="col-sm-4 col-form-label">{{ $t('customer_service_link_label') }}
                                            </label>
                                            <div class="col-sm-8">
                                                <input id="service_url" name="service_url" v-model="form.service_url"
                                                    type="text"
                                                    :class="`form-control ${error_form.service_url ? 'is-invalid' : ''}`"
                                                    autocomplete="off" />
                                                <div class="invalid-feedback" v-if="error_form.service_url">
                                                    {{ error_form.service_url }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="recharge_url" class="col-sm-4 col-form-label">{{ $t('fill_up_link') }}
                                            </label>
                                            <div class="col-sm-8">
                                                <input id="recharge_url" name="recharge_url" v-model="form.recharge_url"
                                                    type="text"
                                                    :class="`form-control ${error_form.recharge_url ? 'is-invalid' : ''}`"
                                                    autocomplete="off" />
                                                <div class="invalid-feedback" v-if="error_form.recharge_url">
                                                    {{ error_form.recharge_url }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="channel_url" class="col-sm-4 col-form-label">{{ $t('channel_link') }}
                                            </label>
                                            <div class="col-sm-8">
                                                <input id="channel_url" name="channel_url" v-model="form.channel_url"
                                                    type="text"
                                                    :class="`form-control ${error_form.channel_url ? 'is-invalid' : ''}`"
                                                    autocomplete="off" />
                                                <div class="invalid-feedback" v-if="error_form.channel_url">
                                                    {{ error_form.channel_url }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="photo_id" class="col-sm-4 col-form-label">{{ $t('red_envelope_image_id') }}
                                            </label>
                                            <div class="col-sm-8">
                                                <input id="photo_id" name="photo_id" v-model="form.photo_id" type="text"
                                                    :class="`form-control ${error_form.photo_id ? 'is-invalid' : ''}`"
                                                    autocomplete="off" />
                                                <div class="invalid-feedback" v-if="error_form.photo_id">
                                                    {{ error_form.photo_id }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="status" class="col-sm-4 col-form-label">{{ $t('status') }}
                                            </label>
                                            <div class="col-sm-8">
                                                <select class="form-select" aria-label="Default select example" id="status"
                                                    name="status" v-model="form.status">
                                                    <option value="1">{{ $t('enable') }}</option>
                                                    <option value="0">{{ $t('disable') }}</option>
                                                </select>
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
                                                    <td>{{ $t('group_id') }} :</td>
                                                    <td>{{ form.group_id }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $t('name') }} :</td>
                                                    <td>{{ form.name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $t('remarks') }} :</td>
                                                    <td>{{ form.remark }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $t('customer_service_link') }} :</td>
                                                    <td>{{ form.service_url }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $t('recharge_link') }} :</td>
                                                    <td>{{ form.recharge_url }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $t('channel_link') }} :</td>
                                                    <td>{{ form.channel_url }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $t('red_envelope_id') }} :</td>
                                                    <td>{{ form.photo_id }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ $t('status') }} :</td>
                                                    <td>{{ (form.status == 1) ? $t('active') : $t('inactive') }}</td>
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

        <transition name="modal-fade">
            <div class="modal custom-modal" v-if="imageShow">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                <i class="bi bi-arrow-return-right"></i> {{ $t('group') }}
                            </h5>
                            <button type="button" class="btn-close" @click.prevent="closeModal"></button>
                        </div>
                        <div class="modal-body">
                            <img :src="image_url" alt="" class="img-fluid">
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

    </AppLayout>
</template>

<script>
import { Head, Link, router } from '@inertiajs/vue3';
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
            imageShow: false,
            editMode: false,
            action: 'new',
            image_url: null,
            form: {
                group_id: null,
                name: null,
                remark: null,
                service_url: null,
                recharge_url: null,
                channel_url: null,
                photo_id: null,
                admin_id: this.$page.props.auth.user.id,
                status: 1,
            },
            error_form: {}
        };
    },
    props: {
        groups: Object,
        filters: Object,
        response: null,
        errors: Object,
    },

    components: {
        Head, Link, AppLayout, SearchLayout, PaginationLayout, LoadingLayout,
    },
    methods: {
        closeModal() {
            this.modalShow = false;
            this.imageShow = false;
        },
        showImage(image) {
            this.imageShow = true;
            this.image_url = image;
        },
        resetForm() {
            this.modalShow = !this.modalShow;
            this.action = 'new';
            this.editMode = true;
            this.form = {
                group_id: null,
                name: null,
                remark: null,
                service_url: null,
                recharge_url: null,
                channel_url: null,
                photo_id: null,
                admin_id: this.$page.props.auth.user.id,
                status: 1,
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
            this.error_form = {};
            this.action = (type == 'status') ? 'update' : this.action;
            let text = String;
            let confirmButtonColor = String;
            let method = String;
            let routeURL = String;
            let msgText = String;
            if (this.action == 'new') {
                text = this.$t('confirm_save_item');
                confirmButtonColor = '#198754';
                method = 'POST';
                routeURL = 'groups.store';
                msgText = 'Work has been saved.';
                data.id = null;
            } else if (this.action == 'update') {
                text = this.$t('confirm_update_item');
                confirmButtonColor = '#198754';
                method = 'PUT';
                routeURL = 'groups.update';
                msgText = 'Work has been updated.';
            } else {
                text = this.$t('confirm_delete_item');
                confirmButtonColor = '#D81B60';
                method = 'DELETE';
                routeURL = 'groups.destroy';
                msgText = 'Work has been deleted.';
            }

            this.$swal({
                text: text,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: confirmButtonColor,
                cancelButtonText: this.$t('no')+' <i class="bi bi-hand-thumbs-down"></i>',
                confirmButtonText: '<i class="bi bi-hand-thumbs-up"></i> '+this.$t('yes')
            }).then((result) => {
                if (result.isConfirmed) {
                    data._method = method;
                    data._token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    data.update_type = type;
                    data.is_update = (this.action == 'update') ? true : false;
                    console.log(data);
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
                                console.log(this.error_form, "this.error_form");
                                Object.entries(error).forEach(([field, message]) => {
                                    toastr.error(`${message}`);
                                });
                            } catch (err) {
                                toastr.error(`'An unexpected error occurred.'`);
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
td.service_url a,
td.recharge_url a,
td.channel_url a,
td.photo_id a {
    font-size: 0.6rem;
}

.invalid-feedback {
    font-size: .775em;
}
</style>
