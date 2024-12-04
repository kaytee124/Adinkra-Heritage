function createAccount(event) {
    event.preventDefault();

    // Reset error messages
    document.getElementById("nameError").textContent = "";
    document.getElementById("phoneError").textContent = "";
    document.getElementById("emailError").textContent = "";
    document.getElementById("passwordError").textContent = "";
    document.getElementById("rePasswordError").textContent = "";

    var fullName = document.getElementById("fullName").value;
    var phone = document.getElementById("phoneNumber").value;
    var email = document.getElementById("email").value;
    var newPassword = document.getElementById("newPassword").value;
    var rePassword = document.getElementById("rePassword").value;

    var isValid = true;

    // Validation
    if (!/^[a-zA-Z\s]{3,}$/.test(fullName)) {
        document.getElementById("nameError").textContent = "Full name must be at least 3 characters and contain only letters and spaces";
        isValid = false;
    }

    if (!/^\+?[1-9]\d{1,14}$/.test(phone)) {
        document.getElementById("phoneError").textContent = "Phone number must be in E.164 format (e.g., +233XXXXXXXXX)";
        isValid = false;
    }

    if (!/\S+@\S+\.\S+/.test(email)) {
        document.getElementById("emailError").textContent = "Invalid email address";
        isValid = false;
    }

    if (newPassword.length < 8 || !/[a-zA-Z]/.test(newPassword) || !/\d/.test(newPassword) || !/[!@#$%^&*(),.?":{}|<>]/.test(newPassword)) {
        document.getElementById("passwordError").textContent = "Password must be at least 8 characters and include letters, numbers, and symbols";
        isValid = false;
    }

    if (rePassword !== newPassword) {
        document.getElementById("rePasswordError").textContent = "Passwords do not match";
        isValid = false;
    }

    if (!isValid) {
        // Reload the page after 5 seconds if validation errors exist
        setTimeout(() => {
            location.reload();
        }, 5000);
        return false; // Stop further execution
    }

    var form = document.getElementById("registrationForm");
    var formData = new FormData(form);

    // Send the data to the server using fetch
    fetch("../actions/register_user_action.php", {
        method: "POST",
        body: formData,
    })
    .then((response) => {
        const contentType = response.headers.get("content-type");
        if (contentType && contentType.includes("application/json")) {
            return response.json();
        } else {
            return response.text().then(text => { throw new Error(text); });
        }
    })
    .then((data) => {
        if (data.success) {
            // Redirect on success
            location.href = '../view/customerlogin.php';
        } else {
                // Log error and reload page on server-side failure
                alert("Registration error:", data.message);
                setTimeout(() => {
                    location.reload();
                }, 5000);
        }
    })
    .catch((error) => {
        // Check if the error message is "Email already registered"
        if (error.message && error.message.includes("Email already registered")) {
            document.getElementById("emailError").textContent = "Email already registered";
            setTimeout(() => {
                location.reload();
            }, 5000);
        } else {
            // Handle any other errors that occur during the fetch operation
            console.error("Error from server:", error.message || error);
        }
    });

    return false; // Prevent the form from submitting automatically
}
