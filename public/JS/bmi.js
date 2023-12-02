document.addEventListener('DOMContentLoaded', function() {
    // Get the form and result elements
    var bmiForm = document.getElementById('bmiForm');
    var weightInput = document.getElementById('weight');
    var heightInput = document.getElementById('height');
    var resultContainer = document.getElementById('result');
    var bmiValueSpan = document.getElementById('bmiValue');
    var bmiCategorySpan = document.getElementById('bmiCategory');

    // Event listener for form submission
    bmiForm.addEventListener('submit', function(event) {
      event.preventDefault();

      // Get the values from the form
      var weight = parseFloat(weightInput.value);
      var height = parseFloat(heightInput.value);

      // Check if the inputs are valid numbers
      if (isNaN(weight) || isNaN(height) || weight <= 0 || height <= 0) {
        alert('Please enter valid values for weight and height.');
        return;
      }

      // Convert height to meters (from centimeters)
      height = height / 100;

      // Calculate BMI
      var bmi = weight / (height * height);

      // Display the result
      bmiValueSpan.textContent = bmi.toFixed(2);

      // Determine BMI category
      var category = getCategory(bmi);
      bmiCategorySpan.textContent = category;
    });

  // Function to determine BMI category
  function getCategory(bmi) {
    if (bmi < 18.5) {
      return 'Underweight';
    } else if (bmi >= 18.5 && bmi <= 24.9) {
      return 'Normal Weight';
    } else if (bmi >= 25 && bmi <= 29.9) {
      return 'Overweight';
    } else {
      return 'Obese';
    }
  }
});