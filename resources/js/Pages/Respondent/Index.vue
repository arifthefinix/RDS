<script setup>
import Wrapper from '@/Components/Wrapper.vue';
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
defineProps({
    respondents:Object,
});

function destroy(id) {
    if (confirm("Are you sure you want to Delete")) {
        form.delete(route('respondents.destroy', id));
    }
}
</script>
<template>
    <Wrapper>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Respondents List</h1>
                    </div>
                    <div class="col-sm-6">
                        <Link :href="route('respondents.create')" class="btn btn-primary">Add Respondents</Link>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Respondent Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Incident Name</th>
                                <th>Team Name</th>
                                <th style="width: 50px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(respondent, key) in respondents">
                                <td>{{ ++key }}</td>
                                <td>{{ respondent.incident_info.title}}</td>
                                <td>{{ respondent.team_info.name}}</td>
                                <td>
                                    <Link :href="route('respondents.edit',respondent.id)" class="btn-sm btn btn-warning"><i class="fa fa-edit"></i></Link>
                                    <Link @click="destroy(respondent.id)" class="btn-sm btn btn-danger"><i class="fa fa-trash"></i></Link>
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
