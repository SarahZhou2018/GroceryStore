// Shi Qi Zhou - 40163947
// Quantity buttons that preserve quantity through refresh

window.onbeforeunload = function() {
    var table = document.getElementById('itemtable');
    var persistingVars = []
    for (var r = 0; r < table.rows.length; r++) {
        localStorage.setItem(persistingVars.push(i), parseInt(table.rows[i].cells[2]).innerHTML);
    }

}
window.onload = function() {
    var table = document.getElementById('itemtable');
    var persistingVars = []
    for (var r = 0; r < table.rows.length; r++) {
        if (localStorage.getItem(persistingVars[r]) !== null) {
            table.rows[i].cells[2].innerHTML = localStorage.getItem(persistingVars[r]);
        }

    }
}

function qtyminus(elm) {
    //We are interested in:
    //Quantity column index  = currentCell index -1 
    //Row index = currentRow index
    let currentCell = elm.offsetParent;
    var currentRow = currentCell.parentNode;
    let targetCellIndex = currentCell.cellIndex - 1;
    let targetRowIndex = currentRow.rowIndex;

    var table = document.getElementById('itemtable');
    var y = table.rows[targetRowIndex].cells[targetCellIndex];
    var beforeqty = y.innerHTML;

    //Minus 1
    var afterqty = parseInt(beforeqty) - 1;

    // Checks
    if (afterqty <= 0) {
        table.deleteRow(targetRowIndex)
    }
    if (table.rows.length == 1) {
        table.deleteRow(0)
    }
    y.innerHTML = afterqty;
    // alert(afterqty);

    cartTotalQty();
}

function qtyplus(elm) {

    //We are interested in:
    //Quantity column index  = currentCell index -1 
    //Row index = currentRow index
    let currentCell = elm.offsetParent;
    var currentRow = currentCell.parentNode;
    let targetCellIndex = currentCell.cellIndex - 1;
    let targetRowIndex = currentRow.rowIndex;

    var table = document.getElementById('itemtable');
    var y = table.rows[targetRowIndex].cells[targetCellIndex];
    // var y = table.rows[targetRowIndex]
    var beforeqty = y.innerHTML;

    //Plus 1
    var afterqty = parseInt(beforeqty) + 1;

    y.innerHTML = afterqty;
    // alert(afterqty);

    cartTotalQty();

}

function cartTotalQty() {
    var table = document.getElementsByClassName('itemtable');
    var num = 0;
    var qtyPerProduct = []

    //Get values of the qty input field
    for (var i = 0; i < table.rows.length; i++) {
        //Ignores the row where there are no items
        if (table.rows[i].cells[2].innerHTML) {
            var qty = parseInt(table.rows[i].cells[2].innerHTML);

            if (qty) {
                qtyPerProduct.push(qty)
            }
        }
    }
    // Sum total Qty
    for (var r = 0; r < qtyPerProduct.length; r++) {
        num += qtyPerProduct[r]
    }

    document.getElementById("cart-totalcount").innerHTML = num;

}