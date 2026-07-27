<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="oss-container">

    <h2>レッスンバッグ 生地計算</h2>

    <form id="oss-calculator">

        <p>
            <label>縦(cm)</label><br>
            <input type="number" id="height" value="30" min="1">
        </p>

        <p>
            <label>横(cm)</label><br>
            <input type="number" id="width" value="40" min="1">
        </p>

        <p>
            <label>数量</label><br>
            <input type="number" id="quantity" value="1" min="1">
        </p>

        <button type="button" id="oss-calc">
            計算する
        </button>

    </form>

    <div id="oss-result"></div>

</div>