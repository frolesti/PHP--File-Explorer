import { createFileContent, createFolderContent } from '../store/store.js';

export const openModal = e => {
  e.preventDefault();
  document.getElementById('modal').classList.toggle('none');
  const url = e.target.getAttribute('data-url');
  switch (e.target.id) {
    case 'btnNewFolder':
      createFolderContent(url);
      break;
    case 'btnNewFile':
      createFileContent(url);
      break;
  }
};
