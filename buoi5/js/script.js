function checkAccount(username) {
    var xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("username-error").textContent = this.responseText;
        }
    }

    xmlhttp.open("POST", "getuser.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("u=" + username);
}

function loadDetail(idsp) {
    var tdSort = ["ID", "Tên sản phẩm", "Chi tiết sản phẩm", "Giá sản phẩm", "Hình ảnh sản phẩm"];

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var detail = document.getElementById("detail");

            var obj = JSON.parse(this.responseText);
            var table = document.createElement("table");
            table.setAttribute("id", "product-detail");

            var text = document.createTextNode(obj.idsp);

            var j = 0;
            Object.keys(obj).forEach(function(i){
                var tr = document.createElement("tr");

                var td1 = document.createElement("td");
                var tdContent1 = document.createTextNode(tdSort[j]);
                td1.appendChild(tdContent1);


                var td2 = document.createElement("td");

                if (j != 4) {
                    var tdContent2 = document.createTextNode(obj[i]);
                    td2.appendChild(tdContent2);
                } else {
                    var img = document.createElement("img");
                    img.src = obj[i];

                    td2.appendChild(img);
                }

                j++;

                tr.appendChild(td1);
                tr.appendChild(td2);
                table.appendChild(tr);
            });


            detail.appendChild(table);

            detail.replaceChild(table, detail.childNodes[0]);
        }
    }

    xmlhttp.open("GET", "view_detail.php?idsp=" + idsp, true);
    xmlhttp.send();
}

function loadImageOnHover(idsp) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {

    }
}

function mouseOut(x) {
    x.classList("hide");
}

function filterProduct(value) {
    // console.log(value);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        console.log(JSON.parse(this.responseText));
    }

    xmlhttp.open("POST", "filterproduct.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("value=" + value);
}
