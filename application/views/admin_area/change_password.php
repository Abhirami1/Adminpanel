<div class="mainDiv" style="height: 80vh;">
  <div class="cardStyle">
        <form id="signupForm">
        
           
            
            <h2 class="formTitle">
            Change Your Password
            </h2>
            
            <div class="inputDiv">
            <label class="inputLabel" for="password">Current Password</label>
            <input type="password" id="oldpassword" name="oldpassword" >
            </div>
            <div class="inputDiv">
            <label class="inputLabel" for="password">New Password</label>
            <input type="password" id="password" name="password" >
            </div>
            
            <div class="inputDiv">
            <label class="inputLabel" for="confirmPassword">Confirm Password</label>
            <input type="password" id="confirmPassword" name="confirmPassword">
            </div>
            
            <div class="buttonWrapper">
            <button type="submit" id="submitButton"  class="submitButton pure-button pure-button-primary">
                <span>Submit</span>
            </button>
            </div>
        
        </form>
  </div>
</div>




<style>
    .mainDiv {
    display: flex;
    min-height: 100%;
    align-items: center;
    justify-content: center;
    background-color: #f9f9f9;
    font-family: 'Open Sans', sans-serif;
  }a
 .cardStyle {
    width: 500px;
    border-color: white;
    background: #fff;
    padding: 36px 0;
    border-radius: 4px;
    margin: 30px 0;
    box-shadow: 0px 0 2px 0 rgba(0,0,0,0.25);
  }
#signupLogo {
  max-height: 100px;
  margin: auto;
  display: flex;
  flex-direction: column;
}
.formTitle{
  font-weight: 600;
  margin-top: 20px;
  color: #2F2D3B;
  text-align: center;
}
.inputLabel {
  font-size: 12px;
  color: #555;
  margin-bottom: 6px;
  margin-top: 24px;
}
  .inputDiv {
    width: 70%;
    display: flex;
    flex-direction: column;
    margin: auto;
  }
input {
  height: 40px;
  font-size: 16px;
  border-radius: 4px;
  border: none;
  border: solid 1px #ccc;
  padding: 0 11px;
}
input:disabled {
  cursor: not-allowed;
  border: solid 1px #eee;
}
.buttonWrapper {
  margin-top: 40px;
}
  .submitButton {
    width: 70%;
    height: 40px;
    margin: auto;
    display: block;
    color: #fff;
    background-color: #065492;
    border-color: #065492;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.12);
    box-shadow: 0 2px 0 rgba(0, 0, 0, 0.035);
    border-radius: 4px;
    font-size: 14px;
    cursor: pointer;
  }
.submitButton:disabled,
button[disabled] {
  border: 1px solid #cccccc;
  background-color: #cccccc;
  color: #666666;
}

#loader {
  position: absolute;
  z-index: 1;
  margin: -2px 0 0 10px;
  border: 4px solid #f3f3f3;
  border-radius: 50%;
  border-top: 4px solid #666666;
  width: 14px;
  height: 14px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.error {
    color: red;
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
$(document).ready(function() {
    // Initialize jQuery validation for the form with ID 'signupForm'
    $('#signupForm').validate({
        rules: {
            oldpassword: {
                required: true,
                remote: {
                    url: '<?php echo base_url("check_pass"); ?>', // Use echo and quotes for PHP interpolation
                    type: 'POST',
                    data: {
                        oldpassword: function() {
                            return $('#oldpassword').val();
                        }
                    },
                    dataFilter: function(response) {
                        // Parse the JSON response
                        var jsonResponse = JSON.parse(response);
                        // Return true if the server's response is true, false otherwise
                        return jsonResponse ? true : false;
                    }
                }
            },
            password: {
                required: true,
                minlength: 6,
            },
            confirmPassword: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            oldpassword: {
                required: 'Enter your old password',
                remote: 'Old password is incorrect'
            },
            password: {
                required: 'Enter your new password',
                minlength: 'Password must be at least 6 characters long'
            },
            confirmPassword: {
                required: 'Confirm your new password',
                equalTo: 'Passwords do not match'
            }
        },
        submitHandler:function(form){
            if($(form).valid()){

                var formData= $(form).serialize();

                $.ajax({
                
                    type:'POST',
                    url : '<?php echo base_url('changed_password_user');?>',
                    data:formData,
                    success:function(response){
                        Swal.fire({
                                    position: "top-end",
                                    icon: "success",
                                    title: "changed your password",
                                    showConfirmButton: false,
                                    timer: 5000
                                });

                                form.reset();

                    }
                })


            }
        }
    });
});
</script>
