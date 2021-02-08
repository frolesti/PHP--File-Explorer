export const uploadFile = url => {
  const template = `
  <section class="modal-content">
  <span class="close" id="closeModal">&times;</span>
    <form class='form-item' action="index.php" method="post" enctype="multipart/form-data">
      <label class="label-upload" for="newFile">
      Upload File
      <input type="file" id="newFile" name="newFile" required>
      </label>
      <input type="hidden" name="MAX_FILE_SIZE" value="30000">
      <input type="hidden" value="${url}" name="url">
      <input class="button" type="submit" value="upload">
    </form>
  </section>`;
  return template;
};
