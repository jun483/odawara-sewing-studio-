document.addEventListener("DOMContentLoaded", () => {

    const button = document.getElementById("oss-calc");

    if (!button) {
        return;
    }

    button.addEventListener("click", () => {

        const project = document.getElementById("oss-project").value;
        const width = document.getElementById("oss-width").value;
        const height = document.getElementById("oss-height").value;
        const quantity = document.getElementById("oss-qty").value;
        const fabricWidth = document.getElementById("oss-fabric-width").value;

        const result = document.getElementById("oss-result");

        result.innerHTML = "<p>計算中...</p>";

        const formData = new FormData();

        formData.append("action", "oss_calculate");
        formData.append("nonce", oss.nonce);
        formData.append("type", project);
        formData.append("width", width);
        formData.append("height", height);
        formData.append("quantity", quantity);
        formData.append("fabric_width", fabricWidth);

        fetch(oss.ajaxUrl, {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {

            if (!data.success) {
                result.innerHTML = `<div class="oss-error">${data.message}</div>`;
                return;
            }

            result.innerHTML = `
                <div class="oss-result-card">

                    <h2>${data.title}</h2>

                    <table class="oss-table">

                        <tr>
                            <th>必要な表地</th>
                            <td>${data.fabric} m</td>
                        </tr>

                        <tr>
                            <th>必要な裏地</th>
                            <td>${data.lining} m</td>
                        </tr>

                        <tr>
                            <th>生地幅</th>
                            <td>${data.fabric_width} cm</td>
                        </tr>

                        <tr>
                            <th>裁断サイズ</th>
                            <td>${data.cut_width} × ${data.cut_height} cm</td>
                        </tr>

                        <tr>
                            <th>持ち手</th>
                            <td>${data.handle} cm</td>
                        </tr>

                        <tr>
                            <th>接着芯</th>
                            <td>${data.interfacing} ㎡</td>
                        </tr>

                    </table>

                </div>
            `;

        })
        .catch(error => {

            console.error(error);

            result.innerHTML = `
                <div class="oss-error">
                    通信エラーが発生しました。
                </div>
            `;

        });

    });

});