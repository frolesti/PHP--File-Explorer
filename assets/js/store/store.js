import { transfomData } from '../helpers/helpers.js';
import { editFileOrFolder } from '../views/Components/editFileOrFolder.js';
import { newFolder } from '../views/Components/newFolder.js';
import { uploadFile } from '../views/Components/uploadFile.js';
import {
  addEventListenerModal,
  removeListenerModal,
  render,
} from '../views/render.js';

export const closeModal = e => {
  e.preventDefault();
  modal.classList.toggle('none');
  removeListenerModal();
};

export const createFolderContent = url => {
  render(newFolder(url));
  addEventListenerModal();
};
export const createFileContent = url => {
  render(uploadFile(url));
  addEventListenerModal();
};

export const createData = (target, url, optionsResults) => {
  render(editFileOrFolder(transfomData(target, url, optionsResults)));
  addEventListenerModal();
};
