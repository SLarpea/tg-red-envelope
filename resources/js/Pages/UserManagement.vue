<template>
    <Head title="User Management" />
    <AppLayout>

        <div class="pagetitle">
        <h1><i class="bi bi-people"></i> User Management</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item">Mine Management</li>
            <li class="breadcrumb-item">User Management</li>
            <li class="breadcrumb-item active">List of Users</li>
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
                                            <h5 class="card-title"><i class="bi bi-list-ol"></i> List of Users</h5>
                                        </div>
                                        <div class="col-lg-6">
                                            &nbsp;
                                        </div>
                                    </div>

                                    <SearchLayout :data="{ routeLink: 'tg-users.index', filters: filters }" />

                                    <table class="table table-sm table-striped table-hover">
                                        <colgroup>

                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Nickname</th>
                                                <th scope="col">Telegram ID</th>
                                                <th scope="col">Group ID</th>
                                                <th scope="col">Balance</th>
                                                <th scope="col">Is Online</th>
                                                <th scope="col" class="text-center">Status</th>
                                                <th scope="col" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in tgusers.data" :key="item.id" @dblclick.prevent="selectAction(item, 'show', null)">
                                                <td class="text-center">{{ tgusers.from + index }}</td>
                                                <td>{{ item.username }}</td>
                                                <td>{{ item.first_name }}</td>
                                                <td>{{ item.tg_id }}</td>
                                                <td>{{ item.group_id }}</td>
                                                <td>{{ item.balance }}</td>
                                                <td>{{ item.online }}</td>
                                                <td class="list-status-container text-center">
                                                    <button :class="(item.status == 1) ? 'btn btn-outline-success btn-status' : 'btn btn-outline-danger btn-status'"
                                                        @click.prevent="formAction(item, 'status')">
                                                        {{ (item.status == 1) ? 'Active' : 'Inactive' }}
                                                    </button>
                                                </td>
                                                <td class="list-action-container text-center">
                                                    <i class="bi bi-gem text-primary" v-tippy="'Top Up'" @click.prevent="selectAction(item, 'top_up', null)"></i>
                                                    <i class="bi bi-arrow-down-square text-primary" v-tippy="'Withdraw'" @click.prevent="selectAction(item, 'withdraw', null)"></i>
                                                    <i class="bi bi-eye text-info" v-tippy="'View'" @click.prevent="selectAction(item, 'show', null)"></i>
                                                    <i class="bi bi-pencil-square text-success" v-tippy="'Edit'" @click.prevent="selectAction(item, 'update', 'all')"></i>
                                                    <i class="bi bi-trash text-danger" v-tippy="'Delete'" @click.prevent="selectAction(item, 'delete', null)"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <PaginationLayout :data="{ links: tgusers.links, from: tgusers.from, to: tgusers.to, total: tgusers.total }" />

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
                                <i class="bi bi-arrow-return-right"></i> Top Up
                            </h5>
                            <button type="button" class="btn-close" @click.prevent="closeModal"></button>
                        </div>
                        <form @submit.prevent="formAction(form, 'top_up')">
                            <div class="modal-body">
                                <div class="row gx-4">
                                    <div class="col-lg-12">

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

        <transition name="modal-fade">
            <div class="modal custom-modal" v-if="topUpShow">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                <i class="bi bi-arrow-return-right"></i> Top Up
                            </h5>
                            <button type="button" class="btn-close" @click.prevent="closeModal"></button>
                        </div>
                        <form @submit.prevent="formAction(form_topUp, 'topup')">
                            <div class="modal-body">
                                <div class="row gx-4">
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            <label for="amount" class="col-sm-4 col-form-label">Amount :
                                            </label>
                                            <div class="col-sm-8">
                                                <input id="amount" name="amount" v-model="form_topUp.amount" type="text" class="form-control" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="amount" class="col-sm-4 col-form-label">Remarks :
                                            </label>
                                            <div class="col-sm-8">
                                                <input id="amount" name="amount" v-model="form_topUp.remarks" type="text" class="form-control" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="amount" class="col-sm-4 col-form-label">Send To Group Chat :
                                            </label>
                                            <div class="col-sm-8">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked>
                                                    <label class="form-check-label" for="inlineRadio1">No</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                    <label class="form-check-label" for="inlineRadio2">Yes</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" @click.prevent="closeModal">
                                    <i class="bi bi-x-circle"></i> Close
                                </button>
                                <button type="submit" class="btn btn-custom">
                                    <i class="bi bi-save2"></i> Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </transition>

        <transition name="modal-fade">
            <div class="modal custom-modal" v-if="withdrawShow">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                <i class="bi bi-arrow-return-right"></i> Withdraw
                            </h5>
                            <button type="button" class="btn-close" @click.prevent="closeModal"></button>
                        </div>
                        <form @submit.prevent="formAction(form, 'withdraw')">
                            <div class="modal-body">
                                <div class="row gx-4">
                                    <div class="col-lg-12">

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
import { Head } from '@inertiajs/vue3';
import AppLayout from '../Layouts/AppLayout.vue';
import SearchLayout from "../Layouts/SearchLayout.vue";
import PaginationLayout from "../Layouts/PaginationLayout.vue";

export default {
    data() {
        return {
            modalShow:false,
            topUpShow: false,
            withdrawShow: false,
            form: {
                username: null,
                first_name: null,
                tg_id : null,
                balance: null,
                status: 1,
                invite_user: null,
                group_id : null,
                has_thunder: null,
                pass_mine: null,
                auto_get : null,
                withdraw_addr: null,
                no_thunder: null,
                get_mine: null,
                send_chance: null,
            },
            form_topUp: {
                amount: null,
                remarks: null,
                send: null,
            },
            form_withdraw: {

            },
        };
    },
    props: {
        tgusers: Object,
        filters: Object,
        response: null,
    },
   components: {
       Head, AppLayout, SearchLayout, PaginationLayout,
   },
   methods: {
        closeModal() {
            this.modalShow = false;
            this.topUpShow = false;
            this.withdrawShow = false;
        },
        selectAction(data, action, type) {
            this.action = action;
            if (this.action == 'delete') {
                this.formAction(data, type);
            }else if(this.action == 'top_up'){
                this.form_topUp = Object.assign({}, data);
                this.topUpShow = true;
            }else if(this.action == 'withdraw'){
                this.form_withdraw = Object.assign({}, data);
                this.withdrawShow = true;
            } else {
                this.form = Object.assign({}, data);
                this.modalShow = true;
            }
        },
        formAction(data, type) {
            this.action = (type == 'status') ? 'update' : this.action;
            let text = String;
            let confirmButtonColor = String;
            let method = String;
            let routeURL = String;
            let msgText = String;
            if (this.action == 'update') {
                text = "Are you sure you want to update this item?";
                confirmButtonColor = '#198754';
                method = 'PUT';
                routeURL = 'groups.update';
                msgText = 'Work has been updated.';
            } else if (this.action == 'top_up') {
                text = "Are you sure you want to update this item?";
                confirmButtonColor = '#198754';
                method = 'POST';
                routeURL = 'groups.update';
                msgText = 'Work has been updated.';
            } else if (this.action == 'withdraw') {
                text = "Are you sure you want to update this item?";
                confirmButtonColor = '#198754';
                method = 'POST';
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
                        onError: () => {

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
