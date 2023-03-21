

function show(){

    let a = document.getElementById("madicine-input");
    a.style.display = "block";

    console.log("hello");

    document.getElementsByClassName("add-item").style.display="none";
}




// Get references to the HTML elements
var dateElement = document.getElementById("date");
var timeElement = document.getElementById("time");

// Update the elements every second
setInterval(function() {
  // Get the current date and time
  var now = new Date();

  // Update the date element
  dateElement.textContent = "Date: "+now.toLocaleDateString();

  // Update the time element
  timeElement.textContent = "Time: " +now.toLocaleTimeString();
}, 1000); // Update every 1000 milliseconds (i.e. every second)






// code to put form info to the invoice

var inputName = document.getElementById("name");
var inputCantact = document.getElementById("cantact");

var payName = document.getElementById("pay-name");
var payCantact = document.getElementById("pay-cantact");

  inputName.addEventListener("input", function(){

    payName.textContent = ("Payer Name: "+ inputName.value);

  })

  inputCantact.addEventListener("input", function(){

    payCantact.textContent = ("Cantact: "+ inputCantact.value);

  })


// add medicine into table

var counter = 0;
var sum = 0;
var gst = 0;
var total = document.getElementById("total");

function showmed(){

  counter++;






  var name = document.getElementById("name4").value;
  var price = document.getElementById("price4").value;

  if (name!="" && price!="") {
  sum = sum + parseFloat(price);







  var table = document.querySelector("#my-table tbody");

  var newRow = table.insertRow();

  // Insert cells into the new row
  var nameCell = newRow.insertCell();
  var ageCell = newRow.insertCell();
  var genderCell = newRow.insertCell();

  // Set the cell contents
  nameCell.textContent = counter;
  ageCell.textContent = name;
  genderCell.textContent = price;






  
  let sum2 = sum;
  total.textContent = "Total: "+ calculateGST(sum,gst).total;

  document.getElementById("name4").value = "";
  document.getElementById("price4").value = "";

}

}






// 
// Get a reference to the button element
var button = document.getElementById("btn");
var button2 = document.getElementById("GSTbtn");
      
// Add a click event listener to the button
button.addEventListener("click", function(event) {
  // Prevent the default action from occurring
  event.preventDefault();
});

button2.addEventListener("click", function(event2) {
  // Prevent the default action from occurring
  event2.preventDefault();
});
// 



function calculateGST(price, rate) {
  let gst = price * rate / 100;
  let total = price + gst;
  return {
    total
  };
}


function addGST(){

  gst = document.getElementById("GST").value;
  total.textContent = "Total: "+ calculateGST(sum,gst).total;
  document.getElementById("showgst").textContent = "GST: " + gst + "%";
  document.getElementById("GST").value = "";
}