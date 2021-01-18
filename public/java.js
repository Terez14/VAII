class Recenzia {
    constructor() {
        this.znovaNacitaj();
        setInterval(() => {
            this.znovaNacitaj()
        }, 2000);

    }

    async getKomentar() {
        try {
            let respponse = await fetch("?c=flora&a=polozky");
            let data = await respponse.json();

            console.log(data);
            var polozky = document.getElementById("polozky");
            var html = "";
            data.forEach((poloz) => {
                html+=`<div class="col-lg-4">
                <img class="obrazok" src="${poloz.obrazok}" alt="obr">
                <h2 class="nazov">${poloz.nazov}</h2>
                <p>${poloz.popis}</p>
                <a href="?c=flora&a=uprav&id=${poloz.id}" class="btn btn-primary btn-sm">Uprav</a>
                <a href="?c=flora&a=zmaz&id=${poloz.id}" class="btn btn-danger btn-sm">Zmaz</a>
                </div>`;
            });
            console.log(html);
            polozky.innerHTML = html;
        } catch (e) {
            console.log('Chyba' + e.message);
        }

    }

    async znovaNacitaj() {
        await this.getKomentar();
    }
}
var recenzia;

document.addEventListener(
    'DOMContentLoaded', () => {
        recenzia = new Recenzia();
    }, false)
;