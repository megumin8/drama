<style>
    .dramacard {
        display: none;
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0px;
        left: 0px;
        z-index: 21;
    }

    .card_backdrop {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0px;
        left: 0px;
        background-color: black;
        opacity: 0.5;
    }

    .card_container {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0px;
        left: 0px;
        z-index: 22;
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        justify-content: center;
        align-content: center;
        padding: 20px;
    }

    .card {
        width: 80%;
        min-width: 300px;
        max-width: 650px;
        height: auto;
        padding: 10px;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        gap: 5px;
        border-radius: 25px;
        border-style: solid;
        border-size: .5px;
        border-color: burlywood;
    }

    .card_img {
        width: 200px;
        height: 350px;
        object-fit: cover;
        border-radius: 20px;
    }

    .textbox {
        width: 100%;
        max-width: 300px;
        height: auto;
        padding: 5px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-content: center;
    }

    .title {
        font-size: medium;
        font-weight: 500;
        text-align: left
    }

    .disp {
        font-size: small;
        font-weight: 200;
        text-align: left
    }
</style>

<div class="dramacard" id="dramacard">
    <a href="" class="card_backdrop" onclick="hideCard()"></a>
    <div class="card_container">
        <div class="card">
            <img src="" alt="" id="card_img" class="card_img">
            <div class="textbox">
                <h2 class="title" id="title"></h2>
                <p class="disp" id="disp"></p>
                <a onclick="hideCard()">close..</a>
            </div>
        </div>
    </div>

</div>

<script>
    let dramacard = document.getElementById('dramacard');

    function showcard(drama = null) {
        let cover = "";
        let dtitle = "";
        let ddisp = "";
        if (drama != 'null') {
            drama = JSON.parse(drama);
            dtitle = drama.name;
            ddisp = drama.disp;
            cover = drama.cover;
        }
        dramacard.style.display = 'block';
        let img = document.getElementById('card_img');
        let title = document.getElementById('title');
        let disp = document.getElementById('disp');
        img.src= cover;
        title.innerHTML=dtitle;
        disp.innerHTML = ddisp;
    }

    function hideCard() {
        dramacard.style.display = 'none';
    }
</script>
