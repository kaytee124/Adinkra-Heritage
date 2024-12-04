// category.js

function addCategory(event) {
    event.preventDefault(); // Prevent default form submission

    var form = document.getElementById('add-category-form');
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../actions/add_cat_action.php', true);

    xhr.onload = function () {
        try {
            var response = JSON.parse(this.responseText);

            if (this.status === 200 && response.success) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Category added successfully.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = '../view/admincategories.php';
                });
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: response.error || 'Failed to add the category. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'Try Again'
                });
            }
        } catch (error) {
            Swal.fire({
                title: 'Error!',
                text: 'Error parsing server response. Please try again.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            console.error("Error parsing response:", error);
        }
    };

    xhr.send(formData);
}

// Attach event listener to the form
document.getElementById('add-category-form').addEventListener('submit', addCategory);
