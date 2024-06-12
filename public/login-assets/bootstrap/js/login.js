const passwordField = document.getElementById("password");
const togglePassword = document.querySelector("showPasswordToggle");

function  showPasswordToggleVisibility() {
    if (passwordField.type === "password") {
        passwordField.type = "text";
        showPasswordToggle.classList.remove('fa-eye');
        showPasswordToggle.classList.add('fa-eye-slash');
    } else {
        passwordField.type = "password";
        showPasswordToggle.classList.remove('fa-eye-slash');
        showPasswordToggle.classList.add('fa-eye');
    }
}

// Initially hide the icon
showPasswordToggle.style.display = "none";

// Listen for input in the password field
passwordField.addEventListener("input", function () {
    if (passwordField.value.trim() !== null) {
        showPasswordToggle.style.display = "block";
    } else {
        showPasswordToggle.style.display = "none";
    }
});

// Check the input on page load
window.addEventListener("load", function () {
    if (passwordField.value.trim() !== "") {
        showPasswordToggle.style.display = "block";
    }
});
