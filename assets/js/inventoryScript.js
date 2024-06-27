// get id 
let key = document.getElementById("key");
let container = document.getElementById("content");

// add event listener
key.addEventListener('keyup', function() {
    

    // ajax
    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            container.innerHTML = this.responseText;
        }
    }

    // get resource
    xhr.open('GET', '../controller/src/inventoryAjax.php?key=' + key.value, true);
    xhr.send();

});