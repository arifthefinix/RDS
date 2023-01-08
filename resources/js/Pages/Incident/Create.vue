<script setup>
import Wrapper from '@/Components/Wrapper.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import InputError from '@/Components/InputError.vue';
const form = useForm({
    title: '',
    details: '',
    status: '',
    contact_person_name: '',
    contact_person_number: '',
    incident_address: '',
});
const submit = () => {
    form.post(route('incidents.store'), {
        onFinish: () => form.reset('title','details','status','contact_person_name','contact_person_number','incident_address')
    });
};
</script>
<template>
    <Wrapper>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Incident</h1>
                    </div>
                    <div class="col-sm-6">
                        <Link :href="route('incidents.index')" class="btn btn-primary">Incident List</Link>
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
                        <h3 class="card-title">Add Incident</h3>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="submit">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Incident Name</label>
                                    <input type="text" class="form-control"  placeholder="Enter Incident Name" v-model="form.title">
                                    <InputError class="mt-2" :message="form.errors.title" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Contact Person</label>
                                    <input type="text" class="form-control"  placeholder="Enter Contact Person Name" v-model="form.contact_person_name">
                                    <InputError class="mt-2" :message="form.errors.contact_person_name" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Contact Person</label>
                                    <input type="text" class="form-control"  placeholder="Enter Contact Person Number" v-model="form.contact_person_number">
                                    <InputError class="mt-2" :message="form.errors.contact_person_number" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Incident Address</label>
                                    <textarea rows="2" class="form-control" placeholder="Enter Incident Address" v-model="form.incident_address"></textarea>
                                    <InputError class="mt-2" :message="form.errors.incident_address" />
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Incident Details</label>
                                    <textarea rows="6" class="form-control" placeholder="Enter Incident Details" v-model="form.details"></textarea>
                                    <InputError class="mt-2" :message="form.errors.details" />
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" v-model="form.status" name="status">
                                            <option>Select Status</option>
                                            <option v-bind:value="1">Serious</option>
                                            <option v-bind:value="2">Critical</option>
                                        </select>
                                    </div>
                                </div>
                                <InputError class="mt-2" :message="form.errors.team_id" />
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-outline-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card -->

        </section>
    </Wrapper>

</template>
