
//  REAL-TIME FORM VALIDATION

const academicYear = document.querySelector('#academicYear')
const classroom    = document.querySelector('#classroom')
const instructorName = document.querySelector('#instructorName')

const btn = document.querySelector('#btn')
document.addEventListener("DOMContentLoaded",checkButton)
// button is disabled as long as no data is in input or there are real-time validation errors

var flag1 = false
var flag2 = false

const patternClassroom = /[A-E]{1}-[0][0][1-5]/
// string should be in form X-yyy

const patternInstructorName = /^(?!Daw|U|\s)(\D)+/i
// ^ indicates "start of the string"
// ^(?!x) indicates "start of the string not followed by x"
// \D+ indicates "one or more non-digits"
// i indicates "the whole pattern is case-insensitive"


// functions

function validateInstructorName(){

    const instructorNameValue = instructorName.value;
    
    if(instructorNameValue.match(patternInstructorName)){
        instructorName.classList.remove('no-match')
        flag1 = true
    }else{
        instructorName.classList.add('no-match')
        flag1 = false
    }

    checkButton()

}

function validateClassroom(){
    
    const classroomValue = classroom.value;
    
    if(classroomValue.match(patternClassroom)){
        classroom.classList.remove('no-match')
        flag2 = true
    }else{
        classroom.classList.add('no-match')
        flag2 = false
    }

    checkButton()

}

function checkButton(){

    if(flag1 && flag2){
        btn.removeAttribute("disabled")
    }else{
        btn.setAttribute("disabled",true)
    }

}