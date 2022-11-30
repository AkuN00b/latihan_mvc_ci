<?php ob_start();?>
<!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">User Input</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">User Input</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-12 col-md-12">
                        <div class="card">
                            <div class="card-block">
                                <form class="form-horizontal form-material" action="<?php echo site_url('user_input/tambah') ?>" method="POST">
                                    <div class="form-group">
                                        <label class="col-md-12">Username</label>
                                        <div class="col-md-12">
                                            <input type="text" name="username" required class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Nama</label>
                                        <div class="col-md-12">
                                            <input type="text" name="nama" required class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Password</label>
                                        <div class="col-md-12">
                                            <input type="password" id="password" onkeyup="validate()" name="password" required="" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Password Confirmation</label>
                                        <div class="col-md-12">
                                            <input type="password" id="passwordval" onkeyup="validate()" name="passwordval" required="" class="form-control form-control-line passwordval">
                                        </div>
                                    </div>
                                    <div class="alert" style="display:none" id="alert" role="alert"></div>

                                    <div class="form-group">
                                        <label class="col-sm-12">Role</label>
                                        <div class="col-sm-12">
                                            <select name="role" style="width: 100%;" required="" class="form-control form-control-line">
                                                <option value="null">-- Select One --</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Dosen">Dosen</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" class="form-control form-control-line" name="email" required="" id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Telepon</label>
                                        <div class="col-md-12">
                                            <input type="number" class="form-control form-control-line" name="telepon" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" id="btn-save" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © 2017 Material Pro Admin by wrappixel.com
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->

<?php
$data = ob_get_clean();
?>

<script>
    function validate() {
    var password = document.getElementById("password").value;
    var passwordval = document.getElementById("passwordval").value;
    const btnsave = document.getElementById("btn-save");
    const btnupdate = document.getElementById("btn-update");
    const alert = document.getElementById("alert");
    if (password != passwordval) {

      alert.classList.add("alert-danger");
      alert.classList.remove("alert-success");
      alert.innerHTML = "Kata sandi tidak sesuai!";
      btnsave.setAttribute("disabled", "disabled");
      btnupdate.setAttribute("disabled", "disabled");
      alert.style.display = "block";
    } else {
        alert.style.display = "block";
      alert.classList.add("alert-success");
      alert.classList.remove("alert-danger");
      //alert.style.display = "none";
      alert.innerHTML = "Kata sandi sesuai!";
      btnsave.removeAttribute("disabled");
      btnupdate.removeAttribute("disabled");
    }
    return true;
  }
</script>

<?php
$script = ob_get_clean();
include('master_page.php');
ob_flush();
?>