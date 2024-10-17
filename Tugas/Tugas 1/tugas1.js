const input = document.getElementById('input');

function inputView(number) {
  input.value += number;
}

function resetView() {
  input.value = "";
}

function count() {
  input.value = eval(input.value);
}
