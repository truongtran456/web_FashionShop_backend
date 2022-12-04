
<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.head')
</head>

<body class="fix-menu">
<!-- Pre-loader start -->

<!-- Pre-loader end -->

<section class="login p-fixed d-flex text-center bg-primary common-img-bg">
    <!-- Container-fluid starts -->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Authentication card start -->
                <div class="login-card card-block auth-body mr-auto ml-auto">
                    @include('admin.alert')
                    <form class="md-float-material" action="/admin/users/login/store" method="post">
                        <div class="text-center">
                            <img src="/template/admin/assets/images/auth/logo-dark.png" alt="logo.png">
                        </div>

                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-left txt-primary">Sign In</h3>
                                    </div>
                                </div>
                                <hr>

                                    <div class="input-group">
                                        <input type="email" name="email" class="form-control" placeholder="Your Email Address">
                                        <span class="md-line"></span>
                                    </div>
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                        <span class="md-line"></span>
                                    </div>
                                    <div class="row m-t-25 text-left">
                                        <div class="col-sm-7 col-xs-12">
                                            <div class="checkbox-fade fade-in-primary">
                                                <label>
                                                    <input type="checkbox" name="remember" id="remember">
                                                    <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                    <span class="text-inverse">Remember me</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-5 col-xs-12 forgot-phone text-right">
                                            <a href="auth-reset-password.html" class="text-right f-w-600 text-inverse"> Forgot Your Password?</a>
                                        </div>
                                    </div>
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign in</button>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p class="text-inverse text-left m-b-0">Thank you and enjoy our website.</p>
                                            <p class="text-inverse text-left"><b>Your Authentication Team</b></p>
                                        </div>
                                        <div class="col-md-2">
                                            <img src="/template/admin/assets/images/auth/Logo-small-bottom.png" alt="small-logo.png">
                                        </div>
                                    </div>
                            </div>
                        @csrf
                    </form>
                    <!-- end of form -->
                </div>
                <!-- Authentication card end -->
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container-fluid -->
</section>
<!-- Warning Section Starts -->
<!-- Older IE warning message -->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="/template/admin/assets/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/template/admin/assets/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="/template/admin/assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="/template/admin/assets/js/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="/assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="/template/admin/assets/js/modernizr/modernizr.js"></script>
<script type="text/javascript" src="/template/admin/assets/js/modernizr/css-scrollbars.js"></script>
<script type="text/javascript" src="/template/admin/assets/js/common-pages.js"></script>



</body>

</html>
