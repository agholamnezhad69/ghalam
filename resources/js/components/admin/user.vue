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

                <b-tab title="ایجاد کاربر" active>

                    <b-container fluid>


                        <b-row class="my-1">
                            <b-col md="5">
                                <b-form-input
                                    placeholder="نام"
                                    class="branch-input"
                                    v-model="userName"
                                    id="input-default">

                                </b-form-input>
                            </b-col>
                            <b-col md="2">
                                <b-button @click="saveUser()" variant="success">ثبت</b-button>
                            </b-col>
                        </b-row>


                    </b-container>

                </b-tab>
                <b-tab @click="selectTab()" title="نمایش کاربران">

                    <b-overlay :show="show_user_overlay" rounded="lg">
                        <div class="col-12 amozeshgah">
                            <div class="card " v-if="show_user">
                                <div class="card-header"><h4 class="mb-0">لیست کاربرها</h4>
                                </div>
                                <div class="card-content">
                                    <div class="table-responsive mt-1">
                                        <table class="table table-hover-animation mb-0">
                                            <thead>
                                            <tr>
                                                <th>ردیف</th>
                                                <th class="Aroco-th">نام</th>
                                                <th>تاریخ ایجاد</th>
                                                <th>دسترسی به شعبات</th>
                                                <th>حذف</th>
                                                <th>افرودن شعبه</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-for="row in all_users.data">
                                                <td>{{ row.id }}</td>
                                                <td class="Aroco-th">{{ row.name }}</td>
                                                <td>{{ row.created_at }}</td>
                                                <td>
                                                    <span class="click">
                                                    <font-awesome-icon
                                                        @click="get_branch_func(row.id)"
                                                        icon="eye"
                                                        :style="{ color: 'green' }"
                                                        size="lg"/>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="click">
                                                    <font-awesome-icon
                                                        @click="removeUser_func(row.id)"
                                                        icon="trash"
                                                        :style="{ color: 'red' }"
                                                        size="lg"/>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="click">
                                                    <font-awesome-icon
                                                        @click="editUser_func(row.id,row.name)"
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
                                v-if="show_user"
                                :data="all_users"
                                @pagination-change-page="selectTab">
                            </pagination>

                        </div>
                    </b-overlay>
                    <b-overlay v-if="show_amozeshgah_branch_overlay" rounded="lg">
                        <div class="col-12 branch">

                            <b-row>
                                <b-col cols="8">
                                    <b-button
                                        v-if="show_subBranch"
                                        @click="cancel_subBranch()" variant="danger">انصراف
                                    </b-button>
                                    <b-button
                                        v-if="show_subBranch"
                                        @click="saveUserBranchAccess()" variant="success">ذخیره
                                    </b-button>
                                </b-col>
                            </b-row>


                            <b-row class="my-1">
                                <div class="card card-branch">
                                    <b-col md="6">

                                        <div class="branch-add">
                                            <b-col md="2">
                                                <label class="label-branch"> آموزشگاه :</label>
                                            </b-col>

                                            <b-col md="7">
                                                <v-select
                                                    dir="rtl"
                                                    multiple
                                                    v-model="all_amozeshgah_select_id"
                                                    :options="all_amozeshgah_select"
                                                    :reduce="title => title.id"
                                                    :selectable="option =>  option.parent > 0"
                                                    label="title"/>

                                            </b-col>

                                        </div>


                                    </b-col>
                                </div>
                            </b-row>

                        </div>
                    </b-overlay>

                    <div class="col-12 edit_amozeshgah " v-if="show_edit_user">
                        <b-row v-if="show_edit_user">
                            <b-col cols="8">
                                <b-button
                                    @click="cancel_edit_user()" variant="danger">انصراف
                                </b-button>
                            </b-col>
                        </b-row>
                        <div class="card">
                            <b-container fluid>

                                <b-row class="my-1">
                                    <b-col md="5">
                                        <b-form-input
                                            placeholder="نام"
                                            class="branch-input"
                                            v-model="userName"
                                            id="input-default">

                                        </b-form-input>
                                    </b-col>
                                    <b-col md="2">
                                        <b-button @click="saveUser()" variant="success">ثبت</b-button>
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


