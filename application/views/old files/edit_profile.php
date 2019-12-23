<?php include 'header.php';?>
    <style>
        input[type=text] {
    background-color: #f1f1f1;
     width: auto !important; 
}
label  {float:left;}
    </style>

    
       <div id = "wrapper">
      <div id = "content"><br>
        <h1 class="text-center">Edit Profile</h1>
        <div id = "RightColumn">
            
          <form id ="PPicture" action="">
              
            <fieldset>
            <legend>Change Password</legend>
            <br>
            <label for="myBName">*Old Password:</label>
          <input type="password"  required >
          <label for="myBName">*New Password:</label>
          <input type="password" required >
            </fieldset>
          </form>
       
        </div>
        <form id="profile" action = "">
          <fieldset>
          <legend>Profile Information</legend>
          <br>
      
          <label for="myOFName">*Customer's First Name:</label>
          <input type="text" name="myOFName" id="myOFName" required value ="Jack">
          <label for="myOLName">*Customer's Last Name:</label>
          <input type="text" name="myOLName" id="myOLName" required value ="Harmon">          
          
          <label for="myAddress">*Address:</label>
          <input type="text" name="myAddress" id="myAddress" required value ="123 Newmon Dr">
          <label for="myCity">*City:</label>
          <input type="text" name="myCity" id="myCity" required value ="Spokane">
          <label for="myState">*State:</label>
          <input type="text" name="myState" id="myState" size = "2" required value ="Wa">
          <label for="myZip">*Zip Code:</label>
          <input type="text" name="myZip" id="myZip" size = "5" required value ="99201">
          <label for="myPhone">*Phone Number:</label>
          <input type="tel" name="myPhone" id="myPhone" size="12" required value ="219-656-0141">
          <label for="myEmail">*E-Mail:</label>
          <input type="email" name="myEmail" id="myEmail" size="30" required value ="JHarmon@gmail.com">
          <label for="mySEmail">Secondary E-Mail:</label>
          <input type="email" name="mySEmail" id="mySEmail" size="30" value ="Jack.Harmon@hotmail.com">
         
         
          </fieldset>
        </form>
        <br>
      </div>
      <div id = "bottom">
        <center><input type="submit" value="Save Changes"/></center>
      </div>
    </div>
     
   

<?php include 'footer.php';?>