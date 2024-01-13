<!-- partial:partials/_navbar.html -->
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        
        <a class="navbar-brand brand-logo-mini" href="<?php echo e(route('dashboard.index')); ?>">
            <img src="<?php echo e(asset('images/logo.png')); ?>" alt="logo" />
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <div class="nav-profile-img">
                        <img src="<?php echo e(auth()->user()->logo); ?>" alt="image">
                        <span class="availability-status online"></span>
                    </div>
                    <div class="nav-profile-text">
                        <p class="mb-1"><?php echo e(auth()->guard('web')->user()->name); ?></p>
                    </div>
                </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                    <a style=font-size:13px class="dropdown-item" href="<?php echo e(route('dashboard.users.profile')); ?>">
                        <i class="mdi mdi-cached me-2 text-success"></i> تعديل بياناتي </a>
                    <div class="dropdown-divider"></div>
                    <button style=font-size:13px class="dropdown-item" onclick="document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-logout me-2 text-primary"></i> تسجيل خروج
                        <form id="logout-form" action="<?php echo e(route('dashboard.logout')); ?>" method="POST"
                            class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>
                    </button>
                </div>
            </li>
            <li class="nav-item d-none d-lg-block full-screen-link">
                <a class="nav-link">
                    <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-email-outline"></i>
                    <span class="count-symbol bg-warning"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                    aria-labelledby="messageDropdown">
                    <h6 style=font-size:13px class="p-3 mb-0 text-center">تنبيهات الرسائل</h6>
                    <div class="dropdown-divider"></div>
                    <?php $__empty_1 = true; $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <a href="<?php echo e(route('dashboard.message-notefications.show', $message->id)); ?>" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-success">
                                    <i class="mdi mdi-email-outline"></i>
                                </div>
                            </div>
                            <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 style=font-size:13px class="preview-subject font-weight-normal mb-1"><?php echo e($message->title); ?></h6>
                                <p style=font-size:10px class="text-gray ellipsis mb-0">
                                    <i class="mdi mdi-clock"></i> <?php echo e($message->created_at->diffForHumans()); ?>

                                </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div style=font-size:13px class="text-center mt-3 mb-3">لا يوجد تنبيهات</div>
                        <div class="dropdown-divider"></div>
                    <?php endif; ?>
                    <h6 class="p-3 mb-0 text-center">
                        <a style=font-size:13px href="<?php echo e(route('dashboard.message-notefications.index')); ?>">كل التنبيهات</a>
                    </h6>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                    data-bs-toggle="dropdown">
                    <i class="mdi mdi-bell-outline"></i>
                    <span class="count-symbol bg-danger"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                    aria-labelledby="notificationDropdown">
                    <h6 style=font-size:13px class="p-3 mb-0 text-center">الاشعارات</h6>
                    <div class="dropdown-divider"></div>

                    <?php $__empty_1 = true; $__currentLoopData = $notefications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notefication): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <a href="<?php echo e(route('dashboard.notefications.show', $notefication->id)); ?>"
                            class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-success">
                                    <i class="mdi mdi-bell"></i>
                                </div>
                            </div>
                            <div
                                class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6  style=font-size:13px class="preview-subject font-weight-normal mb-1"><?php echo e($notefication->title); ?></h6>
                                <p style=font-size:10px class="text-gray ellipsis mb-0">
                                    <i class="mdi mdi-clock"></i> <?php echo e($notefication->created_at->diffForHumans()); ?>

                                </p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div style=font-size:13px class="text-center mt-3 mb-3">لا يوجد اشعارات</div>
                        <div class="dropdown-divider"></div>
                    <?php endif; ?>

                    <h6 class="p-3 mb-0 text-center">
                        <a style=font-size:13px href="<?php echo e(route('dashboard.notefications.index')); ?>">كل الاشعارات</a>
                    </h6>
                </div>
            </li>
            
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
<!-- partial -->
<?php /**PATH C:\Users\nouri\Desktop\n\quriyatclub_laravel-main\resources\views/components/dashboard/includes/navbar.blade.php ENDPATH**/ ?>