window.onscroll = function() {
    const header = document.getElementsByClassName("header")[0];
    if (document.body.scrollTop > 1 || document.documentElement.scrollTop > 1) {
        header.classList.add("header-end")
        if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
            header.classList.add("header-start")

        } else {
            header.classList.remove("header-start")

        }
    } else {
        header.classList.remove("header-end")

    }
}

