$(document).ready(function() {
    let currentPage;
    let currentContact;

    // Event Delegation - Attached click to persistent parent element, so that the script does not need to be rerun after loading a new page
    $("body").on('click', 'a', function(event) {
        event.preventDefault();
        if ($(this).attr('class')=="defer-details"){
            currentContact = $(this).attr('id');
            fetchPage('contactDetails.php',currentContact);
        }else{
            let page = $(this).attr("href");
            currentPage = page;
            getDisplayAJAX(page);
        }
    });
    $("body").on('click', '#assignToMeButton', function() {
        console.log("works")
        sendFetchRequest('assign');
    });

    // Delegate 'click' event for '#switchToSalesLeadButton' to the body
    $("body").on('click', '#switchToSalesLeadButton', function() {
        console.log("works")
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
    /* 
    *Client Side Validation
    *Coded so that both pages (newUser.php and newContacts.php) can use the same validation mechanisms
    */
    $("body").on('click',".form-submit",function(event){
        event.preventDefault();
        var validationFailed = false;
        var firstname = document.querySelector('#fname');
        var lastname = document.querySelector('#lname');
        var telephone = document.querySelector('#telNum');
        var email = document.querySelector('#email');
        var password = document.querySelector('#password');
        var company = document.querySelector('#company');
        var userName = firstname.value+" "+lastname.value;
        var FormData = $('form').serialize();
        
    
        if (isEmpty(firstname.value.trim())) {
          validationFailed = true;
          alert("Please fill in your First Name");
        }
        if (isEmpty(lastname.value.trim())) {
          validationFailed = true;
          alert("Please fill in your Last Name")
        };

        if(isEmpty(email.value.trim())){
            validationFailed = true;
            alert("Please enter your email address.");
        }else if (!isValidEmail(email.value.trim())) {
            validationFailed = true;
            alert("Incorrect format for email address.");
        }


        if (password!=null){
            if (isEmpty(password.value.trim())) {
                validationFailed = true;
                alert("Please fill in your Password")
            }else if(!isValidPassword(password.value.trim())){
                validationFailed = true;
                alert("Ensure your password matches the format: \n 8 Characters Long \nAt least one Uppercase Letter \n At least one Number ")
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
          alert('Please fix issues in Form submission and try again.');
        }else {
        console.log(FormData);
        // Used callback so the form can be submitted after generating the success message
        alert(generateSuccessMessage(currentPage,userName));
            $.ajax({
                url: currentPage,
                type: 'POST',
                data: FormData,
                success: function(data) {
                    console.log(data);
                    getDisplayAJAX(currentPage);
                },
                error: function(err) {
                    alert(err);
                }
            })
        }
         
    });
    $("body").on('click',".note-submit",function(event){
        event.preventDefault();
        console.log('Note submit works')
        var validationFailed = false;
        var note = document.querySelector('#text-note');

    
        if (isEmpty(note.value.trim())) {
          validationFailed = true;
          alert("Please write a note");
        }
    
        if (validationFailed) {
          alert('Please fix issue in Form submission and try again.');
        }else {

        //alert(generateSuccessMessage(currentPage,userName));
            $.ajax({
                url: "contactDetails.php",
                type: 'POST',
                data:{
                    comment: note.value,
                    noteFor: currentContact,
                },
                success: function(data) {
                    //reused code, create function
                    // getDisplayAJAX("contactDetails.php");
                },
                error: function(err) {
                    alert(err);
                }
            })
            fetchPage('contactDetails.php',currentContact);
        }
         
    });
});






// Used to generate success message based on current page and username entered
function generateSuccessMessage(page,userName){
    userName = userName.split(" ");
    let newUserMsg = `Thank You! User ${userName[0]} ${userName[1]} was successfully created`;
    let newContactMsg = `Thank You! Contact ${userName[0]} ${userName[1]} was successfully created`;
    return page=="newUser.php"? newUserMsg:newContactMsg;
}

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
  /**
   * Check if a valid password was entered.
   * Format: Atleast one letter, one number, 8 characters, one uppercase letter
   */
  function isValidPassword(emailAddress) {
    return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/.test(emailAddress);
  }
  

  
function switchCss(page) {
    let stylesheetPath = "../styles/dashboard.css"; // Default stylesheet

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
    console.log(page)
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

function fetchPage(page,currentContact){
    $.ajax({
        url: page,
        type: 'GET',
        data:{
            email: currentContact
        },
        success: function(data) {
            $('.dashboard').html(data);
            switchCss('contactDetails.php')
            console.log(data);
        },
        error: function(err) {
            alert(err);
        }
    })
}