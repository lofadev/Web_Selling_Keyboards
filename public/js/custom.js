/**
 * 
 */

const btnSearch = document.querySelectorAll(".search-item")[1];

btnSearch.addEventListener("click", function() {
	const searchPopup = document.querySelector(".search-popup");
	searchPopup.classList.add("is-visible");
})