.card.card-branch {
    height: 500px;
    width: 100%;
    padding: 14px;
}

ul#vs4__listbox {
    overflow-y: scroll !important;
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
            /*************************user*/
            userId: '',
            userName: '',
            show_user_overlay: false,
            show_user: true,
            all_users: {},
            all_amozeshgah_select: [],
            all_amozeshgah_select_id: [],
            branch_id: [],
            show_edit_user: false,


        }
    },
    components: {
        /*VSelect*/
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
        selectTab(page = 1) {

            this.show_user_overlay = true;

            axios.get("/admin/user_get?page=" + page).then(response => {
                this.show_user_overlay = false;
                this.all_users = response.data
            })
        },
        editUser_func(id, userName) {
            this.userId = id;
            this.userName = userName;
            this.show_user = false;
            this.show_edit_user = true;


        },
        cancel_edit_user() {
            this.userId = '';
            this.userName = '';
            this.show_user = true;
            this.show_edit_user = false;
        },
        saveUser() {

            if (this.userName == "") {
                Swal.fire("", "همه موارد را پر کنید", "error");
            }

            this.currentTime();
            axios
                .post("/admin/user_add", {
                    userId: this.userId,
                    userName: this.userName,
                    user_timeAdd: this.currenttimee
                })
                .then(response => {

                    if (response.data == "save") {
                        Swal.fire("", "ذخیره شد", "success");
                        this.userName = "";
                    } else if (response.data == "update") {
                        this.cancel_edit_user();
                        this.selectTab();
                    } else {
                        Swal.fire("", "خطا در عملیات", "error");
                    }

                });
        },
        get_branch_func(userId) {
            this.show_user = false;
            this.show_subBranch = true;
            this.userId = userId;

            this.show_amozeshgah_branch_overlay = true;
            axios
                .post("/admin/get_branches", {
                    userId: this.userId,
                })
                .then(response => {
                    this.all_amozeshgah_select = [];
                    this.all_amozeshgah_select_id = response.data.user_access_branches;

                    var arr = response.data.amozeshgah

                    for (let i = 0; i < arr.length; i++) {

                        this.all_amozeshgah_select.push({
                            id: arr[i].id,
                            title: arr[i].title,
                            parent: arr[i].parent,
                        });

                        //if property of sub if exist in object =isset in php

                        if (typeof arr[i].sub !== 'undefined') {
                            var arrSub = arr[i].sub;

                            for (let i = 0; i < arrSub.length; i++) {
                                this.all_amozeshgah_select.push({
                                    id: arrSub[i].id,
                                    title: arrSub[i].title,
                                    parent: arrSub[i].parent,
                                });

                            }
                        }


                    }


                });

        },
        cancel_subBranch() {
            this.show_amozeshgah_branch_overlay = false;
            this.show_subBranch = false;
            this.show_user = true;
            this.all_amozeshgah_select_id = [];
            this.userId = '';

        },
        saveUserBranchAccess() {
            axios
                .post("/admin/user_access_branch", {
                    userIds: this.userId,
                    branchIds: this.all_amozeshgah_select_id,

                })
                .then(response => {

                    if (response.data == "yes") {
                        Swal.fire("", "ذخیره شد", "success");
                        this.userName = "";
                    }

                });

        },
        removeUser_func(userId) {


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
                        .post("/admin/remove_user", {
                            userId: userId,
                        })
                        .then(response => {

                            if (response.data == "yes") {

                                swalWithBootstrapButtons.fire(
                                    'حذف',
                                    'مورد شما با موفقیت حذف شد',
                                    'success'
                                )
                                this.cancel_edit_user();
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


    }
}
</script>

