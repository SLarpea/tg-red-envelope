<template>

    <Head title="Activities" />

    <AppLayout>

    <div class="pagetitle">
      <h1><i class="bi bi-activity"></i> Operation Log</h1>
      <div class="bottom-title"></div>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Logs</li>
          <li class="breadcrumb-item">Operation Log</li>
          <li class="breadcrumb-item active"><i class="bi bi-list-ol"></i> List of Logs</li>
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
                  <h5 class="card-title">List of Logs</h5>
                </div>
              </div>

              <SearchLayout :data="{ routeLink: 'operation-log.index', filters: filters }" />

              <div class="table-responsive">
                <table class="table table-striped table-hover data">
                    <thead>
                        <tr>
                            <th scope="col" width="1%" class="text-center">#</th>
                            <th scope="col" class="text-center">Event{{ logs.from }}</th>
                            <th scope="col" >Affected</th>
                            <th scope="col" class="text-center">Affected ID</th>
                            <th scope="col">Old Value</th>
                            <th scope="col">New value</th>
                            <th scope="col">Agent</th>
                            <th scope="col" >User</th>
                            <th scope="col" class="text-center">Date Modified</th>
                            <th scope="col" width="1%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in logs.data" :key="item.id">
                            <th scope="row" class="text-center">{{ logs.from + index }}</th>
                            <td class="text-center"
                                :class="{ 'bg-deleted': item.description === 'deleted', 'bg-updated': item.description === 'updated', 'bg-created': item.description === 'created' }">
                                {{ item.description }}</td>
                            <td>{{ item.subject_type }}</td>
                            <td class="text-center">{{ item.subject_id }}</td>
                            <td><textarea rows="3" readonly class="activity-area" v-html="JSON.stringify(JSON.parse(item.properties).old, undefined, 2)?.replace(/{|}/g, '').substr(1)"></textarea>
                            </td>
                            <td><textarea rows="3" readonly class="activity-area" v-html="JSON.stringify(JSON.parse(item.properties).attributes, undefined, 2)?.replace(/{|}/g, '').substr(1)"></textarea></td>
                            <td><textarea rows="3" readonly class="activity-area" v-html="JSON.stringify(JSON.parse(item.properties).agent, undefined, 2)?.replace(/{|}/g, '').substr(1)"></textarea></td>
                            <td>{{ item.email }}</td>
                            <td class="text-center">{{ moment(item.created_at).format("YY-MM-DD|h:mm:ss A") }}
                            </td>
                            <td class="text-center">
                                <i class="bi bi-eye text-primary" v-tippy="'View'" @click.prevent="showData(item)"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>

            <PaginationLayout :data="{ links: logs.links, from: logs.from, to: logs.to, total: logs.total }" />

            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- Modal -->
    <transition name="modal-fade">
            <div class="modal custom-modal" v-if="isModalShow">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                <i class="bi bi-arrow-return-right"></i> View Logs
                            </h5>
                            <button type="button" class="btn-close" @click.prevent="closeModal"></button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered no-margin">
                                <colgroup>
                                    <col width="150">
                                    <col width="*">
                                </colgroup>
                                <tbody>
                                <tr>
                                    <td class="text-600">Event :</td>
                                    <td class="capitalize">{{ this.log.event }}</td>
                                </tr>
                                <tr>
                                    <td class="text-600">Affected :</td>
                                    <td>{{ this.log.affected }}</td>
                                </tr>
                                <tr>
                                    <td class="text-600">Affected ID :</td>
                                    <td>{{ this.log.affectedId }}</td>
                                </tr>
                                <tr>
                                    <td class="text-600">Old Value :</td>
                                    <td><pre>{{ this.log.oldValue }}</pre></td>
                                </tr>
                                <tr>
                                    <td class="text-600">New Value :</td>
                                    <td><pre>{{ this.log.newValue }}</pre></td>
                                </tr>
                                <tr>
                                    <td class="text-600">Agent :</td>
                                    <td><pre>{{ this.log.agent }}</pre></td>
                                </tr>
                                <tr>
                                    <td class="text-600">User :</td>
                                    <td>{{ this.log.user }}</td>
                                </tr>
                                <tr>
                                    <td class="text-600">Date Modified :</td>
                                    <td>{{ this.log.modified }}</td>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" @click.prevent="closeModal">
                                <i class="bi bi-x-circle"></i> Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </transition>

    </AppLayout>

</template>

<script>
import { Head } from "@inertiajs/vue3";
import AppLayout from '../Layouts/AppLayout.vue';
import SearchLayout from "../Layouts/SearchLayout.vue";
import PaginationLayout from "../Layouts/PaginationLayout.vue";
import moment from "moment";

export default {
    data() {
        return {
            isModalShow: false,
            log: {
                event: null,
                affected : null,
                affectedId  : null,
                oldValue  : null,
                newValue  : null,
                agent  : null,
                user : null,
                modified : null,
            },
            moment: moment,
        }
    },
    props: {
        logs: Object,
        filters: Object,
    },
    components: {
        Head,
        AppLayout, PaginationLayout, SearchLayout,
    },
    methods: {
        closeModal() {
            this.isModalShow = false;
        },
        showData(data) {
            this.log.event = data.description;
            this.log.affected = data.subject_type;
            this.log.affectedId = data.subject_id;
            this.log.oldValue = JSON.parse(data.properties).old;
            this.log.newValue = JSON.parse(data.properties).attributes;
            this.log.agent = JSON.parse(data.properties).agent;
            this.log.user = data.email;
            this.log.modified = moment(data.created_at).format("MMMM DD, YYYY, h:mm:ss A");
            this.isModalShow = true;
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
