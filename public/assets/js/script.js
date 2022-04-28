// datetimes in time ago format
const timeAgoEls = document.querySelectorAll('.time-ago');

timeAgoEls.forEach(el => {
    el.innerHTML = moment(el.innerHTML, "YYYY-MM-DD h:mm:ss").fromNow();
});


const linkInputContainerEl = document.querySelector('.ed-form-control--url');
const linkInputEl = document.querySelector('#url');
linkInputContainerEl.addEventListener('click' , ev => {
    linkInputContainerEl.classList.add('col');
    linkInputEl.hidden = false
});
