
window.addEventListener("DOMContentLoaded", () => {
    let data = [];
    const cardContainer = document.getElementById("card-grid");
    const searchInput = document.getElementById("search-input");

    // Busca dados do banco
    async function fetchData() {
        try {
            const response = await fetch("../backend/getLivro.php");
            const text = await response.text();
            console.log("Retorno bruto do PHP:", text);

            data = JSON.parse(text);
            displayData(data);
        } catch (error) {
            console.error("Erro ao buscar dados:", error);
            cardContainer.innerHTML = "<p>Erro ao carregar os livros.</p>";
        }
    }

    // Função para exibir cards
    const displayData = (dataToDisplay) => {
        cardContainer.innerHTML = "";
        if (!dataToDisplay.length) {
            cardContainer.innerHTML = "<p>Nenhum livro encontrado.</p>";
            return;
        }

        dataToDisplay.forEach(e => {
            const card = document.createElement("div");
            card.classList.add("sellcard");
            card.innerHTML = `
                <a href="livro.php?id=${e.id}" style="text-decoration: none; color: inherit;">
                    <img src="${e.imagem}" alt="Capa do Livro">
                    <p>${e.titulo}</p>
                    <p>${e.autor}</p>
                    <p>${e.genero}</p>
                </a>
            `;
            cardContainer.appendChild(card);
        });
    };

    // Busca dinâmica
    if (searchInput) {
        searchInput.addEventListener("input", (e) => {
            const search = e.target.value.toLowerCase();
            const filtered = data.filter(i =>
                i.titulo.toLowerCase().includes(search) ||
                i.autor.toLowerCase().includes(search) ||
                i.genero.toLowerCase().includes(search)
            );
            displayData(filtered);
        });
    }
    function filtrarLivros() {
    let textoBusca = searchInput.value.toLowerCase();

    // valores dos filtros
    let aventura = document.getElementById("filtroAventura").checked;
    let manga = document.getElementById("filtroManga").checked;
    let fantasia = document.getElementById("filtroFantasia").checked;

    let juvenil = document.getElementById("filtroJuvenil").checked;
    let adulto = document.getElementById("filtroAdulto").checked;

    return data.filter(livro => {
        // ----------- BUSCA -----------
        if (!livro.titulo.toLowerCase().includes(textoBusca) &&
            !livro.autor.toLowerCase().includes(textoBusca)) {
            return false;
        }

        // ----------- FILTRO DE GÊNERO -----------
        let generoOK =
            (!aventura && !manga && !fantasia) || // nenhum filtro → tudo ok
            (aventura && livro.genero === "Aventura") ||
            (manga && livro.genero === "Mangá") ||
            (fantasia && livro.genero === "Fantasia");

        if (!generoOK) return false;

        // ----------- FILTRO DE FAIXA ETÁRIA -----------
        let faixaOk =
            (!juvenil && !adulto) ||
            (juvenil && livro.faixa === "Juvenil") ||
            (adulto && livro.faixa === "Adulto");

        if (!faixaOk) return false;

        return true;
    });
}
    // Carrega os livros
    fetchData();
});