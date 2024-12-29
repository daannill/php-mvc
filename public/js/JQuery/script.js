var cari = document.getElementById('cari');
var container = document.getElementById('container');

cari.addEventListener('keyup', function() {

    var ajax = new XMLHttpRequest();

    ajax.onreadystatechange = function() {
        if( ajax.readyState == 4 && ajax.status == 200 ) {
            container.innerHTML = ajax.responseText;
        }
    };

    ajax.open('GET', 'ajax/data.php?cari=' + cari.value, true);
    ajax.send();
    
});