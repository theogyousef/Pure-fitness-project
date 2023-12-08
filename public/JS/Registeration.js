// Validation for registration form
function validateRegistration(event) {
  let errorMessages = "";
  let showError = false;

  
  const fname = document.forms["signupform"]["fname"].value;
  const lname = document.forms["signupform"]["lname"].value;
  const email = document.forms["signupform"]["email"].value;
  const password = document.forms["signupform"]["password"].value;
  const confirmpassword = document.forms["signupform"]["confirmpassword"].value;


  const inputs = document.forms["signupform"].elements;
  
  if (fname === "") {
    errorMessages ="You must fill the first name field";
    showError = true;
  }
  
  else if (lname === "") {
    errorMessages ="You must fill the last name field.";
    showError = true;
  }
  
  else if (email === "") {
    errorMessages ="You must fill the email field";
    showError = true;
  }
  
  else if (password === "") {
    errorMessages="You must fill the password field.";
    showError = true;
  } else if (password.length < 8) {
    errorMessages="Password must be at least 8 characters long.";
    showError = true;
  } else if (!/[0-9]/.test(password)) {
    errorMessages ="Password must contain at least 1 number (0-9).";
    showError = true;
  } else if (!/[a-z]/.test(password)) {
    errorMessages ="Password must contain at least 1 lowercase letter (a-z).";
    showError = true;
  } else if (!/[A-Z]/.test(password)) {
    errorMessages ="Password must contain at least 1 uppercase letter (A-Z).";
    showError = true;
  } else if (!/[^A-Za-z0-9]/.test(password)) {
    errorMessages= "Password must contain at least 1 special character.";
    showError = true;
  }
  
  else if (confirmpassword === "") {
    errorMessages= "You must fill the confirm password field.";
  } else if (password !== confirmpassword) {
    errorMessages="Passwords do not match.";
  }
    const errorSpan = document.getElementById("errorMessages");

  if (showError) {
    event.preventDefault(); // Prevent form submission only when there are errors
    errorSpan.innerHTML = errorMessages;
    errorSpan.style.display = "block";
  } else {
    errorSpan.style.display = "none";
  }

}
document.getElementById("myform").addEventListener("submit", validateRegistration);

// Validation for login form
function validateLogin(event) {
  let errorMessages = "";
  let showError = false;

  const l = document.forms["loginForm"]["email"].value;
  const p = document.forms["loginForm"]["pass"].value;

  if (l === "") {
    errorMessages = "You must fill the email field<br>";
    showError = true;
  } else if (p === "") {
    errorMessages = "You must fill the password field<br>";
    showError = true;
  }

  const errorSpan = document.getElementById("loginErrorMessages");
  if (showError) {
    event.preventDefault(); // Prevent form submission only when there are errors
    errorSpan.innerHTML = errorMessages;
    errorSpan.style.display = "block";
  } else {
    errorSpan.style.display = "none";
  }
}
document.getElementById("loginForm").addEventListener("submit", validateLogin);



// Password strength requirements


// Password strength requirements
const passwordInput = document.querySelector("#reg-password");

const requirements = [
  { regex: /.{8,}/, index: 0 },
  { regex: /.*[0-9].*/, index: 1 },
  { regex: /.*[a-z].*/, index: 2 },
  { regex: /.*[^A-Za-z0-9].*/, index: 3 },
  { regex: /.*[A-Z].*/, index: 4 },
];

const requirementList = document.querySelectorAll(".requirement-list li");

passwordInput.addEventListener("input", (event) => {
  const passwordValue = event.target.value;

  requirements.forEach((item) => {
    const isValid = item.regex.test(passwordValue);
    const requirementItem = requirementList[item.index];
    const icon = requirementItem.querySelector("i");

    if (isValid) {
      icon.classList.remove("fa-circle");
      icon.classList.add("fa-check");
    } else {
      icon.classList.remove("fa-check");
      icon.classList.add("fa-circle");
    }
  });
});
