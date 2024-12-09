
const numbers = [];
for (let i = 0; i < 5; i++) {
  const userInput = parseInt(prompt(`Enter number ${i + 1}:`), 10);
  if (isNaN(userInput)) {
    alert("Please enter a valid number.");
    i--; // Repeat the iteration for valid input
  } else {
    numbers.push(userInput);
  }
}

// Display the entered values
const originalValues = numbers.join(", ");

// Sort the array in ascending order
const ascendingOrder = [...numbers].sort((a, b) => a - b);

// Sort the array in descending order
const descendingOrder = [...numbers].sort((a, b) => b - a);

// Display the results
document.write( `
  <h2>Sorting</h2>
  <p>You've entered the values of ${originalValues}</p>
  <p>Your values after being sorted descending: ${descendingOrder.join(", ")}</p>
  <p>Your values after being sorted ascending: ${ascendingOrder.join(", ")}</p>
`);
