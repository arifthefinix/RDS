<script setup>
import Wrapper from '@/Components/Wrapper.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import InputError from '@/Components/InputError.vue';
defineProps({
    incident:Object,
});

function imagePath($image){
    return '/storage/'+$image;
}
</script>

<template>
<Wrapper>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Incident Details:{{  incident[0].title }}</h5>
                </div>
                <div class="card-body">
                    <h4>ID: #IN-{{ incident[0].id}}</h4>
                    <h4>Title: {{ incident[0].title}}</h4>
                    <h4>Contact Person Name: {{ incident[0].contact_person_name }}</h4>
                    <h4>Contact Person Phone Number: {{ incident[0].contact_person_number}}</h4>
                    <h4>Incident Address: {{ incident[0].address}}</h4>
                    <h4>Incident Details: {{ incident[0].details}}</h4>

                    <div v-for="image in incident[0].incident_images">
                        <img :src="imagePath(image.incident_image)" class="img-fluid" alt="">
                    </div>
                </div>
            </div>

        </div>
    </div>
</Wrapper>
</template>
