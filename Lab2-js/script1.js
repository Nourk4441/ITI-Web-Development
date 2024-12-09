// Prompt the user for their input

// Function to validate name (letters only)
function validateName(name) {
    return /^[a-zA-Z]+$/.test(name);
  }
  
  // Function to validate phone number (8 digits)
  function validatePhoneNumber(phoneNumber) {
    return /^\d{8}$/.test(phoneNumber);
  }
  
  // Function to validate mobile number (11 digits, starts with 010, 011, or 012)
  function validateMobileNumber(mobileNumber) {
    return /^(010|011|012)\d{8}$/.test(mobileNumber);
  }
  
  // Function to validate email
  function validateEmail(email) {
    return /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email);
  }
  
  // Input from user
  const name = prompt("Enter your name: ");
  const phoneNumber = prompt("Enter your phone number (8 digits): ");
  const mobileNumber = prompt(
    "Enter your mobile number (11 digits, starts with 010, 011, 012): "
  );
  const email = prompt("Enter your email: ");
  
  // Validate inputs
  if (!validateName(name)) {
    alert("Invalid name. Please use letters only.");
    throw new Error("Validation failed");
  }
  if (!validatePhoneNumber(phoneNumber)) {
    alert("Invalid phone number. It should be 8 digits.");
    throw new Error("Validation failed");
  }
  if (!validateMobileNumber(mobileNumber)) {
    alert("Invalid mobile number. It should be 11 digits and start with 010, 011, or 012.");
    throw new Error("Validation failed");
  }
  if (!validateEmail(email)) {
    alert("Invalid email format.");
    throw new Error("Validation failed");
  }
  
  // Prompt for color choice
  const colorChoice = prompt(
    "Choose a color for your message (red, green, blue): "
  ).toLowerCase();
  
  let chosenColor;
  
  switch (colorChoice) {
    case "red":
      chosenColor = "red";
      break;
    case "green":
      chosenColor = "green";
      break;
    case "blue":
      chosenColor = "blue";
      break;
    default:
      alert("Invalid color choice. Defaulting to black.");
      chosenColor = "black";
  }
  
  // Display message
  const currentDate = new Date();
  const day = currentDate.getDate();
  const month = currentDate.getMonth() + 1;
  const year = currentDate.getFullYear();
  
  document.write ( `
    <div style="color: ${chosenColor}; font-family: Arial, sans-serif;">
      <p>Welcome dear guest ${name}</p>
      <p>Your telephone number is ${phoneNumber}</p>
      <p>Your mobile number is ${mobileNumber}</p>
      <p>Your email address is ${email}</p>
      <p>Today is ${day}</p>
      <p>We are in month ${month}</p>
      <p>Year is ${year}</p>
    </div>
  `);