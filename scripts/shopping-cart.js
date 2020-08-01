// Shi Qi Zhou - 40163947
// Quantity buttons that preserve quantity through refresh

window.onbeforeunload = storeLocalStorage;
window.onload = getLocalStorage;

function clearLocalStorage() {
    localStorage.clear();
    location.reload();
}

function storeLocalStorage() {
    var table = document.getElementById('itemtable');
    var htmlcollection = table.getElementsByTagName("tr")
    var productsArr = Array.from(htmlcollection)
    productsArr.shift() // remove 1st row containing column headers

    var newArr = productsArr.map(extractProductFromHtml)
    localStorage.setItem("persistingVars", JSON.stringify(newArr))
    console.log(htmlcollection);
    console.log(newArr);

    // alert("window.onbeforeunload, there");
}

function getLocalStorage() {
    var dataSaved = localStorage.getItem("persistingVars");
    if (dataSaved == null) {
        return;
    }

    var table = document.getElementById('itemtable');
    var productToRemove = []
    dataSaved = JSON.parse(dataSaved)
    for (var i = 1; i < table.rows.length; i++) {
        var itemName = table.rows[i].cells[0].innerText
        var searchItemResult = dataSaved.find(function(arrElement) {
            return arrElement.name === itemName
        })

        if (searchItemResult == undefined) {
            // table.rows[i].remove();
            productToRemove.push(table.rows[i])
        } else {
            table.rows[i].cells[2].innerText = searchItemResult.quantity
        }
    }
    productToRemove.forEach(function(arrElement) {
        arrElement.remove()
    })

    if (table.rows.length == 1) {
        table.rows[0].remove();
        table.insertRow().insertCell()
        table.rows[0].cells[0].innerText = "Your cart is empty"

    }

    cartTotalQty();
    // alert("window.onload, here :)");
}

function extractProductFromHtml(tr, index) {
    var prodname = tr.children[0].innerText
    var quantity = tr.children[2].innerText
    return { rowid: index, name: prodname, quantity: quantity };
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
        table.insertRow().insertCell()
        table.rows[0].cells[0].innerText = "Your cart is empty"
    }
    y.innerHTML = afterqty;
    // alert(afterqty);

    storeLocalStorage();
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
    var beforeqty = y.innerHTML;

    //Plus 1
    var afterqty = parseInt(beforeqty) + 1;
    y.innerHTML = afterqty;

    storeLocalStorage();
    cartTotalQty();
}

function cartTotalQty() {
    var table = document.getElementById('itemtable');
    var totalqty = 0;

    // Get values of the qty input field
    for (var i = 1; i < table.rows.length; i++) {
        //Ignores the row where there are no items
        // if (table.rows[i].cells[2].innerHTML) {
        var qty = parseInt(table.rows[i].cells[2].innerText);
        if (isNaN(qty)) {
            totalqty += qty
        }
    }

    // Using Local Storage
    // var dataSaved = localStorage.getItem("persistingVars");
    // if (dataSaved == null) {
    //     return;
    // }
    // var table = document.getElementsByClassName('itemtable');
    // var totalqty = 0;
    // dataSaved = JSON.parse(dataSaved)
    // for (var i = 0; i < dataSaved.length; i++) {
    //     totalqty += parseInt(dataSaved.quantity)
    // }

    //var t = document.getElementById("cart-totalcount").innerHTML;
    document.getElementById("cart-totalcount").innerText = "Your Items (" + totalqty + ")";
}

// if (window.addEventListener) {
//     window.addEventListener('load', function() {
//         alert('addEventListener')
//     }, false);
// } else if (window.attachEvent) { // IE < 9
//     window.attachEvent('onload', function() {
//         alert('attachEvent')
//     });
// }