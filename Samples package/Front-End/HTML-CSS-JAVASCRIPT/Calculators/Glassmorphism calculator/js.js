function getHistory() {
	return document.querySelector('.upper-value').innerHTML;
}
function printHistory(num) {
	document.querySelector('.upper-value').innderHTML = num;
}
function getOutput() {
	return document.querySelector('.lower-value').innerHTML;
}
function printOutput() {
	if (num == "") {
		document.querySelector('.lower-value').innerHTML = num;
	}
	else {
		document.querySelector('.lower-value').innerHTML = getFortmattedNumber(num);
	}
}
function getFormattedNumber(num) {
	if (num == "") {
		return "";
	}
	let n = Number(num);
	let value = n.toLocaleString("en"); //returns a string with a representation of number
	return value;
}

function reverseNumberFormat(num) {
	return Number(num.replace(/,/g, '')); //Give comma seperated value
}

let operator = document.getElementsByClassName("operator");
for (let i = 0; i < operator.length; i++) {
	operator[i].addEventListener('Click', function () {
		if (this.id == "Clear") {
			//this.id gives the current html element id
			printHistory("");
			printOutput("");
		}
		else if (this.id == "backspace") {
			let output = reverseNumberFormat(getOutput()).toString();
			if (output) {
				output = output.substr(0, output.length - 1);
				printOutput(output);
			}
			console.log(getOutput());
		}
		else {
			let output = getOutput();
			let history = getHistory();
			if (output == "" && history != "") {
				if (isNaN(history[history.length - 1])) {
					history = history.substr(0, history.length - 1);
				}
			}
		}
	});
}