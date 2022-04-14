var names = ["Ben", "Joel", "Judy", "Anne"];
var scores = [88, 98, 77, 88];

var $ = function (id) { return document.getElementById(id); };



window.onload = function () {
	$("name").focus();
	$("add").onclick = addScore;
	$("display_results").onclick = displayResults;
	$("display_scores").onclick = displayScores;
};

var displayResults = function(){

	var average = 0;
	var maximum = 0;
	var maximum_index;

    for(var i = 0; i < scores.length; i++) {
	   average = (average*(i)+Number(scores[i]))/(i+1);
	   if(maximum < scores[i]){
		   maximum = scores[i];
		   maximum_index = i;
	   }
    }

	$("results").innerHTML = "<h2>Results</h2>";
	$("results").innerHTML += "<p>Avarage Score = " + average + "</p>";
	$("results").innerHTML += "<p>High Score = " + names[maximum_index] +" with a score of "+ maximum + "</p>";
}


var displayScores = function(){
    $("scores_table").innerHTML = "<h2>Scores</h2>";
	$("scores_table").innerHTML += "<tr><th>Name</th><th>Scores</th></tr>";

	for(var i = 0; i < names.length; i++){
       $("scores_table").innerHTML += "<tr><td>" + names[i] +"</td>" + "<td>"+ scores[i] + "</td></tr>";
	}
}

var addScore = function(){

	if($("name").value != "" &&  $("score").value >0 && $("score").value <= 100){
		names.push($("name").value);
		scores.push($("score").value);

		$("name").value = "";
		$("score").value = "";

		displayResults();
		displayScores();
	}
    else{
		alert("You must enter a name and a valid score");
	}
	$("name").focus();

}

