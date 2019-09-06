(function() {
		var widgetRollButton = document.getElementById('mh-rpg-roll-button-widget');
	if (widgetRollButton !== null)
		widgetRollButton.addEventListener('click', widgetRollDice);

	function widgetRollDice() {
		document.getElementById('mh-rpg-dice-roll-widget').innerHTML = "";
		// clearRolls('mh-rpg-dice-roll', 'mh-rpg-all-rolls');
		var numberOfDice = document.getElementsByClassName('dice-widget');
		var valueOfDice = [];
		var posTableau = -1; // Empty array is at position -1
		var modifier = document.getElementById('mh-rpg-modifier-widget').value;
		for (let i = 0; i < numberOfDice.length; i++) {			
			
			var valueDice = parseInt(document.getElementById('spot' + [i]).value);			
			var baseRand = parseInt(document.getElementById('spot' + [i]).name);
			/*
			 * We push the name of the dice in Type of dice
			 */
			if (valueDice > 0) {
				valueOfDice.push({'typeOfDice':valueDice + "d" + baseRand + " : ", 'valueOfRoll': []});
				posTableau++;
			}			
			/**
			 * 
			 */
			if (valueDice > 0) {
				for (let j = 0; j < valueDice; j++) {
					/**
					 * We generate a random number between 1 and the value of the Dice (2 to 100)
					 */
					var valueRand = Math.floor(Math.random() * baseRand + 1);
					valueOfDice[posTableau].valueOfRoll.push(valueRand);
				}
			}		
		}
		/**
		 * Here we add the result of what's inside the table valueOfDice
		 */
		var sumOfDie;
		var sumOfDice = 0;
		for (let k = 0; k < valueOfDice.length; k++) {
			
			document.getElementById('mh-rpg-dice-roll-widget').innerHTML += valueOfDice[k]['typeOfDice'] + "[ ";
			for (let l = 0; l < valueOfDice[k].valueOfRoll.length; l++) {			
				var glue = " | ";
				if(l === valueOfDice[k].valueOfRoll.length - 1){
					glue = " ";
				}
				document.getElementById('mh-rpg-dice-roll-widget').innerHTML += valueOfDice[k].valueOfRoll[l] + glue;
			}
			document.getElementById('mh-rpg-dice-roll-widget').innerHTML += "] = ";
			sumOfDie = valueOfDice[k].valueOfRoll.reduce((a, b) => a + b);
			document.getElementById('mh-rpg-dice-roll-widget').innerHTML += sumOfDie + '<br/>';
			sumOfDice = Number(sumOfDice) + Number(sumOfDie);
		}
		var totalNoModif = Number(sumOfDice);
		document.getElementById('resultNoModif').innerHTML = totalNoModif;
		var total = Number(sumOfDice) + Number(modifier);
		document.getElementById('resultDice').innerHTML = total;
		document.getElementById('modifier-widget').innerHTML = modifier;

	}
})();