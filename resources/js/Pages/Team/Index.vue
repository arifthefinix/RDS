<script setup>
import Wrapper from '@/Components/Wrapper.vue';
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
defineProps({
    teams:Object,
});

function destroy(id) {
    if (confirm("Are you sure you want to Delete")) {
        form.delete(route('teams.destroy', id));
    }
}
</script>
<template>
    <Wrapper>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Team List</h1>
                    </div>
                    <div class="col-sm-6">
                        <Link :href="route('teams.create')" class="btn btn-primary">Add Team</Link>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Bordered Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Team Name</th>
                                <th>Team Leader</th>
                                <th style="width: 50px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(team, key) in teams">
                                <td>{{ ++key }}</td>
                                <td>{{ team.name}}</td>
                                <td>{{ team.leader_name}}</td>
                                <td>
                                    <Link :href="route('teams.edit',team.id)" class="btn-sm btn btn-warning"><i class="fa fa-edit"></i></Link>
                                    <Link @click="destroy(team.id)" class="btn-sm btn btn-danger"><i class="fa fa-trash"></i></Link>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

    </Wrapper>
</template>
