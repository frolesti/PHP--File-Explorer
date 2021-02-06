export const newFolder = url => {
  const template = `
  <section class="modal-content">
  <span class="close" id="closeModal">&times;</span>
    <h1>New Folder</h1>
    <form action="index.php" method="post">
      <label for="newFolder">
      New Folder Name:
      <input type="text" id="newFolder" name="newFolder" minlength="1" required>
      <input type="hidden" value="${url}" name="url">
      </label>
      <input type="submit" value="create">
    </form>
  </section>`;
  return template;
};
