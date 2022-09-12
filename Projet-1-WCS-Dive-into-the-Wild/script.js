function onClickMenu() {
    document.getElementById("burgerMenuBar").classList.toggle("change");
    document.getElementById("navigation").classList.toggle("change");
    document.getElementById("burgerMenuCircle").classList.toggle("changeCircle");
}
const date1 = new Date();
const date2 = new Date('9/11/2020');
const diffTime = Math.abs(date2 - date1);
const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 

document.getElementById("myRange").value = 272 - diffDays; 
