<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  </head>

  <body>
  <?php  
    include_once("nav.html")
  ?>
    
  <div class="container">
 <form action="teste.php" method="post" >
  <fieldset class="form-group">
    <label for="nameInput">FullName</label>
    <input type="text" class="form-control" id="nameInput" placeholder="Full Name" value="" required>
    
    <label for="inputPassword">Password</label>
    <input type="password" class="form-control" id="inputPassword" placeholder="Password" value="" required>

 <label for="selectCourse"> Pick Course</label>
    <select class="form-control" id="selectCourse" required>
      <option>Course1</option>
      <option>Course2</option>
      <option>Course3</option>
      <option>Course4</option>
      <option>Course5</option>
    </select>

    <label for="requestText">Request</label>
    <textarea class="form-control" id="requestText" rows="4" value="" required></textarea>
  </fieldset>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>