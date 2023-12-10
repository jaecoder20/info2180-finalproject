document.getElementById('assignToMeButton').addEventListener('click', function() {
    sendFetchRequest('assign');
});

document.getElementById('switchToSalesLeadButton').addEventListener('click', function() {
    sendFetchRequest('switchRole');
});

function sendFetchRequest(actionType) {
    const email = document.getElementById('info-email').textContent;
    fetch('updateContacts.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            'email': email,
            'action': actionType
        })
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        window.location.reload();
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}