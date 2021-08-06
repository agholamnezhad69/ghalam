<template>
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <b-tabs
                active-nav-item-class="font-weight-bold text-uppercase text-danger"
                active-tab-class="font-weight-bold text-success"
                content-class="mt-3">

                <b-tab @click="selectTab1()" title="ایجاد رشته" active>

                    <b-container fluid>


                        <b-row class="my-1">
                            <b-col md="3">
                                <b-overlay :show="show_amozeshgah_select_overlay" rounded="lg">
                                    <b-form-group label-cols="4" label-cols-lg="2" label="آموزشگاه:"
                                                  label-for="input-default">
                                        <v-select
                                            @input="amozeshgahSelect(true)"
                                            dir="rtl"
                                            v-model="all_amozeshgah_select_id"
                                            :options="all_amozeshgah_select"
                                            label="title"/>
                                    </b-form-group>
                                </b-overlay>
                            </b-col>
                            <b-col md="3" v-if="all_branch_select.length >0 && all_amozeshgah_select.length >0  ">
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

                                            dir="rtl"
                                            v-model="all_bases_select_id"
                                            :options="all_bases_select"
                                            label="title"/>
                                    </b-form-group>
                                </b-overlay>
                            </b-col>

                            <b-col md="3" v-if="all_bases_select.length > 0 && all_bases_select_id != null ">
                                <b-form-input
                                    placeholder="رشته"
                                    class="branch-input"
                                    v-model="majorTitle"
                                    id="input-default">

                                </b-form-input>
                            </b-col>
                            <b-col md="2">
                                <b-button @click="saveMajor()" variant="success">ثبت</b-button>
                            </b-col>
                        </b-row>


                    </b-container>

                </b-tab>
                <b-tab @click="selectTab()" title="نمایش رشته ها">

                    <b-overlay :show="show_major_overlay" rounded="lg">
                        <div class="col-12 amozeshgah">
                            <div class="card " v-if="show_major">
                                <div class="card-header"><h4 class="mb-0">لیست پایه ها</h4>
                                </div>
                                <div class="card-content">
                                    <div class="table-responsive mt-1">
                                        <table class="table table-hover-animation mb-0">
                                            <thead>
                                            <tr>
                                                <th>ردیف</th>
                                                <th>آموزشگاه</th>
                                                <th>شعبه</th>
                                                <th>پایه</th>
                                                <th class="Aroco-th"> عنوان رشته</th>
                                                <th>تاریخ ایجاد</th>
                                                <th>تاریخ ویرایش</th>
                                                <th>حذف</th>
                                                <th>ویرایش</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-for="row in all_major.data">
                                                <td> {{ row.id }}</td>
                                                <td>{{ row.amozeshgah }}</td>
                                                <td>{{ row.title_branch }}</td>
                                                <td>{{ row.title_base }}</td>
                                                <td>{{ row.title }}</td>
                                                <td>{{ row.created_at }}</td>
                                                <td>{{ row.updated_at }}</td>
                                                <td>
                                                    <span class="click">
                                                    <font-awesome-icon
                                                        @click="removeMajor_func(row.id)"
                                                        icon="trash"
                                                        :style="{ color: 'red' }"
                                                        size="lg"/>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="click">
                                                    <font-awesome-icon
                                                        @click="editMajor_func(row.id,row.title,row.base_id,row.title_base,row.branch_id, row.title_branch,row.amozeshgah, row.parent_branch)"
                                                        icon="edit"
                                                        :style="{ color: 'blue' }"
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
                                v-if="show_major"
                                :data="all_major"
                                @pagination-change-page="selectTab">
                            </pagination>

                        </div>
                    </b-overlay>

                    <div class="col-12 edit_amozeshgah " v-if="show_edit_major">
                        <b-row v-if="show_edit_major">
                            <b-col cols="8">
                                <b-button
                                    @click="cancel_edit_major()" variant="danger">انصراف
                                </b-button>
                            </b-col>
                        </b-row>
                        <div class="card">
                            <b-container fluid>

                                <b-row class="my-1">
                                    <b-col md="3">
                                        <b-overlay :show="show_amozeshgah_select_overlay" rounded="lg">
                                            <b-form-group label-cols="4" label-cols-lg="3" label="آموزشگاه:"
                                                          label-for="input-default">
                                                <v-select
                                                    @input="amozeshgahSelect(true)"
                                                    dir="rtl"
                                                    v-model="all_amozeshgah_select_id"
                                                    :options="all_amozeshgah_select"
                                                    label="title"/>
                                            </b-form-group>
                                        </b-overlay>
                                    </b-col>
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

                                                    dir="rtl"
                                                    v-model="all_bases_select_id"
                                                    :options="all_bases_select"
                                                    label="title"/>
                                            </b-form-group>
                                        </b-overlay>
                                    </b-col>

                                    <b-col md="3" v-if="all_bases_select.length > 0 && all_bases_select_id != null ">
                                        <b-form-input
                                            placeholder="رشته"
                                            class="branch-input"
                                            v-model="majorTitle"
                                            id="input-default">

                                        </b-form-input>
                                    </b-col>
                                    <b-col md="2">
                                        <b-button @click="saveMajor()" variant="success">ثبت</b-button>
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

