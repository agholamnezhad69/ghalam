<template>
    <div class="container">
        <vue-dropzone
            ref="refDropZon_teacher1"
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
    /*this property called image in server to dropzone */
    props: ['teacher_file_list'],
    watch: {
        /*when this method put image from server this method must run put image to dropzone*/
        teacher_file_list: function () {
            this.getThumbnailImg1();
        },
    },
    components: {
        vueDropzone: vue2Dropzone
    },
    data: function () {
        return {
            dropzoneOptions: {
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

    mounted() {
        this.getThumbnailImg();
    },
    methods: {
        /*when upload successful file*/
        success(file, response) {
            this.$emit('add_teacher', response, file)
        },
        /*when remove file from dropzon we delete file from server then  call add_teacher  method
         from teacher.vue      */
        removeTeacherpic(file, error, xhr) {
            if (this.$refs.refDropZon_teacher1.dropzone.disabled !== true) {
                this.$emit('add_teacher', "", file)
            }

        },
        /*remove file when save teacher then call this method from teacher.vue       */
        removeFile() {
            this.$refs.refDropZon_teacher1.removeAllFiles();
        },

        /*get teacher image from server to dropzone when click edit icon and this method called in mounted */
        getThumbnailImg() {
            this.$emit('get_teacher_img_for_edit')
        },
        /*when image put from server to teacher_file_list variable this variable called in watch and this method called  */
        getThumbnailImg1() {
            this.$nextTick(function () {

                if (this.teacher_file_list) {
                    var file = {
                        size: this.teacher_file_list.size,
                        name: this.teacher_file_list.name,
                        path: this.teacher_file_list.path,
                    };
                    var url = "";
                    this.$refs.refDropZon_teacher1.manuallyAddFile(file, '/dropZon/teacher/' + this.teacher_file_list.name);
                }
            });
        }
    }
}
</script>
