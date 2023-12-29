<template>
    <Head title="User Management" />
    <AppLayout>
        <div class="pagetitle">
            <h1><i class="bi bi-people"></i> Administrator</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">System</li>
                    <li class="breadcrumb-item">Administrator</li>
                    <li class="breadcrumb-item active">List of Administrator</li>
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
                                                List of Administrator
                                            </h5>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex justify-content-end align-items-center action-container">
                                                <a href="/administrator" class="btn btn-secondary btn-sm"><i class="bi bi-recycle"></i> 刷新</a>
                                                <button class="btn btn-custom btn-sm" type="button" @click.prevent="resetForm">
                                                    <i class="bi bi-plus-circle"></i>
                                                    New Administrator
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
                                                <th scope="col">Name</th>
                                                <th scope="col">Email Address</th>
                                                <th scope="col" class="text-center">Status</th>
                                                <th scope="col" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in administrator.data" :key="item.id"
                                                @dblclick.prevent="selectAction(item, 'show', null)">
                                                <td class="text-center">
                                                    {{ administrator.from + index }}
                                                </td>
                                                <td>{{ item.name }}</td>
                                                <td>{{ item.email }}</td>
                                                <td class="list-status-container text-center">
                                                    <button :class="item.status == 1
                                                            ? 'btn btn-outline-success btn-status'
                                                            : 'btn btn-outline-danger btn-status'
                                                        " @click.prevent="formAction(item, 'status')">
                                                        {{ item.status == 1 ? "Active" : "Inactive" }}
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

                                    <PaginationLayout :data="{
                                        links: administrator.links,
                                        from: administrator.from,
                                        to: administrator.to,
                                        total: administrator.total,
                                    }" />
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
                                {{ !editMode ? "New Administrator" : "Update Administrator" }}
                            </h5>
                            <button type="button" class="btn-close" @click.prevent="closeModal"></button>
                        </div>
                        <form @submit.prevent="formAction(form, 'all')">
                            <div class="modal-body">
                                <div class="row gx-4">
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            <label for="name" class="col-sm-4 col-form-label">Name :
                                            </label>
                                            <div class="col-sm-8">
                                                <input id="name" name="name" v-model="form.name" type="text"
                                                    class="form-control" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="email " class="col-sm-4 col-form-label">Email Address :
                                            </label>
                                            <div class="col-sm-8">
                                                <input id="email " name="email " v-model="form.email" type="text"
                                                    class="form-control" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="password" class="col-sm-4 col-form-label">Password :
                                            </label>
                                            <div class="col-sm-8">
                                                <input id="password" name="password" v-model="form.password" type="password"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="password_confirmation" class="col-sm-4 col-form-label">Confirm
                                                Password :
                                            </label>
                                            <div class="col-sm-8">
                                                <input id="password_confirmation" name="password_confirmation"
                                                    v-model="form.password_confirmation" type="password"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="status" class="col-sm-4 col-form-label">Role :
                                            </label>
                                            <div class="col-sm-8">
                                                <select class="form-select" aria-label="Default select example" id="role"
                                                    name="role" v-model="form.role">
                                                    <option v-for="item in roles" :key="item.id" :value="item.name">{{ item.name }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="status" class="col-sm-4 col-form-label">Status :
                                            </label>
                                            <div class="col-sm-8">
                                                <select class="form-select" aria-label="Default select example" id="status"
                                                    name="status" v-model="form.status">
                                                    <option selected>Select Status</option>
                                                    <option value="1">Enable</option>
                                                    <option value="0">Disable</option>
                                                </select>
                                            </div>
                                        </div>
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
import { Head, router } from "@inertiajs/vue3";
import AppLayout from "../Layouts/AppLayout.vue";
import SearchLayout from "../Layouts/SearchLayout.vue";
import PaginationLayout from "../Layouts/PaginationLayout.vue";

export default {
    data() {
        return {
            modalShow: false,
            form: {
                name: null,
                email: null,
                password: "Password123!@#",
                password_confirmation: null,
                role: null,
                status: 1,
            },
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
        },
        selectAction(data, action, type) {
            this.action = action;
            if (this.action == "delete") {
                this.formAction(data, type);
            } else {
                this.form = Object.assign({}, data);
                this.modalShow = true;
            }
        },
        formAction(data, type) {
            this.action = type == "status" ? "update" : this.action;
            let text = String;
            let confirmButtonColor = String;
            let method = String;
            let routeURL = String;
            let msgText = String;
            if (this.action == "new") {
                text = "Are you sure you want to save this item?";
                confirmButtonColor = "#198754";
                method = "POST";
                routeURL = "administrator.store";
                msgText = "Work has been saved.";
                data.id = null;
            } else if (this.action == "update") {
                text = "Are you sure you want to update this item?";
                confirmButtonColor = "#198754";
                method = "PUT";
                routeURL = "administrator.update";
                msgText = "Work has been updated.";
            } else {
                text = "Are you sure you want to delete this item?";
                confirmButtonColor = "#D81B60";
                method = "DELETE";
                routeURL = "administrator.destroy";
                msgText = "Work has been deleted.";
            }

            this.$swal({
                text: text,
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: confirmButtonColor,
                cancelButtonText: 'No <i class="bi bi-hand-thumbs-down"></i>',
                confirmButtonText: '<i class="bi bi-hand-thumbs-up"></i> Yes',
            }).then((result) => {
                if (result.isConfirmed) {
                    data._method = method;
                    data._token = document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content");
                    data.update_type = type;
                    router.post(route(routeURL, data.id), data, {
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
                        onError: () => { },
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
};
</script>
