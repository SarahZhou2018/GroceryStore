function adjustOrderSummary() {
    var items = document.getElementById("table1").getElementsByTagName("table")[0];
    var order = document.getElementById("table2").getElementsByTagName("table")[0];
    var nbitems = items.getElementsByTagName("tr").length;
    for(var i=0;i<nbitems;i++){
        if(order.rows[i]!=null){
            order.deleteRow(i);   
        }
    }
    if(order.rows[length]!=null){
        order.deleteRow(length);
    }
    for(var j=0;j<nbitems-1;j++){
        var row = order.insertRow(j);
        row.insertCell(0).innerHTML = items.rows[j+1].cells[0].getElementsByTagName("p")[0].innerHTML; // insert the name ex: Baguette
        row.insertCell(1).innerHTML = ("x "+items.rows[j+1].cells[2].innerHTML); // insert units ex: x 3
        var price = items.rows[j+1].cells[1].innerHTML.substring(0,4);
        var units = items.rows[j+1].cells[2].innerHTML;
        row.insertCell(2).innerHTML = `${(price * units).toFixed(2)} $`; // insert price ex: 5.99 
        order.rows[j].cells[1].style.textAlign='right';
        order.rows[j].cells[2].style.textAlign='right';
    }
}