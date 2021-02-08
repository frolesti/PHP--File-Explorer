import { openModal, showNav } from '../dispatcher/dispatcher.js';
import { closeModal } from '../store/store.js';

export const render = (template, location = '#modal') => {
  document.querySelector(location).innerHTML = template;
};

export const addEventListenerModal = () => {
  document.getElementById('closeModal').addEventListener('click', closeModal);
};
export const removeListenerModal = () => {
  document
    .getElementById('closeModal')
    .removeEventListener('click', closeModal);
};
export const addMainEventListener = () => {
  if (
    document.getElementById('btnNewFolder') &&
    document.getElementById('btnNewFile')
  ) {
    document
      .getElementById('btnNewFolder')
      .addEventListener('click', openModal);
    document.getElementById('btnNewFile').addEventListener('click', openModal);
  }
  document
    .querySelectorAll('.edit')
    .forEach(element => element.addEventListener('click', openModal));
  document.getElementById('showMenu').addEventListener('click', showNav);
  document.querySelector('.sidebar').addEventListener('click', e => {
    if (e.target.classList.contains('sidebar')) {
      e.preventDefault();
      e.target.classList.toggle('none');
      document.getElementById('showMenu').classList.toggle('fullOpacity');
    }
  });
  document.querySelector('.modal').addEventListener('click', e => {
    if (e.target.classList.contains('modal')) {
      e.preventDefault();
      e.target.classList.toggle('none');
      removeListenerModal();
    }
  });
};
