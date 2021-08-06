<template>
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <b-tabs

                v-model="tabIndex"
                active-nav-item-class="font-weight-bold text-uppercase text-danger"
                active-tab-class="font-weight-bold text-success"
                content-class="mt-3">

                <b-tab title="ایجاد آموزشگاه" active>

                    <b-container fluid>


                        <b-row class="my-1">
                            <b-col md="1">
                                <label class="label-branch"> آموزشگاه :</label>
                            </b-col>
                            <b-col md="8">
                                <b-form-input class="branch-input" v-model="amozesh_title"
                                              id="input-default"></b-form-input>
                            </b-col>
                            <b-col md="2">
                                <b-button @click="saveAmozeshgah()" variant="success">ثبت</b-button>
                            </b-col>
                        </b-row>


                    </b-container>

                </b-tab>
                <b-tab @click="selectTab(1)" title="نمایش آموزشگاهها">

                    <b-overlay :show="show_amozeshgah_overlay" rounded="lg">
                        <div class="col-12 amozeshgah">
                            <div class="card " v-if="show_amozeshgah">
                                <div class="card-header"><h4 class="mb-0">لیست آموزشگاهها</h4>
                                </div>
                                <div class="card-content">
                                    <div class="table-responsive mt-1">
                                        <table class="table table-hover-animation mb-0">
                                            <thead>
                                            <tr>
                                                <th>ردیف</th>
                                                <th class="Aroco-th">عنوان</th>
                                                <th>تاریخ</th>
                                                <th>شعبات</th>
                                                <th>ویرایش</th>
                                                <th>حذف</th>
                                                <th>افرودن شعبه</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-for="row in all_amozeshgah.data">
                                                <td>{{ row.id }}</td>
                                                <td class="Aroco-th">{{ row.title }}</td>
                                                <td>{{ row.date }}</td>
                                                <td>
                                                    <span class="click">
                                                    <font-awesome-icon
                                                        @click="show_subBranch_func(row.id)"
                                                        icon="eye"
                                                        :style="{ color: 'green' }"
                                                        size="lg"/>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="click">
                                                    <font-awesome-icon
                                                        @click="editAmozeshgah_func(row.id,row.title,'a')"
                                                        icon="edit"
                                                        :style="{ color: 'blue' }"
                                                        size="lg"/>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="click">
                                                    <font-awesome-icon
                                                        @click="removeAmozeshgah_func(row.id,'a')"
                                                        icon="trash"
                                                        :style="{ color: 'red' }"
                                                        size="lg"/>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="click">
                                                    <font-awesome-icon
                                                        @click="addBranch(row.id)"
                                                        icon="plus"
                                                        :style="{ color: 'Green' }"
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
                                v-if="show_amozeshgah"
                                :data="all_amozeshgah"
                                @pagination-change-page="selectTab">
                            </pagination>

                        </div>
                    </b-overlay>
                    <b-overlay :show="show_amozeshgah_branch_overlay" rounded="lg">
                        <div class="col-12 branch">

                            <b-row>
                                <b-col cols="8">
                                    <b-button
                                        v-if="show_subBranch"
                                        @click="cancel_subBranch()" variant="danger">انصراف
                                    </b-button>
                                </b-col>
                            </b-row>
                            <div class="card" v-if="show_subBranch">
                                <div class="card-content">
                                    <div class="table-responsive mt-1">
                                        <div class="card-header"><h4 class="mb-0">شعبات
                                            آموزشگاه</h4></div>
                                        <table class="table table-hover-animation mb-0">
                                            <thead>
                                            <tr>
                                                <th>ردیف</th>
                                                <th class="Aroco-th">شعبه</th>
                                                <th>تاریخ</th>
                                                <th>ویرایش</th>
                                                <th>حذف</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-for="row in amozeshgah_branch.data">
                                                <td>{{ row.id }}</td>
                                                <td class="Aroco-th">{{ row.title }}</td>
                                                <td>{{ row.date }}</td>
                                                <td>
                                                    <span class="click">
                                                      <font-awesome-icon
                                                          @click="editAmozeshgah_func(row.id,row.title,'b')"
                                                          icon="edit"
                                                          :style="{ color: 'blue' }"
                                                          size="lg"/>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="click">
                                                    <font-awesome-icon
                                                        @click="removeAmozeshgah_func(row.id,'a')"
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
                                v-if="show_subBranch"
                                :data="amozeshgah_branch"
                                @pagination-change-page="selectTab">
                            </pagination>
                        </div>
                    </b-overlay>

                    <div class="col-12 edit_amozeshgah " v-if="show_edit_amozeshgah">
                        <b-row v-if="show_edit_amozeshgah">
                            <b-col cols="8">
                                <b-button
                                    @click="cancel_edit_amozeshgah()" variant="danger">انصراف
                                </b-button>
                            </b-col>
                        </b-row>
                        <div class="card">
                            <b-container fluid>

                                <b-row class="my-1">
                                    <b-col md="1">
                                        <label class="label-branch"> آموزشگاه :</label>
                                    </b-col>
                                    <b-col md="8">
                                        <b-form-input
                                            class="branch-input"
                                            v-model="amozesh_title"
                                            id="input-default">
                                        </b-form-input>
                                    </b-col>
                                    <b-col md="2">
                                        <b-button @click="saveAmozeshgah()" variant="success">ثبت</b-button>
                                    </b-col>
                                </b-row>


                            </b-container>
                        </div>
                    </div>

                    <div class="col-12 add_branch " v-if="show_add_branch">
                        <b-row>
                            <b-col cols="8">
                                <b-button
                                    @click="cancel_addBranch()" variant="danger">انصراف
                                </b-button>
                            </b-col>
                        </b-row>
                        <div class="card my-card">
                            <b-container fluid>

                                <b-row class="my-1">

                                    <b-col md="6">

                                        <div class="branch-add">
                                            <b-col md="2">
                                                <label class="label-branch"> آموزشگاه :</label>
                                            </b-col>

                                            <b-col md="7">
                                                <v-select
                                                    :disabled="true"
                                                    :options="all_amozeshgah_select"
                                                    searchable="true"
                                                    v-model="all_amozeshgah_select_id"/>

                                            </b-col>

                                        </div>


                                    </b-col>


                                </b-row>

                                <b-row class="my-1">
                                    <b-col md="6">
                                        <div class="branch-add">
                                            <b-col md="2">
                                                <label class="label-branch"> شعبه :</label>
                                            </b-col>
                                            <b-col md="7">
                                                <b-form-input class="branch-input" v-model="branch_title"
                                                              id="input-default"></b-form-input>
                                            </b-col>
                                            <b-col md="3">
                                                <b-button @click="saveBranch()" variant="success">ثبت</b-button>
                                            </b-col>
                                        </div>

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
.edit_amozeshgah button.btn.btn-danger {
    margin-bottom: 20px;
}

