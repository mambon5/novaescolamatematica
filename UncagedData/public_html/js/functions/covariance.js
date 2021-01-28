/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function covariance(X,Y) {
    var n = X.length;
    var m = Y.length;
    if(n!=m){
        return "in covariance(X,Y): error, lengths differ";
    }
    var mx = math.mean(X);
    var my = math.mean(Y);
    mx = new Array(n).fill(mx);
    my = new Array(n).fill(my);
    
    var x = math.subtract(X,mx);
    var y = math.subtract(Y,my);
    
    var cov = math.dot(x,y)/(n-1);
    return cov;    
}