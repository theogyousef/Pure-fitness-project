<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        <?php 
include "../public/CSS/reoveryemail.css" ;
        ?>
    
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-md-6">
                <div class="centered-container text-center">
                    <div class="logo-container">
                        <img src="https://purefitness-eg.com/wp-content/uploads/2023/07/IMG_%D9%A2%D9%A0%D9%A2%D9%A3%D9%A0%D9%A7%D9%A2%D9%A3_%D9%A1%D9%A9%D9%A1%D9%A0%D9%A4%D9%A0-1400x623.png" alt="Logo">
                    </div>
                    
                    <hr class="thin-line"> 

                    <h2 class="greeting">Hello </h2>

                    <hr class="thin-line"> 

                    <div class="content-text">
                        <p>We received a request to reset your password for your Pure Fitness account.</p>
                        <p>If you didn't ask to change your password, please ignore this email.</p>
                        <p>Your OTP code is: {{otp_code}}</p>
                        <p>Best Wishes,</p>
                        <p>The Pure Fitness Egypt Team</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
