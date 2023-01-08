<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    role:'',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>
<template>
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                            {{ status }}
                </div>

                <form @submit.prevent="submit">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" v-model="form.email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" v-model="form.password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-3">
                                    <label>Role</label>
                                </div>
                                <div class="col-8">
                                    <select class="form-control" name="role" v-model="form.role">
                                        <option>Admin</option>
                                        <option>Responder</option>
                                        <option>User</option>
                                    </select>
                                </div>
                            </div>
                         </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember" v-model="form.remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4 mt-2">
                            <button type="submit" class="btn btn-outline-success">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mb-1">
                    <a href="#">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <Link :href="route('register')" class="">Register</Link>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</template>
