window.onload = () => {
    fetch('http://localhost/info2180-finalproject/auth/check_session.php')
            .then(response => response.json())
            .then(data => {
                if (!data.loggedin) {
                    window.location.href = 'http://localhost/info2180-finalproject/auth/login.php';
                } 
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

