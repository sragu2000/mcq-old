<style>
.head-gradient{
  background: linear-gradient(90deg, rgba(0,21,36,0.15730042016806722) 0%, rgba(121,9,117,0.7147233893557423) 44%, rgba(0,212,255,1) 100%);
}
</style>
<br><br?
<div class="row">
  <div class="col-lg-6">
    <!-- login Start -->
    <form id="login">
      <div class="card border-dark ">
          <!-- card header -->
        <div class="card-header form-control-lg head-gradient"><strong><center>Login</center></strong></div>
        <!-- card body -->
        <div class="card-body">
          <input type="email" class="form-control-lg form-control rounded-3" required placeholder="Email" id="email" value="admin@mail.com">&nbsp;
          <input type="password" class="form-control-lg form-control rounded-3" required placeholder="Password" id="password" value="123">&nbsp;
          <hr>
          <div class="row"> <!--Button Set-->
            <div class="col-6"><button type="submit" class="btn btn-outline-success btn-lg form-control">Login</button></div>
            <div class="col-6"><button type="reset" class="btn btn-outline-danger btn-lg form-control">Clear</button></div>
          </div>
        </div>  
      </div>
    </form>
    <!-- Login End -->
  </div>
  <!-------------------------------------------------------->
  <div class="col-lg-6">
    <!-- signup start -->
    <form id="signup" method="post">
      <div class="card border-dark ">
          <!-- card header -->
        <div class="card-header form-control-lg head-gradient"><strong><center>SignUp</center></strong></div>
        <!-- card body -->
        <div class="card-body">
          <input type="text" class="form-control-lg form-control rounded-3" required placeholder="fullname" id="spfullname"> &nbsp;
          <input type="email" class="form-control-lg form-control rounded-3" required placeholder="Email" id="spemail">&nbsp;
          <input type="password" class="form-control-lg form-control rounded-3" required placeholder="Password" id="sppassword">&nbsp;
          <input type="password" class="form-control-lg form-control rounded-3" required placeholder="Confirm Password" id="spcpassword">&nbsp;
          <div class="row"> <!--DOB-->
            <div class="col-6 fw-bold" align="center"><div class="form-control form-control-lg">Date of Birth</div> </div>
            <div class="col-6 "><input type="date" class="form-control-lg form-control rounded-3" required name="spdob" id="spdob">&nbsp;</div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="form-control form-control-lg">
                <input type="checkbox" id="spagree" class="form-check-input" required> &nbsp;
                I agree <a href="#">Terms and Conditions</a></div>&nbsp;<hr>
            </div>
          </div>
          <div class="row"> <!--Button Set-->
            <div class="col-6"><button type="submit" class="btn btn-outline-success btn-lg form-control">SignUp</button></div>
            <div class="col-6"><button type="reset" class="btn btn-outline-danger btn-lg form-control">Clear</button></div>
          </div>
        </div>  
      </div>
  </form>
  <!-- signup end -->
  </div>
</div> 
<script type="text/javascript">
  $(document).on("submit","#login",()=>{
      var toServer=new FormData();
      toServer.append('UName',$("#email").val());
      toServer.append('PWord',$("#password").val());
      fetch("<?php echo base_url('login/userLogin'); ?>",{
          method:'POST',
          body: toServer,
          mode: 'no-cors',
          cache: 'no-cache'})
      .then(response => {
          if (response.status == 200) {
              return response.json();            
          }
          else {
              alert('Backend Error..!');
              console.log(response.text());
          }
      })
      .then(data => {
        // if(data.message == "Welcome"){
        //   Swal.fire({
        //     position: 'top',
        //     icon: 'success',
        //     title: 'Login Success',
        //     showConfirmButton: false,
        //     timer: 1500
        //   });
        // }else{
        //   Swal.fire({
        //     icon: 'error',
        //     title: 'Oops...',
        //     text: 'Something went wrong!',
        //     footer: '<a href="">Why do I have this issue?</a>'
        //   });
        // }
        alert(data.message); window.location.reload();
          // if(data.message=="Welcome"){
          //     location.replace("<?php //echo base_url('login/home');?>");
          // }else{
          //     alert(data.message); window.location.reload();
          // }
      })
      .catch(() => {
          console.log("Network connection error");
          alert("Reloading"); window.location.reload();
      });
  });
  $(document).on("submit","#signup",()=>{
        var signupData=new FormData();
        signupData.append('spfullname',$("#spfullname").val());
        signupData.append('spemail',$("#spemail").val());
        signupData.append('sppassword',$("#sppassword").val());
        signupData.append('spdob',$("#spdob").val());
        fetch("<?php echo base_url('login/userSignup') ?>",{
            method:'POST',
            body: signupData,
            mode: 'no-cors',
            cache: 'no-cache'
        })
        .then(response => {
            if (response.status == 200) {
                return response.json();            
            }
            else {
                alert('Backend Error..!');
                console.log(response.text());
            }
        })
        .then(data => {
            alert(data.message); window.location.reload();
        })
        .catch(() => {
            console.log("Network connection error");
            alert("Reloading"); window.location.reload();
        });
  });
</script>
