
// SUBMIT BUTTON CONFIRMATION

function showConfirmation(str) {
    if(str){
        return confirm(str)
    }else{
        return confirm('Are you sure you want to proceed ?')
    }
}