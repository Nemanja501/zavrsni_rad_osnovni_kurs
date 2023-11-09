const btn = document.querySelector('.btn');
const comments = document.querySelectorAll('.comment');
const hr = document.querySelectorAll('hr');
let func1;
let func2;

btn.addEventListener('click', () =>{
    comments.forEach(comment => {
        comment.style.display = 'none';
    });
    hr.forEach(element => {
        element.style.display = 'none';
    });
    btn.innerHTML = "Show Comments";

    btn.addEventListener('click', () =>{
        comments.forEach(comment => {
            comment.style.display = 'block';
        });
        hr.forEach(element => {
            element.style.display = 'block';
        });
        btn.innerHTML = "Hide Comments";
    })
})
function hideComments(){
    btn.addEventListener('click', func1 = () =>{
        comments.forEach(comment => {
            comment.style.display = 'none';
        });
        hr.forEach(element => {
            element.style.display = 'none';
        });
        btn.innerHTML = "Show Comments";
        btn.removeEventListener('click', func1);
        showComments();
    })
}

function showComments(){
    btn.addEventListener('click', func2 = () =>{
        comments.forEach(comment => {
            comment.style.display = 'block';
        });
        hr.forEach(element => {
            element.style.display = 'block';
        });
        btn.innerHTML = "Hide Comments";
        btn.removeEventListener('click', func2);
        hideComments();
    })
}

hideComments();