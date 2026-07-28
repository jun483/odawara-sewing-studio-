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
        const fabricWidth = document.getElementById("oss-fabric-width").value;

        const formData = new FormData();

        formData.append("action", "oss_calculate");
        formData.append("nonce", oss.nonce);
        formData.append("type", type);
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

            let html = "";

            if (!data.success) {

                html = `<p>${data.message}</p>`;

            } else {

                html = `
<div class="oss-result-card">

    <div class="oss-result-title">
        ${data.title}
    </div>

    <div class="oss-grid">

        <div class="oss-item">
            <div class="oss-item-label">必要な表地</div>
            <div class="oss-item-value">${data.fabric} m</div>
        </div>

        <div class="oss-item">
            <div class="oss-item-label">必要な裏地</div>
            <div class="oss-item-value">${data.lining} m</div>
        </div>

        <div class="oss-item">
            <div class="oss-item-label">生地幅</div>
            <div class="oss-item-value">${data.fabric_width} cm</div>
        </div>

        <div class="oss-item">
            <div class="oss-item-label">裁断サイズ</div>
            <div class="oss-item-value">${data.cut_width} × ${data.cut_height} cm</div>
        </div>

        <div class="oss-item">
            <div class="oss-item-label">持ち手</div>
            <div class="oss-item-value">${data.handle ?? "-"} cm</div>
        </div>

        <div class="oss-item">
            <div class="oss-item-label">接着芯</div>
            <div class="oss-item-value">${data.interfacing ?? "-"} ㎡</div>
        </div>

    </div>

    <div class="oss-note">
        ※ この計算結果は目安です。柄合わせ・水通し・裁断方法によって必要量は変わる場合があります。
    </div>

</div>
`;
            }

            document.getElementById("oss-result").innerHTML = html;

        })
        .catch(error => {

            console.error(error);

            document.getElementById("oss-result").innerHTML =
                "<p>計算中にエラーが発生しました。</p>";

        });

    });

});