<template>
    <Head :title="$t('user_management')" />
    <AppLayout>

        <div class="pagetitle">
            <h1><i class="bi bi-people"></i> {{ $t('user_management') }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">{{ $t('mine_management') }}</li>
                    <li class="breadcrumb-item">{{ $t('user_management') }}</li>
                    <li class="breadcrumb-item active">{{ $t('list_of_users') }}</li>
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
                                            <h5 class="card-title"><i class="bi bi-list-ol"></i> {{ $t('list_of_users') }}
                                            </h5>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex justify-content-end align-items-center action-container">
                                                <a href="/tg-users" class="btn btn-secondary btn-sm"><i
                                                        class="bi bi-recycle"></i> {{ $t('refresh') }}</a>
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
                                                <th scope="col">{{ $t('username') }}</th>
                                                <th scope="col">{{ $t('nickname') }}</th>
                                                <th scope="col">{{ $t('telegram_id') }}</th>
                                                <th scope="col">{{ $t('group_id') }}</th>
                                                <th scope="col">{{ $t('balance') }}</th>
                                                <th scope="col" class="text-center">{{ $t('is_online') }}</th>
                                                <th scope="col" class="text-center">{{ $t('status') }}</th>
                                                <th scope="col" class="text-center">{{ $t('action') }}</th>
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
                                                <td class="td-btn-is-online-container text-center">
                                                    <button
                                                        :class="(item.online == 1) ? 'btn btn-outline-success btn-status' : 'btn btn-outline-danger btn-status'">
                                                        {{ (item.online == 0) ? $t('no') : $t('yes') }}
                                                    </button>
                                                </td>
                                                <td class="list-status-container text-center">
                                                    <button
                                                        :class="(item.status == 1) ? 'btn btn-outline-success btn-status' : 'btn btn-outline-danger btn-status'"
                                                        @click.prevent="formAction(item, 'status')">
                                                        {{ (item.status == 1) ? $t('active') : $t('inactive') }}
                                                    </button>
                                                </td>
                                                <td class="list-action-container text-center">
                                                    <i class="bi bi-gem text-primary" v-tippy="$t('top_up')"
                                                        @click.prevent="selectAction(item, 'top_up', null)"
                                                        v-if="$page.props.user.permissions.includes('top_up_user_management')"></i>
                                                    <i class="bi bi-arrow-down-square text-info" v-tippy="$t('withdraw')"
                                                        @click.prevent="selectAction(item, 'withdraw', null)"
                                                        v-if="$page.props.user.permissions.includes('withdraw_user_management')"></i>
                                                    <i class="bi bi-eye text-danger" v-tippy="$t('view')"
                                                        v-if="$page.props.user.permissions.includes('view_user_management')"
                                                        @click.prevent="selectAction(item, 'show', null)"></i>
                                                    <Link href="/invitation-records" method="get"
                                                        :data="{ tg_id: item.tg_id }"
                                                        v-if="$page.props.user.permissions.includes('view_invitation_record_user_management')"><i
                                                        class="bi bi-binoculars text-success"
                                                        v-tippy="$t('invitation_record')"></i></Link>
                                                    <Link href="/winning-records" method="get" :data="{ tg_id: item.tg_id }"
                                                        v-if="$page.props.user.permissions.includes('view_winning_record_user_management')"><i
                                                        class="bi bi-trophy text-custom" v-tippy="$t('winning_record')"></i>
                                                    </Link>
                                                    <Link href="/share-records" method="get" :data="{ tg_id: item.tg_id }"
                                                        v-if="$page.props.user.permissions.includes('view_share_record_user_management')"><i
                                                        class="bi bi-person-check text-primary"
                                                        v-tippy="$t('share_record')"></i></Link>
                                                    <Link href="/personal-report" method="get" :data="{ tg_id: item.tg_id }"
                                                        v-if="$page.props.user.permissions.includes('view_personal_report_user_management')"><i
                                                        class="bi bi-bar-chart text-info"
                                                        v-tippy="$t('personal_report')"></i>
                                                    </Link>
                                                    <Link href="/funding-details" method="get" :data="{ tg_id: item.tg_id }"
                                                        v-if="$page.props.user.permissions.includes('view_funding_details_user_management')"><i
                                                        class="bi bi-cash-stack text-danger"
                                                        v-tippy="$t('funding_details')"></i></Link>
                                                    <Link href="/lucky-history" method="get" :data="{ tg_id: item.tg_id }"
                                                        v-if="$page.props.user.permissions.includes('view_lucky_history_user_management')"><i
                                                        class="bi bi-list-check text-success"
                                                        v-tippy="$t('robbing_record')"></i></Link>
                                                    <i class="bi bi-pencil-square text-custom" v-tippy="$t('edit')"
                                                        @click.prevent="selectAction(item, 'update', 'all')"
                                                        v-if="$page.props.user.permissions.includes('edit_user_management')"></i>
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
                                <i class="bi bi-arrow-return-right"></i> {{ (!editMode) ? $t('user') : $t('top_up') }}
                            </h5>
                            <button type="button" class="btn-close" @click.prevent="closeModal"></button>
                        </div>
                        <form @submit.prevent="formAction(form, 'update')">
                            <div class="modal-body">
                                <div class="row gx-4" v-if="editMode">
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            <label for="username" class="col-sm-5 col-form-label">{{ $t('username') }}
                                                :</label>
                                            <div class="col-sm-7">
                                                <input id="username" name="username" v-model="form.username" type="text"
                                                    class="form-control" autocomplete="off" readonly />
                                            </div>
                                        </div>
                                        <!-- ... (similar translation for other form fields) ... -->
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
                                                    <td>{{ $t('username') }} :</td>
                                                    <td>{{ form.username }}</td>
                                                </tr>
                                                <!-- ... (similar translation for other form fields) ... -->
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
            <div class="modal custom-modal" v-if="topUpShow">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                <i class="bi bi-arrow-return-right"></i> {{ $t('top_up') }}
                            </h5>
                            <button type="button" class="btn-close" @click.prevent="closeModal"></button>
                        </div>
                        <form @submit.prevent="formAction(form_topUp, 'top_up')">
                            <div class="modal-body">
                                <div class="row gx-4">
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            <label for="amount" class="col-sm-4 col-form-label">{{ $t('amount') }} :</label>
                                            <div class="col-sm-8">
                                                <input id="amount" name="amount" v-model="form_topUp.amount" type="text"
                                                    :class="`form-control ${error_form_topUp.amount ? 'is-invalid' : ''}`"
                                                    autocomplete="off" />
                                                <div class="invalid-feedback" v-if="error_form_topUp.amount">
                                                    {{ error_form_topUp.amount }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="remark" class="col-sm-4 col-form-label">{{ $t('remarks') }}
                                                :</label>
                                            <div class="col-sm-8">
                                                <input id="remark" name="remark" v-model="form_topUp.remark" type="text"
                                                    class="form-control" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="amount" class="col-sm-4 col-form-label">{{ $t('send_to_group_chat')
                                            }} :</label>
                                            <div class="col-sm-8">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" v-model="form_topUp.is_send"
                                                        type="radio" name="inlineRadioOptions" id="inlineRadio1" value="0"
                                                        checked>
                                                    <label class="form-check-label" for="inlineRadio1">{{ $t('no')
                                                    }}</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" v-model="form_topUp.is_send"
                                                        type="radio" name="inlineRadioOptions" id="inlineRadio2" value="1">
                                                    <label class="form-check-label" for="inlineRadio2">{{ $t('yes')
                                                    }}</label>
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
                                <button type="submit" class="btn btn-custom">
                                    <i class="bi bi-save2"></i> {{ $t('save') }}
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
                                <i class="bi bi-arrow-return-right"></i> {{ $t('withdraw') }}
                            </h5>
                            <button type="button" class="btn-close" @click.prevent="closeModal"></button>
                        </div>
                        <form @submit.prevent="formAction(form_withdraw, 'withdraw')">
                            <div class="modal-body">
                                <div class="row gx-4">
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            <label for="amount" class="col-sm-4 col-form-label">{{ $t('number_of_cashiers')
                                            }} :</label>
                                            <div class="col-sm-8">
                                                <input id="amount" name="amount" v-model="form_withdraw.amount" type="text"
                                                    class="form-control" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="address" class="col-sm-4 col-form-label">{{
                                                $t('refreshment_address') }} :</label>
                                            <div class="col-sm-8">
                                                <input id="address" name="address" v-model="form_withdraw.address"
                                                    type="text" class="form-control" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="status" class="col-sm-4 col-form-label">{{
                                                $t('type_of_presentation') }} :</label>
                                            <div class="col-sm-8">
                                                <select class="form-select" aria-label="Default select example"
                                                    id="addr_type" name="addr_type" v-model="form_withdraw.addr_type">
                                                    <option value="trc20">trc20</option>
                                                    <option value="bep20">bep20</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="amount" class="col-sm-4 col-form-label">{{ $t('whether_to_transfer')
                                            }} :</label>
                                            <div class="col-sm-8">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" v-model="form_withdraw.status"
                                                        type="radio" name="inlineRadioOptionsstatus" id="inlineRadio1"
                                                        value="0" checked>
                                                    <label class="form-check-label" for="inlineRadio1">{{
                                                        $t('not_transferred') }}</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" v-model="form_withdraw.status"
                                                        type="radio" name="inlineRadioOptionsstatus" id="inlineRadio2"
                                                        value="1">
                                                    <label class="form-check-label" for="inlineRadio2">{{ $t('transfer')
                                                    }}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="remark" class="col-sm-4 col-form-label">{{ $t('remarks') }}
                                                :</label>
                                            <div class="col-sm-8">
                                                <input id="remark" name="remark" v-model="form_withdraw.remark" type="text"
                                                    class="form-control" autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="amount" class="col-sm-4 col-form-label">{{ $t('send_to_group_chat')
                                            }} :</label>
                                            <div class="col-sm-8">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" v-model="form_withdraw.is_send"
                                                        type="radio" name="inlineRadioOptions" id="inlineRadio1" value="0"
                                                        checked>
                                                    <label class="form-check-label" for="inlineRadio1">{{ $t('no')
                                                    }}</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" v-model="form_withdraw.is_send"
                                                        type="radio" name="inlineRadioOptions" id="inlineRadio2" value="1">
                                                    <label class="form-check-label" for="inlineRadio2">{{ $t('yes')
                                                    }}</label>
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
                                <button type="submit" class="btn btn-custom">
                                    <i class="bi bi-save2"></i> {{ $t('save') }}
                                </button>
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
            error_form_topUp: {},
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
        Head, Link, AppLayout, SearchLayout, PaginationLayout, LoadingLayout,
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
                text = this.$t('confirm_update_item');
                confirmButtonColor = '#198754';
                method = 'PUT';
                routeURL = 'tg-users.update';
                msgText = 'Work has been updated.';
            } else if (this.action == 'top_up') {
                text = this.$t('confirm_update_item');
                confirmButtonColor = '#198754';
                method = 'PUT';
                routeURL = 'tg-users.top-up';
                msgText = 'Work has been updated.';
            } else if (this.action == 'withdraw') {
                text = this.$t('confirm_update_item');
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
                                this.topUpShow = false;
                                this.withdrawShow = false;
                            }
                        },
                        onFinish: () => {
                            this.loading = false;
                        },
                        onError: (error) => {
                            try {
                                if (type === 'top_up') {
                                    this.error_form_topUp = Object.assign(this.error_form_topUp, error);
                                }

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
}

</script>

<style scoped>
.invalid-feedback {
    font-size: .775em;
}

.td-btn-is-online-container button {
    padding: 0px 5px !important;
    font-size: 12px;
    border-radius: 0.25rem;
}
</style>

