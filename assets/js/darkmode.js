function toggleDarkMode() {
  const body = document.body;
  body.classList.toggle("dark-mode");

  const isDarkMode = body.classList.contains("dark-mode");
  localStorage.setItem("darkMode", isDarkMode);
  // visibilité des icones
  const iconDark = document.querySelector(".iconDark");
  const iconLight = document.querySelector(".iconLight");

  if (isDarkMode) {
    iconDark.style.display = "none";
    iconLight.style.display = "inline";
  } else {
    iconDark.style.display = "inline";
    iconLight.style.display = "none";
  }
}

const savedDarkMode = localStorage.getItem("darkMode");
if (savedDarkMode === "true") {
  document.body.classList.add("dark-mode");
  //conserver la visibilité des icones
  const iconDark = document.querySelector(".iconDark");
  const iconLight = document.querySelector(".iconLight");
  iconDark.style.display = "none";
  iconLight.style.display = "inline";
}
