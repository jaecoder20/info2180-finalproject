// Check the session status when the page loads
window.addEventListener('DOMContentLoaded', () => {
    fetch('http://localhost/info2180-finalproject/auth/check_session.php')
        .then(response => response.json())
        .then(data => {
            if (!data.loggedIn) {
                // If the user is not logged in, redirect to the login page
                window.location.href = 'http://localhost/info2180-finalproject/auth/login.php';
            } 
        })
        .catch(error => {
            console.error('Error:', error);
        });
});