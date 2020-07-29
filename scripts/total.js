

function updateTotalPrice() {
  var table = document.getElementById('mytable');

  var pricePerProduct = []

  //Get values of the last column, price per product
  for (var i = 0; i < table.rows.length; i++) {
    //Ignores the row where there are no items
    if (table.rows[i].cells[0].innerHTML) {
      var lastCellValue = table.rows[i].cells[2].innerHTML;

      // Get numbers out of the string
      var numberOfItemPerThisProduct = parseFloat(lastCellValue.match(/[+-]?\d+(?:\.\d+)?/g));
      if (numberOfItemPerThisProduct) {
        pricePerProduct.push(numberOfItemPerThisProduct)
      } else {
        pricePerProduct.push(1)
      }
    }
  }

  var subTotal = 0.0
  var deliveryFee = 0.0
  var GST = 0.0
  var QST = 0.0
  var total = 0.0

  // Sub Total is calculated
  for(var r = 0; r < pricePerProduct.length; r++) {
    subTotal += pricePerProduct[r]
  }

  // Delivery Fee is updated depending on the subtotal
  if (subTotal < 30.0) {
    deliveryFee = 12.00
  }

  // Calculate GST Tax
  GST = Math.round((subTotal * 0.05) *100)/100;

  // Calculate QST Tax
  QST = Math.round((subTotal * 0.09975) *100)/100;

  // Calculate total
  total = Math.round((subTotal + deliveryFee + GST + QST) *100)/100;

  document.getElementsByClassName("subtotal")[0].innerHTML = subTotal + " $"
  document.getElementsByClassName("deliveryFee")[0].innerHTML = deliveryFee + " $"
  document.getElementsByClassName("GST")[0].innerHTML = GST + " $"
  document.getElementsByClassName("QST")[0].innerHTML = QST + " $"
  document.getElementsByClassName("grandTotal")[0].innerHTML = total + " $"


  // console.log('Sub Total: ' + subTotal);
  // console.log('Delivery Fee: ' + deliveryFee);
  // console.log('GST: ' + GST);
  // console.log('QST: ' + QST);
  // console.log('Total: ' + total);

}
