
const semester = document.querySelector('#semester');
const course   = document.querySelector('#course')

document.addEventListener('DOMContentLoaded',()=>{
    populator()
})

function populator() {
    const matchingCourses = courses.filter(item => item['semester_id'] == semester.value)
    
    course.innerHTML = ''

    matchingCourses.forEach((item) => {
        let option = document.createElement('option')
        option.value = item["course_id"]
        option.innerHTML = item["course_id"]
        course.appendChild(option)
    });
}