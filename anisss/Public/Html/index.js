function show(){
    let password = document.getElementById('password');
    let img = document.getElementById('img');
    
    if(password.type ==="password"){
        password.type="text";
        img.style.opacity=1;
        img.src="image/open.png";
    }else{

        password.type="password";
        img.style.opacity=0.5;
        img.src="image/close.png";
    }
}