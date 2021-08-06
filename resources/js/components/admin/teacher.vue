<template>
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <b-tabs
                active-nav-item-class="font-weight-bold text-uppercase text-danger"
                active-tab-class="font-weight-bold text-success"
                content-class="mt-3">

                <b-tab @click="selectTab1()" title="ایجاد استاد" active>

                    <b-container fluid>


                        <b-row class="my-1">

                            <b-col md="4">
                                <b-form-input
                                    placeholder="نام معلم"
                                    class="branch-input"
                                    v-model="teacherName"
                                    id="input-default">

                                </b-form-input>
                            </b-col>
                            <b-col md="4">
                                <b-form-input
                                    placeholder="نام کاربری"
                                    class="branch-input"
                                    v-model="teacherUserName"
                                    id="input-default">

                                </b-form-input>
                            </b-col>
                            <b-col md="4">
                                <b-form-input
                                    placeholder="کلمه عبور"
                                    class="branch-input"
                                    v-model="teacherPass"
                                    id="input-default">

                                </b-form-input>
                            </b-col>
                            <b-col md="4">
                                <b-overlay class="dropzone" :show="show_teacher_overlay" rounded="sm">
                                    <dropzon_teacher_pic
                                        ref="refDropZon_teacher"
                                        @add_teacher="add_teacher_pic">
                                    </dropzon_teacher_pic>


                                </b-overlay>
                            </b-col>
                            <b-col md="4">
                                <b-form-checkbox
                                    id="checkbox-1"
                                    v-model="is_mosh"
                                    name="checkbox-1"
                                    value=1
                                    unchecked-value=0
                                >
                                    مشاور
                                </b-form-checkbox>
                            </b-col>
                            <b-col md="3">
                                <b-form-group label-cols="4" label-cols-lg="2" label="آموزشگاه:"
                                              label-for="input-default">
                                    <v-select
                                        dir="rtl"
                                        v-model="all_amozeshgah_select_id"
                                        :options="all_amozeshgah_select"
                                        label="title"/>
                                </b-form-group>
                            </b-col>
                            <b-col md="2">
                                <b-button class="teacherRegister" @click="saveTeacher()" variant="success">ثبت
                                </b-button>
                            </b-col>
                        </b-row>


                    </b-container>

                </b-tab>
                <b-tab @click="selectTab()" title="نمایش اساتید ">

                    <b-overlay :show="show_teacher_overlay" rounded="lg">
                        <div class="col-12 amozeshgah">
                            <div class="card " v-if="show_teacher">
                                <div class="card-header"><h4 class="mb-0">لیست اساتید</h4>
                                </div>
                                <div class="card-content">
                                    <div class="table-responsive mt-1">
                                        <table class="table table-hover-animation mb-0">
                                            <thead>
                                            <tr>
                                                <th>ردیف</th>
                                                <th>آموزشگاه</th>
                                                <th>نام</th>
                                                <th>نام کاربری</th>
                                                <th>پسورد</th>
                                                <th>تصویر</th>
                                                <th>دروس</th>
                                                <th>تاریخ ایجاد</th>
                                                <th>تاریخ ویرایش</th>
                                                <th>ویرایش</th>
                                                <th>حذف</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-for="row in all_teacher.data">
                                                <td>{{ row.id }}</td>
                                                <td>{{ row.amozeshgah_title }}</td>
                                                <td>{{ row.name }}</td>
                                                <td>{{ row.user_name }}</td>
                                                <td>{{ row.pass }}</td>
                                                <td>
                                                    <img
                                                        v-if="row.pic != null"
                                                        width="150px"
                                                        height="120px"
                                                        :src="'/dropZon/teacher/'+row.pic"
                                                        alt="User Profile Picture"
                                                        class="user-photo">

                                                    <img
                                                        v-else
                                                        width="150px"
                                                        height="120px"
                                                        :src="'/dropZon/teacher/teacher.png'"
                                                        alt="User Profile Picture"
                                                        class="user-photo">
                                                </td>
                                                <td>
                                                                                                        <span
                                                                                                            class="click">
                                                                                                        <font-awesome-icon
                                                                                                            @click="show_teacher_lesson_func(row.id,row.name,row.amozeshgah_id)"
                                                                                                            icon="eye"
                                                                                                            :style="{ color: 'green' }"
                                                                                                            size="lg"/>
                                                                                                        </span>
                                                </td>
                                                <td>{{ row.created_at }}</td>
                                                <td>{{ row.updated_at }}</td>


                                                <td>
                                                                                                        <span
                                                                                                            class="click">
                                                                                                        <font-awesome-icon
                                                                                                            @click="editTeacher_func(row.id,row.name,row.user_name,row.pass,row.pic,row.is_mosh,row.amozeshgah_id,row.amozeshgah_title)"
                                                                                                            icon="edit"
                                                                                                            :style="{ color: 'blue' }"
                                                                                                            size="lg"/>
                                                                                                        </span>
                                                </td>
                                                <td>
                                                                                                        <span
                                                                                                            class="click">
                                                                                                        <font-awesome-icon
                                                                                                            @click="removeTeacher_func(row.id,row.pic)"
                                                                                                            icon="trash"
                                                                                                            :style="{ color: 'red' }"
                                                                                                            size="lg"/>
                                                                                                        </span>
                                                </td>

                                            </tr>


                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <pagination
                                v-if="show_teacher"
                                :data="all_teacher"
                                @pagination-change-page="selectTab">
                            </pagination>

                        </div>
                    </b-overlay>

                    <div class="col-12 edit_amozeshgah " v-if="show_edit_teacher">
                        <b-row v-if="show_edit_teacher">
                            <b-col cols="8">
                                <b-button
                                    @click="cancel_edit_teacher()" variant="danger">انصراف
                                </b-button>
                            </b-col>
                        </b-row>
                        <div class="card">
                            <b-container fluid>


                                <b-row class="my-1">

                                    <b-col md="4">
                                        <b-form-input
                                            placeholder="نام معلم"
                                            class="branch-input"
                                            v-model="teacherName"
                                            id="input-default">

                                        </b-form-input>
                                    </b-col>
                                    <b-col md="4">
                                        <b-form-input
                                            placeholder="نام کاربری"
                                            class="branch-input"
                                            v-model="teacherUserName"
                                            id="input-default">

                                        </b-form-input>
                                    </b-col>
                                    <b-col md="4">
                                        <b-form-input
                                            placeholder="کلمه عبور"
                                            class="branch-input"
                                            v-model="teacherPass"
                                            id="input-default">

                                        </b-form-input>
                                    </b-col>
                                    <b-col md="4">
                                        <b-overlay class="dropzone" :show="show_teacher_overlay" rounded="sm">

                                            <dropzon_teacher_pic_edit
                                                :teacher_file_list="teacher_file_list"
                                                @get_teacher_img_for_edit="get_teacher_img_for_edit"
                                                ref="refDropZon_teacher1"
                                                @add_teacher="add_teacher_pic">
                                            </dropzon_teacher_pic_edit>


                                        </b-overlay>
                                    </b-col>
                                    <b-col md="4">
                                        <b-form-checkbox
                                            id="checkbox-1"
                                            v-model="is_mosh"
                                            name="checkbox-1"
                                            value=1
                                            unchecked-value=0
                                        >
                                            مشاور
                                        </b-form-checkbox>
                                    </b-col>
                                    <b-col md="3">
                                        <b-form-group label-cols="4" label-cols-lg="2" label="آموزشگاه:"
                                                      label-for="input-default">
                                            <v-select
                                                dir="rtl"
                                                v-model="all_amozeshgah_select_id"
                                                :options="all_amozeshgah_select"
                                                label="title"/>
                                        </b-form-group>
                                    </b-col>
                                    <b-col md="2">
                                        <b-button class="teacherRegister" @click="saveTeacher()" variant="success">ثبت
                                        </b-button>
                                    </b-col>
                                </b-row>


                            </b-container>
                        </div>
                    </div>

                    <div class="col-12 teacher_lesson " v-if="show_teacher_lesson">
                        <b-row v-if="show_teacher_lesson" style="    margin-bottom: 15px;">
                            <b-col cols="8">
                                <b-button
                                    @click="cancel_teacher_lesson()" variant="danger">انصراف
                                </b-button>
                                <b-button
                                    @click="saveTeacherLesson()" variant="success">ثبت
                                </b-button>
                            </b-col>
                        </b-row>
                        <div class="card">
                            <b-container fluid>


                                <b-row class="my-1">

                                    <b-col md="3"
                                           v-if="all_branch_select.length >0 && all_amozeshgah_select.length >0  ">
                                        <b-overlay :show="show_branch_select_overlay" rounded="lg">
                                            <b-form-group label-cols="4" label-cols-lg="2" label=" شعبه:"
                                                          label-for="input-default">
                                                <v-select
                                                    @input="branchSelect(true)"
                                                    dir="rtl"
                                                    v-model="all_branch_select_id"
                                                    :options="all_branch_select"
                                                    label="title"/>
                                            </b-form-group>
                                        </b-overlay>
                                    </b-col>
                                    <b-col md="3" v-if="all_bases_select.length >0 && all_branch_select.length >0 ">
                                        <b-overlay :show="show_base_select_overlay" rounded="lg">
                                            <b-form-group label-cols="4" label-cols-lg="2" label="پایه:"
                                                          label-for="input-default">
                                                <v-select
                                                    @input="baseSelect(true)"
                                                    dir="rtl"
                                                    v-model="all_bases_select_id"
                                                    :options="all_bases_select"
                                                    label="title"/>
                                            </b-form-group>
                                        </b-overlay>
                                    </b-col>
                                    <b-col md="3" v-if="all_major_select.length >0 && all_bases_select.length >0 ">
                                        <b-overlay :show="show_major_select_overlay" rounded="lg">
                                            <b-form-group label-cols="4" label-cols-lg="2" label="رشته:"
                                                          label-for="input-default">
                                                <v-select
                                                    @input="majorSelect(true)"
                                                    dir="rtl"
                                                    v-model="all_major_select_id"
                                                    :options="all_major_select"
                                                    label="title"/>
                                            </b-form-group>
                                        </b-overlay>
                                    </b-col>
                                    <!--                                    <b-col md="3" v-if="all_lesson_select.length >0 && all_major_select.length >0 ">-->
                                    <b-col md="3" v-if="all_lesson_select.length >0  ">
                                        <b-overlay :show="show_lesson_select_overlay" rounded="lg">
                                            <b-form-group label-cols="4" label-cols-lg="2" label="درس :"
                                                          label-for="input-default">
                                                <v-select
                                                    dir="rtl"
                                                    v-model="all_lesson_select_id"
                                                    :options="all_lesson_select"
                                                    label="title"/>
                                            </b-form-group>
                                        </b-overlay>
                                    </b-col>

                                </b-row>


                                <b-row class="my-1">
                                    <div class="card-header" style="width: 100%">
                                        <h4 class="mb-0">لیست دروس
                                            <span style="color: red">{{ teacherName }}</span>
                                        </h4>
                                    </div>
                                    <b-overlay style="width: 100%;" :show="show_teacher_lesson_overlay" rounded="lg">
                                        <div class="card-content" style="width: 100%">
                                            <div class="table-responsive mt-1">
                                                <table class="table table-hover-animation mb-0">
                                                    <thead>
                                                    <tr>
                                                        <th>ردیف</th>
                                                        <th>آموزشگاه</th>
                                                        <th>شعبه</th>
                                                        <th>پایه</th>
                                                        <th>رشته</th>
                                                        <th>درس</th>
                                                        <th>تاریخ ایجاد</th>
                                                        <th>تاریخ ویرایش</th>
                                                        <th>ویرایش</th>
                                                        <th>حذف</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr v-for="row in all_teacher_lesson.data">
                                                        <td>{{ row.id }}</td>
                                                        <td>{{ row.amozeshgah }}</td>
                                                        <td>{{ row.branch_title }}</td>
                                                        <td>{{ row.base_title }}</td>
                                                        <td v-if="row.major_title != null">{{ row.major_title }}</td>
                                                        <td v-else style="color: red">بدون رشته</td>
                                                        <td>{{ row.lesson_title }}</td>
                                                        <td>{{ row.created_at }}</td>
                                                        <td>{{ row.updated_at }}</td>
                                                        <td>
                                                                                                        <span
                                                                                                            class="click">
                                                                                                        <font-awesome-icon
                                                                                                            @click="editTeacherLesson_func(row.id,row.branch_id,row.branch_title,row.base_id,row.base_title,row.major_id,row.major_title,row.lesson_id,row.lesson_title)"
                                                                                                            icon="edit"
                                                                                                            :style="{ color: 'blue' }"
                                                                                                            size="lg"/>
                                                                                                        </span>
                                                        </td>
                                                        <td>
                                                                                                        <span
                                                                                                            class="click">
                                                                                                        <font-awesome-icon
                                                                                                            @click="removeTeacherLesson_func(row.id,row.pic)"
                                                                                                            icon="trash"
                                                                                                            :style="{ color: 'red' }"
                                                                                                            size="lg"/>
                                                                                                        </span>
                                                        </td>

                                                    </tr>


                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </b-overlay>
                                    <pagination
                                        v-if="show_teacher_lesson"
                                        :data="all_teacher_lesson"
                                        @pagination-change-page="getTeacherLesson">
                                    </pagination>

                                </b-row>


                            </b-container>
                        </div>


                    </div>

                    <div class="col-12 teacher_lesson " v-if="show_teacher_lesson_edit">
                        <b-row v-if="show_teacher_lesson_edit" style="    margin-bottom: 15px;">
                            <b-col cols="8">
                                <b-button
                                    @click="cancel_teacher_lesson_edit()" variant="danger">انصراف
                                </b-button>
                                <b-button
                                    @click="saveTeacherLesson()" variant="success">ثبت
                                </b-button>
                            </b-col>
                        </b-row>
                        <div class="card">
                            <b-container fluid>
                                <b-row class="my-1">
                                    <b-col md="3"
                                           v-if="all_branch_select.length >0 && all_amozeshgah_select.length >0  ">
                                        <b-overlay :show="show_branch_select_overlay" rounded="lg">
                                            <b-form-group label-cols="4" label-cols-lg="2" label=" شعبه:"
                                                          label-for="input-default">
                                                <v-select
                                                    @input="branchSelect(true)"
                                                    dir="rtl"
                                                    v-model="all_branch_select_id"
                                                    :options="all_branch_select"
                                                    label="title"/>
                                            </b-form-group>
                                        </b-overlay>
                                    </b-col>
                                    <b-col md="3" v-if="all_bases_select.length >0 && all_branch_select.length >0 ">
                                        <b-overlay :show="show_base_select_overlay" rounded="lg">
                                            <b-form-group label-cols="4" label-cols-lg="2" label="پایه:"
                                                          label-for="input-default">
                                                <v-select
                                                    @input="baseSelect(true)"
                                                    dir="rtl"
                                                    v-model="all_bases_select_id"
                                                    :options="all_bases_select"
                                                    label="title"/>
                                            </b-form-group>
                                        </b-overlay>
                                    </b-col>
                                    <b-col md="3" v-if="all_major_select.length >0 && all_bases_select.length >0 ">
                                        <b-overlay :show="show_major_select_overlay" rounded="lg">
                                            <b-form-group label-cols="4" label-cols-lg="2" label="رشته:"
                                                          label-for="input-default">
                                                <v-select
                                                    @input="majorSelect(true)"
                                                    dir="rtl"
                                                    v-model="all_major_select_id"
                                                    :options="all_major_select"
                                                    label="title"/>
                                            </b-form-group>
                                        </b-overlay>
                                    </b-col>
                                    <b-col md="3" v-if="all_lesson_select.length >0  ">
                                        <b-overlay :show="show_lesson_select_overlay" rounded="lg">
                                            <b-form-group label-cols="4" label-cols-lg="2" label="درس :"
                                                          label-for="input-default">
                                                <v-select
                                                    dir="rtl"
                                                    v-model="all_lesson_select_id"
                                                    :options="all_lesson_select"
                                                    label="title"/>
                                            </b-form-group>
                                        </b-overlay>
                                    </b-col>
                                </b-row>
                            </b-container>
                        </div>


                    </div>


                </b-tab>

            </b-tabs>
        </div>
    </div>
