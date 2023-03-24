// Date picker
let pre,
    current,
    next,
    current_year = "",
    current_month = "",
    months = [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
    ];

function getDate() {
    let c =
        current_month !== ""
            ? new Date(current_year, current_month)
            : new Date();
    current_year = c.getFullYear();
    current_month = c.getMonth();
    let cu = new Date(current_year, current_month);
    current_day = cu.getDay();
    let p = new Date(c.getFullYear(), c.getMonth(), 0);
    pre = p.getDate();
    let n = new Date(c.getFullYear(), c.getMonth() + 1, 0);
    current_days = n.getDate();
    current_last_day = n.getDay();
}
function renderCalender() {
    getDate();
    $("#dates").innerHTML = "";
    $("#month").innerText = months[current_month];
    $("#year").innerText = current_year;
    for (let i = current_day; i > 0; i--)
        $("#dates").append(
            "<h6 class='extra' onclick='fetchMemory(this,`pre`)'>" +
                (pre - i + 1) +
                "</h6>"
        );
    for (let i = 0; i < current_days; i++)
        $("#dates").append(
            "<h6 onclick='fetchMemory(this)'>" + (i + 1) + "</h6>"
        );
    for (let i = 0; i < 6 - current_last_day; i++)
        $("#dates").append(
            "<h6 class='extra' onclick='fetchMemory(this,`next`)'>" +
                (i + 1) +
                "</h6>"
        );
}
pre_memory = () => {
    current_month > 0 ? current_month-- : (current_month = 11);
    if (current_month == 11) current_year--;
    renderCalender();
};
next_memory = () => {
    current_month < 11 ? current_month++ : (current_month = 0);
    if (current_month == 0) current_year++;
    renderCalender();
};

$("#PM").onclick = pre_memory;
$("#NM").onclick = next_memory;
renderCalender();

function fetchMemory(node, s) {
    if (s == "pre") pre_memory();
    else if (s == "next") next_memory();
    date = node.innerText;
    ajax({
        url: "../php/dashboard/fetch_memory.php",
        method: "post",
        data: {
            date,
            month: current_month + 1,
            year: current_year,
        },
    });
    $("#dates h6:not(.extra)").perform((n) => {
        if (n.hasClass("active")) n.removeClass("active");
        if (n.innerText == date) n.addClass("active");
    });
}
