const elements = document.querySelectorAll(".categories");

console.log(elements);
elements.forEach((category) => {
  category.addEventListener("click", () => {
    const cat = document.querySelectorAll(
      ".cat-" + category.textContent.trim()
    );
    cat.forEach((p) => {
      p.classList.toggle("hidden");
    });
  });
});
