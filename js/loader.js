user = localStorage.getItem("cu");
setTimeout(() => {
    $("#loader").addClass("s1");
    setTimeout(() => {
        $("#loader").addClass("hide");
        auth();
        setTimeout(() => {
            $("body")[0].removeClass("loading");
            $("#loader").addClass("remove");
        }, 1000);
    }, 1500);
}, 5100);

function auth_user(id) {
    localStorage.setItem("cu", id);
    auth();
}
function auth() {
    ajax({
        url: "./php/auth.php",
        method: "post",
        data: {
            user: localStorage.getItem("cu"),
            device: localStorage.getItem("device"),
        },
        success: (res) => {
            res = JSON.parse(res);
            if (res.success) window.location.href = "./dashboard";
            else {
                let cu = localStorage.getItem("cu");
                let u = JSON.parse(localStorage.getItem("u"));
                let c = [];
                u.forEach((e) => {
                    if (e != cu) c.push(e);
                });
                localStorage.removeItem("cu");
                localStorage.setItem("u",JSON.stringify(c));
            }
        },
    });
}
