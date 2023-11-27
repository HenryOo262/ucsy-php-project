
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

    const matchingEmail = instructor.filter(item => item['instructorName'] == instructorNameValue)
    matchingEmail.forEach((item) => {
        let newOption = document.createElement('option')
        newOption.value = item['email']
        emailDatalist.appendChild(newOption)
    })
}

// correct name and department data according to email input
function dataCorrection() {
    const emailValue = email.value

    const matchingInstructor = instructor.find(item => item['email'] == emailValue)
    
    if(matchingInstructor) {
        // check if email has corresponding owner
        instructorName.value = matchingInstructor['instructorName']
        faculty.value = matchingInstructor['faculty_id']
        // set read-only 
        instructorName.setAttribute('readonly',true)
        faculty.classList.add('select-read-only')
    } else {
        // if no corresponding owner unset read-only
        instructorName.removeAttribute('readonly')
        faculty.removeAttribute('readonly')
        faculty.classList.remove('select-read-only')
    }
}