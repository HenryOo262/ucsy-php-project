
const instructorName = document.querySelector('#instructorName')

document.addEventListener('DOMContentLoaded',()=>{
    instpopulator()
})

function instpopulator() {
    const matchingInstructor = instructors.filter(item => item['course_id'] == course.value && item['semester_id'] == semester.value)
    
    instructorName.innerHTML = ''

    matchingInstructor.forEach((item) => {
        let option = document.createElement('option')
        option.value = item['instructor_name']
        option.innerHTML = item['instructor_name']
        instructorName.add(option)
    });
}
