var modal = document.getElementById('loginModal');

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}