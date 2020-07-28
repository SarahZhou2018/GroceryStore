

function deleteUser(){
    var rows = document.getElementsByName("selectedUser");
    
    for (i = 0; i < rows.length; i++) {
        if(rows[i].checked){
            rows[i].parentElement.parentElement.parentElement.style.display="none"
        }
    }
    
}