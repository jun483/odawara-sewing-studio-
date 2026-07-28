<?php
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="oss-container">

    <div class="oss-card">

        <h1>🧵 小田原ミシン 生地計算</h1>

        <p>
            必要な生地・裏地・副資材を自動計算します。
        </p>

        <hr>

        <label>作品</label>

        <select id="oss-project">

            <option value="lesson">レッスンバッグ</option>

            <option value="shoes">シューズバッグ</option>

            <option value="drawstring">巾着袋</option>

            <option value="tote">トートバッグ</option>

        </select>

        <br><br>

        <label>横(cm)</label>

        <input
            id="oss-width"
            type="number"
            value="40"
        >

        <br><br>

        <label>縦(cm)</label>

        <input
            id="oss-height"
            type="number"
            value="30"
        >

        <br><br>

        <label>数量</label>

        <input
            id="oss-qty"
            type="number"
            value="1"
        >

        <br><br>

        <button
            class="oss-button"
            id="oss-calc"
        >
            計算する
        </button>

        <hr>

        <div id="oss-result">

            ここへ結果が表示されます。

        </div>

    </div>

</div>