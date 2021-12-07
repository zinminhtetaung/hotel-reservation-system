var copyTextareaBtn = document.querySelector(".js-textareacopybtn");
if (copyTextareaBtn) {
    copyTextareaBtn.addEventListener("click", function (event) {
        var copyTextarea = document.querySelector(".js-copytextarea");
        copyTextarea.focus();
        copyTextarea.select();

        try {
            var successful = document.execCommand("copy");
            var msg = successful ? "successful" : "unsuccessful";
            console.log("Copying text command was " + msg);
        } catch (err) {
            console.log("Oops, unable to copy");
        }
    });

    /*==================== SHOW NAVBAR ====================*/
    const showMenu = (headerToggle, navbarId) => {
        const toggleBtn = document.getElementById(headerToggle),
            nav = document.getElementById(navbarId);
        if (showMenu)
            if (headerToggle && navbarId) {
                // Validate that variables exist
                toggleBtn.addEventListener("click", () => {
                    // We add the show-menu class to the div tag with the nav__menu class
                    nav.classList.toggle("show-menu");
                    // change icon
                    toggleBtn.classList.toggle("bx-x");
                });
            }
    };
    showMenu("header-toggle", "navbar");

    /*==================== LINK ACTIVE ====================*/
    const linkColor = document.querySelectorAll(".nav__link");

    function colorLink() {
        linkColor.forEach((l) => l.classList.remove("active"));
        this.classList.add("active");
    }

    linkColor.forEach((l) => l.addEventListener("click", colorLink));
}
function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
}
