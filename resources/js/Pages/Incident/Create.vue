<script setup>
import vueFilePond from "vue-filepond";
import "filepond/dist/filepond.min.css";

import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";

import 'filepond-plugin-file-poster/dist/filepond-plugin-file-poster.css';

import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
const FilePond = vueFilePond(
    FilePondPluginFileValidateType,
    FilePondPluginImagePreview,
    FilePondPluginImagePreview,
);

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
    image: '',
});
const submit = () => {
    form.post(route('incidents.store'), {
        onFinish: () => form.reset('title','details','status','contact_person_name','contact_person_number','incident_address')
    });
};

const imageFile =[];
const csrf= document.querySelector('meta[name="csrf-token"]').getAttribute('content');

function handleFilePondInit(){

}
function addFormImage(image){
    const arr = form.image?form.image.split('|'):[];
    arr.push(image);
    form.image=arr.join('|');
}

function handleFilePondLoad(response){
    // form.image = response;
    addFormImage(response);
    return response;
}
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
                        <form @submit.prevent="submit" enctype="multipart/form-data">
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
                                    <label for="exampleInputFile">Incident Image</label>
                                   <file-pond name="imageFilePond"
                                              ref="pond"
                                              v-bind:allow-multiple="true"
                                              accepted-file-types="image/png, image/jpeg"
                                              v-bind:server="{
                                                  url:'',
                                                  timeout:7000,
                                                  process:{
                                                      url:'/incident-image-upload',
                                                      method:'POST',
                                                      withCredentials:false,
                                                      onload:handleFilePondLoad,
                                                      headers:{
                                                          'X-CSRF-TOKEN':csrf
                                                      }
                                                  }
                                              }"
                                              v-bind:file="imageFile"
                                              v-on:init ="handleFilePondInit"
                                   >

                                   </file-pond>
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
