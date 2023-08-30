
// TRIES TO CORRECT INPUT DATA 

// "instructor" is an 2d array with each index being an instructor
// each index is an associative array with keys - instructorName,email,faculty_id

const instructorName = document.querySelector('#instructorName')
const faculty = document.querySelector('#faculty')
const email = document.querySelector('#email')
const emailDatalist = document.querySelector('#emails')

// for update.php - to make sure name and faculty are greyed out already on page load 
document.addEventListener("DOMContentLoaded",dataCorrection);

// suggests email according to instructor name input
function emailSuggestion() {
    const instructorNameValue = instructorName.value

    // removes all suggested e-mails for previous input-name
    while (emailDatalist.firstChild) {
        emailDatalist.removeChild(emailDatalist.firstChild)
    }

    // suggests emails for the input-name
    instructor.forEach(item => {
        if(item['instructorName'] == instructorNameValue) {
            let newOption = document.createElement('option')
            newOption.value = item['email']
            emailDatalist.appendChild(newOption)
        }
    });
}

// correct name and department data according to email input
function dataCorrection() {
    const emailValue = email.value

    for(i=0; i<instructor.length; i++) {
        if(instructor[i]['email'] == emailValue) {
            // check if email has corresponding owner
            instructorName.value = instructor[i]['instructorName']
            faculty.value = instructor[i]['faculty_id']
            // set read-only 
            instructorName.setAttribute('readonly',true)
            faculty.classList.add('select-read-only')
            break
        } else if(instructor[i]['email'] != emailValue) {
            // if no corresponding owner unset read-only
            instructorName.removeAttribute('readonly')
            faculty.removeAttribute('readonly')
            faculty.classList.remove('select-read-only')
        }
    }
}