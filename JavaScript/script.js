//index.html page


function toggleLogin()
{
    var blur = document.getElementById('blur');
    blur.classList.toggle('active');

    var loginModal = document.getElementById('loginModal');
    loginModal.classList.toggle('active');
}


function toggleSignup()
{
    var blur = document.getElementById('blur');
    blur.classList.toggle('active');

    var loginModal = document.getElementById('signupModal');
    loginModal.classList.toggle('active');
}


//notes.html page

var colors = ['#ECB365','#65ECAB','#ECE765', '#65ECBB', '#EC65C6', '#98EC65'];
var notes = document.querySelectorAll(".note");

for (i = 0; i < notes.length; i++) {
    // Pick a random color from the array 'colors'.
    notes[i].style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
  }



  function toggleViewNote()
{
    var blur = document.getElementById('blur');
    blur.classList.toggle('active');

    var viewNoteModal = document.getElementById('viewNoteModal');
    viewNoteModal.classList.toggle('active');
}


function toggleNewNote()
{
    var blur = document.getElementById('blur');
    blur.classList.toggle('active');

    var newNoteModal = document.getElementById('newNoteModal');
    newNoteModal.classList.toggle('active');
}

function toggleEditNote()
{
    var blur = document.getElementById('blur');
    blur.classList.toggle('active');

    var editNoteModal = document.getElementById('editNoteModal');
    editNoteModal.classList.toggle('active');
}

