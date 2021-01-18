class Polozka {
    constructor() {
        this.znovaNacitaj();
        setInterval(() => {
            this.znovaNacitaj()
        }, 2000);

    }

    async getPolozka() {
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
    async getRecenzia() {
        try {
            let respponse = await fetch("?c=recenzia&a=recenzie");
            let data = await respponse.json();

            let respponsee = await fetch("?c=pouzivatel&a=pouzivatelia");
            let dataa = await respponsee.json();

            console.log(data);
            var recenzie = document.getElementById("recenzie");
            var html = "";
            let i;
            i=0;
            var x = document.getElementById("hodnota").value;
            data.forEach((recen) => {
                i++;
                dataa.forEach((pouz) => {
                    if (recen.pouzivatel_id === pouz.id) {
                        if( x === "vsetko") {
                            html+=`<tr>
                     <th scope="row">${i}</th>
                     <td>${pouz.meno}  ${pouz.priezvisko}</td>
                     <td>${recen.komentar}</td>
                     <td>${recen.znamka}</td>
                     </tr>`;
                        }
                        if(recen.znamka === x ) {
                            html+=`<tr>
                     <th scope="row">${i}</th>
                     <td>${pouz.meno}  ${pouz.priezvisko}</td>
                     <td>${recen.komentar}</td>
                     <td>${recen.znamka}</td>
                     </tr>`;
                        }

                    }

                });
            });
            console.log(html);
            recenzie.innerHTML = html;
        } catch (e) {
            console.log('Chyba' + e.message);
        }

    }
    async getRegistrovany() {
        try {
            let respponsee = await fetch("?c=pouzivatel&a=pouzivatelia");
            let dataa = await respponsee.json();

            var registrovany = document.getElementById("registrovany");
            var html = "";
            var i = 0;
                dataa.forEach((pouz) => {
                    i++;
                            html+=`<tr>
                     <th scope="row">${i}</th>
                     <td>${pouz.meno}  ${pouz.priezvisko}</td>
                     <td>${pouz.kontakt}</td>
                     <td>${pouz.login}</td>
                     </tr>`;
                });
            console.log(html);
            registrovany.innerHTML = html;
        } catch (e) {
            console.log('Chyba' + e.message);
        }

    }

    async znovaNacitaj() {
        await this.getRecenzia();
        await this.getPolozka();
        await this.getRegistrovany();
    }
}
var polozka;

document.addEventListener(
    'DOMContentLoaded', () => {
        polozka = new Polozka();
    }, false)
;