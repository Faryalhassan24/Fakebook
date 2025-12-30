let followButtons = document.querySelectorAll('.follow-button');

followButtons.forEach(btn => {
    btn.addEventListener('click', function () {

        if (btn.innerText === 'Follow') {
            btn.innerText = 'unfollowed';
            btn.classList.add('unfollowed');
        } 
        else {
            btn.innerText = 'Follow';
            btn.classList.remove('unfollowed');
        }

    });
});
