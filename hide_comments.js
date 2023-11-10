const btnHide = document.querySelector('#hide-comments-btn');
const comments = document.querySelectorAll('.comment');
const hr = document.querySelectorAll('hr');
let func1;
let func2;

function hideComments(){
    btnHide.addEventListener('click', func1 = () =>{
        comments.forEach(comment => {
            comment.style.display = 'none';
        });
        hr.forEach(element => {
            element.style.display = 'none';
        });
        btnHide.innerHTML = "Show Comments";
        btnHide.removeEventListener('click', func1);
        showComments();
    })
}

function showComments(){
    btnHide.addEventListener('click', func2 = () =>{
        comments.forEach(comment => {
            comment.style.display = 'block';
        });
        hr.forEach(element => {
            element.style.display = 'block';
        });
        btnHide.innerHTML = "Hide Comments";
        btnHide.removeEventListener('click', func2);
        hideComments();
    })
}

hideComments();
