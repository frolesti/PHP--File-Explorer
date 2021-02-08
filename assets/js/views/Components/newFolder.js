export const newFolder = url => {
  const template = `
  <section class="modal-content">
  <span class="close" id="closeModal">&times;</span>
    <form class='form-item' action="index.php" method="post">
      <label for="newFolder">New Folder Name:</label>
      <input type="text" id="newFolder" name="newFolder" minlength="1" required>
      <input type="hidden" value="${url}" name="url">
      <input class="button" type="submit" value="create">
    </form>
  </section>`;
  return template;
};
