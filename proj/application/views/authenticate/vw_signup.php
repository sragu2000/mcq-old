<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> MCQ | SignUp </title>
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
    <div class="container">
        <br><br>
       <!-- signup start -->
       <div id="error">
           
       </div>
       <form id="signup">
       <div class="card border-dark ">
           <!-- card header -->
           <div class="card-header form-control-lg"><center>New User? SignUp here..</center></div>
           <!-- card body -->
           <div class="card-body">
            <input type="text" name="fullname" class="form-control-lg form-control rounded-3" required placeholder="fullname" id="spfullname"> &nbsp;
            <input type="email" name="email" class="form-control-lg form-control rounded-3" required placeholder="Email" id="spemail">&nbsp;
            <input type="password" name="password" class="form-control-lg form-control rounded-3" required placeholder="Password" id="sppassword">&nbsp;
            <div class="row">
                <div class="col-12">
                <div class="form-control form-control-lg">
                    <input type="checkbox" id="spagree" class="form-check-input" required> &nbsp;
                    I agree <a href="https://tinyurl.com/3a247dfe" target="_blank">By clicking Sign Up, you agree to our Terms, Data Policy</a></div>&nbsp;<hr>
                </div>
            </div>
            <div class="row"> <!--Button Set-->
                <div class="col-6"><button type="submit" class="btn btn-outline-success btn-lg form-control">SignUp</button></div>
                <div class="col-6"><button type="reset" class="btn btn-outline-danger btn-lg form-control">Clear</button></div>
            </div>
            </div>  
        </div>
        </form>
        <!-- signup end --><br>
        <a href="<?php echo base_url('authenticate');?>" class="btn btn-outline-primary btn-lg form-control">Back To SignIn</a>
    </div>
    <script>
        $(document).on("submit","#signup",(e)=>{
            e.preventDefault();
                var toServer=new FormData();
                toServer.append('fullname',$("#spfullname").val());
                toServer.append('email',$("#spemail").val());
                toServer.append('password',$("#sppassword").val());
                fetch("<?php echo base_url('authenticate/signup') ?>",{
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
                    if(data.result==true){
                        var htmlText=`<div  class="alert alert-success" role="alert">${data.message}</div>`
                        $("#error").append(htmlText);
                        window.location.href= "<?php echo base_url('authenticate') ?>";
                    }else{
                        document.getElementById("error").innerHTML="";
                        var htmlText=`<div  class="alert alert-danger" role="alert">${data.message}</div>`
                        $("#error").append(htmlText);
                    }
                })
                .catch((e) => {
                    console.log(e);
                    alert("Reloading");
                });
        })
    </script>
</body>
</html>