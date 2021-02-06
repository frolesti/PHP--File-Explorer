import { createFileContent, createFolderContent } from '../store/store.js';

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
      case '': //case File click
        console.log(e.target.textContent);
        const ext = e.target.textContent
          .slice(e.target.textContent.length - 5)
          .split('.')[1];

        break;
    }
  }
};
