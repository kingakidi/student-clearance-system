function clean(x) {
  return x.value.length;
}

function _(x) {
  return document.getElementById(x);
}

function error(x) {
  return `<span class='text-danger'> ${x}</span>`;
}

function success(x) {
  return `<span class='text-success'> ${x}</span>`;
}
