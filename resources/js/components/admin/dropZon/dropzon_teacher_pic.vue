<template>
    <div class="container">
        <vue-dropzone
            ref="refDropZon_teacher"
            id="dropzone"
            :options="dropzoneOptions"
            v-on:vdropzone-success="success"
            @vdropzone-removed-file="removeTeacherpic"
        ></vue-dropzone>
    </div>
</template>

<style>

</style>

<script>

import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'

export default {

    watch: {},
    components: {
        vueDropzone: vue2Dropzone
    },
    data: function () {
        return {
            dropzoneOptions: {
                /*save image to this method in admin controller*/
                url: '/admin/teacher_pic_Dropzone',
                maxFiles: 1,
                maxFilesize: 500000,
                timeout: 180000,
                addRemoveLinks: true,
                acceptedFiles: ".png,.jpg,.jpeg,.PNG,.JPG,.JPEG",
                dictDefaultMessage: "<i  class='fa fa-cloud-upload'></i>آپلود عکس",
                headers: {
                    "X-CSRF-TOKEN": document.head.querySelector("[name=csrf-token]").content
                }
            },
        }
    },

    methods: {
        /*when upload successful file*/
        success(file, response) {
            this.$emit('add_teacher', response, file)
        },
        /*when remove file from dropzon we delete file from server then  call add_teacher  method
         from teacher.vue      */
        removeTeacherpic(file, error, xhr) {
            if (this.$refs.refDropZon_teacher.dropzone.disabled !== true) {
                this.$emit('add_teacher', "", file)
            }

        },
        /*remove file when save teacher then call this method from teacher.vue       */

        removeFile() {
            this.$refs.refDropZon_teacher.removeAllFiles();
        },


    }
}
</script>
