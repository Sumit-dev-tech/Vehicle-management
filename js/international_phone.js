
// Get references to the input field and error message element
// Get references to the input field, error message element, and form
// const mobileInput = document.getElementById('mobileInput-1');
// const errorMessage = document.getElementById('error-message');
// const form = document.getElementById('customerForm');

// // Add event listener to the form submission
// form.addEventListener('submit', function (event) {
//   const mobileNumber = mobileInput.value;
//   const validationMessage = validateMobileNumber(mobileNumber);

//   if (validationMessage !== '') {
//     event.preventDefault(); // Prevent form submission
//     errorMessage.textContent = validationMessage;
//     errorMessage.classList.remove('hide');
//   } else {
//     errorMessage.classList.add('hide');
//   }
// });

// // Add event listener to the input field
// mobileInput.addEventListener('input', function () {
//   const mobileNumber = mobileInput.value;
//   const onlyNumbers = mobileNumber.replace(/\D/g, '');
//   mobileInput.value = onlyNumbers;

//   if (mobileNumber === '') {
//     errorMessage.classList.add('hide');
//     return;
//   }

//   const validationMessage = validateMobileNumber(onlyNumbers);
//   errorMessage.textContent = validationMessage;

//   if (validationMessage !== '') {
//     errorMessage.classList.remove('hide');
//   } else {
//     errorMessage.classList.add('hide');
//   }
// });

// // Validation function
// function validateMobileNumber(number) {
//   // Check if the number is less than 10 digits or more than 10 digits
//   if (number.length !== 10) {
//     return 'Invalid number. Please enter a 10-digit mobile number.';
//   }

//   // Check if the number contains only digits
//   if (!/^\d+$/.test(number)) {
//     return 'Invalid number. Only numeric characters are allowed.';
//   }

//   // Validation passed, the number is valid
//   return '';
// }
var input = document.querySelector("#mobileInput-1");

var iti = window.intlTelInput(input, {
    separateDialCode: true,
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/utils.js",
    initialCountry: "in" // Set the initial country to India (ISO 3166-1 alpha-2 country code for India is "in")
});

function updateCountryCode() {
    var countryCodeInput = document.querySelector("#countryCode");
    countryCodeInput.value = "+" + iti.getSelectedCountryData().dialCode;
}

// Update the selected country code when the country is changed
input.addEventListener('countrychange', updateCountryCode);

// Get the selected country code initially
updateCountryCode();

input.addEventListener('input', function () {
      const mobileNumber = input.value;
      const onlyNumbers = mobileNumber.replace(/\D/g, '');
      input.value = onlyNumbers;
});
// Validate the phone number when the form is submitted
var form = document.querySelector("#customerForm"); // Replace "yourFormId" with the actual ID of your form
form.addEventListener('submit', function (event) {
    if (!iti.isValidNumber()) {
        event.preventDefault(); // Prevent form submission
        showError('Invalid mobile number');
    } else {
        clearError();
    }
});

// Validate the phone number when the form is submitted
input.addEventListener('input', validateMobileNumber);
function validateMobileNumber() {
    const phoneNumber = iti.getNumber();
    const isValidNumber = iti.isValidNumber();

    if (phoneNumber === '') {
        clearError(); // Hide the error message if the field is blank
    } else if (phoneNumber.length < 10) {
        showError('Phone number should have at least 10 digits');
    } else if (!isValidNumber) {
        showError('Invalid mobile number');
    } else {
        clearError();
    }
}
function showError(message) {
    const errorMessage = document.getElementById('error_message');
    errorMessage.innerHTML = message;
}

function clearError() {
    const errorMessage = document.getElementById('error_message');
    errorMessage.innerHTML = '';
}

// now next code for update form 
// function initializePhoneInput() {
//     var input = document.querySelector("#mobileInput");
//     var countryCodeInput = document.querySelector("#countryCode-1");
//     var iti = window.intlTelInput(input, {
//         separateDialCode: true,
//         utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/utils.js",
//         initialCountry: countryCodeInput.value,
//     });

//     // Update the country code input field when the selected country changes
//     iti.promise.then(function () {
//         var selectedCountryData = iti.getSelectedCountryData();
//         countryCodeInput.value = selectedCountryData.iso2;
//     });

//     // Validate the phone number when the input value changes
//     input.addEventListener('input', validateMobileNumber);

//     function validateMobileNumber() {
//         const phoneNumber = iti.getNumber();
//         const isValidNumber = iti.isValidNumber();

//         if (phoneNumber === '') {
//             clearError();
//         } else if (phoneNumber.length < 10) {
//             showError('Phone number should have at least 10 digits');
//         } else if (!isValidNumber) {
//             showError('Invalid mobile number');
//         } else {
//             clearError();
//         }
//     }

//     function showError(message) {
//         const errorMessage = document.getElementById('error-1');
//         errorMessage.innerHTML = message;
//     }

//     function clearError() {
//         const errorMessage = document.getElementById('error-1');
//         errorMessage.innerHTML = '';
//     }
// }

// // Call the initializePhoneInput() function for the initial form
// initializePhoneInput();



