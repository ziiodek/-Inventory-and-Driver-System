const ButtonClickEvent = (buttonId,locationURL) => {
const button = document.getElementById(buttonId);
button.addEventListener('click',()=>{
window.location.href=locationURL;
});
};
