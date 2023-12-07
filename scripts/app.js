$(document).ready(function() {
    // Event Delegation - Attached click to persistent parent element, so that the script does not need to be rerun after loading a new page
    $("body").on('click', 'a', function(event) {
        event.preventDefault();
        let page = $(this).attr("href");
        getDisplayAJAX(page);
        console.log("page is: ", page);
    });
    
});

function switchCss(page) {
    let stylesheetPath = "../styles/dashboard.css"; // Default stylesheet

    console.log(page)
    if (page === 'newUser.php') {
        stylesheetPath = "../styles/newUser.css";
    } else if (page === 'contactDetails.php') {
        stylesheetPath = "../styles/contactDetails.css";
    }else if(page === 'newContacts.php') {
        stylesheetPath = "../styles/newContacts.css";
    }

    $('link#variable-stylesheet').attr('href', stylesheetPath);
}

function getDisplayAJAX(page) {
    $('.dashboard').load(page, function(response, status, xhr) {
        if (status === "success") {
            switchCss(page);
        } else {
            console.error("Failed to load the page:", page);
        }
    });
}

function logout(){
    $.ajax({
        url: "http://localhost/info2180-finalproject/auth/logout.php",
        type: "POST",
        success: function(data) {
          window.location.href = "http://localhost/info2180-finalproject/auth/login.php";
        }
      });
}