let cond = false;

while (!cond) {
    let name1 = prompt('Enter your name');
    if (typeof name1 === "string" && name1.trim() !== "" && /^[a-zA-Z]+$/.test(name1)) {
        let birth = parseInt(prompt('Enter birth year'), 10);
        if (!isNaN(birth) && birth < 2010) {
            cond = true;
            let age = 2010 - birth;

            // Writing the output to the document
            document.write('<p>Name: ' + name1 + '</p>');
            document.write('<p>Birth year: ' + birth + '</p>');
            document.write('<p>Age: ' + age + '</p>');
        } else {
            alert('Invalid birth year. Please enter a valid number less than 2010.');
        }
    } else {
        alert('Invalid name. Please enter a valid string containing only letters.');
    }
}
