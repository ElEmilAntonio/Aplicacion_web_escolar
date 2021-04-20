 var ArrayGIF = ['https://media3.giphy.com/media/WNcbaCHN0mxsdJ2YXm/giphy.gif', 'https://media2.giphy.com/media/l3diOZVkXQ04BONB6/giphy.gif', 'https://media1.giphy.com/media/3o7bu0fTb50rSXgWsw/giphy.gif', 'https://media0.giphy.com/media/XKJ52vGno1REavaO5j/giphy.gif'];


var revealBtn = document.getElementById('revealBtn');
revealBtn.addEventListener('click', revealDiv);


function revealDiv() {
document.getElementById('gifDIV').style.display = "block";
var randomNumber = Math.floor(Math.random() * ArrayGIF.length);
document.getElementById('gif').src = ArrayGIF[randomNumber];