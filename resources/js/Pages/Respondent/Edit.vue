<script setup>
import Wrapper from '@/Components/Wrapper.vue';
import InputError from '@/Components/InputError.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';

const pros =defineProps({
    incidents:Object,
    teams:Object,
    respondent:Object,
});
const form = useForm({
    team_id: '',
    incident_id: '',
    'id':pros.respondent,
});

const submit = () => {
    form.put(route('respondents.update',pros.respondent), {
        onFinish: () => form.reset('team_id','incident_id')
    });
};
</script>
<template>
    <Wrapper>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Respondent</h1>
                    </div>
                    <div class="col-sm-6">
                        <Link :href="route('respondents.index')" class="btn btn-primary">Respondent List</Link>
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
                        <h3 class="card-title">Update Respondent</h3>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="submit">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Select Incident</label>
                                        <select class="form-control" v-model="form.incident_id" name="incident_id">
                                            <option>Select Incident</option>
                                            <option v-for="(incident, key) in incidents" v-bind:value="incident.id">{{incident.title}}</option>
                                        </select>
                                    </div>
                                </div>
                                <InputError class="mt-2" :message="form.errors.incident_id" />
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Select Team</label>
                                        <select class="form-control" v-model="form.team_id" name="team_id">
                                            <option>Select Team</option>
                                            <option v-for="(team, key) in teams" v-bind:value="team.id">{{team.name}}</option>
                                        </select>
                                    </div>
                                </div>
                                <InputError class="mt-2" :message="form.errors.team_id" />
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
