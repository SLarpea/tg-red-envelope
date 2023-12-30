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
                                            <div class="d-flex justify-content-end align-items-center action-container">
                                                <a href="/tg-users" class="btn btn-secondary btn-sm"><i class="bi bi-recycle"></i> 刷新</a>
                                            </div>
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
                                                <th scope="col" class="text-center">Is Online</th>
                                                <th scope="col" class="text-center">Status</th>
                                                <th scope="col" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, index) in tgusers.data" :key="item.id"
                                                @dblclick.prevent="selectAction(item, 'show', null)">
                                                <td class="text-center">{{ tgusers.from + index }}</td>
                                                <td>{{ item.username }}</td>
                                                <td>{{ item.first_name }}</td>
                                                <td>{{ item.tg_id }}</td>
                                                <td>{{ item.group_id }}</td>
                                                <td>{{ item.balance }}</td>
                                                <td class="text-center">{{ (item.online == 0) ? 'No' : 'Yes' }}</td>
                                                <td class="list-status-container text-center">
                                                    <button
                                                        :class="(item.status == 1) ? 'btn btn-outline-success btn-status' : 'btn btn-outline-danger btn-status'"
                                                        @click.prevent="formAction(item, 'status')">
                                                        {{ (item.status == 1) ? 'Active' : 'Inactive' }}
                                                    </button>
                                                </td>
                                                <td class="list-action-container text-center">
                                                    <i class="bi bi-gem text-primary" v-tippy="'Top Up'"
                                                        @click.prevent="selectAction(item, 'top_up', null)" v-if="$page.props.user.permissions.includes(8)"></i>
                                                    <i class="bi bi-arrow-down-square text-info" v-tippy="'Withdraw'"
                                                        @click.prevent="selectAction(item, 'withdraw', null)" v-if="$page.props.user.permissions.includes(9)"></i>
                                                    <i class="bi bi-eye text-danger" v-tippy="'View'"
                                                        @click.prevent="selectAction(item, 'show', null)"></i>
                                                    <Link href="/invitation-records" method="get" :data="{ tg_id: item.tg_id }" v-if="$page.props.user.permissions.includes(10)"><i class="bi bi-binoculars text-success" v-tippy="'Invitation Record'"></i></Link>
                                                    <Link href="/winning-records" method="get" :data="{ tg_id: item.tg_id }" v-if="$page.props.user.permissions.includes(11)"><i class="bi bi-trophy text-custom" v-tippy="'Winning Record'"></i></Link>
                                                    <Link href="/share-records" method="get" :data="{ tg_id: item.tg_id }" v-if="$page.props.user.permissions.includes(12)"><i class="bi bi-person-check text-primary" v-tippy="'Share Record'"></i></Link>
                                                    <Link href="/personal-report" method="get" :data="{ tg_id: item.tg_id }" v-if="$page.props.user.permissions.includes(13)"><i class="bi bi-bar-chart text-info" v-tippy="'Personal Report'"></i></Link>
                                                    <Link href="/funding-details" method="get" :data="{ tg_id: item.tg_id }" v-if="$page.props.user.permissions.includes(14)"><i class="bi bi-cash-stack text-danger" v-tippy="'Funding Details'"></i></Link>
                                                    <Link href="/lucky-history" method="get" :data="{ tg_id: item.tg_id }" v-if="$page.props.user.permissions.includes(15)"><i class="bi bi-list-check text-success" v-tippy="'Robbing Record'"></i></Link>
                                                    <i class="bi bi-pencil-square text-custom" v-tippy="'Edit'"
                                                        @click.prevent="selectAction(item, 'update', 'all')" v-if="$page.props.user.permissions.includes(16)"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <PaginationLayout
                                        :data="{ links: tgusers.links, from: tgusers.from, to: tgusers.to, total: tgusers.total }" />

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
                                <i class="bi bi-arrow-return-right"></i> {{ (!editMode) ? 'User' : 'Top Up' }}
                            </h5>
                            <button type="button" class="btn-close" @click.prevent="closeModal"></button>
                        </div>
                        <form @submit.prevent="formAction(form, 'update')">
                            <div class="modal-body">
                                <div class="row gx-4" v-if="editMode">
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            <label for="username" class="col-sm-5 col-form-label">Username :
                                            </label>
                                            <div class="col-sm-7">
                                                <input id="username" name="username" v-model="form.username" type="text"
                                                    class="form-control" autocomplete="off" readonly />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="first_name" class="col-sm-5 col-form-label">Nickname :
                                            </label>
                                            <div class="col-sm-7">
                                                <input id="first_name" name="first_name" v-model="form.first_name"
                                                    type="text" class="form-control" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="tg_id " class="col-sm-5 col-form-label">Telegram ID :
                                            </label>
                                            <div class="col-sm-7">
                                                <input id="tg_id " name="tg_id " v-model="form.tg_id" type="text"
                                                    class="form-control" autocomplete="off" readonly />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="balance " class="col-sm-5 col-form-label">Balance :
                                            </label>
                                            <div class="col-sm-7">
                                                <input id="balance " name="balance " v-model="form.balance" type="text"
                                                    class="form-control" autocomplete="off" readonly />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="status" class="col-sm-5 col-form-label">Status :
                                            </label>
                                            <div class="col-sm-7">
                                                <select class="form-select" aria-label="Default select example" id="status"
                                                    name="status" v-model="form.status">
                                                    <option value="1">Enable</option>
                                                    <option value="0">Disable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="invite_user " class="col-sm-5 col-form-label">Inviter :
                                            </label>
                                            <div class="col-sm-7">
                                                <input id="invite_user " name="invite_user " v-model="form.invite_user"
                                                    type="text" class="form-control" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="send_chance " class="col-sm-5 col-form-label">Probability of
                                                Outsourcing :
                                            </label>
                                            <div class="col-sm-7">
                                                <input id="send_chance " name="send_chance " v-model="form.send_chance"
                                                    type="number" class="form-control" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="amount" class="col-sm-5 col-form-label">There Must Be Thunder In The
                                                Bag :
                                            </label>
                                            <div class="col-sm-7">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="has_thunder"
                                                        id="inlineRadio1" value="0" v-model="form.has_thunder" checked>
                                                    <label class="form-check-label" for="inlineRadio1">No</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="has_thunder"
                                                        id="inlineRadio2" value="1" v-model="form.has_thunder">
                                                    <label class="form-check-label" for="inlineRadio2">Yes</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="amount" class="col-sm-5 col-form-label">Wrapped Without Thunder :
                                            </label>
                                            <div class="col-sm-7">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="no_thunder"
                                                        id="inlineRadio1" value="0" v-model="form.no_thunder" checked>
                                                    <label class="form-check-label" for="inlineRadio1">No</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="no_thunder"
                                                        id="inlineRadio2" value="1" v-model="form.no_thunder">
                                                    <label class="form-check-label" for="inlineRadio2">Yes</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="amount" class="col-sm-5 col-form-label">Robbing The Bag :
                                            </label>
                                            <div class="col-sm-7">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="pass_mine"
                                                        id="inlineRadio1" value="0" v-model="form.pass_mine" checked>
                                                    <label class="form-check-label" for="inlineRadio1">No</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="pass_mine"
                                                        id="inlineRadio2" value="1" v-model="form.pass_mine">
                                                    <label class="form-check-label" for="inlineRadio2">Yes</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="amount" class="col-sm-5 col-form-label">There Is A Priority In The
                                                Bag :
                                            </label>
                                            <div class="col-sm-7">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="get_mine"
                                                        id="inlineRadio1" value="0" v-model="form.get_mine" checked>
                                                    <label class="form-check-label" for="inlineRadio1">No</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="get_mine"
                                                        id="inlineRadio2" value="1" v-model="form.get_mine">
                                                    <label class="form-check-label" for="inlineRadio2">Yes</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="amount" class="col-sm-5 col-form-label">Automatically Grab :
                                            </label>
                                            <div class="col-sm-7">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="auto_get"
                                                        id="inlineRadio1" value="0" v-model="form.auto_get" checked>
                                                    <label class="form-check-label" for="inlineRadio1">No</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="auto_get"
                                                        id="inlineRadio2" value="1" v-model="form.auto_get">
                                                    <label class="form-check-label" for="inlineRadio2">Yes</label>
                                                </div>
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
                                                    <td>Username :</td>
                                                    <td>{{ form.username }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Nickname :</td>
                                                    <td>{{ form.first_name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Telegram ID :</td>
                                                    <td>{{ form.tg_id  }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Balance :</td>
                                                    <td>{{ form.balance }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Status :</td>
                                                    <td>{{ (form.status == 1) ? 'Active' : 'Inactive' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Probability of Outsourcing :</td>
                                                    <td>{{ form.username }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Inviter :</td>
                                                    <td>{{ form.invite_user }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Creation Time :</td>
                                                    <td>{{ form.created_at }}</td>
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
                        <form @submit.prevent="formAction(form_topUp, 'top_up')">
                            <div class="modal-body">
                                <div class="row gx-4">
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            <label for="amount" class="col-sm-4 col-form-label">Amount :
                                            </label>
                                            <div class="col-sm-8">
                                                <input id="amount" name="amount" v-model="form_topUp.amount" type="text"
                                                    class="form-control" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="remark" class="col-sm-4 col-form-label">Remarks :
                                            </label>
                                            <div class="col-sm-8">
                                                <input id="remark" name="remark" v-model="form_topUp.remark" type="text"
                                                    class="form-control" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="amount" class="col-sm-4 col-form-label">Send To Group Chat :
                                            </label>
                                            <div class="col-sm-8">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" v-model="form_topUp.is_send"
                                                        type="radio" name="inlineRadioOptions" id="inlineRadio1" value="0"
                                                        checked>
                                                    <label class="form-check-label" for="inlineRadio1">No</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" v-model="form_topUp.is_send"
                                                        type="radio" name="inlineRadioOptions" id="inlineRadio2" value="1">
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
                        <form @submit.prevent="formAction(form_withdraw, 'withdraw')">
                            <div class="modal-body">
                                <div class="row gx-4">
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            <label for="amount" class="col-sm-4 col-form-label">Number Of Cashiers :
                                            </label>
                                            <div class="col-sm-8">
                                                <input id="amount" name="amount" v-model="form_withdraw.amount" type="text"
                                                    class="form-control" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="address" class="col-sm-4 col-form-label">Refreshment Address :
                                            </label>
                                            <div class="col-sm-8">
                                                <input id="address" name="address" v-model="form_withdraw.address" type="text"
                                                    class="form-control" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="status" class="col-sm-4 col-form-label">Type Of Presentation :
                                            </label>
                                            <div class="col-sm-8">
                                                <select class="form-select" aria-label="Default select example" id="addr_type"
                                                    name="addr_type" v-model="form_withdraw.addr_type">
                                                    <option value="trc20">trc20</option>
                                                    <option value="bep20">bep20</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="amount" class="col-sm-4 col-form-label">Whether To Transfer :
                                            </label>
                                            <div class="col-sm-8">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" v-model="form_withdraw.status"
                                                        type="radio" name="inlineRadioOptionsstatus" id="inlineRadio1" value="0"
                                                        checked>
                                                    <label class="form-check-label" for="inlineRadio1">Not transferred</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" v-model="form_withdraw.status"
                                                        type="radio" name="inlineRadioOptionsstatus" id="inlineRadio2" value="1">
                                                    <label class="form-check-label" for="inlineRadio2">Transfer</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="remark" class="col-sm-4 col-form-label">Remarks :
                                            </label>
                                            <div class="col-sm-8">
                                                <input id="remark" name="remark" v-model="form_withdraw.remark" type="text"
                                                    class="form-control" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="amount" class="col-sm-4 col-form-label">Send To Group Chat :
                                            </label>
                                            <div class="col-sm-8">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" v-model="form_withdraw.is_send"
                                                        type="radio" name="inlineRadioOptions" id="inlineRadio1" value="0"
                                                        checked>
                                                    <label class="form-check-label" for="inlineRadio1">No</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" v-model="form_withdraw.is_send"
                                                        type="radio" name="inlineRadioOptions" id="inlineRadio2" value="1">
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

    </AppLayout>
</template>

<script>
import { Head, Link, router } from '@inertiajs/vue3';
import AppLayout from '../Layouts/AppLayout.vue';
import SearchLayout from "../Layouts/SearchLayout.vue";
import PaginationLayout from "../Layouts/PaginationLayout.vue";

export default {
    data() {
        return {
            modalShow: false,
            topUpShow: false,
            withdrawShow: false,
            editMode: false,
            form: {
                username: null,
                first_name: null,
                tg_id: null,
                balance: null,
                status: 1,
                invite_user: null,
                group_id: null,
                has_thunder: null,
                pass_mine: null,
                auto_get: null,
                withdraw_addr: null,
                no_thunder: null,
                get_mine: null,
                send_chance: null,
            },
            form_topUp: {
                id: null,
                amount: null,
                remarks: null,
                group_id: null,
                first_name: null,
                status: 1,
                admin_id: 1,
                type: 1,
                is_send: 1,
            },
            form_withdraw: {
                id: null,
                first_name: null,
                amount: null,
                status: 1,
                address: null,
                addr_type: 'trc20',
                group_id: null,
                remarks: null,
                admin_id: 1,
                is_send: 1,
            },
        };
    },
    props: {
        tgusers: Object,
        filters: Object,
        response: null,
    },
    components: {
        Head, Link, AppLayout, SearchLayout, PaginationLayout,
    },
    methods: {
        closeModal() {
            this.modalShow = false;
            this.topUpShow = false;
            this.withdrawShow = false;
        },
        selectAction(data, action, type) {
            this.action = action;
            if (this.action == 'top_up') {
                this.form_topUp = Object.assign(this.form_topUp, data);
                this.topUpShow = true;
            } else if (this.action == 'withdraw') {
                this.form_withdraw = Object.assign(this.form_withdraw, data);
                this.withdrawShow = true;
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
            if (this.action == 'update') {
                text = "Are you sure you want to update this item?";
                confirmButtonColor = '#198754';
                method = 'PUT';
                routeURL = 'tg-users.update';
                msgText = 'Work has been updated.';
            } else if (this.action == 'top_up') {
                text = "Are you sure you want to update this item?";
                confirmButtonColor = '#198754';
                method = 'PUT';
                routeURL = 'tg-users.top-up';
                msgText = 'Work has been updated.';
            } else if (this.action == 'withdraw') {
                text = "Are you sure you want to update this item?";
                confirmButtonColor = '#198754';
                method = 'PUT';
                routeURL = 'tg-users.withdraw';
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
                                this.topUpShow = false;
                                this.withdrawShow = false;
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
