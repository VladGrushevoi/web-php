function startSearch(str){
    const xhttp = new XMLHttpRequest();
    console.log(str);
    xhttp.onload = function() {
        console.log(this.responseText);
        document.getElementById("Result").innerHTML = this.responseText;
    }

    xhttp.open('GET', "7-main.php?value=" + str);
    xhttp.send();
}