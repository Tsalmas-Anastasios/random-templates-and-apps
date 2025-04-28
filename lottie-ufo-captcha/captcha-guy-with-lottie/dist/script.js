// script.js
import { DotLottie } from 'https://esm.sh/@lottiefiles/dotlottie-web@0.37.0';

let currentTheme = 'Alien';
const canvas = document.querySelector('#display-canvas');
const dotLottie = new DotLottie({
	autoplay: true,
	loop: true,
	canvas: canvas,
	src: 'https://lottie.host/7da7b6c9-401f-436d-968b-c50ba49409b3/V6DoSiPH8g.lottie',
	themeId: currentTheme,
});

// Smooth theme transition
async function transitionTheme(newTheme) {
	canvas.style.opacity = '0';
	await new Promise((resolve) => setTimeout(resolve, 500));
	dotLottie.setTheme(newTheme);
	canvas.style.opacity = '1';
	currentTheme = newTheme;
}

document.getElementById('theme-switch').addEventListener('change', (e) => {
	transitionTheme(e.target.checked ? 'Human' : 'Alien');
});

document.getElementById('captcha-guy').addEventListener('click', () => {
	const switchElement = document.getElementById('theme-switch');
	switchElement.checked = !switchElement.checked;
	transitionTheme(switchElement.checked ? 'Human' : 'Alien');
});

// Add ripple effect to button
document.getElementById('captcha-guy').addEventListener('click', function (e) {
	let ripple = document.createElement('div');
	ripple.style.position = 'absolute';
	ripple.style.width = '50px';
	ripple.style.height = '50px';
	ripple.style.background = 'rgba(255, 255, 255, 0.4)';
	ripple.style.borderRadius = '50%';
	ripple.style.transform = 'translate(-50%, -50%)';
	ripple.style.pointerEvents = 'none';
	ripple.style.animation = 'ripple 0.6s linear';

	this.appendChild(ripple);
	setTimeout(() => ripple.remove(), 600);
});

// Add CSS for ripple animation
const style = document.createElement('style');
style.textContent = `
@keyframes ripple {
    from { transform: scale(0); opacity: 1; }
    to { transform: scale(10); opacity: 0; }
}
`;
document.head.appendChild(style);
