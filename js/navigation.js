/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */

document.addEventListener("DOMContentLoaded", function() {
    // Get the #header and #site-navigation elements
    var header = document.getElementById("masthead");
    var siteNavigation = document.getElementById("site-navigation");
	var menuToggle = document.getElementById("menuToggle");
    
    // Check if both elements exist
    if (header && siteNavigation) {
        // Set the margin-top of #site-navigation to the height of #header
        siteNavigation.style.paddingTop = (header.clientHeight + 10) + "px";
    }

    // Check if both elements exist
	if (menuToggle && siteNavigation) {
        // Add a click event listener to the menuToggle button
        menuToggle.addEventListener("click", function() {
            // Toggle the display style of siteNavigation
            if (siteNavigation.style.display === "none" || siteNavigation.style.display === "") {
                siteNavigation.style.display = "block";
                document.body.style.overflow = "hidden"; // Disable scrolling
            } else {
                siteNavigation.style.display = "none";
                document.body.style.overflow = "auto"; // Enable scrolling
            }
        });
    }

});
