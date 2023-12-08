<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/CSS/confirm.css">
    <title>Address Confirmation</title>
</head>

<body>
    <header>
        <h1>Address Confirmation</h1>
    </header>

    <div class="container-wrapper">
        <div class="container">
            <form id="addressForm" onsubmit="validateForm(event)">
                <div class="row">
                    <div class="column">
                        <label for="fullName">Full Name:</label>
                        <input type="text" id="fullName" name="fullName" placeholder="John Doe" required>
                        <div class="error-message" id="fullname-error"></div>

                        <label for="address">Street:</label>
                        <input type="text" id="address" name="address" placeholder="123 Main St" required>
                        <div class="error-message" id="address-error"></div>

                        <label for="apartmentno">Apartment No.:</label>
                        <input type="text" id="apartmentno" name="apartment" placeholder="Apt 4B" required>
                        <div class="error-message" id="apartment-error"></div>

                        <label for="floorno">Floor No:</label>
                        <input type="text" id="floorno" name="floor" placeholder="5th Floor" required>
                        <div class="error-message" id="floor-error"></div>
                    </div>

                    <div class="column">
                        <label for="buildingno">Building No:</label>
                        <input type="text" id="buildingno" name="building" placeholder="Building 123" required>
                        <div class="error-message" id="building-error"></div>

                        <label for="country">Country:</label>
                        <input type="text" id="country" name="country" placeholder="Egypt" required>
                        <div class="error-message" id="country-error"></div>

                        <label for="city">City:</label>
                        <input type="text" id="city" name="city" placeholder="Cairo" required>
                        <div class="error-message" id="city-error"></div>

                        <label for="zipcode">Zip Code:</label>
                        <input type="text" id="zipCode" name="zipCode" pattern="\d{5}" title="ZIP code must be 5 digits" placeholder="12345" required>
                        <div class="error-message" id="zipCode-error"></div>
                    </div>

                    <button type="submit">Confirm Address</button>
                    <div id="successMessage">
                        Address confirmed successfully!
                    </div>
                </div>
            </form>
        </div>
    </div>



    <script>
        function validateForm(event) {
            event.preventDefault();

            const inputs = document.querySelectorAll('#addressForm input');

            let isValid = true;
            inputs.forEach(input => {
                const errorElement = document.getElementById(`${input.id}-error`);
                if (!input.value.trim()) {
                    isValid = false;
                    errorElement.textContent = 'This field is required';
                }
            });

            const zipCodeRegex = /^\d{5}$/;
            const zipCodeInput = document.getElementById('zipCode');
            const zipCodeErrorElement = document.getElementById('zipCode-error');
            if (!zipCodeRegex.test(zipCodeInput.value)) {
                zipCodeErrorElement.textContent = 'Please enter a valid 5-digit ZIP code.';
                isValid = false;
            }

            const successMessage = document.getElementById('successMessage');
            if (isValid) {
                console.log('tmmmaaaaammmm');
                successMessage.textContent = 'Address confirmed successfully!';
                window.location.href = "checkOut.php";
            }
        }
    </script>
    <footer>
        <?php
        include 'footer.php'
        ?>
    </footer>
</body>

</html>