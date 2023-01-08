<script setup>
import Wrapper from '@/Components/Wrapper.vue';
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import {defineProps} from "vue";
const props =defineProps({
    team_info:Object,
});
const form = useForm({
    name:props.team_info.name,
    leader_name: props.team_info.leader_name,
});

const submit = () => {
    form.put(route('teams.update',props.team_info.id), {
        onFinish: () => form.reset('name','leader_name')
    });
};
</script>
<template>
    <Wrapper>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Team</h1>
                    </div>
                    <div class="col-sm-6">
                        <Link :href="route('teams.index')" class="btn btn-primary">Team List</Link>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Update Team</h3>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="submit">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Team Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" v-model="form.name" placeholder="Enter Team Name">
                                </div>
                                <InputError class="mt-2" :message="form.errors.name" />
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Team Leader</label>
                                    <input type="text" class="form-control" placeholder="Enter Team Leader Name" v-model="form.leader_name" name="leader_name">
                                </div>
                                <InputError class="mt-2" :message="form.errors.leader_name" />
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-outline-dark">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.card -->

        </section>
    </Wrapper>

</template>