</template>


<style>


.dropzone-box .container {
    width: 100%;
    max-width: 100%;
    margin-top: 21px;
}

.dropzone .dz-preview.dz-image-preview {
    background: white;
    padding: 0;
    margin: 0;
    border: 0;
    width: 100%;
    height: 100%;
    text-align: center;
}

.dropzone.dz-clickable {
    cursor: pointer;
    width: 100%;
    height: 100px;
    padding: 0;
    margin: 0;
    text-align: center;
}

.dropzone .container, .container-fluid {
    height: unset;
}

.dropzone .dz-preview .dz-image img {
    width: 100%;
    height: 100%;
}

.teacherRegister {
    margin-top: 19px !important;
}

.teacherLesson .container, .container-fluid {
    min-height: 400px !important;
    height: unset !important;
}
</style>


<script>
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue)


import axios from "axios";
import Swal from "sweetalert2";

//***************************************persian date
import VuePersianDatetimePicker from 'vue-persian-datetime-picker';

Vue.component("date-picker", VuePersianDatetimePicker);
Vue.use(VuePersianDatetimePicker, {
    name: "custom-date-picker",
    props: {
        placeholder: ""
    }
});

//****************************************pagination
Vue.component('pagination', require('laravel-vue-pagination'));

/************************* start font awesome */

