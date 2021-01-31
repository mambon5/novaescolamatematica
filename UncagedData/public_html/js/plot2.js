//variables per escriure text auxiliar o xivatos.
var aux1 = document.getElementById("aux1");
var aux2 = document.getElementById("aux2");
var aux3 = document.getElementById("aux3");


//creant axis i parametres pel gràfic
var svg = d3.select("svg"),
    margin = 200,
    width = svg.attr("width") - margin,
    height = svg.attr("height") - margin;


var xScale = d3.scaleBand().range ([0, width]).padding(0.4),
    yScale = d3.scaleLinear().range ([height, 0]);

var g = svg.append("g")
           .attr("transform", "translate(" + 100 + "," + 100 + ")");

var radius = 4;
var circleAttrs = {
          cx: function(d) { return xScale(d.year); },
          cy: function(d) { return yScale(d.value); },
          r: radius
      };


d3.csv("data/prova2.csv").then(function(data) {
    datan = data;
//fent de fet el scatterplot
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
 
 g.selectAll(".dot")
         .data(data)
         .enter().append("circle")
         .attr("class", "dot")
         .attr("cx", function(d) { return xScale(d.year); })
         .attr("cy", function(d) { return yScale(d.value); })
         .attr("r", 5)
         .on("mouseover", handleMouseOver)
         .on("mouseout", handleMouseOut);
 
// svg.selectAll("circle")
//         .data(data)
//         .enter()
// .enter().append("circle")
//  .attr(circleAttrs)
//        .on("mouseover", handleMouseOver)
//         .on("mouseout", handleMouseOut);
// 
//         g.selectAll(".dot").style("fill", "purple");
});



//console.log("data 2 fora:");
//console.log(data2);
var ar = new Array(3).fill(1);
aux3.innerHTML = "covariance of [1,2,3] and [2,4,6]: " +  covariance([1,2,3],[2,4,6]);
aux2.innerHTML = ((1-2)*(2-4) +(4-4)*(2-2) +(3-2)*(6-4))/2