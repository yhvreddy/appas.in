<?php include 'header.php';?>
    <style>
        input[type=text] {
    background-color: #f1f1f1;
     width: auto !important; 
}
label  {float:left;}
    </style>

    
    <div id="wrapper">
      <div id = "content">
        <br>
        <h1 class="text-center">Edit Profile</h1>
        <p>
          <span class="text-center text-success"><?= $this->session->flashdata('success_login'); ?></span>
          <span class="text-center text-danger"><?= $this->session->flashdata('failed_login'); ?></span>
        </p>
        <div id = "RightColumn">
            <?php //print_r($userdata); ?>
          <form id ="PPicture" method="post" action="<?=base_url('user/'.$userdata->id.'/updatepassword')?>">
            <input type="hidden" value="<?=$userdata->id?>" name="edit_id">
            <fieldset>
              <legend>Change Password</legend>
              <br>
              <label for="myBName">*Old Password:</label>
              <input type="password" name="oldpassword" placeholder="Old Password"  required >
              <label for="myBName">*New Password:</label>
              <input type="password" name="newpassword" placeholder="New Password" required >
            </fieldset>
            <div id = "bottom">
              <center><input type="submit" value="Change Password"/></center>
            </div>
          </form>
       
        </div>
        <form id="profile" method="post" action="<?=base_url('user/'.$userdata->id.'/updatedetails')?>">
          <input type="hidden" value="<?=$userdata->id?>" name="edit_id">
          <fieldset>
          <legend>Profile Information</legend>
          <br>
      
          <label for="myOFName">*First Name :</label>
          <input type="text" name="myOFName" id="myOFName" required value ="<?=$userdata->first_name?>">

          <label for="myOLName">*Last Name :</label>
          <input type="text" name="myOLName" id="myOLName" required value ="<?=$userdata->last_name?>">          
          
          <!-- <label for="myAddress">*Address:</label>
          <input type="text" name="myAddress" id="myAddress" required value ="123 Newmon Dr">

          <label for="myCity">*City:</label>
          <input type="text" name="myCity" id="myCity" required value ="Spokane">

          <label for="myState">*State:</label>
          <input type="text" name="myState" id="myState" size = "2" required value ="Wa">

          <label for="myZip">*Zip Code:</label>
          <input type="text" name="myZip" id="myZip" size = "5" required value ="99201"> -->

          <label for="myPhone">*Mobile :</label>
          <input type="tel" name="myPhone"  id="myPhone" size="12" required value ="<?=$userdata->mobile?>">
          <label for="myEmail">*E-Mail :</label>
          <input type="email" name="myEmail" id="myEmail" required value ="<?=$userdata->mail_id?>">
         
            <div id = "bottom">
              <center><input type="submit" value="Update Details"/></center>
            </div>
          </fieldset>
        </form>
        <br>
      </div>
    </div>
     
   

<?php include 'footer.php';?>