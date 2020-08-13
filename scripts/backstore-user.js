

function validatePassword(password){
    if(password.value!=document.getElementById("password").value){
        password.setCustomValidity('Password must match.');
    }
    else{
        password.setCustomValidity('');
    }
}


function enableBtns(){
    document.getElementById("editButton").disabled=false;
    document.getElementById("deleteButton").disabled=false;
}