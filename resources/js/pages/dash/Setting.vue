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
                            id="v-pills-autoreply-tab"
                            data-toggle="pill"
                            href="#v-pills-autoreply"
                            role="tab"
                            aria-controls="v-pills-autoreply"
                            aria-selected="true"
                        >Message Autoreply</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-9 mt-3 mt-md-0">
            <div class="card">
                <div class="card-header">
                    <h3>Autoreplay SMS</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div
                            class="tab-pane fade show active pt-3 pl-md-5 pr-md-5"
                            id="v-pills-autoreply"
                            role="tabpanel"
                            aria-labelledby="v-pills-autoreply-tab"
                        >
                            <form v-on:submit.prevent="updateAutoreply()" method="POST">
                                <div class="form-group row">
                                    <label
                                        for="status"
                                        class="col-sm-3 col-form-label"
                                    >Autoreplay satus</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" v-model="status">
                                            <option value="activate">Activate</option>
                                            <option value="deactivate">Deactivate</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="message"
                                        class="col-sm-3 col-form-label"
                                    >Autoreplay message</label>
                                    <div class="col-sm-9">
                                        <input
                                            type="text"
                                            class="form-control"
                                            v-model="message"
                                            placeholder="Message"
                                        >
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-lg float-right">Update</button>
                            </form>
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
                status: '',
                message: ''
            }
        },
        methods: {
            updateAutoreply() {
                axios.post('/api/v1/settings/message-autoreply', {
                    status: this.status,
                    message: this.message
                }).then(response => {
                    document.location.href = "/dashboard/settings";
                    flash(response.data.message, response.data.type);
                }).catch(function () {
                    flash('Failed update basic information', 'danger');
                });
            }
        },
        mounted() {
            axios.get('/api/v1/settings').then(response => {
                this.status = response.data.settings.autoreplay_status
                this.message =  response.data.settings.autoreplay_message
            }).catch(function () {
                flash('Could not load your profile', 'danger');
            });
        }
    }
</script>
