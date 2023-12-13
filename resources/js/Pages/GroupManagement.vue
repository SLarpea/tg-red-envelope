<template>
    <Head title="Group Management" />
    <AppLayout>

        <div class="pagetitle">
        <h1>Group Management</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Mine Management</a></li>
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
                                    <h5 class="card-title">
                                        List of Groups
                                    </h5>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Search &nbsp;<i class="bi bi-search"></i></span>
                                                <input type="text" class="form-control"
                                                    aria-label="Sizing example input"
                                                    aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="show-items-container"> Show
                                                <select class="show-items">
                                                    <option value="15">15</option>
                                                    <option value="30">30</option>
                                                    <option value="45">45</option>
                                                    <option value="60">60</option>
                                                    <option value="75">75</option>
                                                    <option value="90">90</option>
                                                    <option value="100">All</option>
                                                </select> Entries </div>
                                        </div>
                                    </div>

                                    <table class="table table-sm table-striped table-hover">
                                        <colgroup>
                                            <col width="5%">
                                            <col width="*">
                                            <col width="*">
                                            <col width="5%">
                                            <col width="7%">
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">#</th>
                                                <th scope="col">First</th>
                                                <th scope="col">Last</th>
                                                <th scope="col" class="text-center">Status</th>
                                                <th scope="col" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row" class="text-center">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td class="list-status-container text-center">
                                                    <button class="btn btn-outline-success btn-status">Active</button>
                                                </td>
                                                <td class="list-action-container text-center">
                                                    <i class="bi bi-eye text-primary"></i>
                                                    <i class="bi bi-pencil-square text-success"></i>
                                                    <i class="bi bi-trash text-danger"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-center">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td class="list-status-container text-center">
                                                    <button class="btn btn-outline-success btn-status">Active</button>
                                                </td>
                                                <td class="list-action-container text-center">
                                                    <i class="bi bi-eye text-primary"></i>
                                                    <i class="bi bi-pencil-square text-success"></i>
                                                    <i class="bi bi-trash text-danger"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-center">3</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td class="list-status-container text-center">
                                                    <button class="btn btn-outline-success btn-status">Active</button>
                                                </td>
                                                <td class="list-action-container text-center">
                                                    <i class="bi bi-eye text-primary"></i>
                                                    <i class="bi bi-pencil-square text-success"></i>
                                                    <i class="bi bi-trash text-danger"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-center">4</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td class="list-status-container text-center">
                                                    <button class="btn btn-outline-success btn-status">Active</button>
                                                </td>
                                                <td class="list-action-container text-center">
                                                    <i class="bi bi-eye text-primary"></i>
                                                    <i class="bi bi-pencil-square text-success"></i>
                                                    <i class="bi bi-trash text-danger"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-center">5</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td class="list-status-container text-center">
                                                    <button class="btn btn-outline-success btn-status">Active</button>
                                                </td>
                                                <td class="list-action-container text-center">
                                                    <i class="bi bi-eye text-primary"></i>
                                                    <i class="bi bi-pencil-square text-success"></i>
                                                    <i class="bi bi-trash text-danger"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-center">6</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td class="list-status-container text-center">
                                                    <button class="btn btn-outline-success btn-status">Active</button>
                                                </td>
                                                <td class="list-action-container text-center">
                                                    <i class="bi bi-eye text-primary"></i>
                                                    <i class="bi bi-pencil-square text-success"></i>
                                                    <i class="bi bi-trash text-danger"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-center">7</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td class="list-status-container text-center">
                                                    <button class="btn btn-outline-success btn-status">Active</button>
                                                </td>
                                                <td class="list-action-container text-center">
                                                    <i class="bi bi-eye text-primary"></i>
                                                    <i class="bi bi-pencil-square text-success"></i>
                                                    <i class="bi bi-trash text-danger"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-center">8</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td class="list-status-container text-center">
                                                    <button class="btn btn-outline-success btn-status">Active</button>
                                                </td>
                                                <td class="list-action-container text-center">
                                                    <i class="bi bi-eye text-primary"></i>
                                                    <i class="bi bi-pencil-square text-success"></i>
                                                    <i class="bi bi-trash text-danger"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-center">9</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td class="list-status-container text-center">
                                                    <button class="btn btn-outline-success btn-status">Active</button>
                                                </td>
                                                <td class="list-action-container text-center">
                                                    <i class="bi bi-eye text-primary"></i>
                                                    <i class="bi bi-pencil-square text-success"></i>
                                                    <i class="bi bi-trash text-danger"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-center">10</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td class="list-status-container text-center">
                                                    <button class="btn btn-outline-success btn-status">Active</button>
                                                </td>
                                                <td class="list-action-container text-center">
                                                    <i class="bi bi-eye text-primary"></i>
                                                    <i class="bi bi-pencil-square text-success"></i>
                                                    <i class="bi bi-trash text-danger"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-center">11</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td class="list-status-container text-center">
                                                    <button class="btn btn-outline-success btn-status">Active</button>
                                                </td>
                                                <td class="list-action-container text-center">
                                                    <i class="bi bi-eye text-primary"></i>
                                                    <i class="bi bi-pencil-square text-success"></i>
                                                    <i class="bi bi-trash text-danger"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-center">12</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td class="list-status-container text-center">
                                                    <button class="btn btn-outline-success btn-status">Active</button>
                                                </td>
                                                <td class="list-action-container text-center">
                                                    <i class="bi bi-eye text-primary"></i>
                                                    <i class="bi bi-pencil-square text-success"></i>
                                                    <i class="bi bi-trash text-danger"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-center">13</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td class="list-status-container text-center">
                                                    <button class="btn btn-outline-success btn-status">Active</button>
                                                </td>
                                                <td class="list-action-container text-center">
                                                    <i class="bi bi-eye text-primary"></i>
                                                    <i class="bi bi-pencil-square text-success"></i>
                                                    <i class="bi bi-trash text-danger"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-center">14</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td class="list-status-container text-center">
                                                    <button class="btn btn-outline-success btn-status">Active</button>
                                                </td>
                                                <td class="list-action-container text-center">
                                                    <i class="bi bi-eye text-primary"></i>
                                                    <i class="bi bi-pencil-square text-success"></i>
                                                    <i class="bi bi-trash text-danger"></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" class="text-center">15</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td class="list-status-container text-center">
                                                    <button class="btn btn-outline-success btn-status">Active</button>
                                                </td>
                                                <td class="list-action-container text-center">
                                                    <i class="bi bi-eye text-primary"></i>
                                                    <i class="bi bi-pencil-square text-success"></i>
                                                    <i class="bi bi-trash text-danger"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <p class="show-entries">Showing 1 to 1 of 1 entries</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <nav class="nav-pagination">
                                                <ul class="pagination pagination-sm justify-content-end">
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Previous">
                                                            <span aria-hidden="true">&laquo;</span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item active"><a class="page-link" href="#">1</a>
                                                    </li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">7</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">8</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">9</a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Next">
                                                            <span aria-hidden="true">&raquo;</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </AppLayout>
</template>

<script>
import { Head } from '@inertiajs/vue3';
import AppLayout from '../Layouts/AppLayout.vue';

export default {
   components: {
       Head, AppLayout,
   },
}

</script>
