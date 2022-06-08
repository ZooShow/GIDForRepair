import PenTool from 'pen-tool'

(() => {
    let canvas = document.getElementById('canvas');
    if (canvas === null) {
        return;
    }
    let pen = new PenTool("canvas", {
        isFillPath: true
    });

    document.getElementById("btn").addEventListener("click", function () {
        pen.enablePen();
    });

    document.getElementById("save").addEventListener("click", function () {
        if (pen.closeState) {
            let points = [];
            pen.keyPointData.forEach(point => {
                let a = {
                    x: point.point.x / 50,
                    y: point.point.y / 50
                }
                points.push(a);
            })
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "/calculator/calculate", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onload = () => {
                if (xhr.status == 200) {
                    let answer = document.querySelector('.answer');
                    console.log(answer);
                    answer.classList.remove('hidden');
                    let data = JSON.parse(xhr.responseText);
                    answer.innerHTML = 'Площадь:' + data.data.toFixed(2);
                } else {
                    console.log("Server response: ", xhr.statusText);
                }
            };
            let data = {
                data: points
            }
            xhr.send(JSON.stringify(data))
        } else {
            console.log('is not close state');
        }
    });

    let isMouseClicked = false;

    (function () {
        'use strict';

        canvas.addEventListener('click', event => {
            isMouseClicked = true;
        });

        var boxElem = document.getElementById('canvas');
        var pointerElem = document.querySelector('.follow-cursor');

        function onMouseMove(event) {
            var mouseX = event.pageX;
            var mouseY = event.pageY;
            var crd = boxElem.getBoundingClientRect();
            var activePointer = crd.left <= mouseX && mouseX <= crd.right && crd.top <= mouseY && mouseY <= crd.bottom;

            requestAnimationFrame(function movePointer() {
                if (activePointer) {
                    if (isMouseClicked && !pen.closeState) {
                        pointerElem.classList.remove('hidden');
                        pointerElem.style.left = Math.floor(mouseX + 10) + 'px';
                        pointerElem.style.top = Math.floor(mouseY - 10) + 'px';
                        let lastPoint = pen.keyPointData[pen.keyPointData.length - 1].point;
                        let a = Math.floor(mouseX) - crd.left - lastPoint.x;
                        let b = Math.floor(mouseY) - crd.top - lastPoint.y;
                        let c = Math.sqrt(Math.pow(a, 2) + Math.pow(b, 2));
                        pointerElem.innerHTML = (c / 50).toFixed(2).toString() + 'м';
                    }
                } else {
                    pointerElem.classList.add('hidden');
                }
            });
        }

        function disablePointer() {
            requestAnimationFrame(function hidePointer() {
                pointerElem.classList.add('hidden');
            });
        }

        boxElem.addEventListener('mousemove', onMouseMove, false);
        boxElem.addEventListener('mouseleave', disablePointer, false);

    })();
})();
