<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</head>

<body style="margin: 0;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm  bg-white rounded fixed-top">
        <a class="navbar-brand" href="product_list.php"><span class="text-primary" style="font-weight: bold;">ITI</span> <span class="badge bg-primary">SHOP</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link active" aria-current="page" href="product_list.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
                            <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z" />
                        </svg>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="order_list.php"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                            <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                        </svg></a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">

                <a class="nav-link " style="color: black;" href="order.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                    <span class="badge bg-danger" style="color: white;" id="num"></span>
                </a>

            </form>
        </div>
    </nav>



    <div class="container" style="margin-top: 50px; margin-top:100px ">
        <div>
            <h1 style="font-weight: bold;">??????????????????????????????????????????</h1>
        </div>
        <div class="shadow p-3 mb-5 bg-body rounded">
            <table class="table" style="margin: 50px; width: 90%;">
                <tbody id="body">
                </tbody>
            </table>
        </div>
    </div>

    <script>
        showOrder();

        function showOrder() {

            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                text = "";
                if (this.readyState == 4 && this.status == 200) {
                    arr = JSON.parse(this.responseText);
                    text = "<tr>"
                    text += "<th>??????????????????????????????????????????</th><th>??????????????????????????????</th><th>??????????????????????????????</th><th>???????????????</th>"
                    text += "</tr>";
                    console.log(arr);
                    for (i = 0; i < arr[0].length; i++) {
                        for (j = 0; j < arr[0][i].length - 1; j++) {
                            text += "<td scope='col'>" + arr[0][i][j] + "</td>";
                        }
                        text += "<td scope='col' colspan='  2'>" + (arr[0][0][3] == 0 ? '<span class="badge badge-danger">???????????????????????????????????????</span>' : '????????????????????????????????????') + "</td>";
                    }
                    text = "<tr>" + text + "</tr>";
                    text += "<tr>"
                    text += "<th>??????????????????????????????</th><th>?????????</th><th>???????????????</th><th>????????????</th><th>?????????????????????</th><th>??????????????????</th>"
                    text += "</tr>";
                    total = 0;
                    for (a = 0; a < arr[1].length; a++) {
                        text += "<tr>";
                        text += "<td>" + arr[1][a].name + "</td>";
                        text += "<td><img src='" + arr[1][a].image + "' alt='' style='width: 50px;'></td>";
                        text += "<td>" + arr[1][a].quantity + "</td>";
                        text += "<td>" + arr[1][a].unitPrice + "</td>";
                        text += "<td>" + arr[1][a].quantity * arr[1][a].unitPrice + "</td>";
                        text += "<td><button class='btn btn-danger' onclick='delPd(" + arr[1][a].orderID + "," + arr[1][a].productID + ")'>??????</button></td>";
                        text += "</tr > ";
                        total += parseInt(arr[1][a].quantity * arr[1][a].unitPrice);
                    }
                    text += '<tr style="color:green;font-size: 50px;font-weight: bold;"><td colspan="2">?????????????????????</td><td colspan="3">' + total + ' ???</td></tr>';
                    text += '<tr><td colspan="5"><button class="btn btn-danger" style="width:100px" onclick="pay(' + arr[0][0][0] + ')">????????????????????????</button></td></tr>';
                    document.getElementById("body").innerHTML = text;
                }
            }
            xhttp.open("GET", "rest.php?showOrderByCustomerID", true);
            xhttp.send();
        }
        numProductInOrder();

        function numProductInOrder() {
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    json = JSON.parse(this.responseText);
                    document.getElementById("num").innerHTML = json[0].num;
                }
            }
            xhttp.open("GET", "rest.php?numOrderProductByOrderId", true);
            xhttp.send();
        }

        function pay(id) {
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == 1) {
                        alert("????????????????????????");
                        numProductInOrder();
                        showOrder();
                    } else alert("???????????????????????????????????????????????????");
                }
            }
            xhttp.open("POST", "rest.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("closeOrder&orderID=" + id);
        }

        function delPd(oid, pid) {
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    showOrder();
                    numProductInOrder();
                }
            }
            xhttp.open("DELETE", "rest.php?oid=" + oid + "&pid=" + pid);
            xhttp.send();
        }
    </script>
</body>

</html>