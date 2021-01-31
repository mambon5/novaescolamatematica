function handleMouseOver(d, i) {  // Add interactivity

            // Use D3 to select element, change color and size
            d3.select(this)
            .attr("r", 10)
            .attr("fill", "purple");
           
           svg
                   .append("text")         // append text  
                   .attr("class", "mark")
    .attr("x", xScale(i.year) + 60 )           // set x position of left side of text
    .attr("y", yScale(i.value) +80 )          // set y position of bottom of text
    .text(i.year + ", $" + i.value);          // define the text to display

aux1.innerHTML = d.x + ", " +d.y + " scaled: " + xScale(d.x) + ", " +
        yScale(d.y);
            // Specify where to put label of text
           
          }

      function handleMouseOut(d, i) {
            // Use D3 to select element, change color back to normal
             d3.select(this)
            .attr("r", 5)
            .attr("fill", "black");
            
            svg.selectAll(".mark")
                    .text("");

            // Select text by id and then remove
          }
