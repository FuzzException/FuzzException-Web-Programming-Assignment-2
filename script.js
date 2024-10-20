document.getElementById("toggleButton").addEventListener("click", function() {
    var userDataDiv = document.getElementById("userData");
    if (userDataDiv.style.display === "none" || userDataDiv.style.display === "") {
        userDataDiv.style.display = "block";  
        this.textContent = "Hide Data";  
    } else {
        userDataDiv.style.display = "none";  
        this.textContent = "Display Data";  
    }
});
