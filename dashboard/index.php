<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost:81/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/quicker/css/quicker.css" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/user_detals.css">
</head>

<body>
    <div id="profile_banner"></div>
    <div id="cover">
        <div class="popup">
            <i class="fa-regular fa-xmark" id="close_popup"></i>
            <div id="popup" class="rflex">

            </div>
        </div>
    </div>
    <main class="cflex">
        <div class="container rflex">
            <div class="left_panel">
                <div class="block">
                    <h4 class="block_title">Approve Requests</h4>
                    <nav id="request_block"></nav>
                    <button>View all</button>
                </div>
                <div class="block">
                    <h4 class="block_title">Intro</h4>
                    <nav id="intro_block"></nav>
                </div>
                <div class="block">
                    <h4 class="block_title">Services</h4>
                    <nav id="service_block" class="rflexw"></nav>
                    <button>View all</button>
                </div>
            </div>
            <div class="right_panel" id="panel">

            </div>
        </div>
    </main>
    <script src="http://localhost/quicker/quicker.js"></script>
    <script>
        function warn(msg) {
            $(".right_panel")[0].insert(1, `<div class="block warn"><h6 class="title"><i class="fa-regular fa-triangle-exclamation"></i> Alert</h6><h6>${msg}</h6></div>`);
        }

        function load_details(type) {
            ajax({
                url: "./assets/php/load_details.php",
                method: 'post',
                data: {
                    type
                },
                success: (res) => {
                    $("#panel").innerHTML = '';
                    $("#panel").append(res);
                    if (type == 'personal')
                        $("#profile_pics").quickFill("./assets/php/profile_pics.php");
                }
            })
        }
        warn("New Account. Please provide few information");
        $("#profile_banner").quickFill("./assets/php/profile_banner.php");
        $("#request_block").quickFill("./assets/php/request_block.php", '', (node, res) => {
            if (res !== '') {
                node.innerHTML = res;
            } else {
                node.parentElement.remove();
            }
        });
        $("#intro_block").quickFill("./assets/php/intro_block.html");
        // $("#service_block").quickFill("./assets/service_block.html");

        function config_pic(type, img_node) {
            $("#cover").addClass("active");
            $("#popup").quickFill("./assets/popups/img_update.php", {
                type
            }, (node, res) => {
                node.innerHTML = res;
                let n = $(img_node).cloneNode()
                n.id = "preview";
                $("#popup").insert(1, n);
                var reader = new FileReader();
                $('#ra').onchange = function() {
                    reader.onload = function() {
                        $("#preview").src = reader.result;
                    }
                    reader.readAsDataURL(event.target.files[0]);
                };
                $("#update").ajaxSubmit({
                    success: (res) => {
                        res = JSON.parse(res);
                        $("#cover").removeClass("active");
                        if (res.success) {
                            alert("Pic updated");
                        } else {
                            alert("unknown server error");
                        }
                    }
                });
                $("#remove").ajaxSubmit({
                    data: {
                        remove: true
                    }
                });
            });
        }
        $("#close_popup").onclick = function() {
            $("#cover").removeClass("active");
        }
    </script>
</body>

</html>