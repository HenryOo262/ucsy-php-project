
const instructorName = document.querySelector("#instructorName")
const email = document.querySelector('#email')
const emailDatalist = document.querySelector('#emails')

function emailSuggestion() {
    const instructorNameValue = instructorName.value

    while (emailDatalist.firstChild) {
        emailDatalist.removeChild(emailDatalist.firstChild)
    }

    instructor.forEach(item => {
        if(item[0] == instructorNameValue) {
            let newOption = document.createElement("option")
            newOption.value = item[1]
            emailDatalist.appendChild(newOption)
        }
    });
}