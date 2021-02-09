export const optionsMove = optionsResults => {
  let template = '';

  optionsResults.forEach(path => {
    path = path.replaceAll('\\', '/');

    let elementUrl = path;
    const eliminatePoint = elementUrl.lastIndexOf('/');

    elementUrl = elementUrl.substr(0, eliminatePoint);

    if (path !== `root${elementUrl}`) {
      const url = path.substr(4, path.length);

      template += `<option value="${url}">${path}</option>`;
    } else {
      template += `<option value="/">root</option>`;
    }
  });
  return template;
};
