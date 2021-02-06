import { openModal } from './dispatcher/dispatcher.js';

document.addEventListener('DOMContentLoaded', () => {
  document.getElementById('btnNewFolder').addEventListener('click', openModal);
  document.getElementById('btnNewFile').addEventListener('click', openModal);
});
