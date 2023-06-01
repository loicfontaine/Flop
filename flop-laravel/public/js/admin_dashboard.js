console.log("salut");

const menuItem = document.getElementById(".adminDashboardMenuItems");
menuItem.addEventListener("click", select());
function select() {
    menuItem.classList.add("selected");
}
