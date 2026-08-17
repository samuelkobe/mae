// CSS .custom-h-screen adjustments for onload, resize and orientationchange
window.onload = () => {
  setVHUnitVariableValue();
};

// We listen to the resize event
window.addEventListener('resize', () => {
  // We execute the same script as before
  setVHUnitVariableValue();
});

// We listen to the resize event
window.addEventListener("orientationchange", () => {
  // We execute the same script as before
  setVHUnitVariableValue();
});

const setVHUnitVariableValue = () => {
  // Set the value in the --vh custom property to the root of the document
  vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vh', `${vh}px`);
}
