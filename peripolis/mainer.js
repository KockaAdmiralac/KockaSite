function tab_show(a){
var i;
i=1;
while(i<=7){
tab=document.getElementById("tab_"+i);
tab.style.display="none";
i++;
}
tab=document.getElementById("tab_"+a);
tab.style.display="block";
}