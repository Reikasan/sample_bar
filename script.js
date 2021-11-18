// Humburger navbar for small window size
var humburgerIcon = document.querySelector('.humburger-icon');
                               
function toggleNavbar(){
    document.querySelector('.navbar').classList.toggle('show');
    
    humburgerIcon.classList.toggle('close');
}

humburgerIcon.addEventListener('click', toggleNavbar);

// when nav-link is clicked, close the navbar
var navLinks = document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', toggleNavbar)
});


// Scroll and show bar's concept
var conceptTitle = document.querySelector('.concept-title');

var scrollAndShow = function() {
    var y = window.scrollY;
    
    if(y >= 300 ) {        
        conceptTitle.classList.remove('hide');
        conceptTitle.nextElementSibling.classList.remove('hide');
    } 
}

window.addEventListener('scroll', scrollAndShow);


// manage request date by current date
function validateRequestDate() {
    var date = new Date();
    var year = date.getFullYear();
    var month = date.getMonth() + 1;
    var day = date.getDate();

    var minDay;
    var maxMonth;
    var minMonth;

    if (day >= 29) {
        minDay = (day + 2) - 30;
        minMonth = month + 1;
    } else if (day <= 7) {
        minDay = '0' + (day + 2);
        day = '0' + day;
        minMonth = month;
        
    } else if(day >= 8 && day < 10) {
        minDay = day + 2;
        day = '0' + day;
        minMonth = month;
    
    } else {
        minDay = day + 2;
        minMonth = month;
    }

    if(month < 9) {
        maxMonth = month + 1;
        maxMonth = '0' + maxMonth;  
        month = '0' + month;
    } else if(month === 9) {
        month = '0' + month;
        maxMonth = 10;  
    } else {
        maxMonth = month + 1;
    }

    var minDate = year + '-' + minMonth + '-' + minDay;
    var maxDate = year + '-' + maxMonth + '-' + day;

    requestedDate.setAttribute('min', minDate);
    requestedDate.setAttribute('max', maxDate);
}

window.addEventListener('load', validateRequestDate);


// form control
const form = document.getElementById('reservationForm');
const container = document.querySelector('.container');
const confirmationModal = document.getElementById('confirmationModal');
const requestBtn = document.getElementById('requestBtn');

// select input field
const request_name = document.getElementById('name');
const email = document.getElementById('email');
const phone = document.getElementById('phone');
const seats = document.getElementById('seats');
const comment = document.getElementById('comment');
const requestedDate = document.getElementById('requestedDate');
const hour = document.getElementById('hour');
const min = document.getElementById('min');

requestBtn.addEventListener('click', confirmInput);

// CHECK INPUT FIELDS AND OPEN CONFIRMATION MODAL
function confirmInput(event) {   
    // select input value
    const nameValue = request_name.value;
    const emailValue = email.value;
    const phoneValue = phone.value;
    const seatsValue = seats.value;
    const commentValue = comment.value;
    const requestedDateValue = requestedDate.value;
    const requestedTimeValue = hour.value + min.value;

    // Check required input fields are filled out
    if(nameValue.length > 0 && emailValue.length > 0 && seatsValue.length > 0 && requestedDateValue.length > 0 && requestedTimeValue.length > 0) {
        console.log("worked function");
        // select print area in modal
        const typedName = document.getElementById('typedName');
        const typedEmail = document.getElementById('typedEmail');
        const typedPhone = document.getElementById('typedPhone');
        const selectedSeats = document.getElementById('selectedSeats');
        const typedComment = document.getElementById('typedComment');
        const selectedDate = document.getElementById('selectedDate');
        const selectedTime = document.getElementById('selectedTime');

        // transfar typed value to confirmation modal
        function printInputInfo() {     
            typedName.setAttribute("value", nameValue);
            typedEmail.setAttribute("value", emailValue);
            selectedSeats.setAttribute("value", seatsValue);
            selectedDate.setAttribute("value", requestedDateValue);
            selectedTime.setAttribute("value", requestedTimeValue);
            
            // check non required value
            function checkOptionalFiledValue(optionalValue, optionalValueInModal) {
                if(optionalValue.length > 0) {
                    if(optionalValue === phoneValue) {
                        return optionalValueInModal.setAttribute("value", optionalValue);
                    } else {
                        return optionalValueInModal.innerHTML = optionalValue;
                    }
                    
                } else {
                    return optionalValueInModal.parentElement.classList.add('hide');
                }
            }

            checkOptionalFiledValue(phoneValue, typedPhone);
            checkOptionalFiledValue(commentValue, typedComment);
            
        } 
    
        // function for open the modal
        function openConfirmationModal() {
            // add .gray to .container and make window dark
            container.classList.add('gray');

            // add .show to #confirmationModal to show
            confirmationModal.classList.add('show');

        } // end of openConfirmationModal
    
        printInputInfo();
        openConfirmationModal();
        event.preventDefault();
    } else { 
        event.preventDefault();
        console.log("something wrong");
        console.log("nameValue: " + nameValue.length);
        console.log("emailValue: " +  emailValue.length);
        console.log("seatlValue: " +  seatsValue.length);
        console.log("dateValue: " +  requestedDateValue.length);
        console.log("timeValue: " +  requestedTimeValue.length);
    }// end of check the optional area
} // end of confirmInput


// function for close the modal
function closeModal() {
    // remove .gray to .container and make window dark
    container.classList.remove('gray');

    // add .show to #confirmationModal to show
    confirmationModal.classList.remove('show'); 
    
    typedPhone.parentElement.classList.remove('hide');
    typedComment.parentElement.classList.remove('hide');

} // end of closeModal function


// function for close the modal and correct the infos
function closeModalAndCorrect(event) {
    closeModal();
    event.preventDefault();
} // end of closeModalAndCorrect function

// 
function closeModalAndSend(event) {
    closeModal();
    
    // request_name.value = "";
    // email.value = "";
    // phone.value = "";
    // seats.value = "";
    // requestedDate.value = "";
    // comment.value = "";        
    // hour.value= "";
    // min.value = "";

    openThanksMessage(event);
}

/* CLOSE MODAL */
// and back to forms
const backToFormBtns = document.querySelectorAll('.backToForm');
backToFormBtns.forEach(backToFormBtn => {
    backToFormBtn.addEventListener('click', closeModalAndCorrect);
});

// and send form
document.getElementById('sendBtn').addEventListener('click', closeModalAndSend);
