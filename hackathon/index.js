function showpwd() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    }
    else {
        x.type = "password";
    }
    var y = document.getElementById("rptpwd");
    if (y.type === "password") {
        y.type = "text";
    }
    else {
        y.type = "password";
    }
}

function bold1() {
    document.execCommand("bold");
}

function italics1() {
    document.execCommand("italic");
}
function underline1() {
    document.execCommand("underline");
}
var numdiv=0;
function adddiv() {
    var div = document.createElement("DIV");
    div.contentEditable = "true";
    div.setAttribute("class","new");
    numdiv=numdiv+1;
    div.setAttribute("id","div"+numdiv);
    document.body.appendChild(div);
    var num = document.createElement("input");
    num.setAttribute("type","number");
    num.setAttribute("value", numdiv);
    num.setAttribute("name" , "numdiv");
    num.hidden=true;
    document.getElementById('s').appendChild(num);
    var btn = document.createElement("BUTTON");
    btn.value=numdiv;
    btn.innerHTML="Delete";
    btn.id=numdiv;
    btn.setAttribute("onclick",'del(this.id)');
    document.body.appendChild(btn);
    var input = document.createElement("INPUT");
    input.name="divmsg"+numdiv;
    input.id="divmsg"+numdiv;
    input.hidden=true;
    document.getElementById('s').appendChild(input);


    
}
var numinput=0;
function addinput(type) {
    var input = document.createElement("INPUT");
    input.type = type;
    document.getElementById('form');
    numinput+=1;
    input.setAttribute("id",numinput);    
    form.appendChild(input);
    form.appendChild(document.createElement("BR"));

    var num = document.createElement("input");
    num.setAttribute("type","number");
    num.setAttribute("value", numinput);
    num.setAttribute("name" , "numinput");
    num.hidden=true;
    document.getElementById('s').appendChild(num);

}

function addcss() {
    var url=document.getElementById('url').value;
    var link = document.createElement('link');
    link.href = url;
    link.rel = 'stylesheet';
    link.type = 'text/css';
    document.getElementsByTagName('head')[0].appendChild(link);


    var jsurl=document.getElementById('jsurl').value;
    var script = document.createElement('script');
    script.src = jsurl;
    document.getElementsByTagName('head')[0].appendChild(script);


}



function openNav() {
    document.getElementById("drop").style.width = "250px";
}

window.addEventListener('mouseup', function (event) {
    if (event.target != document.getElementById("drop") && event.target.parentNose != document.getElementById("drop")) {
        document.getElementById("drop").style.width = "0";
    }
});


function opennote() {
    document.getElementById("opennote").style.width = "400px";
    var currentdate = new Date();

    var user = document.getElementById('user').value;
    var main = document.getElementById('opennote');
    var output = "";
    var url = 'note.php?username=' + user;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.onreadystatechange = function () {
        if (xhr.status == 200 && xhr.readyState == 4) {
            var note = JSON.parse(xhr.responseText);
            for (var i = 0; i < note.notifications.length; i++) {
                localStorage.setItem("n", note.notifications.length);
                from = ' From: ' + note.notifications[i].from;
                subject = ' Sub: ' + note.notifications[i].subject;
                sent = '<span class="note"style="font-size:14px;float:right; margin-right:2px;">' + note.notifications[i].sent + '</span>';
                output += from + subject + sent + '<br>';

            }
            main.innerHTML = '<p>' + output + '</p>';

        }
    }

    xhr.send();
}



window.addEventListener('mouseup', function (event) {
    if (event.target != document.getElementById("opennote") && event.target.parentNose != document.getElementById("opennote")) {
        document.getElementById("opennote").style.width = "0";
    }
});


function changetheme() {
    var i = parseInt(localStorage.getItem("i"));
    if (i > 6) {
        localStorage.setItem("i", "1");
    }
    var i = parseInt(localStorage.getItem("i"));
    document.body.background = "theme/" + i + ".jpg";
    i++;
    localStorage.setItem("i", i);
}
if (!localStorage.getItem("i")) {
    localStorage.setItem("i", "1");
}


function del(check){
    document.getElementById("div"+check).remove();
    document.getElementById(check).remove(); 
    numdiv=numdiv-1;

}

function save(){
for(var i=1;i<numdiv+1;i++){
    document.getElementById('divmsg'+i).value=document.getElementById("div"+i).innerHTML;
    console.log(i)
    console.log(numdiv)
}
document.getElementById('header').value=document.getElementById("header1").innerHTML;
document.getElementById('footer').value=document.getElementById("footer1").innerHTML;
}