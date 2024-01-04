<template>
    <Head :title="$t('menu')" />

    <AppLayout>

        <div class="pagetitle">
            <h1><i class="bi bi-list"></i> {{ $t('menu') }}</h1>
            <div class="bottom-title"></div>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">{{ $t('system') }}</li>
                    <li class="breadcrumb-item">{{ $t('menu') }}</li>
                    <li class="breadcrumb-item active">{{ $t('list_of_menu') }}</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h5 class="card-title"><i class="bi bi-list-ol"></i> {{ $t('list_of_menu') }}</h5>
                                </div>
                                <div class="col-lg-6">
                                </div>
                            </div>

                            <hr class="line-break">

                            <div class="table-responsive">
                                <table class="table table-sm table-striped table-hover">
                                    <colgroup></colgroup>
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">#</th>
                                            <th scope="col">{{ $t('zh_CN_name') }}</th>
                                            <th scope="col">{{ $t('name') }}</th>
                                            <th scope="col">{{ $t('url') }}</th>
                                            <th scope="col" class="text-center">{{ $t('status') }}</th>
                                            <th scope="col" class="text-center">{{ $t('action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item, index) in   menus.data  " :key="item.id"
                                            @dblclick.prevent="selectAction(item, 'show', null)">
                                            <td class="text-center">
                                                {{ menus.from + index }}
                                            </td>
                                            <td v-if="$page.props.user.locale == 'zh_CN'" >{{ item.zh_CN_name }}</td>
                                            <td v-else>{{ item.name }}</td>
                                            <td>/{{ item.url }}</td>
                                            <td class="list-status-container text-center">
                                                <button :class="item.status == 1
                                                    ? 'btn btn-outline-success btn-status'
                                                    : 'btn btn-outline-danger btn-status'
                                                    " @click.prevent="updateData(item, 'status')">
                                                    {{ item.status == 1 ? $t('active') : $t('inactive') }}
                                                </button>
                                            </td>
                                            <td class="list-action-container text-center">
                                                <i class="bi bi-pencil-square text-success" v-tippy="$t('edit')"
                                                    @click.prevent="editData(item)"
                                                    v-if="$page.props.user.permissions.includes(32)"></i>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Modal -->
        <transition name="modal-fade">
            <div class="modal custom-modal" v-if=" isModalShow ">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                <i class="bi bi-arrow-return-right"></i> {{ (!editMode) ? $t('new_menu') : $t('update_menu')
                                }}
                            </h5>
                            <button type="button" class="btn-close" @click.prevent=" closeModal "></button>
                        </div>
                        <form @submit.prevent="selectAction(form)">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="row mb-2">
                                            <label for="name" class="col-sm-4 col-form-label">{{ $t('name') }} :</label>
                                            <div class="col-sm-8">
                                                <input id="name" name="name" type="text" class="form-control"
                                                    v-model=" form.name " autocomplete="off" />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="url" class="col-sm-4 col-form-label">{{ $t('url') }} :</label>
                                            <div class="col-sm-8">
                                                <input id="url" name="url" type="text" class="form-control"
                                                    v-model=" form.url " autocomplete="off" readonly />
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <label for="status" class="col-sm-4 col-form-label">{{ $t('status') }} :</label>
                                            <div class="col-sm-8">
                                                <select class="form-select" aria-label="Default select example" id="status"
                                                    name="status" v-model=" form.status ">
                                                    <option value="1">{{ $t('enable') }}</option>
                                                    <option value="0">{{ $t('disable') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <transition name="modal-fade">
                                    <div class="col-md-12" v-if=" isErrorShow ">
                                        <div class="alert alert-danger alert-dismissible fade show error-container">
                                            <p v-if=" errors.name "><i class="bi bi-exclamation-diamond me-1"></i> {{
                                                errors.name.replace('name', $t('Name')) }}</p>
                                            <p v-if=" errors.url "><i class="bi bi-exclamation-diamond me-1"></i> {{
                                                errors.url.replace('url', $t('URL')) }}</p>
                                            <p v-if=" errors.status "><i class="bi bi-exclamation-diamond me-1"></i> {{
                                                errors.status.replace('status', $t('Status')) }}</p>
                                        </div>
                                    </div>
                                </transition>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" @click.prevent=" closeModal ">
                                    <i class="bi bi-x-circle"></i> {{ $t('close') }}
                                </button>
                                <div>
                                    <button type="submit" class="btn btn-custom" v-if=" !editMode ">
                                        <i class="bi bi-save2"></i> {{ $t('save') }}
                                    </button>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-custom" v-if=" editMode ">
                                        <i class="bi bi-save2"></i> {{ $t('update') }}
                                    </button>
                                </div>
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
import AppLayout from "@/Layouts/AppLayout.vue";
import SearchLayout from "@/Layouts/SearchLayout.vue";
import PaginationLayout from "@/Layouts/PaginationLayout.vue";
import { VueDraggableNext } from 'vue-draggable-next';

export default {
    data() {
        return {
            isModalShow: false,
            isErrorShow: false,
            editMode: false,
            form: {
                name: null,
                url: null,
                sort: null,
                status: 1,
            },
        };
    },
    props: {
        menus: Object,
        errors: Object,
        response: null,
    },
    components: {
        Head,
        AppLayout, SearchLayout, PaginationLayout,
        draggable: VueDraggableNext,
    },
    methods: {
        closeModal() {
            this.isModalShow = false;
        },
        resetForm() {
            this.editMode = false;
            this.isModalShow = !this.isHidden;
            this.isErrorShow = false;
            this.form = {
                name: null,
                url: null,
                sort: null,
                status: 1,
            }
        },
        selectAction(data) {
            this.editMode == false ? this.saveData(data) : this.updateData(data, 'all')
        },
        updateOrder() {
            const data = [];
            const elements = document.querySelectorAll('.item-list');
            elements.forEach((element) => {
                data.push({ id: element.id, order: element.getAttribute('sort') });
            });
            this.$inertia.put(route('menus.sort'), data, {
                onSuccess: (response) => {
                    if (response.props.response == 'success') {
                        this.$swal({
                            position: 'center',
                            icon: 'success',
                            text: 'Work has been saved.',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                },
            });
        },
        editData(data) {
            this.form = Object.assign({}, data);
            this.editMode = true;
            this.isModalShow = true;
            this.isErrorShow = false;
        },
        // saveData(data) {
        //     this.$swal({
        //         text: "Are you sure you want to save this work?",
        //         icon: 'question',
        //         showCancelButton: true,
        //         confirmButtonColor: '#38c172',
        //         cancelButtonText: 'No <i class="bi bi-hand-thumbs-down"></i>',
        //         confirmButtonText: '<i class="bi bi-hand-thumbs-up"></i> Yes'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             data._method = 'POST';
        //             this.$inertia.post(route('menus.store'), data, {
        //                 onSuccess: (response) => {
        //                     if (response.props.response == 'success') {
        //                         this.$swal({
        //                             position: 'center',
        //                             icon: 'success',
        //                             text: 'Work has been saved.',
        //                             showConfirmButton: false,
        //                             timer: 2000
        //                         });
        //                         this.isModalShow = false;
        //                         this.isErrorShow = false;
        //                     }
        //                 },
        //                 onError: () => {
        //                     this.isErrorShow = true;
        //                 },
        //             });
        //         }
        //     })

        // },
        updateData(data, type) {
            this.$swal({
                text: "Are you sure you want to update this work?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#38c172',
                cancelButtonText: 'No <i class="bi bi-hand-thumbs-down"></i>',
                confirmButtonText: '<i class="bi bi-hand-thumbs-up"></i> Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    data._method = 'PUT';
                    data.update_type = type;
                    this.$inertia.post(route('menus.update', data.id), data, {
                        onSuccess: (response) => {
                            if (response.props.response == 'success') {
                                this.$swal({
                                    position: 'center',
                                    icon: 'success',
                                    text: 'Work has been updated.',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                                this.isModalShow = false;
                                this.isErrorShow = false;
                            }
                        },
                        onError: () => {
                            this.isErrorShow = true;
                        },
                    });
                }
            })

        },
        escape(event) {
            if (event.keyCode === 27) {
                this.isModalShow = false;
            }
        },
    },
    created() {
        window.addEventListener('keydown', this.escape);
    },
}
</script>
