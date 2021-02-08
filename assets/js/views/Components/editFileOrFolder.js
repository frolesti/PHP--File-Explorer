export const editFileOrFolder = ({
  url,
  ext,
  name,
  creation,
  modification,
  size,
  type,
  optionsPaths,
}) => {
  let template = `
  <section class="modal-content">
  <span class="close" id="closeModal">&times;</span>
  <section class="item">
    <section class="item__img">
      <img src="./assets/scr/icons/svg/${ext}.svg" alt="${ext} icon">
    </section>
    <section class="item__data">
      <p>Name: ${name}</p>
      <p>Created: ${creation}</p>
      <p>Modificated: ${modification}</p>
      <p>Size: ${size}</p>
    </section>
  </section>`;
  if (type === 'video') {
    template += `
    <section class="item__info">
      <video src="./root/${url}" alt="Video preview" controls>
    </section>`;
  } else if (type === 'img') {
    template += `
    <section class="item__info">
      <img src="./root/${url}" alt="Image preview">
    </section>`;
  } else if (type === 'audio') {
    template += `
    <section class="item__info">
      <audio src="./root/${url}" alt="Audio preview" controls>
    </section>`;
  }
  template += `
  <section class="item__form">
    <form class="form-item" action="" method="">
      <input type="hidden" id="renameUrl" name="renameUrl" value="${url}">
      <label for="newName">New name:</label>
      <input type="text" id="newName" name="newName">
      <input type="submit" class="button" value="Rename">
    </form>
    <form class="form-item" action="" method="">
      <input type="hidden" id="moveUrl" name="moveFileOrfolder" value="${url}">
      <label for="urlToMove">Do you want to move?</label>
      <select name="urlToMove" id="urlToMove">${optionsPaths}</select>
      <input type="submit" class="button" value="Move">
    </form>
    <form class="form-item" action="" method="">
      <input type="hidden" id="removeUrl" name="removeUrl" value="${url}">
      <label>Do you want to remove?</label>
      <input type="submit" class="button" value="Remove">
    </form>
  </section>
  </section>`;
  return template;
};
