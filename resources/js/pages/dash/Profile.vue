<template>
    <div class="row mt-5">
        <div class="col-12 col-md-6">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-5">
                            <h1>Basic</h1>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                            <form v-on:submit.prevent="updateBasic()" method="POST">
                                <div class="form-group content-auth mt-4">
                                    <input
                                        type="text"
                                        class="form-control input-type-primary"
                                        v-model="name"
                                        autocomplete="name"
                                        placeholder="Name"
                                        autofocus
                                        required
                                    >
                                    <span v-if="errors.title" class="invalid-feedback" role="alert">
                                        <strong> {{ errors.title }} </strong>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <input
                                        type="email"
                                        class="form-control input-type-primary"
                                        v-model="email"
                                        disabled
                                    >
                                </div>
                                <button class="btn btn-primary btn-lg float-right" :disabled="!name">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <div class="card">
                        <div class="card-body p-5">
                            <h1>Security</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <form v-on:submit.prevent="updatePassword()" method="POST">
                                <div class="form-group content-auth mt-4">
                                    <input
                                        type="password"
                                        class="form-control input-type-primary"
                                        v-model="password"
                                        pattern=".{8,20}"
                                        placeholder="New password"
                                        style="margin-bottom:0 !important"
                                        autofocus
                                        required
                                    >
                                    <small class="form-text text-muted">Min leght > 8</small>
                                </div>
                                <div class="form-group content-auth">
                                    <input
                                        type="password"
                                        :disabled="confirm_disabled"
                                        class="form-control input-type-primary"
                                        v-model="match_password"
                                        pattern=".{8,20}"
                                        style="margin-bottom:0 !important"
                                        placeholder="Confirm new password"
                                        required
                                    >
                                    <small class="form-text text-muted"> must equal with new password</small>
                                </div>
                                <button class="btn btn-primary btn-lg float-right" :disabled="button_disabled">Update</button>
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
                id: '',
                name: '',
                email: '',
                password: '',
                match_password:'',

                confirm_disabled: true,
                button_disabled: true,
                errors: [],
            }
        },
        mounted() {
            axios.get('/api/v1/profile').then(response => {
                this.id = response.data.user.id
                this.name = response.data.user.name;
                this.email = response.data.user.email;
            }).catch(function () {
                flash('Could not load your profile', 'danger');
            });
        },
        methods: {
            updateBasic() {
                axios.post('/api/v1/profile/basic-information', {
                    name: this.name
                }).then(response => {
                    document.location.href = "/dashboard/account";
                    flash(response.data.message, response.data.type);
                }).catch(function () {
                    flash('Failed update basic information', 'danger');
                });
            },

            updatePassword() {
                if (this.password == this.match_password) {
                    axios.post('/api/v1/profile/update-password', {
                        password: this.match_password
                    }).then(response => {
                        flash(response.data.message, response.data.type);
                        document.location.href = "/dashboard/account";
                    }).catch(function () {
                        flash('Failed update password', 'danger');
                    });
                }
            }
        },
        watch: {
            password: {
                handler: function(val) {
                    if (val.length < 8) {
                        this.confirm_disabled = true
                    } else {
                        this.confirm_disabled = false
                    }
                }
            },
            match_password: {
                handler: function(val) {
                    if (val == this.password) {
                        this.button_disabled = false
                    } else {
                        this.button_disabled = true
                    }
                }
            }
        }
    }
</script>
