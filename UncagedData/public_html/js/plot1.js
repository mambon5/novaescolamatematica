/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



//amb node:
//const d3 = require("d3");

var paragraphs = document.getElementsByTagName("p");
for (var i = 0; i < paragraphs.length; i++) {
  var paragraph = paragraphs.item(i);
  paragraph.style.setProperty("color", "blue", null);
}

d3.selectAll("p").style("color", "yellow");


// Update…
var p = d3.select("body")
  .selectAll("p")
  .data([4, 8, 15, 16, 23, 42])
    .text(function(d) { return d; });

// Enter…
p.enter(4).append("p")
    .text(function(d) { return d; });

// Exit…
p.exit().remove(2);
    
var aux1 = document.getElementById("aux1");
var aux2 = document.getElementById("aux2");
var aux3 = document.getElementById("aux3");

var doc = document.getElementById('region');
doc.innerHTML = "hey ho lets go!";
var dat = [];


d3.csv("data/cities.csv").then(function(data) {
  console.log(data[1]);
  dat = data;
  aux2.innerHTML = dat.length;
});
uax

var dati = d3.csv("data/cities.csv", function(d) {
  return {
    city : d.city,
    state : d.state,
    population : +d.population,
    land_area : +d["land area"]
  };
}).then(function(data) {
  console.log(data[1]);
});

d3.json("data/clients1.json", function (d) { 
            console.log(d); 
            console.log("hi");
        }); 

aux2.innerHTML += dati.length;

//var aux1 = document.getElementById("aux1");
//aux1.innerHTML ="Nao";
//d3.csv("data/dset.csv", function(data){
//    aux1.innerHTML += " " + clothing.length;
//    console.log(data);
//    console.log(data[0]);
//});

//for(var i=0; i < 2; i++) {
//        console.log("ho");        
//    } 