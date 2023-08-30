
// REAL-TIME FORM VALIDATION

const academicYear = document.querySelector('#academicYear')
const instructorName = document.querySelector('#instructorName')

const btn = document.querySelector('#btn')

// set two flags to false when page is loaded 
var flag1 = false
var flag2 = false

// call the checkButton when page is loaded so the button is disabled
document.addEventListener("DOMContentLoaded",checkButton);

// empty the values when page is backwarded
window.addEventListener('pageshow',(event)=>{
        academicYear.value = ''
        instructorName.value = ''
});

const patternAcademicYear = /[2][0][\d][\d]-[2][0][\d][\d]/

const patternInstructorName = /^(?!Daw|U|\s)(\D)+(\d)*$/i
// ^ indicates "start of the string"
// ^(?!x) indicates "start of the string not followed by x"
// \D+ indicates "one or more non-digits" and \d* zero or more digits
// $ indicates end of the string
// i indicates "the whole pattern is case-insensitive"


function validateInstructorName() {
    const instructorNameValue = instructorName.value
    
    // check pattern
    if(instructorNameValue.match(patternInstructorName)){
        instructorName.classList.remove('no-match')
        flag1 = true
    }else{
        instructorName.classList.add('no-match')
        flag1 = false
    }

    // check if both flags are true
    checkButton()
}

function validateAcademicYear() {
    const academicYearValue = academicYear.value
    
    // check pattern
    if(academicYearValue.match(patternAcademicYear)){
        // when the pattern is matched 
        // check if the first year is 1 year smaller than last year
        const [firstYear,lastYear] = academicYearValue.split('-')
        // only if 1 year smaller
        if(firstYear == (lastYear-1)){
            academicYear.classList.remove('no-match')
            flag2 = true
        }
    }else{
        academicYear.classList.add('no-match')
        flag2 = false
    }

    // check if both flags are true
    checkButton()
}

function checkButton() {
    // if both input field credentials are satisfied
    if(flag1 && flag2){
        // button is enable
        btn.removeAttribute('disabled')
    }else{
        // if not satisfied, button still disabled
        btn.setAttribute('disabled',true)
    }
}