/* 
 *estic testejant com funcionen les callback functions en javascript
 */


var promResuelta = Promise.resolve(33);

var thenProm = promResuelta.then(function(valor){
    console.log("ésto será invocado cuando acabe el stack " +
             "principal. El valor recibido y devuelto es: " + valor);
    return valor;
});
// imprimimos al momento el valor de thenProm()
console.log(thenProm);

// usando setTimeout podemos posponer la ejecución de una función al momento en el que el stack quede vacío.
setTimeout(function(){
    console.log(thenProm);
});