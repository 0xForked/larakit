<template>
    <div class="row mt-5 mb-5">
        <div class="col-12 col-md-3">
            <div class="card">
                <div class="card-header">
                    <h3>Menu</h3>
                    <p>List available menu</p>
                </div>
                <div class="card-body">
                    <div
                        class="nav flex-column nav-pills"
                        id="v-pills-tab"
                        role="tablist"
                        aria-orientation="vertical"
                    >
                        <a
                            class="nav-link active"
                            id="v-pills-new-message-tab"
                            data-toggle="pill"
                            href="#v-pills-new-message"
                            role="tab"
                            aria-controls="v-pills-new-message"
                            aria-selected="true"
                        >New</a>

                        <a
                            class="nav-link"
                            id="v-pills-inbox-tab"
                            data-toggle="pill"
                            href="#v-pills-inbox"
                            role="tab"
                            aria-controls="v-pills-inbox"
                            aria-selected="false"
                        >Inbox <span class="badge badge-primary">{{inbox.total}}</span></a>

                        <a
                            class="nav-link"
                            id="v-pills-outbox-tab"
                            data-toggle="pill"
                            href="#v-pills-outbox"
                            role="tab"
                            aria-controls="v-pills-outbox"
                            aria-selected="false"
                        >Outbox <span class="badge badge-primary">{{outbox.total}}</span></a>

                        <a
                            class="nav-link"
                            id="v-pills-pending-tab"
                            data-toggle="pill"
                            href="#v-pills-pending"
                            role="tab"
                            aria-controls="v-pills-pending"
                            aria-selected="false"
                        >Pending <span class="badge badge-primary">{{pending.total}}</span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-9 mt-3 mt-md-0">
            <div class="card">
                <div class="card-header">
                    <h3>Messanging content</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div
                            class="tab-pane fade show active pt-3 pl-md-5 pr-md-5"
                            id="v-pills-new-message"
                            role="tabpanel"
                            aria-labelledby="v-pills-new-message-tab"
                        >
                            <form v-on:submit.prevent="sendMessage()" method="POST">
                                <div class="form-group row">
                                    <label
                                        for="status"
                                        class="col-sm-3 col-form-label"
                                    >Phone number</label>
                                    <div class="col-sm-9">
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="number"
                                            placeholder="insert destination number"
                                        >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="message"
                                        class="col-sm-3 col-form-label"
                                    >Message</label>
                                    <div class="col-sm-9">
                                        <textarea
                                            class="form-control"
                                            v-model="message"
                                            maxlength="160"
                                            rows="3"
                                            placeholder="insert message"
                                        ></textarea>

                                    </div>
                                </div>
                                <button class="btn btn-primary btn-lg float-right">Update</button>
                            </form>
                        </div>
                        <div
                            class="tab-pane fade"
                            id="v-pills-inbox"
                            role="tabpanel"
                            aria-labelledby="v-pills-inbox-tab"
                        >
                            <table class="table-wisata table-tiketsaya table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">From</th>
                                        <th scope="col">Message</th>
                                        <th width="20%">Received At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="" v-if="inbox.total === 0">
                                        <td
                                            class="lead text-center"
                                        >No data found.</td>
                                    </tr>
                                    <tr
                                        v-for="data in inbox.data"
                                        :key="data.ID"
                                        v-else
                                    >
                                        <td>
                                            {{ data.SenderNumber }}
                                        </td>
                                        <td>
                                           {{ data.TextDecoded }}
                                        </td>
                                        <td>
                                            {{ data.ReceivingDateTime }}
                                        </td>
                                        <td>
                                            <a href="#" v-on:click="destroyInbox(data.ID)"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <pagination :data="inbox" @pagination-change-page="fetchInbox">
                                        <span slot="prev-nav">&lt; Previous</span>
                                        <span slot="next-nav">Next &gt;</span>
                                    </pagination>
                                </div>
                                <div class="col-6">
                                    <div class="float-right">
                                        <button class="btn btn-danger">Clear inbox table</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="tab-pane fade"
                            id="v-pills-outbox"
                            role="tabpanel"
                            aria-labelledby="v-pills-outbox-tab"
                        >
                            <table class="table-wisata table-tiketsaya table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">To</th>
                                        <th scope="col">Message</th>
                                        <th width="20%">Sent At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="" v-if="outbox.total === 0">
                                        <td
                                            class="lead text-center"
                                        >No data found.</td>
                                    </tr>
                                    <tr
                                        v-for="data in outbox.data"
                                        :key="data.ID"
                                        v-else
                                    >
                                        <td>
                                            {{ data.DestinationNumber }}
                                        </td>
                                        <td>
                                            {{ data.TextDecoded }}
                                        </td>
                                        <td>
                                            {{ data.SendingDateTime }}
                                        </td>
                                        <td>
                                            <a href="#" v-on:click="destroyOutbox(data.ID)"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row mt-5">
                                <div class="col-6">
                                    <pagination :data="outbox" @pagination-change-page="fetchOutbox">
                                        <span slot="prev-nav">&lt; Previous</span>
                                        <span slot="next-nav">Next &gt;</span>
                                    </pagination>
                                </div>
                                <div class="col-6">
                                    <div class="float-right">
                                        <button class="btn btn-danger">Clear outbox table</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="tab-pane fade"
                            id="v-pills-pending"
                            role="tabpanel"
                            aria-labelledby="v-pills-pending-tab">
                            <table class="table-wisata table-tiketsaya table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">to</th>
                                        <th scope="col">Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="" v-if="pending.total === 0">
                                        <td
                                            class="lead text-center"
                                        >No data found.</td>
                                    </tr>
                                    <tr
                                        v-for="data in pending.data"
                                        :key="data.ID"
                                        class="m-datatable__row"
                                        v-else
                                    >
                                        <td>
                                            {{ data.DestinationNumber }}
                                        </td>
                                        <td>
                                            {{ data.TextDecoded  }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="row mt-5">
                                <div class="col-6">
                                    <pagination :data="pending" @pagination-change-page="fetchPending">
                                        <span slot="prev-nav">&lt; Previous</span>
                                        <span slot="next-nav">Next &gt;</span>
                                    </pagination>
                                </div>
                                <div class="col-6">
                                    <div class="float-right">
                                        <button class="btn btn-danger">Clear outbox table</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                inbox: [],
                outbox: [],
                pending: [],
                number: '',
                message: ''
            }
        },
        created() {
            return this.fetchInbox(), this.fetchOutbox(), this.fetchPending()
        },
        methods: {
            sendMessage() {
                if (this.phoneValidator()) {
                    axios.post('/api/v1/messages/send', {
                        phone: this.number,
                        message: this.message
                    }).then(response => {
                        flash(response.data.message, response.data.type);
                        this.number = ''
                        this.message = ''
                    }).catch(function () {
                        flash('Failed send message', 'danger');
                    });
                } else {
                    flash('Please check your phone number', 'danger')
                }
            },
            fetchInbox(page = 1) {
                axios.get('/api/v1/messages/inbox?page=' + page).then(response => {
                    this.inbox = response.data.inbox
                }).catch(function () {
                    flash('Could not load inbox message', 'danger')
                })
            },
            fetchOutbox(page = 1) {
                axios.get('/api/v1/messages/outbox?page=' + page).then(response => {
                    this.outbox = response.data.outbox
                }).catch(function () {
                    flash('Could not load outbox message', 'danger')
                })
            },
            fetchPending(page = 1) {
                axios.get('/api/v1/messages/pending?page=' + page).then(response => {
                    this.pending = response.data.pending
                }).catch(function () {
                    flash('Could not load pending message', 'danger')
                })
            },
            destroyInbox(id) {
                flash('Data dengan id ' + id + ' berhasil dihapus');
                this.reloadPage()
            },
            destroyOutbox(id) {
                flash('Data dengan id ' + id + ' berhasil dihapus');
                this.reloadPage()
            },
            reloadPage() {
                document.location.href = "/dashboard/messages";
            },
            phoneValidator () {
                var pregex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
                if (this.number.match(pregex)) {
                   return true;
                }
                return false;
            }
        }
    }
</script>
