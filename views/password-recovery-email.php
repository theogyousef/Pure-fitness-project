<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .thin-line {
            height: 0.5px; /* Reduced the height to make the line thinner */
            background-color: #2b2a2a; 
            border: none;
            margin: 0.5rem 0;
        }
        .content-text {
            color: #4A4A4A; /* Adjust to the exact color from the image */
            font-size: smaller; /* Adjust the size as needed */
        }
        .logo-container img {
            width: 200px; /* Adjust the width as needed */
            height: auto; /* Maintain the aspect ratio */
            margin-bottom: 1rem;
            margin-left: 60px;
        }
        .greeting {
            color: #4A4A4A; /* Adjust to the exact color from the image */
            margin-bottom: 0;
        }
        .centered-container {
            max-width: 600px; /* Adjust the width as needed */
            margin: auto;
            padding: 2rem;
            border: 1px solid #ddd; /* Light gray border */
            border-radius: 0.5rem; /* Rounded corners for the container */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-md-6">
                <!-- Centered Container -->
                <div class="centered-container text-center">
                    <!-- Logo Image -->
                    <div class="logo-container">
                        <img src="https://purefitness-eg.com/wp-content/uploads/2023/07/IMG_%D9%A2%D9%A0%D9%A2%D9%A3%D9%A0%D9%A7%D9%A2%D9%A3_%D9%A1%D9%A9%D9%A1%D9%A0%D9%A4%D9%A0-1400x623.png" alt="Logo">
                    </div>
                    
                    <hr class="thin-line"> 

                    <!-- Greeting -->
                    <h2 class="greeting">Hello </h2>

                    <hr class="thin-line"> 

                    <!-- Content Text -->
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

    <!-- Include Bootstrap JS and Popper.js (if needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
