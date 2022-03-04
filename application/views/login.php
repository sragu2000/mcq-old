
<br><br>

      <div class="row">
        <div class="col-sm-6">
          <!-- login Start -->
          <form id="login">
            <div class="card border-dark ">
                <!-- card header -->
              <div class="card-header form-control-lg"><strong><center>Login</center></strong></div>
              <!-- card body -->
              <div class="card-body">
                <input type="email" class="form-control-lg form-control rounded-3" required placeholder="Email" id="email">&nbsp;
                <input type="password" class="form-control-lg form-control rounded-3" required placeholder="Password" id="password">&nbsp;
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
        alert(data.message); window.location.reload();
      })
      .catch(() => {
          console.log("Network connection error");
          alert("Reloading"); window.location.reload();
      });
  });
</script>
