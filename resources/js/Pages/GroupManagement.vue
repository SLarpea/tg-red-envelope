<template>
    <Head title="Group Management" />
    <AppLayout>

        <div class="pagetitle">
            <h1><i class="bi bi-diagram-3"></i> Group Management</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Mine Management</li>
                    <li class="breadcrumb-item">Group Management</li>
                    <li class="breadcrumb-item active">List of Groups</li>
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
                                            <h5 class="card-title"><i class="bi bi-list-ol"></i> List of Groups</h5>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex justify-content-end align-items-center action-container">
                                                <a href="/groups" class="btn btn-secondary btn-sm"><i class="bi bi-recycle"></i> 刷新</a>
                                                <button class="btn btn-custom btn-sm" type="button" @click.prevent="resetForm">
                                                    <i class="bi bi-plus-circle"></i> New Group
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
                                                    <th scope="col">Group ID</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Remarks</th>
                                                    <th scope="col">Customer Service Link</th>
                                                    <th scope="col">Recharge Link</th>
                                                    <th scope="col">Channel Link</th>
                                                    <th scope="col">Red Envelope ID</th>
                                                    <th scope="col" class="text-center">Update Time</th>
                                                    <th scope="col" class="text-center">Status</th>
                                                    <th scope="col" class="text-center">Action</th>
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
                                                        <a :href="item.service_url" v-tippy="item.service_url" target="_blank"
                                                            class="btn btn-outline-primary btn-sm">Link</a>
                                                    </td>
                                                    <td class="text-center recharge_url">
                                                        <a :href="item.recharge_url" v-tippy="item.recharge_url" target="_blank"
                                                            class="btn btn-outline-primary btn-sm">Link</a>
                                                    </td>
                                                    <td class="text-center channel_url">
                                                        <a :href="item.channel_url" v-tippy="item.channel_url" target="_blank"
                                                            class="btn btn-outline-primary btn-sm">Link</a>
                                                    </td>
                                                    <td class="text-center photo_id">
                                                        <a :href="item.photo_id" v-tippy="item.photo_id"
                                                            class="btn btn-outline-primary btn-sm">Link</a>
                                                    </td>
                                                    <td class="text-center">{{ new Date(item.updated_at).toLocaleString() }}
                                                    </td>
                                                    <td class="list-status-container text-center">
                                                        <button
                                                            :class="(item.status == 1) ? 'btn btn-outline-success btn-status' : 'btn btn-outline-danger btn-status'"
                                                            @click.prevent="formAction(item, 'status')">
                                                            {{ (item.status == 1) ? 'Active' : 'Inactive' }}
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
                                <i class="bi bi-arrow-return-right"></i> Group
                            </h5>
                            <button type="button" class="btn-close" @click.prevent="closeModal"></button>
                        </div>
                        <form @submit.prevent="formAction(form, 'all')">
                            <div class="modal-body">
                                <div class="row gx-4" v-if="editMode">
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            <label for="group_id" class="col-sm-4 col-form-label">Group ID :
                                            </label>
                                            <div class="col-sm-8">
                                                <input id="group_id" name="group_id" v-model="form.group_id" type="text"
                                                    class="form-control" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="name" class="col-sm-4 col-form-label">Name :
                                            </label>
                                            <div class="col-sm-8">
                                                <input id="name" name="name" v-model="form.name" type="text"
                                                    class="form-control" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="remark" class="col-sm-4 col-form-label">Remarks :
                                            </label>
                                            <div class="col-sm-8">
                                                <input id="remark" name="remark" v-model="form.remark" type="text"
                                                    class="form-control" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="service_url" class="col-sm-4 col-form-label">Customer Service Link :
                                            </label>
                                            <div class="col-sm-8">
                                                <input id="service_url" name="service_url" v-model="form.service_url"
                                                    type="text" class="form-control" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="recharge_url" class="col-sm-4 col-form-label">Fill-Up Link :
                                            </label>
                                            <div class="col-sm-8">
                                                <input id="recharge_url" name="recharge_url" v-model="form.recharge_url"
                                                    type="text" class="form-control" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="channel_url" class="col-sm-4 col-form-label">Channel Link :
                                            </label>
                                            <div class="col-sm-8">
                                                <input id="channel_url" name="channel_url" v-model="form.channel_url"
                                                    type="text" class="form-control" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="photo_id" class="col-sm-4 col-form-label">Red Envelope Image ID :
                                            </label>
                                            <div class="col-sm-8">
                                                <input id="photo_id" name="photo_id" v-model="form.photo_id" type="text"
                                                    class="form-control" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="status" class="col-sm-4 col-form-label">Status :
                                            </label>
                                            <div class="col-sm-8">
                                                <select class="form-select" aria-label="Default select example" id="status"
                                                    name="status" v-model="form.status">
                                                    <option value="1">Enable</option>
                                                    <option value="0">Disable</option>
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
                                                    <td>Group ID :</td>
                                                    <td>{{ form.group_id }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Name  :</td>
                                                    <td>{{ form.name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Remarks  :</td>
                                                    <td>{{ form.remark }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Customer Service Link :</td>
                                                    <td>{{ form.service_url  }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Fill-Up Link :</td>
                                                    <td>{{ form.recharge_url }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Channel Link :</td>
                                                    <td>{{ form.channel_url }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Red Envelope Image ID :</td>
                                                    <td>{{ form.photo_id }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Status :</td>
                                                    <td>{{ (form.status == 1) ? 'Active' : 'Inactive' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" @click.prevent="closeModal">
                                    <i class="bi bi-x-circle"></i> Close
                                </button>
                                <template v-if="action !== 'show'">
                                    <button type="submit" class="btn btn-custom" v-if="action === 'new'">
                                        <i class="bi bi-save2"></i> Save
                                    </button>
                                    <button type="submit" class="btn btn-custom" v-if="action === 'update'">
                                        <i class="bi bi-save2"></i> Update
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
            form: {
                group_id: null,
                name: null,
                remark: null,
                service_url: null,
                recharge_url: null,
                channel_url: null,
                photo_id: null,
                admin_id: 1,
                status: 1,
            },
        };
    },
    props: {
        groups: Object,
        filters: Object,
        response: null,
        errors: Object,
    },

    components: {
        Head, Link, AppLayout, SearchLayout, PaginationLayout,
    },
    methods: {
        closeModal() {
            this.modalShow = false;
        },
        resetForm() {
            console.log(document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
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
                admin_id: 1,
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
                routeURL = 'groups.store';
                msgText = 'Work has been saved.';
                data.id = null;
            } else if (this.action == 'update') {
                text = "Are you sure you want to update this item?";
                confirmButtonColor = '#198754';
                method = 'PUT';
                routeURL = 'groups.update';
                msgText = 'Work has been updated.';
            } else {
                text = "Are you sure you want to delete this item?";
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
                cancelButtonText: 'No <i class="bi bi-hand-thumbs-down"></i>',
                confirmButtonText: '<i class="bi bi-hand-thumbs-up"></i> Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    data._method = method;
                    data._token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    data.update_type = type;
                    data.is_update = (this.action == 'update') ? true : false;
                    console.log(data);
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

}

</script>


<style scoped>
td.service_url a,
td.recharge_url a,
td.channel_url a,
td.photo_id a {
    font-size: 0.6rem;
}
</style>
