window.addEventListener("DOMContentLoaded", () => {
    let data = [];
    const cardContainer = document.getElementById("card-grid");
    const searchInput = document.getElementById("search-input");

    // Busca dados do banco
    async function fetchData() {
        try {
            const response = await fetch("backend/getLivro.php");
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
                <a href="view/livro.php?id=${e.id}" style="text-decoration: none; color: inherit;">
                    <img src="${e.imagem}" alt="Capa do Livro">
                    <p>${e.nome}</p>
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
                i.nome.toLowerCase().includes(search) ||
                i.autor.toLowerCase().includes(search) ||
                i.genero.toLowerCase().includes(search)
            );
            displayData(filtered);
        });
    }

    // Sidebar (opcional)
    const btnFiltrar = document.getElementById("btnFiltrar");
    const sidebar = document.getElementById("sidebar");
    const btnFechar = document.getElementById("btnFechar");

    if (btnFiltrar && sidebar && btnFechar) {
        btnFiltrar.addEventListener("click", () => {
            sidebar.classList.add("ativo");
            btnFiltrar.style.display = "none";
        });
    }

    // Carrega os livros
    fetchData();
});