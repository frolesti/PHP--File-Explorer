import { closeModal } from '../store/store.js';

export const render = (template, location = '#modal') => {
  document.querySelector(location).innerHTML = template;
};

export const addEventListenerModal = () => {
  document.getElementById('cancelModal').addEventListener('click', closeModal);
  document.getElementById('closeModal').addEventListener('click', closeModal);
};
export const removeListenerModal = () => {
  document
    .getElementById('cancelModal')
    .removeEventListener('click', closeModal);
  document
    .getElementById('closeModal')
    .removeEventListener('click', closeModal);
};