.branch-input {
    background-color: #e1e1e1 !important;
    color: #000000 !important;
    border: 1px solid #ff009e !important;
    margin-bottom: 12px;

}

.click {
    cursor: pointer;
}


button.swal2-confirm.btn.btn-success {
    margin-left: 9px;
}

.amozeshgah button.btn.btn-danger,
.add_branch button.btn.btn-danger,
.branch button.btn.btn-danger,
.edit_amozeshgah button.btn {
    margin-bottom: 20px;
}

.branch .btn.btn-success {
    margin-bottom: 20px;
}

.table-hover-animation thead th {
    text-align: center;
}

.table-hover-animation td, .table-hover-animation th {

    text-align: center;
}


ul[data-v-138dff1d] {
    overflow-y: scroll !important;
    max-height: 174px !important;
}

.v-dropdown-item[data-v-138dff1d] {
    text-align: right;
}

.branch-add {
    display: flex;
}

.my-card {
    height: 312px !important;
}


ul#vs4__listbox {
    overflow-y: scroll !important;
}

.container, .container-fluid {
    height: 400px;
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


export default {
    watch: {},
    data() {
        return {
            /*********************************base*/
            all_major: {},
            show_major: true,
            show_edit_major: false,
            show_major_overlay: false,
            majorId: '',
            majorTitle: '',
            all_bases_select: [],
            all_bases_select_id: null,
            show_base_select_overlay: false,
            time: '',
            /*******************amozeshgah*****************/
            show_amozeshgah_select_overlay: false,

            all_amozeshgah_select: [],
            all_amozeshgah_select_id: null,

            /*******************branch*****************/
            show_branch_select_overlay: false,
            all_branch_select: [],
            all_branch_select_id: null,


        }
    },
    components: {},
    computed: {},
    mounted() {
        this.getAmozeshgah()
    },
    methods: {
        currentTime() {
            var today = new Date();
            var date = new Date().toLocaleDateString('fa-IR').replace(/([۰-۹])/g, function (token) {
                return String.fromCharCode(token.charCodeAt(0) - 1728);
            });
            this.time = date;
        },

        /*****************************/
        saveMajor() {

            if (this.all_amozeshgah_select_id == null
                || this.all_branch_select_id == null
                || this.all_bases_select_id == null
                || this.majorTitle == ""

            ) {
                Swal.fire("", "همه موارد را پر کنید", "error");
                return;
            }


            this.currentTime();
            axios
                .post("/admin/major_add", {
                    majorId: this.majorId,
                    majorTitle: this.majorTitle,
                    base_id: this.all_bases_select_id.id,
                    branch_id: this.all_branch_select_id.id,
                    created_or_update_at: this.time
                })
                .then(response => {

                    if (response.data == "save") {
                        Swal.fire("", "ذخیره شد", "success");
                        this.majorTitle = "";
                    } else if (response.data == "update") {
                        this.cancel_edit_major();
                        this.selectTab();
                    } else {
                        Swal.fire("", "خطا در عملیات", "error");
                    }

                });
        },
        selectTab(page = 1) {

            this.show_major_overlay = true;

            axios.get("/admin/major_get?page=" + page).then(response => {
                this.show_major_overlay = false;
                this.all_major = response.data
            })
        },
        selectTab1() {
            this.all_bases_select = [];
            this.all_bases_select_id = null;

            /*  this.all_amozeshgah_select = [];
              this.all_amozeshgah_select_id = null;*/

            this.all_branch_select = [];
            this.all_branch_select_id = null;

            this.majorTitle = "";
        },
        removeMajor_func(majorId) {


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
                        .post("/admin/remove_major", {
                            majorId: majorId,
                        })
                        .then(response => {

                            if (response.data == "yes") {

                                swalWithBootstrapButtons.fire(
                                    'حذف',
                                    'مورد شما با موفقیت حذف شد',
                                    'success'
                                )
                                this.cancel_edit_major();
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
        cancel_edit_major() {
            this.majorId = '';
            this.majorTitle = '';
            this.show_major = true;
            this.show_edit_major = false;
            this.all_bases_select = [];
            this.all_bases_select_id = null;
        },

        editMajor_func(majorId, majorTitle, base_id, title_base, branch_id, title_branch, amozeshgah, parent_branch) {
            this.majorId = majorId;
            this.majorTitle = majorTitle;
            this.show_major = false;
            this.show_edit_major = true;
            this.all_amozeshgah_select_id = {id: parent_branch, title: amozeshgah};
            this.all_branch_select_id = {id: branch_id, title: title_branch};
            this.all_bases_select_id = {id: base_id, title: title_base};
            this.amozeshgahSelect(false);
            this.branchSelect(false);
        },
        getAmozeshgah() {

            axios.get("/admin/amozeshgah_get_for_select").then(response => {
                this.show_amozeshgah_select_overlay = false;
                this.all_amozeshgah_select = response.data

            })

        },
        amozeshgahSelect(show_first_parameter) {


            this.show_branch_select_overlay = true;
            axios
                .post("/admin/amozeshgahSelect", {
                    amozeshgah_select_id: this.all_amozeshgah_select_id.id,
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
                    }
                    this.all_bases_select = response.data;
                    this.show_base_select_overlay = false;
                });
        },


    }
}
</script>

