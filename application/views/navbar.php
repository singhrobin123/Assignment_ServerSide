<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="/user_guide/_static/css/main.css" rel="stylesheet">
  <link href="/user_guide/_static/css/bootstrap.css" rel="stylesheet">
  <link href="/user_guide/_static/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark   smallDevice" style="background-color :#acb6c1;">
				<div class="container-fluid">
					<a class="navbar-brand" href="/"> <img style="border-radius: 50%;padding: 2px" src="https://trainings.internshala.com/static/images/logo.svg" alt="logo" width='150' height='80' class="imgSetIcon" /> <span style="margin: 34px" class="text-info font-weight-bold white-Shadow">Internshala</span> </a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon" /> </button>
					<div class="collapse navbar-collapse" id="navbarResponsive">
						<ul class="navbar-nav mr-auto text-uppercase font-weight-bold mx-5"> </ul>
						<ul class="navbar-nav ml-auto text-uppercase"> 
                            <?php if(!isset($_SESSION['Auth'])): ?>
								<li class="nav-item"> <a id = "loginBtn" class="nav-link btn btn-success btn-sm font-weight-bold text-white p-1 px-3 buttonLogin" href="/login">Login</a> </li>
								<li class="nav-item mx-3"> <a id = "registerBtn" class="nav-link btn btn-primary btn-sm font-weight-bold text-white p-1 px-3 buttonRegister" href="/register">Register</a> </li>
                            <?php endif ?>
                            <?php if(isset($_SESSION['Auth']) && $_SESSION['Auth']): ?>
                                    <li class="nav-item"> <a class="nav-link btn btn-success btn-sm font-weight-bold text-white p-1 px-3 buttonLogin" href="/dashboard">Dashboard</a> </li>
                                    <br/>
									<li class="nav-item mx-3"> <a class="nav-link btn btn-primary btn-sm font-weight-bold text-white p-1 px-3 buttonRegister" href="/register/course">Register Courses</a> </li>
									<li class="nav-item dropdown bg-dark font-normal">
									<div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php echo $_SESSION['fname']; ?> <?php echo $_SESSION['lname']; ?> 
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a id="logoutBtn" class="dropdown-item" href="/logout">Logout</a>
                                    </div>
                                    </div>
									</li>
                                    <?php endif ?>
                                 </ul>
					</div>
				</div>
            </nav>
        <script>
            $(document).ready(
                function(){
                    $("#logoutBtn").click(function(){
                    
                        if(localStorage.getItem("s_id")){
                            localStorage.removeItem("s_id");
                        }
                    });
                   


                }
            );

        </script>
</body>
</html>
