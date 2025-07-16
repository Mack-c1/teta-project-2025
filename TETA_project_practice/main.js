
//Toggle Button(Menu button)
const toggleButton = document.querySelector('#toggle');
const drawer = document.querySelector('.drawer');

toggleButton.onclick = function(){
    drawer.classList.toggle('active');
}
