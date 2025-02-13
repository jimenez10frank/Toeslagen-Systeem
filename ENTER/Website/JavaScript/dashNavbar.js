// deze SCRIPT IS NIET DOOR MIJ GESCHREVEN (Alex) ! 
// SOURCE/ONTWERPER: https://www.codingnepalweb.com/sidebar-with-dropdown-menu-html-css/


// Toggle the visibility of a dropdown menu
const toggleDropdown = (dropdown, menu, isOpen) => {
  dropdown.classList.toggle("open", isOpen);
  menu.style.height = isOpen ? `${menu.scrollHeight + 20}px` : 0;
};
// Close all open dropdowns
const closeAllDropdowns = () => {
  document.querySelectorAll(".dropdown-container.open").forEach((openDropdown) => {
    toggleDropdown(openDropdown, openDropdown.querySelector(".dropdown-menu"), false);
  });
};
// Attach click event to all dropdown toggles
document.querySelectorAll(".dropdown-toggle").forEach((dropdownToggle) => {
  dropdownToggle.addEventListener("click", (e) => {
    e.preventDefault();
    const dropdown = dropdownToggle.closest(".dropdown-container");
    const menu = dropdown.querySelector(".dropdown-menu");
    const isOpen = dropdown.classList.contains("open");
    closeAllDropdowns(); // Close all open dropdowns
    toggleDropdown(dropdown, menu, !isOpen); // Toggle current dropdown visibility
  });
});
// Attach click event to sidebar toggle buttons
document.querySelectorAll(".sidebar-toggler, .sidebar-menu-button").forEach((button) => {
  button.addEventListener("click", () => {
    closeAllDropdowns(); // Close all open dropdowns
    document.querySelector(".sidebar").classList.toggle("collapsed"); // Toggle collapsed class on sidebar
  });
});
// Collapse sidebar by default on small screens
if (window.innerWidth <= 1024) document.querySelector(".sidebar").classList.add("collapsed");



// Als formaat van pagina wordt gewijzigd of gescroold, dan vouwen we navbar aan zijkant
['scroll', 'resize'].forEach(event => window.addEventListener(event, () => document.querySelector('.sidebar').classList.add('collapsed')));



