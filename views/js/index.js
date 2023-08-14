// main.js
document.addEventListener("DOMContentLoaded", function () {
  const recommendedBooksElement = document.getElementById("recommended-books");

  // Fetch recommendations from the API
  fetch("/api/recommendations?user_id=123")
    .then((response) => response.json())
    .then((recommendedBooks) => {
      recommendedBooks.forEach((book) => {
        const listItem = document.createElement("li");
        listItem.textContent = book.title;
        recommendedBooksElement.appendChild(listItem);
      });
    })
    .catch((error) => {
      console.error("Error fetching recommendations:", error);
    });
});
