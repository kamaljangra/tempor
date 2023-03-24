$("input").perform((n) => {
    n.onkeydown = () => {
        let x = n.parentElement;
        x.hasClass("error") ? x.removeClass("error") : "";
    };
});
function saveDet(res) {
    let oldUsers = JSON.parse(localStorage.getItem("u")) || [];
    oldUsers.push(res.user);
    oldUsers = new Set(oldUsers);
    localStorage.setItem("cu", res.user);
    localStorage.setItem("device", res.device);
    localStorage.setItem("u", JSON.stringify([...oldUsers]));
}
function before(x) {
    let f = true;
    let inputs = $("form input");
    inputs.perform((n) => {
        if (n.value == "") {
            n.parentElement.addClass("error");
            x.target.abort();
            if (f) {
                n.focus();
                f = false;
            }
        }
    });
}
