
const notifyBox = document.getElementById("notifyBox");

document.querySelectorAll(".follow-button").forEach(btn => {

    btn.addEventListener("click", () => {

        let username = btn.dataset.username;
        let message = document.createElement("p");

        if (btn.textContent.trim() === "Follow") {
            btn.textContent = "Unfollowed";
            btn.classList.add("unfollowed");

            message.textContent = "You started following " + username;
            message.style.color = "green";

        } else {
            btn.textContent = "Follow";
            btn.classList.remove("unfollowed");

            message.textContent = "You unfollowed " + username;
            message.style.color = "red";
        }

        notifyBox.appendChild(message);

    });
});
