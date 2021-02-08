import {
  createData,
  createFileContent,
  createFolderContent,
} from '../store/store.js';

export const openModal = e => {
  e.preventDefault();
  if (e.target.hasAttribute('data-url')) {
    document.getElementById('modal').classList.toggle('none');
    const url = e.target.getAttribute('data-url');
    switch (e.target.id) {
      case 'btnNewFolder':
        createFolderContent(url);
        break;
      case 'btnNewFile':
        createFileContent(url);
        break;
      case '': //case File Name or Icon click
        console.log(e);
        axios.get('./assets/php/helpers/getAllPaths.php').then(({ data }) => {
          createData(e.target, url, data);
        });
        break;
    }
  }
};

export const showNav = e => {
  e.preventDefault();
  document.querySelector('.sidebar').classList.toggle('none');
  e.target.classList.toggle('fullOpacity');
};
