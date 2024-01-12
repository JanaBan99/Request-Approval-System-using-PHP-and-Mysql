getWeight(http://localhost:8000/getweight);
getWeight(http://148.72.210.219:8000);
function getWeight(  ip )
    {
        return new Promise((resolve, reject) => {

            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var x = this.responseText;
                    const obj = JSON.parse(x);
                    ScaleWeight = obj.weight;
                    //alert(ScaleWeight);
                   
                }
            };
            if (ip.indexOf("getweight") == -1) {
                xhttp.open("POST", ip, true);
                var receiptObj = { method: 21 };
                var receiptJSON = JSON.stringify(receiptObj);
                xhttp.send(receiptJSON);
            }
            else {
                xhttp.open("GET", ip, true);
                var receiptObj = { method: 21 };
                var receiptJSON = JSON.stringify(receiptObj);
                xhttp.send(receiptJSON);
            }
            resolve(ScaleWeight);
        });
    }
