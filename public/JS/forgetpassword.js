function validateForm() {
    var emailInput = document.getElementById('floatingInput');
    var errorMessage = document.getElementById('error-message');
    var emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/i;

    if (!emailInput.value.match(emailPattern)) {
        errorMessage.textContent = 'Please enter a valid email address.';
        emailInput.focus();
        return false;
    }

    errorMessage.textContent = '';

    return true;
}