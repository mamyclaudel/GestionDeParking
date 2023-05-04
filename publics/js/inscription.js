var showed = document.getElementById('show');

showed.addEventListener("change", function(){
    var pwd = document.getElementById('password');
     if(showed.checked){

        pwd.setAttribute("type", "text");
     }else{
        pwd.setAttribute("type", "password");
     }
});