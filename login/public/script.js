const showPassword = (id, icon) => {
    let input = document.getElementById(id);
    let type = input.getAttribute("type");
    
    if (type == "password"){
        input.setAttribute("type", "text");
        icon.classList.remove("bi-eye")
        icon.classList.add("bi-eye-slash")
    }else{
        input.setAttribute("type", "password");
        icon.classList.remove("bi-eye-slash")
        icon.classList.add("bi-eye")
    }

}