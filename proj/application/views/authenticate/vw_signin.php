<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCQ | SignIn</title>
    <!-- Jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <!-- Font Awesome-->
    <script src="https://kit.fontawesome.com/eeb684813e.js" crossorigin="anonymous"></script>
    
    <!-- SweetAlert For windows -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
  <br><br>
    <div class="container">
      <div id="error"></div>
      <!-- login Start -->
      <form id="loginForm">
        <div class="card border-dark ">
            <!-- card header -->
          <div class="card-header form-control-lg"><center>Already have an account? Login here..</center></div>
          <!-- card body -->
          <div class="card-body">
            <input type="email" required name="emailName" class="form-control-lg form-control rounded-3"  placeholder="Email" value="abc@email.com" id="emailid">&nbsp;
            <input type="password" required name="passwordName" class="form-control-lg form-control rounded-3"  placeholder="Password" value="raguraguragu" id="passwordid">&nbsp;
            <hr>
            <div class="row"> <!--Button Set-->
              <div class="col-6"><button type="submit" class="btn btn-outline-success btn-lg form-control">Login</button></div>
              <div class="col-6"><button type="reset" class="btn btn-outline-danger btn-lg form-control">Clear</button></div>
            </div>
          </div>  
        </div>
      </form>
      
      
      <br>
      <a class="btn form-control btn-outline-primary btn-lg" href="<?php echo base_url('authenticate/signup'); ?>">
      Signup here..
    </a>
      <!-- Login End -->

     
    </div>
    <script>
      $(document).on("submit","#loginForm",(e)=>{
        e.preventDefault();
        var toServer=new FormData();
        toServer.append('em',$("#emailid").val());
        toServer.append('pw',$("#passwordid").val());
        fetch("<?php echo base_url('authenticate/signin'); ?>",{
            method:'POST',
            body: toServer,
            mode: 'no-cors',
            cache: 'no-cache'})
        .then(async response => {
          try {
            const data = await response.json()
            console.log('response data', data);
            return data;
          }catch(error) {
            console.log('Error happened here!')
            console.error(error)
          }
        })
        .then(data => {
          if(data.result==true){
            var htmlText=`<div  class="alert alert-success" role="alert">${data.message}</div>`;
            $("#error").append(htmlText);
            window.location.href="<?php echo base_url('home') ?>";
          }else{
            var htmlText=`<div  class="alert alert-danger" role="alert">${data.message}</div>`;
            document.getElementById("error").innerHTML="";
            $("#error").append(htmlText);

          }
        })
        .catch((e) => {
          console.log("From catch");
          console.log(e);
          alert("Reloading");
        });
      })
    </script>
</body>
</html>