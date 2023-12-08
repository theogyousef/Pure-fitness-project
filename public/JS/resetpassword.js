function validatePassword() {
    var newPasswordInput = document.getElementById('newPasswordInput');
    var confirmPasswordInput = document.getElementById('confirmPasswordInput');
    var errorMessage = document.getElementById('error-message');
    
    if (newPasswordInput.value.length < 8) {
      errorMessage.textContent = 'Password must be at least 8 characters long.';
      newPasswordInput.focus();
      return false;
    }
    
    if (newPasswordInput.value !== confirmPasswordInput.value) {
      errorMessage.textContent = 'Passwords do not match.';
      confirmPasswordInput.focus();
      return false;
    }
    
    errorMessage.textContent = '';
    return true;
  }