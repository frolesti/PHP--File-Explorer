import { optionsMove } from '../views/Components/optionsMove.js';

export const transfomData = (target, url, optionsResults) => {
  const cells =
    target.parentElement.localName === 'tr'
      ? target.parentElement.cells
      : target.parentElement.parentElement.cells;
  console.log(cells);
  const ext = target.getAttribute('data-type');
  const obj = {
    url: url,
    ext: ext,
    name: cells[1] && cells[1].textContent,
    creation: cells[2] && cells[2].textContent,
    modification: cells[3] && cells[3].textContent,
    size: cells[4] && cells[4].textContent,
    type: getType(ext),
    optionsPaths: optionsMove(optionsResults),
  };
  return obj;
};

const getType = ext => {
  let type = ext;

  if (ext === 'jpg' || ext === 'png' || ext === 'gif' || ext === 'svg') {
    type = 'img';
  } else if (ext === 'mp3') {
    type = 'audio';
  } else if (ext === 'mp4') {
    type = 'video';
  } else if (ext === 'csv') {
    type = 'csv';
  }
  console.log(type);
  return type;
};