.table-hover-animation thead th {
    text-align: center;
}

.table-hover-animation td, .table-hover-animation th {

    text-align: center;
}

/*.v-select[data-v-138dff1d] {
    height: 281px !important;
}*/

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
        /*       inputFormat: 'YYYY-MM-DD HH:mm',
               format: 'jYYYY-jMM-jDD HH:mm',
               editable: false,
               inputClass: 'form-control my-custom-class-name',*/
        placeholder: ""
        /*   altFormat: 'YYYY-MM-DD HH:mm',
                       color: '#00acc1',
                       autoSubmit: false,
                       //...
                       //... And whatever you want to set as default
                       //...*/
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

/***************VSelect*/
import VSelect from "@alfsnd/vue-bootstrap-select";


export default {
    watch: {},
    data() {
        return {
            amozesh_id: '',
            amozesh_title: '',
            branch_title: '',
            currenttimee: '',
            tabIndex: 0,
            /********************loaing*/
            loading: true,
            show_amozeshgah_overlay: false,
            show_amozeshgah_branch_overlay: false,
            all_amozeshgah: {},
            all_amozeshgah_select: [],
            all_amozeshgah_select_id: {value: "", text: ""},
            show_amozeshgah: true,
            show_subBranch: false,
            show_edit_amozeshgah: false,
            show_add_branch: false,
            amozeshgah_branch: {},
            typeTable: '',


        }
    },
    components: {
        VSelect
    },
    computed: {},
    mounted() {
    },
    methods: {
        currentTime() {
            var today = new Date();
            var date = new Date().toLocaleDateString('fa-IR').replace(/([۰-۹])/g, function (token) {
                return String.fromCharCode(token.charCodeAt(0) - 1728);
            });
            this.currenttimee = date;
        },
        saveAmozeshgah() {
            this.currentTime();
            axios
                .post("/admin/amozeshgah_add", {
                    amozeshgah_id: this.amozesh_id,
                    amozeshgah_title: this.amozesh_title,
                    amozeshgah_timeAdd: this.currenttimee
                })
                .then(response => {

                    if (response.data == "save") {
                        Swal.fire("", "ذخیره شد", "success");
                        this.amozesh_title = "";
                    } else if (response.data == "update") {
                        this.typeTable = 'a';
                        this.cancel_edit_amozeshgah();
                        this.selectTab();
                    } else {
                        Swal.fire("", "خطا در عملیات", "error");
                    }

                });
        },
        saveBranch() {

            if (this.branch_title == "") {
                Swal.fire("", "همه موارد را پر کنید ", "error");
                return;
            }

            this.currentTime();
            axios
                .post("/admin/branch_add", {
                    parent_id: this.amozesh_id,
                    branch_timeAdd: this.currenttimee,
                    branch_title: this.branch_title
                })
                .then(response => {
                    Swal.fire("", "ذخیره شد", "success");
                    this.branch_title = "";
                });
        },

        selectTab(page = 1) {

            this.show_amozeshgah_overlay = true;
            axios.get("/admin/amozeshgah_get?page=" + page).then(response => {
                this.show_amozeshgah_overlay = false;
                this.all_amozeshgah = response.data

            })
        },
        show_subBranch_func(amozeshgah_id) {
            this.show_amozeshgah = false;
            this.show_subBranch = true;
            this.show_amozeshgah_branch_overlay = true;
            axios
                .post("/admin/get_amozeshgah_branch", {
                    amozeshgah_id: amozeshgah_id,
                })
                .then(response => {

                    this.amozeshgah_branch = response.data
                    this.show_amozeshgah_branch_overlay = false;
                });

        },
        editAmozeshgah_func(id, title, typeTable) {
            this.amozesh_id = id;
            this.show_edit_amozeshgah = true;
            this.show_amozeshgah = false;
            this.amozesh_title = title;
            this.show_subBranch = false;
            this.typeTable = typeTable;

        },
        cancel_subBranch() {
            this.show_subBranch = false;
            this.show_amozeshgah = true;

        },
        cancel_edit_amozeshgah() {
            this.amozesh_id = '';
            this.amozesh_title = '';

            if (this.typeTable == 'a') {
                this.show_edit_amozeshgah = false;
                this.show_amozeshgah = true;
                this.show_subBranch = false;
            } else {
                this.show_edit_amozeshgah = false;
                this.show_subBranch = true;
            }


        },
        removeAmozeshgah_func(amozeshgah_id, typeTable) {


            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'آیا مایل به حذف می باشید',
                text: "با حذف آموزشگاه شعبات آن نیز حذف می شود",
                icon: 'question',
                iconHtml: '؟',
                confirmButtonText: 'بله حذف شود',
                cancelButtonText: 'خیر کنسل شود',
                showCancelButton: true,
                showCloseButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    axios
                        .post("/admin/remove_amozeshgah", {
                            amozeshgah_id: amozeshgah_id,
                        })
                        .then(response => {

                            if (response.data == "yes") {

                                swalWithBootstrapButtons.fire(
                                    'حذف',
                                    'مورد شما با موفقیت حذف شد',
                                    'success'
                                )
                                this.typeTable = typeTable;

                                this.cancel_edit_amozeshgah();
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
        addBranch(amozeshgah_id) {
            this.amozesh_id = amozeshgah_id;
            this.show_amozeshgah = false;
            this.show_add_branch = true;
            this.all_amozeshgah_select = [];

            var arr = this.all_amozeshgah.data

            for (let i = 0; i < arr.length; i++) {

                if (arr[i].id == amozeshgah_id) {
                    this.all_amozeshgah_select_id.value = arr[i].id;
                    this.all_amozeshgah_select_id.text = arr[i].title;
                }


                this.all_amozeshgah_select.push({
                    value: arr[i].id,
                    text: arr[i].title
                });
            }


        },
        cancel_addBranch() {
            this.show_amozeshgah = true;
            this.show_add_branch = false;


        },


    }
}
</script>

