window.onload = function(){
    adjustOrderSummary();
}
document.getElementById("iconButton").addEventListener("click", adjustOrderSummary());

var items = document.getElementById("itemtable");
var order = document.getElementById("mytable");

function adjustOrderSummary() {
    for(var i=1;i<items.rows.length;i++){
        order.deleteRow(i);
    }
    for(var j=1;j<items.rows.length;j++){
        var row = order.insertRow(j);
        row.insertCell(0).innerHTML = items.getElementsByTagName("p").innerHTML; // insert the name ex: Baguette
        row.insertCell(1).innerHTML = ("x "+items.rows[j].cells[2].innerHTML); // insert units ex: x 3
        var price = items.rows[j].cells[1].innerHTML.substring(0,4);
        var units = items.rows[j].cells[2].innerHTML;
        row.insertCell(2).innerHTML = `${price * units} $`; // insert price ex: 5.99 $

    }
}



