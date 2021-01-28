/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * asyncronous functions are called immediately, but their callback functions
 * are only called once the computing stack is free again: i.e. when all
 * the other execution has finished.
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
aux1.innerHTML = "ROma";
var aux2 = document.getElementById("aux2");
var aux3 = document.getElementById("aux3");

var doc = document.getElementById('region');
doc.innerHTML = "hey ho lets go!";

var dat = ["senyor"];






//creant axis i parametres pel gràfic
var svg = d3.select("svg"),
    margin = 200,
    width = svg.attr("width") - margin,
    height = svg.attr("height") - margin;


var xScale = d3.scaleBand().range ([0, width]).padding(0.4),
    yScale = d3.scaleLinear().range ([height, 0]);

var g = svg.append("g")
           .attr("transform", "translate(" + 100 + "," + 100 + ")");

var datan = [];
d3.csv("data/prova2.csv").then(function(data) {
    datan= data;
//fent de fet el gràfic de barres
        xScale.domain(data.map(function(d) { return d.year; }));
        yScale.domain([0, d3.max(data, function(d) { return d.value; })]);

        g.append("g")
         .attr("transform", "translate(0," + height + ")")
         .call(d3.axisBottom(xScale));

        g.append("g")
         .call(d3.axisLeft(yScale).tickFormat(function(d){
             return "$" + d;
         }).ticks(10))
         .append("text")
         .attr("y", 6)
         .attr("dy", "0.71em")
         .attr("text-anchor", "end")
         .text("value");
 
 g.selectAll(".bar")
         .data(data)
         .enter().append("rect")
         .attr("class", "bar")
         .attr("x", function(d) { return xScale(d.year); })
         .attr("y", function(d) { return yScale(d.value); })
         .attr("width", xScale.bandwidth())
         .attr("height", function(d) { return height - yScale(d.value); });

         g.selectAll(".bar").style("fill", "green");
});


console.log(datan);










function dibu(para="aula") {
    console.log(para);   
}

var datil = d3.csv("data/cities.csv").then(function(data) {
  console.log("initial ");
  console.log(data);
  dat = data;
  aux2.innerHTML = dat.length;
  dibu(data[0]);
  return data;
});


console.log("outside ");
console.log(datil);

//d3.json("data/clients1.json", function (d) { 
//            console.log(d); 
//            console.log("hi");
//        }); 

aux3.innerHTML += " " + dat.length;



//var aux1 = document.getElementById("aux1");
//aux1.innerHTML ="Nao";
//var datil = [];
d3.csv("data/dset.csv", function(data){
    aux1.innerHTML += " " + data.length;
    console.log(data);
    console.log(data[0]);
    datil = data;
});



//for(var i=0; i < 2; i++) {
//        console.log("ho");        
//    } 
