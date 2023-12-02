// check_session.js
window.addEventListener('DOMContentLoaded', () => {
    
        fetch('http://localhost/info2180-finalproject/auth/check_session.php')
            .then(response => response.json())
            .then(data => {
                if (!data.loggedin) {
                    // Redirect to the login page
                    window.location.href = 'http://localhost/info2180-finalproject/auth/login.php';
                } 
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
);
