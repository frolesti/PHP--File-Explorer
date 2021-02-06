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
