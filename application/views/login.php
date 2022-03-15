<br><br>
<div class="row">
  <div class="col-sm-6">
    <form id="login">
      <div class="card border-dark ">
        <div class="card-header form-control-lg"><strong><center>Login</center></strong></div>
        <div class="card-body">
          <input type="text" class="form-control-lg form-control rounded-3" required placeholder="Username" id="username">&nbsp;
          <input type="password" class="form-control-lg form-control rounded-3" required placeholder="Password" id="password">&nbsp;
          <hr>
          <div class="row">
            <div class="col-6"><button type="submit" class="btn btn-outline-success btn-lg form-control">Login</button></div>
            <div class="col-6"><button type="reset" class="btn btn-outline-danger btn-lg form-control">Clear</button></div>
          </div>
        </div>  
      </div>
    </form>
  </div>
  </div>

<script type="text/javascript">
  $(document).on("submit","#login",()=>{
      var toServer=new FormData();
      toServer.append('UName',$("#username").val());
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
        alert(data.message);
        window.location.href = '<?php echo base_url('login/home'); ?>';
      })
      .catch((err) => {
          console.log(err);
          alert("Reloading");
      });
  });
</script>
