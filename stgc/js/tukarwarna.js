var warnaasal = "black";
function changeColor() {
    if (warnaasal == "black") {
        var elms = document.querySelectorAll("[id='tukarwarna']");

        for (var i = 0; i < elms.length; i++)
            elms[i].style.color = 'white'; // Warna pertama
        warnaasal = "white"; 
    } else {
        var elms = document.querySelectorAll("[id='tukarwarna']");

        for (var i = 0; i < elms.length; i++)
            elms[i].style.color = 'black'; // Warna kedua
        warnaasal = "black"; 
    }
}