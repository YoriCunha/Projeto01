const data = [
    {  nome: "Harry Potter e a Pedra Filosofal", autor: "J. K. Rowling", genero: "Fantasia", faixa: "Juvenil" },
    {  nome: "As Crônicas de Nárnia", autor: "C. S. Lewis", genero: "Aventura", faixa: "Juvenil" },
    {  nome: "One Piece vol. 104", autor: "Eiichiro Oda", genero: "Mangá", faixa: "Juvenil" },
    {  nome: "Harry Potter e a Ordem da Fênix", autor: "J. K. Rowling", genero: "Fantasia", faixa: "Juvenil" },
    {  nome: "Bleach Remix vol. 12", autor: "Tite Kubo", genero: "Mangá", faixa: "Juvenil" },
    {  nome: "Cartas de um Diabo a seu Aprendiz", autor: "C. S. Lewis", genero: "Fantasia", faixa: "Adulto" },
    {  nome: "Bleach vol. 49", autor: "Tite Kubo", genero: "Mangá", faixa: "Adulto" },
    {  nome:"Berserk vol. 1", autor: "Kentaro Miura", genero: "Mangá", faixa: "Adulto" }
];

const cardContainer = document.getElementById("card-grid");
const searchInput = document.getElementById("search-input");

// Função para exibir cards
const displayData = (dataToDisplay) => {
    cardContainer.innerHTML = "";
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

// Busca
searchInput.addEventListener("keyup", (e) => {
    const search = e.target.value.toLowerCase();
    const filtered = data.filter(i =>
        i.nome.toLowerCase().includes(search) ||
        i.autor.toLowerCase().includes(search) ||
        i.genero.toLowerCase().includes(search)
    );
    displayData(filtered);
});

// Sidebar
const btnFiltrar = document.getElementById("btnFiltrar");
const sidebar = document.getElementById("sidebar");
const btnFechar = document.getElementById("btnFechar");

btnFiltrar.addEventListener("click", () => {
    sidebar.classList.add("ativo");
    btnFiltrar.style.display = "none";
});

btnFechar.addEventListener("click", () => {
    sidebar.classList.remove("ativo");
    btnFiltrar.style.display = "flex";
});

document.addEventListener("click", (e) => {
    if (!sidebar.contains(e.target) && !btnFiltrar.contains(e.target)) {
        sidebar.classList.remove("ativo");
        btnFiltrar.style.display = "flex";
    }
});

// Filtros da sidebar
const filtros = {
    genero: Array.from(document.querySelectorAll(".filtro-grupo:nth-child(1) input")),
    autor: Array.from(document.querySelectorAll(".filtro-grupo:nth-child(2) input")),
    faixa: Array.from(document.querySelectorAll(".filtro-grupo:nth-child(3) input"))
};

Object.values(filtros).forEach(group => {
    group.forEach(checkbox => {
        checkbox.addEventListener("change", applyFilters);
    });
});

function applyFilters() {
    let filtered = data;

    const generos = filtros.genero.filter(i => i.checked).map(i => i.nextSibling.textContent.trim());
    if (generos.length) filtered = filtered.filter(i => generos.includes(i.genero));

    const autores = filtros.autor.filter(i => i.checked).map(i => i.nextSibling.textContent.trim());
    if (autores.length) filtered = filtered.filter(i => autores.includes(i.autor));

    const faixas = filtros.faixa.filter(i => i.checked).map(i => i.nextSibling.textContent.trim());
    if (faixas.length) filtered = filtered.filter(i => faixas.includes(i.faixa));

    displayData(filtered);
}

// Inicializa
window.addEventListener("load", () => displayData(data));