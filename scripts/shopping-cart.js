// Shi Qi Zhou - 40163947

var isResetCart = false;

window.onbeforeunload = function() {
    if (!isResetCart) {
        storeLocalStorage;
    }
}
window.onload = function() {
    getLocalStorage();
    cartTotalQty();
    updateTotalPrice();
};

function clearLocalStorage() {
    localStorage.clear();
    location.reload();
    isResetCart = true;
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
}

function getLocalStorage() {
    var table = document.getElementById('itemtable');
    // var dataSaved = localStorage.getItem("persistingVars");
    // if (dataSaved == null) {
    //     if (table.rows.length == 1) {
    //         table.rows[0].remove();
    //         table.insertRow().insertCell()
    //         table.rows[0].cells[0].innerText = "Your cart is empty"
    //     }
    //     return;
    // }

    // var productToRemove = []
    // dataSaved = JSON.parse(dataSaved)
    // for (var i = 1; i < table.rows.length; i++) {
    //     var itemName = table.rows[i].cells[0].innerText
    //     var searchItemResult = dataSaved.find(function(arrElement) {
    //         return arrElement.name === itemName
    //     })

    //     if (searchItemResult == undefined) {
    //         productToRemove.push(table.rows[i])
    //     } else {
    //         table.rows[i].cells[2].innerText = searchItemResult.quantity
    //     }
    // }
    // productToRemove.forEach(function(arrElement) {
    //     arrElement.remove()
    // })

    if (table.rows.length == 1) {
        table.rows[0].remove();
        table.insertRow().insertCell()
        table.rows[0].cells[0].innerText = "Your cart is empty"
    }
}

function extractProductFromHtml(tr, index) {
    var prodname = tr.children[0].innerText
    var quantity = tr.children[2].innerText
    return { rowid: index, name: prodname, quantity: quantity };
}

function changeQty(e, action) {
    let currentCell = e.offsetParent;
    var currentRow = currentCell.parentNode;
    let targetCellIndex = currentCell.cellIndex - 2; // qty col index
    let targetRowIndex = currentRow.rowIndex;

    var table = document.getElementById('itemtable');
    var y = table.rows[targetRowIndex].cells[targetCellIndex];
    var beforeqty = y.innerHTML;
    var afterqty = beforeqty;
    if (action === "delete") {
        afterqty = 0;
    }
    if (action === "minus") {
        afterqty = parseInt(beforeqty) - 1; //Minus 1
    }
    if (action === "plus") {
        afterqty = parseInt(beforeqty) + 1; //Plus 1
    }
    //Checks if qty <=0
    if (action === "delete" || action === "minus" ) {
        if (afterqty <= 0) {
            table.deleteRow(targetRowIndex)
        }
        if (table.rows.length == 1) {
            table.deleteRow(0)
            table.insertRow().insertCell()
            table.rows[0].cells[0].innerText = "Your cart is empty"
        }
    }
    y.innerHTML = afterqty;

    adjustOrderSummary();
    updateTotalPrice()
    storeLocalStorage();
    cartTotalQty();
}

// +/-, DELETE buttons
function handleOnClickQtyChange(e, action, productId) {
    changeQty(e, action);
    var xmlhttp = new XMLHttpRequest();
    //`shopping-cart.php?pid=${productId}` === "shopping-cart.php?pid=" + productId;
    xmlhttp.open("GET", `shopping-cart.php?productId=${productId}&action=${action}`, true);
    xmlhttp.send();
}

// Reset Cart button
function handleOnClickReset() {
    var r = confirm("Do you wish to empty your shopping cart?");
    if (!r) {
        return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            clearLocalStorage();
        }
      };
    xmlhttp.open("GET", `shopping-cart.php?action=reset`, true);
    xmlhttp.send();
}

// Total qty shown next to "Your Items"
function cartTotalQty() {
    var table = document.getElementById('itemtable');
    var totalqty = 0;

    for (var i = 1; i < table.rows.length; i++) {
        var qty = parseInt(table.rows[i].cells[2].innerText);
        if (!isNaN(qty)) {
            totalqty += qty
        }
    }
    document.getElementById("cart-totalcount").innerText = "Your Items (" + totalqty + ")";
    adjustOrderSummary();
}

// Continue Shopping button
function backToPrevPage() {
    window.history.go(-1)
}