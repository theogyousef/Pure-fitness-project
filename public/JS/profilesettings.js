// if (window.history.replaceState) {
//     window.history.replaceState(null, null, window.location.href);
//   }

 
// Validation for profile settings Account details 
function validatedetails(event){
    let errorMessages = "";
    let showError = false;
  
    const inputs = document.forms["details"].elements;
  
    if (inputs.fname.value === "") {
      errorMessages = "You must fill the first name field<br>";
      showError = true;
    } else if (inputs.lname.value === "") {
      errorMessages = "You must fill the last name field<br>";
      showError = true;
    } else if (inputs.email.value === "") {
      errorMessages = "You must fill the email field<br>";
      showError = true;
    } 
  
    const errorSpan = document.getElementById("DetailserrorMessages");
    if (showError) {
      event.preventDefault(); // Prevent form submission only when there are errors
      errorSpan.innerHTML = errorMessages;
      errorSpan.style.display = "block";
    } else {
      errorSpan.style.display = "none";
    }
  
  }
  document.getElementById("detailss").addEventListener("accountdetails", validatedetails);
  
  //validation for address 
  function validateaddress(event){
    console.log("wasal");
    let errorMessages = "";
    let showError = false;
  
    const inputs = document.forms["Address"].elements;
  
    if (inputs.city.value === "") {
      errorMessages = "You must fill the city field<br>";
      showError = true;
    } else if (inputs.street.value === "") {
      errorMessages = "You must fill the street field<br>";
      showError = true;
    } else if (inputs.house.value === "") {
      errorMessages = "You must fill the house field<br>";
      showError = true;
    } else if (inputs.postalcode.value === "") {
      errorMessages = "You must fill the postalcode field<br>";
      showError = true;
    }
  
    const errorSpan = document.getElementById("AddresserrorMessages");
    if (showError) {
      event.preventDefault(); // Prevent form submission only when there are errors
      errorSpan.innerHTML = errorMessages;
      errorSpan.style.display = "block";
    } else {
      errorSpan.style.display = "none";
    }
  
  }
  document.getElementById("Addresss").addEventListener("addressdetails", validateaddress);
  
  //validate security
  function validatesecurity(event) {
    let errorMessages = "";
    let showError = false;
  
   
    const inputs = document.forms["security"].elements;
  
    if (inputs.oldpassword.value === "") {
      errorMessages = "You must fill the old password field<br>";
      showError = true;
    } else if (inputs.newpassword.value === "") {
      errorMessages = "You must fill the new password field<br>";
      showError = true;
    } else if (inputs.conpassword.value === "") {
      errorMessages = "You must fill the confirm password field<br>";
      showError = true;
    } 
    else if (inputs.newpassword.value !== inputs.conpassword.value) {
      errorMessages = "Passwords do not match<br>";
      showError = true;
    }
  
    const errorSpan = document.getElementById("SecurityerrorMessages");
    if (showError) {
      event.preventDefault(); //<<< Prevent form submission only when there are errors not always >>>>
      errorSpan.innerHTML = errorMessages;
      errorSpan.style.display = "block";
    } else {
      errorSpan.style.display = "none";
    }
  }
  document.getElementById("security").addEventListener("submit", validatesecurity);
  