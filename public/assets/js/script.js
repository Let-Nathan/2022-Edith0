
const timeAgoEls = document.querySelectorAll('.time-ago');

timeAgoEls.forEach(el => {
    el.innerHTML = moment(el.innerHTML, "YYYY-MM-DD h:mm:ss").fromNow();
});
