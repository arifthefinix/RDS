<script setup>
import Wrapper from '@/Components/Wrapper.vue';
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
defineProps({
    incident:Object,
    respondent:Object,
    team:Object,
    incidents:Object,
});
</script>

<template>
    <Wrapper>
        <div class="row">

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{  incident }}</h3>
                    <p>Total Incident</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <Link :href="route('incidents.index')" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></Link>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{  respondent }}</h3>
                    <p>Total Respondent</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <Link :href="route('respondents.index')" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></Link>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{  team }}</h3>
                    <p>Total Teams</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <Link :href="route('teams.index')" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></Link>
            </div>
        </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <Link :href="route('dashboard.export')" >
                    <div class="text-center">
                        <i class="fa fa-download fa-4x p-4"></i>
                        <h1>Export Dashboard</h1>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    </Link>
                </div>
            </div>
        </div>
        <section>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Latest Incidents</h3>
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
