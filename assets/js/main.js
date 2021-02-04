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

const uploadFile = () => {
  const template = `
  <section class="modal-content">
    <h1>New File</h1>
    <form>
      <label for="newFile">
      Upload File
      <input type="file" id="newFile" name="newFile" required>
      </label>
      <input type="submit" value="upload">
    </form>
    <button id="closeModal">Cancel</button>
  </section>`;
  return template;
};

const openModal = (e) => {
  e.preventDefault();
  modal.classList.toggle("none");
  switch (e.target.id) {
    case "btnNewFolder":
      let url = e.target.getAttribute("data-url")
      console.log(url)
      render(newFolder(url));
      addEventListenerModal();
      break;
    case "btnNewFile":
      render(uploadFile());
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