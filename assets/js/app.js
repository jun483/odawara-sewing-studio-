document.addEventListener("DOMContentLoaded", () => {

    const button = document.getElementById("oss-calc");

    if (!button) return;

    button.addEventListener("click", () => {

        const width = Number(document.getElementById("width").value);
        const height = Number(document.getElementById("height").value);
        const qty = Number(document.getElementById("quantity").value);

        const result = document.getElementById("oss-result");

        result.innerHTML = `
            <div class="oss-card">

                <h3>入力内容</h3>

                横：${width}cm<br>
                縦：${height}cm<br>
                数量：${qty}枚

                <hr>

                ※ 次回からここへ
                PHPで計算した結果を表示します。

            </div>
        `;

    });

});