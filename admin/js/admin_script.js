function login(){
    var name=document.getElementById("uname").value;
    var password=document.getElementById("password").value;
    if((name=="samuel" && password=="samuel"))
    {
        return true;
    }
    else if(name!="samuel" || name=="")
    {
        alert("Enter Username or Incorrect Username");
        return false;
    }
    else if(password!="samuel" || password=="")
    {
        alert("Enter Password or Incorrect Password");
        return false;
    }
    else{
        
    }
}