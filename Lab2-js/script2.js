
function findLargestWord(inputString) {
    const words = inputString.split(/\s+/);
  

    let largestWord = "";
    let maxLength = 0;
  
    
    for (const word of words) {
      if (word.length > maxLength) {
        largestWord = word;
        maxLength = word.length;
      }
    }
  
    return largestWord;
  }
  
  // Example usage
  const input = "this is a javascript string demo";
  document.write(`The largest word is: ${findLargestWord(input)}`);