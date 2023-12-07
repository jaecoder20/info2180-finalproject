$(document).ready(function() {
    // Event Delegation - Attached click to persistent parent element, so that the script does not need to be rerun after loading a new page
    $("body").on('click', 'a', function(event) {
        event.preventDefault();
        let page = $(this).attr("href");
        getDisplayAJAX(page);
        console.log("page is: ", page);
    });
    //Client-Side Validation
    $("body").on('click',".form-submit",function(event){
        var validationFailed = false;
        var firstname = document.querySelector('#fname');
        var lastname = document.querySelector('#lname');
        var telephone = document.querySelector('#telNum');
        var email = document.querySelector('#email');
        var password = document.querySelector('#password');
        var company = document.querySelector('#company');

        console.log("form works")
    
        if (isEmpty(firstname.value.trim())) {
          validationFailed = true;
          alert("Please fill in your First Name")
        };
    
        if (isEmpty(lastname.value.trim())) {
          validationFailed = true;
          alert("Please fill in your Last Name")
        }
        if (!isValidEmail(email.value.trim())) {
            validationFailed = true;
            alert("Incorrect format for email address.");
        };


        if (password!=null){
            if (isEmpty(password.value.trim())) {
            validationFailed = true;
            alert("Please fill in your Password")
            }
        }
        if (company!=null){
            if (isEmpty(company.value.trim())) {
            validationFailed = true;
            alert("Please fill in your Company Name")
            }
        }
        if (telephone!=null){
            if (!isValidTelephoneNumber(telephone.value.trim())) {
            validationFailed = true;
            alert("Incorrect format for telephone number.");
            };
        }
    
    
        if (validationFailed) {
          console.log('Please fix issues in Form submission and try again.');
          element.preventDefault();
        }
        });
});
function isEmpty(elementValue) {
    if (elementValue.length == 0) {
      return true;
    }
    return false;
  }
  
  /**
   * Check if a valid telephone number was entered.
   */
  function isValidTelephoneNumber(telephoneNumber) {
    return /^\d{3}-\d{3}-\d{4}$/.test(telephoneNumber);
  }
  
  /**
   * Check if a valid email address was entered.
   */
  function isValidEmail(emailAddress) {
    return /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/.test(emailAddress);
  }
  
  
  
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