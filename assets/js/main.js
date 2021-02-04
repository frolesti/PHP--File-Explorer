document.addEventListener("DOMContentLoaded", () => {
  const newFolderBtn = document.getElementById("btnNewFolder");
  const newFileBtn = document.getElementById("btnNewFile");
  const modal = document.getElementById("modal");
  newFolderBtn.addEventListener("click", openModal);
  newFileBtn.addEventListener("click", openModal);
});

const newFolder = (url) => {
  const template = `
  <section class="modal-content">
    <h1>New Folder</h1>
    <form action="assets/php/createDirectory.php" method="post">
      <label for="newFolder">
      New Folder Name:
      <input type="text" id="newFolder" name="newFolder" minlength="1" required>
      <input type="hidden" value="${url}" name="url">
      </label>
      <input type="submit" value="create">
    </form>
    <button id="closeModal">Cancel</button>
  </section>`;
  return template;
};

const uploadFile = (url) => {
  const template = `
  <section class="modal-content">
    <h1>New File</h1>
    <form action="assets/php/createFile.php" method="post" enctype="multipart/form-data">
      <label for="newFile">
      Upload File
      <input type="file" id="newFile" name="newFile" required>
      </label>
      <input type="hidden" name="MAX_FILE_SIZE" value="30000">
      <input type="hidden" value="${url}" name="url">
      <input type="submit" value="upload">
    </form>
    <button id="closeModal">Cancel</button>
  </section>`;
  return template;
};

const openModal = (e) => {
  e.preventDefault();
  modal.classList.toggle("none");
  const url = e.target.getAttribute("data-url");
  switch (e.target.id) {
    case "btnNewFolder":
      console.log(url)
      render(newFolder(url));
      addEventListenerModal();
      break;
    case "btnNewFile":
      render(uploadFile(url));
      addEventListenerModal();
      break;
  }
};

const render = (template, location = "#modal") => {
  document.querySelector(location).innerHTML = template;
};

const closeModal = (e) => {
  e.preventDefault();
  modal.classList.toggle("none");
  removeListenerModal()
};
const addEventListenerModal = () => {
  document.getElementById("closeModal").addEventListener('click', closeModal);
}
const removeListenerModal = () => {
  document.getElementById("closeModal").removeEventListener('click', closeModal);
}