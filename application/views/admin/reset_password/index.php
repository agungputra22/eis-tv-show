<style>
/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
/*.valid {
  color: green;
}*/

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
  color: green;
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
</style>
<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-reset_password" method="post" action="<?php echo site_url('setting_pass/doUpdate') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <!-- <label class="col-md-3 control-label">Id Full Day -->
                            <!-- <span class="font-red">*</span> -->
                            </label>
                            <div class="col-md-4">
                                <input type="hidden" name="id_struktur" class="form-control" placeholder="Enter Id reset_password" readonly="" value="<?php echo $edit['id_struktur'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">NIK Karyawan
                            <!-- <span class="font-red">*</span> -->
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nik_baru" class="form-control" placeholder="Enter Id reset_password" readonly="" value="<?php echo $edit['nik_baru'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Masukan Password Lama
                            <!-- <span class="font-red">*</span> -->
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="" class="form-control" placeholder="Enter Password Lama">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Masukan Password Baru
                            <!-- <span class="font-red">*</span> -->
                            </label>
                            <div class="col-md-4">
                                <input type="password" name="" class="form-control" placeholder="Enter Password Baru" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Ulangi Masukan Password Baru
                            <!-- <span class="font-red">*</span> -->
                            </label>
                            <div class="col-md-4">
                                <input type="password" name="password" class="form-control" placeholder="Enter Ulangi Password Baru">
                            </div>
                        </div>     

                        <div id="message">
                          <h3>Password must contain the following:</h3>
                          <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                          <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                          <p id="number" class="invalid">A <b>number</b></p>
                          <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                        </div>       

                    </div>
                    <br> 
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/reset_password.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.RESET_PASSWORD.handleSendData();

    var myInput = document.getElementById("psw");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    // When the user clicks on the password field, show the message box
    myInput.onfocus = function() {
      document.getElementById("message").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function() {
      document.getElementById("message").style.display = "none";
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function() {
      // Validate lowercase letters
      var lowerCaseLetters = /[a-z]/g;
      if(myInput.value.match(lowerCaseLetters)) {  
        letter.classList.remove("invalid");
        letter.classList.add("valid");
      } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
      }
      
      // Validate capital letters
      var upperCaseLetters = /[A-Z]/g;
      if(myInput.value.match(upperCaseLetters)) {  
        capital.classList.remove("invalid");
        capital.classList.add("valid");
      } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
      }

      // Validate numbers
      var numbers = /[0-9]/g;
      if(myInput.value.match(numbers)) {  
        number.classList.remove("invalid");
        number.classList.add("valid");
      } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
      }
      
      // Validate length
      if(myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
      } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
      }
    }
</script>