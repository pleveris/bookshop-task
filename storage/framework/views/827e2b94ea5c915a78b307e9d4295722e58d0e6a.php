<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Styles -->
    
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/custom.css')); ?>" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar Search-->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <h2><a href="<?php echo e(route('book.index')); ?>" style="text-decoration: none;">BookShop</a><h2>
                        </li>
                        <li class="nav-item">
                                <form method="get" action="<?php echo e(route('book.index')); ?>" style="width: 400px">
                                    <div class="row">
                                        <div class="col-8">
                                            <?php if(Cookie::get('search') !== null): ?>
                                            <div class="input-group pr-1 rounded">
                                                <input type="search" name="search" value="<?php echo e(Cookie::get('search')); ?>" class="form-control rounded" placeholder="Search" aria-label="Search"
                                                aria-describedby="search-addon" />
                                        </div>
                                          <?php else: ?>
                                            <div class="input-group pr-1 rounded">
                                                    <input type="search" name="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                                                    aria-describedby="search-addon" />
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-3">
                                            <button type="submit" class="btn btn-danger" id="search-addon">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                        </li>
                    </ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->

                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?>

                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <?php if(auth()->user()->admin): ?>
                                        <a class="dropdown-item" href="<?php echo e(route('report.index')); ?>">
                                            <?php echo e(__('All reports')); ?>

                                        </a>
                                        <a class="dropdown-item" href="<?php echo e(route('admin.book.index')); ?>">
                                            <?php echo e(__('Books for approval')); ?>

                                        </a>
                                    <?php endif; ?>
                                    <a class="dropdown-item" href="<?php echo e(route('user.book')); ?>">
                                        <?php echo e(__('My books')); ?>

                                    </a>
                                    <a class="dropdown-item" href="<?php echo e(route('book.create', )); ?>">
                                        <?php echo e(__('Add book')); ?>

                                    </a>
                                    <?php if(!auth()->user()->admin ): ?>
                                        <a class="dropdown-item" href="<?php echo e(route('report.index' )); ?>">
                                            <?php echo e(__('My reported books')); ?>

                                        </a>
                                    <?php endif; ?>
                                    <a class="dropdown-item" href="<?php echo e(route('user.setting.index' )); ?>">
                                        <?php echo e(__('User settings')); ?>

                                    </a>
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                     <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>
</html>
<?php /**PATH C:\Users\pauli\Documents\bookshop-task\resources\views/layouts/app.blade.php ENDPATH**/ ?>