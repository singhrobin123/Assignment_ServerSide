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
 
<section class="updates padding-top">
     <div class="container-fluid">
         <div class="row justify-content-center">

             <div class="col-lg-12">
                 <div class="recent-updates card">
                     <div style="margin-bottom:0.5rem;padding:2.75rem;" class="card-header">
                         <h3 class="h4">STATUS</h3>
                     </div>
                     <div class="card-body no-padding">

                         <div class="item d-flex justify-content-between">
                             <div class="info d-flex">
                                 <table class="table table-bordered table-responsive TableResponsive">
                                     <thead>
                                         <tr>
                                             <th style="padding-left:220px;padding-right : 211px;" >
                                                 <h3>TRAININGS</h3>
                                             </th>
                                             <th style="padding-left : 120px;padding-right : 111px; ">
                                                 <h3>START DATE</h3>
                                             </th>
                                             <th style="padding-left : 120px;padding-right : 111px;">
                                                 <h3>STATUS</h3>
                                             </th>
                                         </tr>
                                     </thead>
                                     <?php foreach($data as $item){ ?>
                                     <tbody class="text-center">
                                         <tr style="height: 120px !important; overflow-y: scroll;">
                                             <td><?php echo $item['name']; ?></td>
                                             <td><?php echo $item['date']; ?></td>

                                             <?php if ($item['ispaid'] == null): ?>
                                              <td class="text-center">
                                                 <li class="nav-item mx-3">
                                                     <a class="nav-link btn btn-primary btn-sm font-weight-bold text-white p-1 px-3 buttonRegister" href="/register/course">Register</a>
                                                 </li>
                                             </td>
                                              <?php elseif ($item['ispaid'] == 1): ?>
                                                <td class="text-center">
                                                 <button class="btn btn-danger btn-sm deletproduct px-3 font-weight-bold">Go To Traning</button>
                                             </td>
                                              <?php else: ?>
                                                <td class="text-center">
                                                 <button class="btn btn-danger btn-sm deletproduct px-3 font-weight-bold">Payment Panding</button>
                                             </td>
                                              <?php endif; ?>

                                            
                                         </tr>


                                     </tbody>
                                     <?php } ?>


                                 </table>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>

</body>
</html>
