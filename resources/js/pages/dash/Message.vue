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
                        >New Message</a>

                        <a
                            class="nav-link"
                            id="v-pills-inbox-tab"
                            data-toggle="pill"
                            href="#v-pills-inbox"
                            role="tab"
                            aria-controls="v-pills-inbox"
                            aria-selected="true"
                        >Inbox</a>

                        <a
                            class="nav-link"
                            id="v-pills-outbox-tab"
                            data-toggle="pill"
                            href="#v-pills-outbox"
                            role="tab"
                            aria-controls="v-pills-outbox"
                            aria-selected="true"
                        >Outbox</a>

                        <a
                            class="nav-link"
                            id="v-pills-pending-tab"
                            data-toggle="pill"
                            href="#v-pills-pending"
                            role="tab"
                            aria-controls="v-pills-pending"
                            aria-selected="true"
                        >Pending</a>
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
                            <div class="form-group row">
                                <label
                                    for="status"
                                    class="col-sm-3 col-form-label"
                                >Autoreplay satus</label>
                                <div class="col-sm-9">
                                    <select class="form-control">
                                        <option>Select status</option>
                                        <option>Activate</option>
                                        <option>Deactivate</option>
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
                                        id="message"
                                        name="message"
                                        placeholder="Message"
                                    >
                                </div>
                            </div>
                            <button class="btn btn-primary btn-lg float-right">Update</button>
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

        }
    }
</script>
