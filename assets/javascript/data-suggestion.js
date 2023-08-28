
const instructorName = document.querySelector("#instructorName")
const faculty = document.querySelector('#faculty')
const email = document.querySelector('#email')
const emailDatalist = document.querySelector('#emails')

function emailSuggestion() {
    const instructorNameValue = instructorName.value

    while (emailDatalist.firstChild) {
        emailDatalist.removeChild(emailDatalist.firstChild)
    }

    instructor.forEach(item => {
        if(item["instructorName"] == instructorNameValue) {
            let newOption = document.createElement("option")
            newOption.value = item["email"]
            emailDatalist.appendChild(newOption)
        }
    });
}

function dataCorrection() {
    const emailValue = email.value

    for(i=0; i<instructor.length; i++) {
        if(instructor[i]["email"] == emailValue) {
            instructorName.value = instructor[i]["instructorName"]
            faculty.value = instructor[i]["faculty_id"]
            console.log(instructor[i]["faculty_id"])
            instructorName.setAttribute("readonly",true)
            faculty.classList.add('select-read-only')
            break
        } else if(instructor[i]["email"] != emailValue) {
            instructorName.removeAttribute("readonly")
            faculty.removeAttribute("readonly")
            faculty.classList.remove('select-read-only')
        }
    }
}