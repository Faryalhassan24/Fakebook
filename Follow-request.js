
let friends = 0;

const friendCountDisplay = document.querySelector(".friend-count p");


document.querySelectorAll(".follow-button").forEach(btn => {
    let username = btn.dataset.username;
    let state = localStorage.getItem("follow_" + username);

    if (state === "unfollowed") {
        btn.textContent = "Unfollowed";
        btn.classList.add("unfollowed");
        friends++; 
    } else {
        btn.textContent = "Follow";
        btn.classList.remove("unfollowed");
    }

    btn.addEventListener("click", () => {
        if (btn.innerText === "Follow") {
            btn.innerText = "Unfollowed";
            btn.classList.add("unfollowed");
            friends++; 
            localStorage.setItem("follow_" + username, "unfollowed");
        } else {
            btn.innerText = "Follow";
            btn.classList.remove("unfollowed");
            friends--; 
            localStorage.setItem("follow_" + username, "follow");
        }

        friendCountDisplay.innerHTML = friends;
    });
});

friendCountDisplay.textContent = friends;
