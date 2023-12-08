function validateOTP() {
    console.log('validateOTP() called'); // Add this line
    var otpInput = document.getElementById('otpInput');
    var errorMessage = document.getElementById('error-message');
    var otpPattern = /^\d{6}$/;

    if (!otpInput.value.match(otpPattern)) {
        errorMessage.textContent = 'Please enter a valid 6-digit OTP.';
        otpInput.focus();
        return false;
    }

    errorMessage.textContent = '';

    return true;
}
