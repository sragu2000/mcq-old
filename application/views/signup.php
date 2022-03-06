        <!-- Sign up Start -->
        <div class="card border-dark">
            <form id="signupform">
                <!-- card header -->
                <div class="card-header bg-info" align="center">SignUp Here</div>
                <!-- card header end -->
                <!-- card body Start -->
                <div class="card-body">
                    <!-- Full Name -->
                    <div class="row" style="margin:1%"> <div class="col-lg-2">Full Name</div>
                        <div class="col-lg-10"><input type="text" class="form-control" id="spfullname" name="spfullname" required/></div>
                    </div>
                    <!-- Email -->
                    <div class="row" style="margin:1%"><div class="col-lg-2">Email</div>
                        <div class="col-lg-10"><input type="email" class="form-control" id="spemail" name="spemail" required/></div>
                    </div>
                    <!-- Password -->
                    <div class="row" style="margin:1%"><div class="col-lg-2">Password</div>
                        <div class="col-lg-10"><input type="password" class="form-control" id="sppassword" name="sppassword" required/></div> 
                    </div>
                    <!-- Confirm Password -->
                    <div class="row" style="margin:1%"><div class="col-lg-2">Confirm Password</div>
                        <div class="col-lg-10"><input type="password" class="form-control" id="spcpassword" name="spcpassword" required /></div> 
                    </div>
                    
                </div>
                <!--Card Body End-->
                <!-- Card Footer Start-->
                <div class="card-footer bg-info text-white">
                    <div class="row">
                        <div class="col-lg-6" align="center"><button type="submit" class="btn btn-success form-control border-dark ">Signup</button></div>
                        <div class="col-lg-6" align="center"><button type="reset" class="btn btn-danger form-control border-dark">Reset</button></div>
                    </div>
                </div>
                <!-- Card footer end -->
            </form>
        </div>
        <!-- Sign up End -->

<script type="text/javascript">
  $(document).on("submit","#signupform",(e)=>{
      e.preventDefault();
      var toServer=new FormData();
      toServer.append('UName',$("#spfullname").val());
      toServer.append('PWord',$("#sppassword").val());
      toServer.append('email',$("#spemail").val());
      fetch("<?php echo base_url('signup/userSignup'); ?>",{
          method:"POST",
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
        alert(data.message);
      })
      .catch((err) => {
          console.log(err);
      });
  });
</script>
