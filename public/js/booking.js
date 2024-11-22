
const ticketCountInput = document.getElementById('ticketCount');
const ticketCountDisplay = document.getElementById('ticketCountDisplay');
const ticketPriceDisplay = document.getElementById('ticketPriceDisplay');
const totalPriceDisplay = document.getElementById('totalPriceDisplay');
const vatDisplay = document.getElementById('vatDisplay');
const amountPayableDisplay = document.getElementById('amountPayable');
const ticketPriceInput = document.getElementById('ticketpriceinput');
const totalPriceInput = document.getElementById('totalpriceinput');
const vatInput = document.getElementById('vatInput');
const totalAmountInput = document.getElementById('totalamount');
const typeinput = document.getElementById('typeinput');
const type = document.getElementById('type').textContent.trim();
const typeiddisplay = document.getElementById('typeid');
const typeidinput = document.getElementById('typeidinput');


let ticketPrice = parseFloat(ticketPriceDisplay.textContent) || 0; 
let typeid = typeiddisplay.textContent || 0; 
let vatAmount = parseFloat(vatDisplay.textContent.replace('$', '')) || 0;

typeinput.value = type;
ticketPriceInput.value = ticketPrice.toFixed(2);
vatInput.value = vatAmount.toFixed(2);
typeidinput.value = typeid;

ticketCountInput.addEventListener('input', function () {
    const ticketCount = ticketCountInput.value || 1; 
    ticketCountDisplay.textContent = ticketCount;
    updateTotalPrice();
});


function updateTotalPrice() {
    const ticketCount = parseInt(ticketCountInput.value) || 1; 
    const totalPrice = ticketPrice * ticketCount;
    totalPriceDisplay.textContent = totalPrice.toFixed(2); 
    totalPriceInput.value = totalPrice.toFixed(2); 

    updateAmountPayable(totalPrice);
}

function updateAmountPayable(totalPrice) {
    const amountPayable = totalPrice + vatAmount;
    amountPayableDisplay.textContent = `$${amountPayable.toFixed(2)}`;
    totalAmountInput.value = amountPayable.toFixed(2);
}


updateTotalPrice();
