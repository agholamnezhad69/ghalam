<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="/html/rtl/vertical-menu-template/index.html">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">Vuexy</h2></a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i
                        class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                        data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="index.html"><i class="feather icon-home"></i><span class="menu-title"
                                                                                              data-i18n="Dashboard">پیشخوان</span><span
                        class="badge badge badge-warning badge-pill float-right mr-2">2</span></a>
                <!--                <ul class="menu-content">
                                    <li class="active"><a href="dashboard-analytics.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">آنالیزها</span></a>
                                    </li>
                                    <li><a href="dashboard-ecommerce.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">تجارت الکترونیک</span></a>
                                    </li>
                                </ul>-->
            </li>
            <li class=" nav-item">
                <router-link class="nav-item" to="/dashboard">
                    <i class="feather icon-git-branch"></i>
                    <span class="menu-title" data-i18n="Dashboard">داشبورد</span>
                    <span class="badge badge badge-warning badge-pill float-right mr-2">2</span>

                </router-link>
            </li>

            <li class=" nav-item">
                <router-link class="nav-item" to="/branch">
                    <i class="feather icon-git-branch"></i>
                    <span class="menu-title" data-i18n="Dashboard">شعبه</span>
                    <span class="badge badge badge-warning badge-pill float-right mr-2">2</span>

                </router-link>
            </li>

            <li class=" nav-item">
                <router-link class="nav-item" to="/base">
                    <i class="feather icon-git-branch"></i>
                    <span class="menu-title" data-i18n="Dashboard">پایه</span>
                    <span class="badge badge badge-warning badge-pill float-right mr-2">2</span>
                </router-link>
            </li>

            <li class=" nav-item">
                <router-link class="nav-item" to="/major">
                    <i class="feather icon-git-branch"></i>
                    <span class="menu-title" data-i18n="Dashboard">رشته</span>
                    <span class="badge badge badge-warning badge-pill float-right mr-2">2</span>
                </router-link>
            </li>

            <li class=" nav-item">
                <router-link class="nav-item" to="/lesson">
                    <i class="feather icon-git-branch"></i>
                    <span class="menu-title" data-i18n="Dashboard">درس</span>
                    <span class="badge badge badge-warning badge-pill float-right mr-2">2</span>

                </router-link>
            </li>


            <li class=" nav-item">
                <router-link class="nav-item" to="/teacher">
                    <i class="feather icon-git-branch"></i>
                    <span class="menu-title" data-i18n="Dashboard">مدیریت اساتید</span>
                    <span class="badge badge badge-warning badge-pill float-right mr-2">2</span>

                </router-link>
            </li>


            <li class=" nav-item">
                <router-link class="nav-item" to="/user">
                    <i class="feather icon-git-branch"></i>
                    <span class="menu-title" data-i18n="Dashboard">کاربر</span>
                    <span class="badge badge badge-warning badge-pill float-right mr-2">2</span>

                </router-link>
            </li>








            <li class=" navigation-header"><span>اپلبکیشن ها</span>
            </li>
            <li class=" nav-item"><a href="app-email.html"><i class="feather icon-mail"></i><span class="menu-title"
                                                                                                  data-i18n="Email">ایمیل</span></a>
            </li>
            <li class=" nav-item"><a href="app-chat.html"><i class="feather icon-message-square"></i><span
                        class="menu-title" data-i18n="Chat">گفتگو</span></a>
            </li>
            <li class=" nav-item"><a href="app-todo.html"><i class="feather icon-check-square"></i><span
                        class="menu-title" data-i18n="Todo">لیست انجام کار</span></a>
            </li>
            <li class=" nav-item"><a href="app-calender.html"><i class="feather icon-calendar"></i><span
                        class="menu-title" data-i18n="Calender">تقویم</span></a>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-shopping-cart"></i><span class="menu-title"
                                                                                              data-i18n="Ecommerce">تجارت الکترونیک</span></a>
                <ul class="menu-content">
                    <li><a href="app-ecommerce-shop.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                   data-i18n="Shop">فروشگاه</span></a>
                    </li>
                    <li><a href="app-ecommerce-details.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                      data-i18n="Details">جزییات</span></a>
                    </li>
                    <li><a href="app-ecommerce-wishlist.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                       data-i18n="Wish List">لیست علاقه مندی</span></a>
                    </li>
                    <li><a href="app-ecommerce-checkout.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                       data-i18n="Checkout">بررسی</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-user"></i><span class="menu-title"
                                                                                     data-i18n="User">کاربر</span></a>
                <ul class="menu-content">
                    <li><a href="app-user-list.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                              data-i18n="List">لیست</span></a>
                    </li>
                    <li><a href="app-user-view.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                              data-i18n="View">نمایش</span></a>
                    </li>
                    <li><a href="app-user-edit.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                              data-i18n="Edit">ویرایش</span></a>
                    </li>
                </ul>
            </li>
            <li class=" navigation-header"><span>المان های رابط کاربری</span>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-list"></i><span class="menu-title"
                                                                                     data-i18n="Data List">لیست داده ها</span><span
                        class="badge badge badge-primary badge-pill float-right mr-2">جدید</span></a>
                <ul class="menu-content">
                    <li><a href="data-list-view.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                               data-i18n="List View">نمایش لیست</span></a>
                    </li>
                    <li><a href="data-thumb-view.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                data-i18n="Thumb View">نمایش کوتاه</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-layout"></i><span class="menu-title"
                                                                                       data-i18n="Content">محتوا</span></a>
                <ul class="menu-content">
                    <li><a href="content-grid.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                             data-i18n="Grid">صفحه بندی</span></a>
                    </li>
                    <li><a href="content-typography.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                   data-i18n="Typography">تایپوگرافی</span></a>
                    </li>
                    <li><a href="content-text-utilities.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                       data-i18n="Text Utilities">برنامه های کاربردی متن</span></a>
                    </li>
                    <li><a href="content-syntax-highlighter.html"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="Syntax Highlighter">Syntax تاکیدی</span></a>
                    </li>
                    <li><a href="content-helper-classes.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                       data-i18n="Helper Classes">کلاس های راهنما</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="colors.html"><i class="feather icon-droplet"></i><span class="menu-title"
                                                                                                  data-i18n="Colors">رنگ ها</span></a>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-eye"></i><span class="menu-title"
                                                                                    data-i18n="Icons">آیکون ها</span></a>
                <ul class="menu-content">
                    <li><a href="icons-feather.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                              data-i18n="Feather">Feather</span></a>
                    </li>
                    <li><a href="icons-font-awesome.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                   data-i18n="Font Awesome">Font Awesome</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-credit-card"></i><span class="menu-title"
                                                                                            data-i18n="Card">کارت</span></a>
                <ul class="menu-content">
                    <li><a href="card-basic.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                           data-i18n="Basic">مبتدی</span></a>
                    </li>
                    <li><a href="card-advance.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                             data-i18n="Advance">پیشرفته</span></a>
                    </li>
                    <li><a href="card-statistics.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                data-i18n="Statistics">آماری</span></a>
                    </li>
                    <li><a href="card-analytics.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                               data-i18n="Analytics">آنالیزها</span></a>
                    </li>
                    <li><a href="card-actions.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                             data-i18n="Card Actions">کارت های عملگر</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-briefcase"></i><span class="menu-title"
                                                                                          data-i18n="Components">اجزا</span></a>
                <ul class="menu-content">
                    <li><a href="component-alerts.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                 data-i18n="Alerts">اخطارها</span></a>
                    </li>
                    <li><a href="component-buttons-basic.html"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="Buttons">دکمه ها</span></a>
                    </li>
                    <li><a href="component-breadcrumbs.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                      data-i18n="Breadcrumbs">مسیریابی ها</span></a>
                    </li>
                    <li><a href="component-carousel.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                   data-i18n="Carousel">چرخان</span></a>
                    </li>
                    <li><a href="component-collapse.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                   data-i18n="Collapse">ابزار جمع شونده</span></a>
                    </li>
                    <li><a href="component-dropdowns.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                    data-i18n="Dropdowns">Dropdowns</span></a>
                    </li>
                    <li><a href="component-list-group.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                     data-i18n="List Group">لیست گروهی</span></a>
                    </li>
                    <li><a href="component-modals.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                 data-i18n="Modals">پنجره</span></a>
                    </li>
                    <li><a href="component-pagination.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                     data-i18n="Pagination">صفحه بندی</span></a>
                    </li>
                    <li><a href="component-navs-component.html"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="Navs Component">اجزا نوار</span></a>
                    </li>
                    <li><a href="component-navbar.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                 data-i18n="Navbar">نوار</span></a>
                    </li>
                    <li><a href="component-tabs-component.html"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="Tabs Component">اجزا تب ها</span></a>
                    </li>
                    <li><a href="component-pills-component.html"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="Pills Component">اجزا تب 2</span></a>
                    </li>
                    <li><a href="component-tooltips.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                   data-i18n="Tooltips">نکات راهنما</span></a>
                    </li>
                    <li><a href="component-popovers.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                   data-i18n="Popovers">نکات راهنما 2</span></a>
                    </li>
                    <li><a href="component-badges.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                 data-i18n="Badges">نشان ها</span></a>
                    </li>
                    <li><a href="component-pill-badges.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                      data-i18n="Pill Badges">نشان ها 2</span></a>
                    </li>
                    <li><a href="component-progress.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                   data-i18n="Progress">بارگذارها</span></a>
                    </li>
                    <li><a href="component-media-objects.html"><i class="feather icon-circle"></i><span
                                class="menu-item">اشیا رسانه</span></a>
                    </li>
                    <li><a href="component-spinner.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                  data-i18n="Spinner">بارگذاری</span></a>
                    </li>
                    <li><a href="component-bs-toast.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                   data-i18n="Toasts">پنجره اعلان</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-box"></i><span class="menu-title"
                                                                                    data-i18n="Extra Components">اجزا بیشتر</span></a>
                <ul class="menu-content">
                    <li><a href="ex-component-avatar.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                    data-i18n="Avatar">عکس پروفایل</span></a>
                    </li>
                    <li><a href="ex-component-chips.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                   data-i18n="Chips">Chips</span></a>
                    </li>
                    <li><a href="ex-component-divider.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                     data-i18n="Divider">تقسیم کننده</span></a>
                    </li>
                </ul>
            </li>
            <li class=" navigation-header"><span>Forms &amp; Tables</span>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-copy"></i><span class="menu-title"
                                                                                     data-i18n="Form Elements">عناصر فرم</span></a>
                <ul class="menu-content">
                    <li><a href="form-select.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                            data-i18n="Select">انتخاب کنید</span></a>
                    </li>
                    <li><a href="form-switch.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                            data-i18n="Switch">سوئیچ</span></a>
                    </li>
                    <li><a href="form-checkbox.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                              data-i18n="Checkbox">کادر انتخاب</span></a>
                    </li>
                    <li><a href="form-radio.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                           data-i18n="Radio">کادر انتخاب 2</span></a>
                    </li>
                    <li><a href="form-inputs.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                            data-i18n="Input">ورودی</span></a>
                    </li>
                    <li><a href="form-input-groups.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                  data-i18n="Input Groups">گروه های ورودی</span></a>
                    </li>
                    <li><a href="form-number-input.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                  data-i18n="Number Input">ورودی عدد</span></a>
                    </li>
                    <li><a href="form-textarea.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                              data-i18n="Textarea">ناحیه متن(textarea)</span></a>
                    </li>
                    <li><a href="form-date-time-picker.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                      data-i18n="Date &amp; Time Picker">Date &amp; Time Picker</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="form-layout.html"><i class="feather icon-box"></i><span class="menu-title"
                                                                                                   data-i18n="Form Layout">صفحه بندی فرم</span></a>
            </li>
            <li class=" nav-item"><a href="form-wizard.html"><i class="feather icon-package"></i><span
                        class="menu-title" data-i18n="Form Wizard">فرم ساز</span></a>
            </li>
            <li class=" nav-item"><a href="form-validation.html"><i class="feather icon-check-circle"></i><span
                        class="menu-title" data-i18n="Form Validation">فرم اعتبار سنجی </span></a>
            </li>
            <li class=" nav-item"><a href="table.html"><i class="feather icon-server"></i><span class="menu-title"
                                                                                                data-i18n="Table">جدول</span></a>
            </li>
            <li class=" nav-item"><a href="table-datatable.html"><i class="feather icon-grid"></i><span
                        class="menu-title" data-i18n="Datatable">جدول داده ها</span></a>
            </li>
            <li class=" nav-item"><a href="table-ag-grid.html"><i class="feather icon-grid"></i><span class="menu-title"
                                                                                                      data-i18n="ag-grid">جدول agGrid</span><span
                        class="badge badge badge-primary badge-pill float-right mr-2">جدید</span></a>
            </li>
            <li class=" navigation-header"><span>صفحات</span>
            </li>
            <li class=" nav-item"><a href="page-user-profile.html"><i class="feather icon-user"></i><span
                        class="menu-title" data-i18n="Profile">نمایه</span></a>
            </li>
            <li class=" nav-item"><a href="page-account-settings.html"><i class="feather icon-settings"></i><span
                        class="menu-title" data-i18n="Account Settings">تنظیمات کاربری</span></a>
            </li>
            <li class=" nav-item"><a href="page-faq.html"><i class="feather icon-help-circle"></i><span
                        class="menu-title" data-i18n="FAQ">سؤالات متداول</span></a>
            </li>
            <li class=" nav-item"><a href="page-knowledge-base.html"><i class="feather icon-info"></i><span
                        class="menu-title" data-i18n="Knowledge Base">دانش محور</span></a>
            </li>
            <li class=" nav-item"><a href="page-search.html"><i class="feather icon-search"></i><span class="menu-title"
                                                                                                      data-i18n="Search">جستجو</span></a>
            </li>
            <li class=" nav-item"><a href="page-invoice.html"><i class="feather icon-file"></i><span class="menu-title"
                                                                                                     data-i18n="Invoice">فاکتور</span></a>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-zap"></i><span class="menu-title"
                                                                                    data-i18n="Starter kit">ابزار شروع</span></a>
                <ul class="menu-content">
                    <li><a href="/starter-kit/rtl/vertical-menu-template/sk-layout-2-columns.html"><i
                                class="feather icon-circle"></i><span class="menu-item"
                                                                      data-i18n="2 columns">2 ستون</span></a>
                    </li>
                    <li><a href="/starter-kit/rtl/vertical-menu-template/sk-layout-fixed-navbar.html"><i
                                class="feather icon-circle"></i><span class="menu-item" data-i18n="Fixed navbar">نوار ثابت</span></a>
                    </li>
                    <li><a href="/starter-kit/rtl/vertical-menu-template/sk-layout-floating-navbar.html"><i
                                class="feather icon-circle"></i><span class="menu-item" data-i18n="Floating navbar">ناوبری شناور</span></a>
                    </li>
                    <li><a href="/starter-kit/rtl/vertical-menu-template/sk-layout-fixed.html"><i
                                class="feather icon-circle"></i><span class="menu-item" data-i18n="Fixed layout">طرح ثابت</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-unlock"></i><span class="menu-title"
                                                                                       data-i18n="Authentication">احراز هویت</span></a>
                <ul class="menu-content">
                    <li><a href="auth-login.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                           data-i18n="Login">ورود</span></a>
                    </li>
                    <li><a href="auth-register.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                              data-i18n="Register">ثبت نام</span></a>
                    </li>
                    <li><a href="auth-forgot-password.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                     data-i18n="Forgot Password">بازیابی گذرواژه</span></a>
                    </li>
                    <li><a href="auth-reset-password.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                    data-i18n="Reset Password">بازنشانی گذرواژه</span></a>
                    </li>
                    <li><a href="auth-lock-screen.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                 data-i18n="Lock Screen">صفحه قفل</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-file-text"></i><span class="menu-title"
                                                                                          data-i18n="Miscellaneous">متفرقه</span></a>
                <ul class="menu-content">
                    <li><a href="page-coming-soon.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                 data-i18n="Coming Soon">به زودی</span></a>
                    </li>
                    <li><a href="#"><i class="feather icon-circle"></i><span class="menu-item"
                                                                             data-i18n="Error">خطا</span></a>
                        <ul class="menu-content">
                            <li><a href="error-404.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                  data-i18n="404">404</span></a>
                            </li>
                            <li><a href="error-500.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                  data-i18n="500">500</span></a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="page-not-authorized.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                    data-i18n="Not Authorized">مجاز نیست</span></a>
                    </li>
                    <li><a href="page-maintenance.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                                 data-i18n="Maintenance">نگهداری</span></a>
                    </li>
                </ul>
            </li>
            <li class=" navigation-header"><span>Charts &amp; Maps</span>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-pie-chart"></i><span class="menu-title"
                                                                                          data-i18n="Charts">نمودار</span><span
                        class="badge badge badge-pill badge-success float-right mr-2">3</span></a>
                <ul class="menu-content">
                    <li><a href="chart-apex.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                           data-i18n="Apex">Apex</span></a>
                    </li>
                    <li><a href="chart-chartjs.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                              data-i18n="Chartjs">Chartjs</span></a>
                    </li>
                    <li><a href="chart-echarts.html"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                              data-i18n="Echarts">Echarts</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a href="maps-google.html"><i class="feather icon-map"></i><span class="menu-title"
                                                                                                   data-i18n="Google Maps">نقشه های Google</span></a>
            </li>
            <li class=" navigation-header"><span>برنامه های افزودنی</span>
            </li>
            <li class=" nav-item"><a href="ext-component-sweet-alerts.html"><i
                        class="feather icon-alert-circle"></i><span class="menu-title"
                                                                    data-i18n="Sweet Alert">هشدار</span></a>
            </li>
            <li class=" nav-item"><a href="ext-component-toastr.html"><i class="feather icon-zap"></i><span
                        class="menu-title" data-i18n="Toastr">اعلان</span></a>
            </li>
            <li class=" nav-item"><a href="ext-component-noui-slider.html"><i class="feather icon-sliders"></i><span
                        class="menu-title" data-i18n="NoUi Slider">NoUi Slider</span></a>
            </li>
            <li class=" nav-item"><a href="ext-component-file-uploader.html"><i
                        class="feather icon-upload-cloud"></i><span class="menu-title" data-i18n="File Uploader">آپلودکننده فایل</span></a>
            </li>
            <li class=" nav-item"><a href="ext-component-quill-editor.html"><i class="feather icon-edit"></i><span
                        class="menu-title" data-i18n="Quill Editor">ویرایشگر Quill</span></a>
            </li>
            <li class=" nav-item"><a href="ext-component-drag-drop.html"><i class="feather icon-droplet"></i><span
                        class="menu-title" data-i18n="Drag &amp; Drop">Drag &amp; Drop</span></a>
            </li>
            <li class=" nav-item"><a href="ext-component-tour.html"><i class="feather icon-info"></i><span
                        class="menu-title" data-i18n="Tour">راهنما</span></a>
            </li>
            <li class=" nav-item"><a href="ext-component-clipboard.html"><i class="feather icon-copy"></i><span
                        class="menu-title" data-i18n="Clipboard">کلیپ بورد</span></a>
            </li>
            <li class=" nav-item"><a href=" ext-component-plyr.html"><i class="feather icon-film"></i><span
                        class="menu-title" data-i18n="Media player">پخش کننده چند رسانه ای</span></a>
            </li>
            <li class=" nav-item"><a href="ext-component-context-menu.html"><i class="feather icon-more-horizontal"></i><span
                        class="menu-title" data-i18n="Context Menu">منو(زمینه)</span></a>
            </li>
            <li class=" nav-item"><a href="ext-component-swiper.html"><i class="feather icon-smartphone"></i><span
                        class="menu-title" data-i18n="swiper">اسلاید</span></a>
            </li>
            <li class=" nav-item"><a href="ext-component-i18n.html"><i class="feather icon-globe"></i><span
                        class="menu-title" data-i18n="l18n">مترجم</span></a>
            </li>
            <li class=" navigation-header"><span>دیگر</span>
            </li>
            <li class=" nav-item"><a href="#"><i class="feather icon-menu"></i><span class="menu-title"
                                                                                     data-i18n="Menu Levels">منو چند سطحی</span></a>
                <ul class="menu-content">
                    <li><a href="#"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Second Level">دو سطحی</span></a>
                    </li>
                    <li><a href="#"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Second Level">دو سطحی</span></a>
                        <ul class="menu-content">
                            <li><a href="#"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                     data-i18n="Third Level">سه سطحی</span></a>
                            </li>
                            <li><a href="#"><i class="feather icon-circle"></i><span class="menu-item"
                                                                                     data-i18n="Third Level">سه سطحی</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="disabled nav-item"><a href="#"><i class="feather icon-eye-off"></i><span class="menu-title"
                                                                                                data-i18n="Disabled Menu">منو غیر فعال</span></a>
            </li>
            <li class=" navigation-header"><span>پشتیبانی</span>
            </li>
            <li class=" nav-item"><a href="/documentation/documentation.html"><i class="feather icon-folder"></i><span
                        class="menu-title" data-i18n="Documentation">مستندات</span></a>
            </li>
            <li class=" nav-item"><a href="https://pixinvent.ticksy.com/"><i class="feather icon-life-buoy"></i><span
                        class="menu-title" data-i18n="Raise Support">ایجاد پشتیبانی</span></a>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
