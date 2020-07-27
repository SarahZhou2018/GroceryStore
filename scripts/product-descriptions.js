

function toggleDescription() {
    var el = document.getElementById("long-desc");
    if (el.style.display === "none") {
        el.style.display = "block";
    } 
    else {
        el.style.display = "none";
    }
}

function updateSubtotal(price){
    var quantity = document.getElementById("quantity").value;
    var subtotal=quantity*price;
    document.getElementById("subtotal").innerHTML=subtotal + "$";

}