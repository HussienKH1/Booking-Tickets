const inputs = document.querySelectorAll(".input");

function focusFunc() {
  let parent = this.parentNode;
  parent.classList.add("focus");
}

function blurFunc() {
  let parent = this.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) => {
  // Check if input already has a value on page load
  if (input.value !== "") {
    input.parentNode.classList.add("focus");
  }

  input.addEventListener("focus", focusFunc);
  input.addEventListener("blur", blurFunc);
});

  