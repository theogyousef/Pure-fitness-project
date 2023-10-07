function getImage(imagename) {
    var newimg = imagename.replace(/^.*\\/, "");
    document.getElementById("display-image").innerHTML = newimg;
  }
  
  
  function myMenuFunction() {
    var i = document.getElementById("navMenu");
    if (i.className === "nav-menu") {
      i.className += " responsive";
    } else {
      i.className = "nav-menu";
    }
  }
  
  var a = document.getElementById("loginBtn");
  var b = document.getElementById("registerBtn");
  var x = document.getElementById("login");
  var y = document.getElementById("register");
  
  function login() {
    x.style.left = "4px";
    y.style.right = "-520px";
    a.className += " white-btn";
    b.className = "btn";
    x.style.opacity = 1;
    y.style.opacity = 0;
  }
  
  function register() {
    x.style.left = "-510px";
    y.style.right = "5px";
    a.className = "btn";
    b.className += " white-btn";
    x.style.opacity = 0;
    y.style.opacity = 1;
  }
  
  // login eye hide password
  const togglePassword = document.querySelector("#togglePassword");
  const password = document.querySelector("#id_password");
  
  togglePassword.addEventListener("click", function (e) {
    const type = password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
    this.classList.toggle("fa-eye");
  });
  
  // login eye hide password
  
  const togglePass2 = document.querySelector("#togglePassword2");
  const password2 = document.querySelector("#reg-password");
  togglePass2.addEventListener("click", function (e) {
    const type2 = password2.getAttribute("type") === "password" ? "text" : "password";
    password2.setAttribute("type", type2);
    this.classList.toggle("fa-eye");
  });
  
  const togglePass3 = document.querySelector("#togglePassword3");
  const password3 = document.querySelector("#conpassword");
  togglePass3.addEventListener("click", function (e) {
    // toggle the type attribute
    const type3 = password3.getAttribute("type") === "password" ? "text" : "password";
    password3.setAttribute("type", type3);
    // toggle the eye icon class
    this.classList.toggle("fa-eye");
  });
  
  
  function validations(event) {
    event.preventDefault();
    let errorMessages = "";
    let showError = false;
  
    let x = document.forms["myform"]["fname"].value;
    let y = document.forms["myform"]["lname"].value;
    let j = document.forms["myform"]["emailin"].value;
    let h = document.forms["myform"]["passwordo"].value;
    let d = document.forms["myform"]["confirmpassword"].value;
    let n = document.forms["myform"]["nationalID"].value;
  
    if (x === "") {
      errorMessages = "You must fill the first name field<br>";
      showError = true;
    } else if (y === "") {
      errorMessages = "You must fill the last name field<br>";
      showError = true;
    } else if (j === "") {
      errorMessages = "You must fill the email field<br>";
      showError = true;
    } else if (h === "") {
      errorMessages = "You must fill the password field<br>";
      showError = true;
    } else if (d === "") {
      errorMessages = "You must fill the confirm password field<br>";
      showError = true;
    } else if (h !== d) {
      errorMessages = "Passwords do not match<br>";
      showError = true;
    }
    else if (n === "") {
      errorMessages = "You must fill the national ID";
      showError = true;
    }
  
    const errorSpan = document.getElementById("errorMessages");
    if (showError) {
      errorSpan.innerHTML = errorMessages;
      errorSpan.style.display = "block";
    } else {
      errorSpan.style.display = "none";
    }
  }
  document.getElementById("myform").addEventListener("submit", validations);
  
  function validationsLogin(event) {
    event.preventDefault();
    let errorMessages = "";
    let showError = false;
  
    let l = document.forms["loginForm"]["email"].value;
    let p = document.forms["loginForm"]["pass"].value;
  
    if (l === "") {
      errorMessages = "You must fill the email field<br>";
      showError = true;
    } else if (p === "") {
      errorMessages = "You must fill the password field<br>";
      showError = true;
    }
  
    const errorSpan = document.getElementById("loginErrorMessages");
    if (showError) {
      errorSpan.innerHTML = errorMessages;
      errorSpan.style.display = "block";
    } else {
      errorSpan.style.display = "none";
    }
  }
  
  document.getElementById("loginForm").addEventListener("submit", validationsLogin);
  
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
  
      if (isValid) {
        requirementItem.querySelector("i").classList = "fa-solid fa-check";
      } else {
        requirementItem.querySelector("i").classList = "fa-solid fa-circle";
      }
    });
  });
  
  document.getElementById("loginForm").addEventListener("submit", function (event) {
    event.preventDefault();
    validationsLogin(event);
    loginAction();
  });
  
  