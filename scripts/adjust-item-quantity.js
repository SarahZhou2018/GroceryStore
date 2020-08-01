document.getElementById("icon").addEventListener("click", adjustOrderSummary());


function adjustOrderSummary() {
    var items = document.getElementById("itemtable");
    var order = document.getElementById("mytable");
    for(var i=1;i<items.getElementsByTagName("tr").length;i++){
        order.deleteRow(i);
    }
    for(var j=1;j<items.getElementsByTagName("tr").length;j++){
        order.insertRow(j).insertCell(0).innerHTML = items.getElementsByTagName("p").innerHTML; // insert the name ex: Baguette
        order.insertRow(j).insertCell(1).innerHTML = ("x "+items.rows[j].cells[2].innerHTML); // insert units ex: x 3
        order.insertRow(j).insertCell(2).innerHTML = (items.rows[j].cells[1].innerHTML.substring(0,4)*items.rows[j].cells[2].innerHTML)+" $"; // insert price ex: 5.99 $
        
    }

}



