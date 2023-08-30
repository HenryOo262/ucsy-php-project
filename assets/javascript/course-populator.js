
// ALL BOXES IN THIS SCRIPT REFERS TO "COURSE SELECT BOXES"

const semester = document.querySelector('#semester');

// array of boxes
const course = [];

// Index of currently visible box
var currentlyVisible = 0;

// semester one's box is in index 0
// semester nine's box is in index 8, etc
for(i=0; i<=8; i++) {
    course[i] = document.querySelector(`#course${i+1}`);
    // all boxes are hidden except semester one's box when page is 
    // loaded
    if(i!=0){
        course[i].classList.add('hide');
    }
}

function populator() {
    // populate the boxes based on selected semester
    let selected = semester.value;

    // hide the old visible box
    course[currentlyVisible].classList.add('hide');

    // swap old with new
    currentlyVisible = selected-1;
    
    // make the new box visible
    course[currentlyVisible].classList.remove('hide');
}