<!--start navigation-->
<div class="container-fluid bg-nav">
    <nav class="navbar navbar-default custom-navbar">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#automation-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand custom-navbar-brand" href="<?php echo CMS_BACKEND;?>">Admin</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling

            <div class="collapse navbar-collapse" id="automation-collapse">
                    <ul class="nav navbar-nav navbar-right custom-navbar-nav">
                        <li><a href="https://www.facebook.com/huanhuthuong1992">
                            <i class="fa fa-life-ring"></i> Author
                        </a></li>
                    </ul>
            </div>

            <!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>
<!--end navigation-->
<!--start main-content-->
<article class="container-fluid" style="min-height: 540px;">
<style>
    .input-validation-error {
        border-color: red;
    }
    .input-validation-error {
        margin-bottom: 4px
    }
    .login-form {
        padding: 15px;
        background: #fff;
        border: 1px solid #e6e6e6;
        border-radius: 6px;
        max-width: 360px;
        float: none;
        margin: 50px auto;
    }
    .login-form h2.main-header {
        padding: 10px 0;
        margin: 0 0 10px;
    }
    .login-form .forgot-pass {
        margin: 0 0 10px;
    }
    .login-form .remember-forgot {
        margin: 0
    }
    .login-form .remember-forgot .checkbox {
        margin-top: 0
    }
    .register {
        margin-top: 10px;
    }
    .register a {
        margin-left: 5px;
    }
    html #recaptcha_area, html #recaptcha_table {
        width: 328px !important;
    }
    .g-recaptcha {
        transform: scale(1.08);
        transform-origin: 0;
        -webkit-transform: scale(1.08);
        transform: scale(1.08);
        -webkit-transform-origin: 0 0;
        transform-origin: 0 0;
        margin: 10px 0;
        margin-bottom: 15px;
    }
    .password-group {
        margin-bottom: 15px
    }
</style>

<div class="container">
    <div class="login-form">
        <form method="post" action="">

            <h2 class="main-header">
                Đăng nhập
            </h2>
            <span class="field-validation-valid color-red" data-valmsg-for="Wrong" data-valmsg-replace="true">
			<?php $error = validation_errors(); echo isset($error)?'<ul class="cms-error">'.$error.'</ul>':'';?>
			</span>
            <div class="form-group">
                <label for="UserName">Tên đăng nhập/Email</label>
                <input class=" form-control" data-val="true" data-val-required="Không được phép bỏ trống!" id="txtUsername" name="data[username]" placeholder="Tên đăng nhập/Email" type="text" value="" />
                <span class="field-validation-valid color-red" data-valmsg-for="UserName" data-valmsg-replace="true"></span>
            </div>
            <div class="form-group password-group">
                <label for="Password">Mật khẩu</label>
                <input class=" form-control" data-val="true" data-val-required="Không được phép bỏ trống!" id="txtPassword" name="data[password]" placeholder="Mật khẩu" type="password" />
                <span class="field-validation-valid color-red" data-valmsg-for="Password" data-valmsg-replace="true"></span>
            </div>
            <div class="row remember-forgot">
                <div class="checkbox pull-left">
                    <label>
                        <input type="checkbox" name="Remember" checked> Duy trì đăng nhập
                    </label>
                </div>
                <div class="forgot-pass pull-right">
                    <a data-toggle="modal" data-target="#myModal" style="cursor: pointer;">Quên mật khẩu?</a>
                </div>
            </div>
            <input data-val="true" data-val-number="The field FailedLogins must be a number." data-val-required="The FailedLogins field is required." id="FailedLogins" name="FailedLogins" type="hidden" value="0" />
            <div class="form-group">
				<input type="submit" name="login" class="btn btn-primary text-center" style="width: 100%" value="Đăng Nhập" />
            </div>
            <span class="field-validation-valid color-red" data-valmsg-for="" data-valmsg-replace="true"></span>
        </form>
        <div class="register">
            Bạn chưa có tài khoản?<a data-toggle="modal" data-target="#myModal" style="cursor: pointer;">Đăng ký ngay</a>
        </div>
    </div>
    <br />
</div>
</article>
<!--end main-content -->
<!--start footer
<footer class="bg-footer container-fluid">
    <div class="container">
        <p class="text-center copy-right-text">
            POWERED BY vTPlatform Basic
        </p>
    </div>
</footer>


<!--end footer -->
<!--start javascript-->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Not install module</h4>
      </div>
      <div class="modal-body">
        <p>Loading...</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
