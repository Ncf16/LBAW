 
  <?php
  include_once("templates/header.html");
  ?>
  
 <div id="registerPage">
    
  <div class="container">
 <form action="index.html" method="post" >
  <fieldset class="form-group">
    <label for="nameInput">FullName</label>
    <input type="text" class="form-control" id="nameInput" placeholder="Full Name" value="" required>
    
    <label for="inputPassword">Password</label>
    <input type="password" class="form-control" id="inputPassword" placeholder="Password" value="" required>

  <label for="birthInput">Birth Date</label>
    <input type="date" class="form-control" id="birthInput"    value="" required> 

    <label for="mobileInput">Mobile Phone</label>
    <input type="number" class="form-control" id="mobileInput"   placeholder="Mobile Phone" value="" required>

     <label for="nifInput">NIF</label>
    <input type="number" class="form-control" id="nifInput" value=""  placeholder="NIF" required>

       <label for="marritalStatusInput">Marital status</label>
    <input type="text" class="form-control" id="marritalStatusInput" placeholder="Marital status" value="" required>

    <label for="nationalityInput">Nacionality: </label>
    <input type="text" class="form-control" id="nationalityInput" placeholder="country of Birth" value="" required>

 <label for="selectCourse"> Pick Course</label>
    <select class="form-control" id="selectCourse"  >
      <option>Course1</option>
      <option>Course2</option>
      <option>Course3</option>
      <option>Course4</option>
      <option>Course5</option>
    </select>

    <label for="requestText">Request</label>
    <textarea class="form-control" id="requestText" rows="4" required></textarea>
  </fieldset>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
 
  
  <?php
  include_once("templates/footer.html");
  ?>