// Example: SweetAlert for form validation
function validateForm() {
    const email = document.getElementById('email').value;
    if (!email.includes('@')) {
        Swal.fire({
            icon: 'error',
            title: 'Invalid email',
            text: 'Please enter a valid email address.'
        });
        return false;
    }
    return true;
}
