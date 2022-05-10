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

const ctaLikePosts = document.querySelectorAll('.cta-like-post');

ctaLikePosts.forEach(el => {
    el.addEventListener('click', ev => {
        fetch(`/post/like?postid=${el.dataset.postid}`)
            .then(() => {
                const icon = el.querySelector('ion-icon');
                const badge = el.querySelector('.badge');

                if (icon.name === 'heart') {
                    icon.name = 'heart-outline';
                    badge.innerHTML = Number(badge.innerHTML) - 1;
                } else {
                    badge.innerHTML = Number(badge.innerHTML) + 1;
                    icon.name = 'heart';
                }
            })
    });
});

const ctaLikeComments = document.querySelectorAll('.cta-like-comment');

ctaLikeComments.forEach(el => {
    el.addEventListener('click', ev => {
        fetch(`/comment/like?commentid=${el.dataset.commentid}`)
            .then(() => {
                const icon = el.querySelector('ion-icon');
                const badge = el.querySelector('.badge');

                if (icon.name === 'heart') {
                    icon.name = 'heart-outline';
                    badge.innerHTML = Number(badge.innerHTML) - 1;
                } else {
                    badge.innerHTML = Number(badge.innerHTML) + 1;
                    icon.name = 'heart';
                }
            })
    });
});

const mediaUploadEl = document.querySelector('#media');
mediaUploadEl.addEventListener('change', ev => {
    fileNameEl = document.createElement('div');
    fileNameEl.innerHTML = ev.target.value;

    mediaUploadEl.closest('div').appendChild(fileNameEl);
})
