<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <div class="profile-header">
            <img class="profile-image" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="User Avatar">
            <div class="profile-info">
                <h2 class="user-name">John Doe</h2>
                <p class="user-email">john.doe@example.com</p>
                <input type="file" class="file-upload" id="avatarUpload" name="avatarUpload">
            </div>
        </div>

        <div class="profile-content">
            <h3>Personal Details</h3>
            <form id="user_details">
                <label for="fullName">Full Name</label>
                <input type="text" id="fullName" placeholder="Enter full name">
                
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Enter email ID">
                
                <label for="phone">Phone</label>
                <input type="text" id="phone" placeholder="Enter phone number">
                
                <label for="website">Website URL</label>
                <input type="url" id="website" placeholder="Website URL">
                
                <h3>Address</h3>
                
                <label for="street">Street</label>
                <input type="text" id="street" placeholder="Enter Street">
                
                <label for="city">City</label>
                <input type="text" id="city" placeholder="Enter City">
                
                <label for="state">State</label>
                <input type="text" id="state" placeholder="Enter State">
                
                <label for="zip">Zip Code</label>
                <input type="text" id="zip" placeholder="Zip Code">
                
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
</body>

</html>



<style>
    /* General Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
}

.container {
    width: 80%;
    max-width: 1000px;
    margin: 50px auto;
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Profile Header */
.profile-header {
    display: flex;
    align-items: center;
}

.profile-image {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    margin-right: 20px;
}

.profile-info {
    flex-grow: 1;
}

.user-name {
    font-size: 24px;
    margin-bottom: 5px;
}

.user-email {
    font-size: 16px;
    color: #777;
}

.file-upload {
    display: block;
    margin-top: 10px;
}

/* Profile Content */
.profile-content {
    margin-top: 30px;
}

.profile-content h3 {
    font-size: 20px;
    margin-bottom: 15px;
    color: #333;
}

form {
    display: grid;
    gap: 10px;
}

form label {
    font-weight: bold;
}

form input {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 100%;
}

button {
    padding: 10px 15px;
    background-color: #007BFF;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

</style>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
$(document).ready(function() {
    $('#user_details').validate({
        rules: {
            fullName: {
                required: true
            },
           
        },
        messages: {
            fullName: 'Enter Your Name',
            
        },
       
        
    });
});
</script>