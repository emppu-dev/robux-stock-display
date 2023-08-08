function animateValue(element, start, end, duration) {
  let startTimestamp = null;
  const step = (timestamp) => {
    if (!startTimestamp) startTimestamp = timestamp;
    const progress = Math.min((timestamp - startTimestamp) / duration, 1);
    const currentCount = Math.floor(progress * (end - start) + start);
    element.textContent = currentCount + ' R$';
    if (progress < 1) {
      window.requestAnimationFrame(step);
    }
  };
  window.requestAnimationFrame(step);
}

document.addEventListener('DOMContentLoaded', () => {
  const pendingNumbersElement = document.getElementById('pending-numbers');
  const availableNumbersElement = document.getElementById('available-numbers');
  const pendingNumbers = parseInt(pendingNumbersElement.textContent);
  const availableNumbers = parseInt(availableNumbersElement.textContent);
  animateValue(pendingNumbersElement, 0, pendingNumbers, 1000);
  animateValue(availableNumbersElement, 0, availableNumbers, 1000);
});