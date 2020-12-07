<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="/user_guide/_static/css/main.css" rel="stylesheet">
  <link href="/user_guide/_static/css/bootstrap.css" rel="stylesheet">
  <link href="/user_guide/_static/css/bootstrap.min.css" rel="stylesheet">

  <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.min.js"></script>
  <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/0.4.2/sweet-alert.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" style="margin-top:10%;">
            <div class="row">

            <div class="col-lg-3">
            <h1 class="my-4 font-mono textfood">Internshala</h1>

            <div class="list-group list">
                <a class="list-group-item">
               <b> Register Here For Training Courses</b>
                </a>
            </div>
            
            <div class="list-group list selected">
            <a href="/register/course"  class="list-group-item selected" style= "background-color:#adb2b7;text-align:center;" >

                  Register
    
               </a>
            
            </div>
        </div>

                <div class="col-lg-9">
                
                    <div class="row">
                    <?php foreach($data as $item){ ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                                        <div class="card h-100">
                                            <a href="/home/register">
                                                <img class="card-img-top productImg" src="https://trainings.internshala.com/static/images/home/digital-marketing.jpg" alt="product image" />
                                            </a>
                                            <div class="card-body">
                                                <h4 class="card-title">
                                                    <a href="/home/register" style="font-size: 18px; ">
                                                    <?php echo $item; ?>
                                                    </a>
                                                    <span class="ml-4 uppercase badge badge-pill badge-success" style="font-size: 12px; text-transform: uppercase;">
                                                    <?php echo $item; ?>
                                                    </span>
                                                </h4>
                                                
                                                <p class="card-text more"><?php echo $item; ?></p>
                                            </div>
                                            <div class="card-footer">
                                                <form action method="POST">
                                                    <small class="text-muted">
                                                        <span class="fa fa-star checked" />
                                                        <span class="fa fa-star checked" />
                                                        <span class="fa fa-star checked" />
                                                        <span class="fa fa-star" />
                                                        <span class="fa fa-star" />
                                                    </small>
                                                
                                                
                                                </form>
                                            </div>
                                        </div>
                                    </div>        
                                     <?php } ?>
                        
                        <div class="row mt-2 mb-5 justify-content-center">
                            <div class="col-md-12 mb-5 text-right">
                                <nav aria-label="Page navigation" class="page">
                                    <ul class="pagination pageCenter">
                                      
                                        <li class="page-item">
                                            <a class="page-link" href="/home/register"></a>
                                        </li>
                                      
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