import {library} from '@fortawesome/fontawesome-svg-core'
import {fas} from '@fortawesome/free-solid-svg-icons'
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome'

library.add(fas)

Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.config.productionTip = false

/************************* end font awesome */

/***************VSelect with search*/
/*import VSelect from "@alfsnd/vue-bootstrap-select";*/


/***************vue-select with button that have close*/

import vSelect from 'vue-select'

Vue.component('v-select', vSelect)

import 'vue-select/dist/vue-select.css';
import Dropzon_teacher_pic_edit from "./dropZon/dropzon_teacher_pic_edit";

/****************************dropzon*/
Vue.component('dropzon_teacher_pic', require('./dropZon/dropzon_teacher_pic.vue').default);


export default {

    watch: {},
    data() {
        return {
            /*********************************base*/
            selected_base: 0,
            options_base: [
                {value: 0, text: 'لطفا یک مقطع را انتخاب کنید'},
                {value: 1, text: 'ابتدایی'},
                {value: 2, text: 'متوسطه اول'},
                {value: 3, text: 'متوسطه دوم'},
            ],


            //////////////////////////////


            lessonTitle: '',
            lessonId: '',


            /*************************************/
            show_edit_teacher: false,
            show_teacher: true,
            teacherId: '',
            teacherName: '',
            teacherUserName: '',
            teacherPass: '',
            teacher_pic: '',
            is_mosh: "0",
            show_teacher_overlay: false,
            all_teacher: {},
            teacher_file_list: {},
            time: '',

            all_amozeshgah_select: [{id: 0, title: 'آموزشگاه را انتخاب کنید'}],
            all_amozeshgah_select_id: {id: 0, title: 'آموزشگاه را انتخاب کنید'},

            show_branch_select_overlay: false,
            all_branch_select: [],
            all_branch_select_id: null,

            all_bases_select: [],
            all_bases_select_id: null,
            show_base_select_overlay: false,


            show_major_select_overlay: false,
            all_major_select: [],
            all_major_select_id: null,


            show_lesson_select_overlay: false,
            all_lesson_select: [],
            all_lesson_select_id: null,


            show_teacher_lesson: false,

            all_teacher_lesson: {},
            show_teacher_lesson_overlay: false,


            show_teacher_lesson_edit: false,

            teacher_managment_id: '',


        }
    },
    components: {Dropzon_teacher_pic_edit},
    computed: {},
    mounted() {
        this.getAmozeshgah();
    },
    methods: {
        currentTime() {
            var today = new Date();
            var date = new Date().toLocaleDateString('fa-IR').replace(/([۰-۹])/g, function (token) {
                return String.fromCharCode(token.charCodeAt(0) - 1728);
            });
            this.time = date;
        },

        removeTeacher_func(teacherId, pic) {


            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'آیا مایل به حذف می باشید',
                text: "",
                icon: 'question',
                iconHtml: '؟',
                confirmButtonText: 'بله حذف شود',
                cancelButtonText: 'خیر کنسل شود',
                showCancelButton: true,
                showCloseButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    axios
                        .post("/admin/remove_teacher", {
                            teacherId: teacherId,
                            img: pic,
                        })
                        .then(response => {

                            if (response.data == "yes") {

                                swalWithBootstrapButtons.fire(
                                    'حذف',
                                    'مورد شما با موفقیت حذف شد',
                                    'success'
                                )
                                this.cancel_edit_teacher();
                                this.selectTab();

                            } else {

                                swalWithBootstrapButtons.fire(
                                    'حذف',
                                    'عمل حذف انجام نشد',
                                    'error'
                                )
                            }


                        });


                }
            })
        },


        selectTab(page = 1) {

            this.show_teacher_overlay = true;

            axios.get("/admin/teacher_get?page=" + page).then(response => {
                this.show_teacher_overlay = false;
                this.all_teacher = response.data
            })
        },

        add_teacher_pic(img, file) {
            if (img) {
                this.teacher_pic = img;
            } else {
                this.show_teacher_overlay = true;
                axios
                    .post("/admin/teacher_pic_Dropzone_remove", {
                        img: this.teacher_pic,
                    })
                    .then(response => {
                        if (response.data == "yes") {
                            this.show_teacher_overlay = false;
                            /*Swal.fire("", "فایل با موفقیت حذف شد", "success");*/
                            this.teacher_pic = "";
                        }
                    });
            }

        },

        editTeacher_func(id, name, user_name, pass, pic, is_mosh, amozeshgah_id, amozeshgah_title) {
            this.show_teacher = false;
            this.show_edit_teacher = true;
            this.teacherId = id;
            this.teacherName = name;
            this.teacherUserName = user_name;
            this.teacherPass = pass;
            this.teacher_pic = pic;

            if (is_mosh == 0)
                this.is_mosh = "0";
            else
                this.is_mosh = "1";

            this.all_amozeshgah_select_id = {id: amozeshgah_id, title: amozeshgah_title};


        },

        cancel_edit_teacher() {

            this.teacherId = '';
            this.teacherName = '';
            this.teacherUserName = '';
            this.teacherPass = '';
            this.show_teacher = true;
            this.teacher_pic = "";
            this.show_edit_teacher = false;

            this.is_active = false;


        },

        get_teacher_img_for_edit() {
            /****************************************************get news img file from server*/
            axios
                .post("/admin/get_teacher_img_for_edit", {
                    img: this.teacher_pic,
                })
                .then(response => {
                    this.teacher_file_list = response.data.fil_list[0];
                });


        },

        show_teacher_lesson_func(teacherId, name, amozeshgah_id) {
            this.teacherId = teacherId;
            this.teacherName = name;
            this.all_amozeshgah_select_id.id = amozeshgah_id;
            this.amozeshgahSelect(amozeshgah_id, false)
            this.getTeacherLesson();

            this.show_teacher_lesson = true;
            this.show_teacher = false;


        },

        cancel_teacher_lesson() {
            this.show_teacher_lesson = false;
            this.show_teacher = true;

            this.all_branch_select = [];
            this.all_branch_select_id = null;

            this.all_bases_select = [];
            this.all_bases_select_id = null;


            this.all_major_select = [];
            this.all_major_select_id = null;


            this.all_lesson_select = [];
            this.all_lesson_select_id = null;

            this.all_amozeshgah_select_id.id = 0;


        },

        getAmozeshgah() {

            axios.get("/admin/amozeshgah_get_for_select").then(response => {
                this.show_amozeshgah_select_overlay = false;
                this.all_amozeshgah_select = response.data

            })

        },

        selectTab1() {
            this.all_amozeshgah_select_id = {id: 0, title: 'آموزشگاه را انتخاب کنید'},
                this.teacherName = "";
            this.teacherUserName = "";
            this.teacherPass = "";
            this.is_mosh = "0";
            this.teacherId = "";
            this.teacher_pic = "";
            this.$refs.refDropZon_teacher1.removeFile();


            this.all_branch_select = [];
            this.all_branch_select_id = null;

            this.all_bases_select = [];
            this.all_bases_select_id = null;


            this.all_major_select = [];
            this.all_major_select_id = null;


            this.all_lesson_select = [];
            this.all_lesson_select_id = null;


        },

        amozeshgahSelect(amozeshgah_id, show_first_parameter) {


            this.show_branch_select_overlay = true;
            axios
                .post("/admin/amozeshgahSelect", {
                    amozeshgah_select_id: amozeshgah_id,
                })
                .then(response => {
                    if (show_first_parameter) {
                        this.all_branch_select_id = null;
                        this.all_bases_select = [];
                        this.all_bases_select_id = null;
                    }
                    this.all_branch_select = response.data;
                    this.show_branch_select_overlay = false;

                });
        },

        branchSelect(show_first_parameter) {
            this.show_base_select_overlay = true;
            axios
                .post("/admin/branchSelect", {
                    branch_select_id: this.all_branch_select_id.id,
                })
                .then(response => {
                    if (show_first_parameter) {
                        this.all_bases_select_id = null;

                        this.all_major_select = [];
                        this.all_major_select_id = null;

                        this.all_lesson_select = [];
                        this.all_lesson_select_id = null;
                    }
                    this.all_bases_select = response.data;
                    this.show_base_select_overlay = false;
                });
        },

        baseSelect(show_first_parameter) {
            this.show_major_select_overlay = true;
            this.show_lesson_select_overlay = true;
            axios
                .post("/admin/baseSelectForLesson", {
                    base_select_id: this.all_bases_select_id.id,
                })
                .then(response => {
                    if (show_first_parameter) {
                        this.all_major_select_id = null;
                        this.all_lesson_select = [];
                        this.all_lesson_select_id = null;
                    }
                    if (response.data.have_major == "yes") {

                        this.all_major_select = response.data.major;
                        /*this.majorSelect(false);*/

                    } else if (response.data.have_major == "no") {
                        this.all_lesson_select = response.data.lesson;
                    } else {
                        this.all_major_select = [];
                        this.all_lesson_select = [];
                    }
                    this.show_major_select_overlay = false;
                    this.show_lesson_select_overlay = false;

                });
        },

        majorSelect(show_first_parameter) {

            if (this.all_major_select_id.id == null) {
                return;
            }


            this.show_lesson_select_overlay = true;
            axios
                .post("/admin/majorSelect", {
                    major_select_id: this.all_major_select_id.id,
                })
                .then(response => {
                    if (show_first_parameter) {
                        this.all_lesson_select_id = null;
                    }
                    this.all_lesson_select = response.data;
                    this.show_lesson_select_overlay = false;
                });
        },

        saveTeacher() {

            if (
                this.teacherName == ""
                || this.teacherUserName == ""
                || this.teacherPass == ""
                || this.all_amozeshgah_select_id.id == 0

            ) {
                Swal.fire("", "همه موارد را پر کنید", "error");
                return;
            }
            var is_moshaver = 0;
            if (this.is_mosh == "1")
                is_moshaver = 1;

            this.currentTime();
            axios
                .post("/admin/teacher_add", {
                    teacherId: this.teacherId,
                    teacherName: this.teacherName,
                    teacherUserName: this.teacherUserName,
                    teacherPass: this.teacherPass,
                    teacher_pic: this.teacher_pic,
                    created_or_update_at: this.time,
                    is_mosh: is_moshaver,
                    amozeshgah_id: this.all_amozeshgah_select_id.id,
                })
                .then(response => {

                    if (response.data == "save") {

                        this.teacherId = "";
                        this.teacherName = "";
                        this.teacherUserName = "";
                        this.teacherPass = "";
                        this.teacher_pic = "";
                        this.all_amozeshgah_select_id = {id: 0, title: 'آموزشگاه را انتخاب کنید'},

                            this.add_teacher_pic(this.teacher_pic);
                        this.$refs.refDropZon_teacher.removeFile();

                    } else if (response.data == "update") {
                        this.cancel_edit_teacher();
                        this.selectTab();

                    } else {
                        Swal.fire("", "خطا در عملیات", "error");
                    }

                });
        },

        saveTeacherLesson() {
            if (this.all_amozeshgah_select_id.id == 0
                || this.all_branch_select_id == null
                || this.all_bases_select_id == null
                || this.all_lesson_select_id == null
            ) {
                Swal.fire("", "همه موارد را پر کنید", "error");
                return;
            }

            var major_id = null;

            if (this.all_major_select_id != null) {
                major_id = this.all_major_select_id.id;
            }
            this.currentTime();
            axios
                .post("/admin/teacherLesson", {
                    teacher_managment_id: this.teacher_managment_id,
                    amozeshgah_id: this.all_amozeshgah_select_id.id,
                    branch_id: this.all_branch_select_id.id,
                    base_id: this.all_bases_select_id.id,
                    major_id: major_id,
                    lesson_id: this.all_lesson_select_id.id,
                    teacher_id: this.teacherId,
                    created_or_update_at: this.time,
                })
                .then(response => {

                    if (response.data == "save") {

                        this.all_branch_select_id = null;

                        this.all_bases_select = [];
                        this.all_bases_select_id = null;

                        this.all_major_select = [];
                        this.all_major_select_id = null;


                        this.all_lesson_select = [];
                        this.all_lesson_select_id = null;

                        this.getTeacherLesson();


                    } else if (response.data == "update") {
                        this.cancel_teacher_lesson_edit();
                        this.getTeacherLesson();

                    } else {
                        Swal.fire("", "خطا در عملیات", "error");
                    }

                });
        },

        getTeacherLesson(page = 1) {
            this.show_teacher_lesson_overlay = true;
            axios
                .post("/admin/get_teacherLesson?page=" + page, {
                    teacher_id: this.teacherId,
                })
                .then(response => {
                    this.show_teacher_lesson_overlay = false;
                    this.all_teacher_lesson = response.data
                });
        },


        editTeacherLesson_func(id, branch_id, branch_title, base_id, base_title, major_id, major_title, lesson_id, lesson_title) {
            this.teacher_managment_id = id;
            this.show_teacher_lesson = false;
            this.show_teacher_lesson_edit = true;

            this.all_branch_select_id = {id: branch_id, title: branch_title};
            this.all_bases_select_id = {id: base_id, title: base_title};
            this.all_major_select_id = {id: major_id, title: major_title};
            this.all_lesson_select_id = {id: lesson_id, title: lesson_title};

            this.branchSelect(false);
            this.baseSelect(false);
            this.majorSelect(false);


        },
        cancel_teacher_lesson_edit() {
            this.teacher_managment_id = '';
            this.show_teacher_lesson = true;
            this.show_teacher_lesson_edit = false;


            this.all_bases_select = [];
            this.all_bases_select_id = null

            this.all_major_select = [];
            this.all_major_select_id = null


            this.all_lesson_select = [];
            this.all_lesson_select_id = null

        },

        removeTeacherLesson_func(id) {


            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'آیا مایل به حذف می باشید',
                text: "",
                icon: 'question',
                iconHtml: '؟',
                confirmButtonText: 'بله حذف شود',
                cancelButtonText: 'خیر کنسل شود',
                showCancelButton: true,
                showCloseButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    axios
                        .post("/admin/remove_teacher_lesson", {
                            teacher_managment_id: id,
                        })
                        .then(response => {

                            if (response.data == "yes") {

                                swalWithBootstrapButtons.fire(
                                    'حذف',
                                    'مورد شما با موفقیت حذف شد',
                                    'success'
                                )
                                this.cancel_teacher_lesson_edit();
                                this.getTeacherLesson();

                            } else {

                                swalWithBootstrapButtons.fire(
                                    'حذف',
                                    'عمل حذف انجام نشد',
                                    'error'
                                )
                            }


                        });


                }
            })
        },


    }
}
</script>

