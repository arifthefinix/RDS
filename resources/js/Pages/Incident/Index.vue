<script setup>
import Wrapper from '@/Components/Wrapper.vue';
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
defineProps({
    incidents:Object,
});

function destroy(id) {
    if (confirm("Are you sure you want to Delete")) {
        form.delete(route('incidents.destroy', id));
    }
}
</script>
<template>
    <Wrapper>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Incidents List</h1>
                    </div>
                    <div class="col-sm-6">
                        <Link :href="route('incidents.create')" class="btn btn-primary">Add Incident</Link>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List of Incidents</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Incident Name</th>
                                <th>Contact Person</th>
                                <th>Contact Number</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th style="width: 50px">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(incident, key) in incidents">
                                <td>{{ ++key }}</td>
                                <td>{{ incident.title}}</td>
                                <td>{{ incident.contact_person_name}}</td>
                                <td>{{ incident.contact_person_number}}</td>
                                <td>{{ incident.incident_address}}</td>
                                <td>
                                    <p v-if="incident.status==1">Serious </p>
                                    <p v-else>Critical </p></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <Link :href="route('incidents.show',incident.id)" class="btn-sm btn btn-dark"><i class="fa fa-eye"></i></Link>
                                        <Link :href="route('incidents.edit',incident.id)" class="btn-sm btn btn-warning"><i class="fa fa-edit"></i></Link>
                                        <Link @click="destroy(incident.id)" class="btn-sm btn btn-danger"><i class="fa fa-trash"></i></Link>
                                    </div>
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
