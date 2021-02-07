import { openModal, showNav } from './dispatcher/dispatcher.js';
import { addMainEventListener } from './views/render.js';

document.addEventListener('DOMContentLoaded', () => {
  addMainEventListener();
});
