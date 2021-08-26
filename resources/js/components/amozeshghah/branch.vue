<template>
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <b-tabs
                active-nav-item-class="font-weight-bold text-uppercase text-danger"
                active-tab-class="font-weight-bold text-success"
                content-class="mt-3">

                <b-tab title="ایجاد شعبه" active>

                    <b-container fluid>


                        <b-row class="my-1">
                            <b-col md="1">
                                <label class="label-branch"> شعبه :</label>
                            </b-col>
                            <b-col md="8">
                                <b-form-input class="branch-input" v-model="branch_title"
                                              id="input-default"></b-form-input>
                            </b-col>
                            <b-col md="2">
                                <b-button @click="saveBranch()" variant="success">ثبت</b-button>
                            </b-col>
                        </b-row>


                    </b-container>

                </b-tab>
                <b-tab @click="selectTab(1)" title="نمایش شعبات">

                    <b-overlay :show="show_amozeshgah_branch_overlay" rounded="lg">
                        <div class="col-12 branch">

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
                                                <th>تاریخ ایجاد</th>
                                                <th>تاریخ ویرایش</th>
                                                <th>ویرایش</th>
                                                <th>حذف</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-for="row in amozeshgah_branch.data">
                                                <td>{{ row.id }}</td>
                                                <td class="Aroco-th">{{ row.title }}</td>
                                                <td>{{ row.date }}</td>
                                                <td>{{ row.updated_at }}</td>
                                                <td>
                                                    <span class="click">
                                                      <font-awesome-icon
                                                          @click="editBranch_func(row.id,row.title)"
                                                          icon="edit"
                                                          :style="{ color: 'blue' }"
                                                          size="lg"/>
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="click">
                                                    <font-awesome-icon
                                                        @click="removeBrach_func(row.id)"
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

                    <div class="col-12 edit_amozeshgah " v-if="show_edit_branch">
                        <b-row v-if="show_edit_branch">
                            <b-col cols="8">
                                <b-button
                                    @click="cancel_edit_branch()" variant="danger">انصراف
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
                                            v-model="branch_title"
                                            id="input-default">
                                        </b-form-input>
                                    </b-col>
                                    <b-col md="2">
                                        <b-button @click="saveBranch()" variant="success">ثبت</b-button>
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

/***************VSelect*/
import VSelect from "@alfsnd/vue-bootstrap-select";


export default {
    watch: {},
    data() {
        return {
            show_amozeshgah_branch_overlay: false,
            show_edit_branch: false,
            branch_id: '',
            branch_title: '',
            currenttimee: '',
            show_subBranch: false,
            amozeshgah_branch: {},

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

        saveBranch() {

            if (this.branch_title == "") {
                Swal.fire("", "همه موارد را پر کنید ", "error");
                return;
            }

            this.currentTime();
            axios
                .post("/amozeshghah/branch_add", {
                    branch_id: this.branch_id,
                    branch_timeAdd: this.currenttimee,
                    branch_title: this.branch_title
                })
                .then(response => {


                    if (response.data == "save") {
                        Swal.fire("", "ذخیره شد", "success");
                        this.branch_title = "";
                    } else if (response.data == "update") {
                        this.cancel_edit_branch();
                        this.selectTab();
                    } else {
                        Swal.fire("", "خطا در عملیات", "error");
                    }


                });
        },

        selectTab(page = 1) {

            this.show_amozeshgah_branch_overlay = true;
            this.show_subBranch = true;

            axios.get("/amozeshghah/branch_get?page=" + page).then(response => {
                this.show_amozeshgah_branch_overlay = false;
                this.amozeshgah_branch = response.data

            })
        },

        editBranch_func(id, title) {
            this.show_edit_branch = true;
            this.branch_id = id;
            this.branch_title = title;
            this.show_subBranch = false;
        },

        cancel_edit_branch() {
            this.show_edit_branch = false;
            this.show_subBranch = true;
            this.branch_title = "";
            this.branch_id = "";
        },


        removeBrach_func(branch_id) {


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
                        .post("/amozeshghah/remove_branch", {
                            branch_id: branch_id,
                        })
                        .then(response => {

                            if (response.data == "yes") {

                                swalWithBootstrapButtons.fire(
                                    'حذف',
                                    'مورد شما با موفقیت حذف شد',
                                    'success'
                                )

                                this.cancel_edit_branch();
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

