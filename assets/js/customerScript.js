let key = document.getElementById("key");
let container = document.getElementById("content");


key.addEventListener("keyup", function() {
    
    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            container.innerHTML = xhr.responseText;
        }
    }

    xhr.open('GET', '../controller/src/customerAjax.php?key=' + key.value, true);
    xhr.send();


});
