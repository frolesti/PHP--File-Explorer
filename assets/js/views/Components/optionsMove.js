export const optionsMove = (url, optionsResults) => {
  let template = '';
  optionsResults.forEach(path => {
    template += `<option value="${url}">${path}</option>`;
  });
  return template;
};
