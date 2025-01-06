const list = [[0, 0], [200, 200]];
const chart = document.querySelector('.chart');

const diffX = list[1][0] - list[0][0];
const diffY = list[1][1] - list[0][1];

const element = document.createElement('div');
element.className = 'line';
element.style.left = `${list[0][0]}px`;
element.style.bottom = `${list[0][1] - 2}px`;
element.style.transform = `rotate(${-Math.atan(diffY / diffX)}rad`;
chart.appendChild(chart);


setTimeout(() => element.style.width = `${Math.sqrt(Math.pow(diffX, 2) + Math.pow(diffY, 2))}px`);