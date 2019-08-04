var numdiv = parseInt(document.getElementById('d').value);
var numinput = parseInt(document.getElementById('i').value);


document.getElementById('head').innerHTML=document.getElementById('header').value;
document.getElementById('foot').innerHTML=document.getElementById('footer').value;

for (var i = 0; i < numdiv; i++) {
    var div = document.createElement("DIV");
    div.setAttribute("id","div"+i)
    div.innerHTML=document.getElementById(i+1).value;
    document.body.appendChild(div);
}

for (var i = 0; i < numinput; i++) {
    var div = document.createElement("INPUT");
    document.getElementById('form').appendChild(div);
    document.getElementById('form').appendChild(document.createElement("BR"));
}

var url=document.getElementById('url').value;
var link = document.createElement('link');
link.href = url;
link.rel = 'stylesheet';
link.type = 'text/css';
document.getElementsByTagName('head')[0].appendChild(link);







