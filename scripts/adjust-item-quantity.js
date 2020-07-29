

function adjustOrderSummary(name, priceUnit, newNumber) {
    if(newNumber>0){
        document.getElementById(name).style.display= "block";
        document.getElementById(name).getElementById(price).innerHTML=(newNumber * priceUnit).toFixed(2) + " $";
        document.getElementById(name).getElementById(number).innerHTML="x " + newNumber;
    }
    if(newNumber==0){
        document.getElementById(name).innerHTML.style.display= "none";
    }
}



