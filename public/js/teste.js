import API from './Api';
import Paginator from './paginator';

const apiUrl = '/api/users';
const api = new API(apiUrl);

const pageSize = 10;
let currentPage = 1;

async function renderList() {
  const data = await api.getList({ page: currentPage, pageSize });
  const paginator = new Paginator(data, pageSize, currentPage);

  // renderizar a lista de dados e os controles de paginação
}

renderList();

// adicionar event listener aos botões de navegação da página
document.querySelector('#next').addEventListener('click', () => {
  paginator.nextPage();
  currentPage = paginator.currentPage;
  renderList();
});

document.querySelector('#previous').addEventListener('click', () => {
  paginator.previousPage();
  currentPage = paginator.currentPage;
  renderList();
});

// adicionar event listener aos botões de filtro
document.querySelector('#filtro').addEventListener('click', () => {
  const filtro = document.querySelector('#filtro-input').value;
  api.getList({ page: 1, pageSize, filtro }).then((data) => {
    currentPage = 1;
    const paginator = new Paginator(data, pageSize, currentPage);
    renderList();
  });
});
