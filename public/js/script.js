function myFunction() {
    var x = document.getElementById("fname");
     x.value = x.value.toLowerCase().replace(/b[a-z]/g, function(letter) {
    return letter.toUpperCase();
  });
}


 