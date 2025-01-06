let list = [];
const chart = document.querySelector('.chart');

for (let i = 0; i < 200; i++)
    list.push((i, Math.random() * 200));


for (let i = 0; i < list.length; i++)
    setTimeout(() => {

        const element = document.createElement('div');
        element.className = 'dot';
        element.style.left = `${list[i][0]}px`;
        element.style.bottom = `${list[i][1]}px`;
        chart.appendChild(element);

    }, 10);