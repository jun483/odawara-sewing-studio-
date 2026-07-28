document.addEventListener("DOMContentLoaded", () => {

    const button = document.getElementById("oss-calc");

    if (!button) {
        return;
    }

    button.addEventListener("click", () => {

        const type = document.getElementById("oss-project").value;
        const width = document.getElementById("oss-width").value;
        const height = document.getElementById("oss-height").value;
        const quantity = document.getElementById("oss-qty").value;

        const formData = new FormData();

        formData.append("action", "oss_calculate");
        formData.append("nonce", oss.nonce);
        formData.append("type", type);
        formData.append("width", width);
        formData.append("height", height);
        formData.append("quantity", quantity);

        fetch(oss.ajaxUrl, {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {

            let html = "";

            if (!data.success) {
                html = "<p>" + data.message + "</p>";
            } else {

                html += "<div class='oss-card'>";

                html += "<h2>" + data.title + "</h2>";

                html += "<table class='oss-table'>";

                html += "<tr><th>表地</th><td>" + data.fabric + " m</td></tr>";

                html += "<tr><th>裏地</th><td>" + data.lining + " m</td></tr>";

                if (data.handle) {
                    html += "<tr><th>持ち手</th><td>" + data.handle + " cm</td></tr>";
                }

                if (data.cord) {
                    html += "<tr><th>ひも</th><td>" + data.cord + " cm</td></tr>";
                }

                if (data.dkan) {
                    html += "<tr><th>Dカン</th><td>" + data.dkan + " 個</td></tr>";
                }

                if (data.interfacing) {
                    html += "<tr><th>接着芯</th><td>" + data.interfacing + " ㎡</td></tr>";
                }

                html += "</table>";

                html += "</div>";

            }

            document.getElementById("oss-result").innerHTML = html;

        });

    });

});