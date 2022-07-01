import PenTool from 'pen-tool'

(() => {
    let canvas = document.getElementById('canvas');
    if (canvas === null) {
        return;
    }
    let id = JSON.parse(document.getElementById('dataId').dataset.id);
    let context = canvas.getContext('2d');
    let pen = new PenTool("canvas", {
        isFillPath: true
    });
    pen.enablePen();

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
            xhr.open("POST", "/calculator/calculate/" + id, true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onload = () => {
                if (xhr.status == 200) {
                    let body = document.getElementById('body');
                    let a = document.createElement('h2');
                    a.innerHTML = 'Инструменты:';
                    body.appendChild(a)
                    let answer = document.querySelector('.answer');
                    answer.classList.remove('hidden');
                    let data = JSON.parse(xhr.responseText);
                    answer.innerHTML = 'Площадь: ' + data.area + 'м², периметр: ' + data.perimeter + 'м';

                    data.tools.forEach(tool => {
                        let toolDiv = document.createElement('div');
                        toolDiv.classList.add('card');
                        toolDiv.style = 'margin-top: 10px; padding-left: 10px'
                        let toolName = document.createElement('h4');
                        toolName.innerHTML = tool.tool_name;
                        toolDiv.appendChild(toolName)
                        let vendor = document.createElement('h5');
                        vendor.innerHTML = 'Поставщики:';
                        toolDiv.appendChild(vendor);
                        tool.vendors.forEach(vendor => {
                            let vendorBlock = document.createElement('p');
                            vendorBlock.innerHTML = '<b>' + vendor.vendor_name + '</b>' + ': цена ' + vendor.cost + 'руб.';
                            toolDiv.appendChild(vendorBlock);
                        })
                        body.appendChild(toolDiv)
                    })

                    let itog_tool = document.createElement('h3');
                    itog_tool.innerHTML = 'Итого за инструменты: минимум - ' + data.tool_price.min + 'руб, максимум - ' + data.tool_price.max + 'руб, в среднем - ' + data.tool_price.avg + 'руб';
                    body.appendChild(itog_tool);
                    let b = document.createElement('h2');
                    b.innerHTML = 'Материалы:';
                    b.style = 'margin-top:10px';
                    body.appendChild(b)
                    data.materials.forEach(material => {
                        let materialDiv = document.createElement('div');
                        materialDiv.classList.add('card');
                        materialDiv.style = 'margin-top: 10px; padding-left: 10px'
                        let materialName = document.createElement('h4');
                        materialName.innerHTML = material.material_name;
                        materialDiv.appendChild(materialName)
                        let vendor = document.createElement('h5');
                        vendor.innerHTML = 'Поставщики:';
                        materialDiv.appendChild(vendor);
                        material.vendors.forEach(vendor => {
                            let vendorBlock = document.createElement('p');
                            vendorBlock.innerHTML = '<b>' + vendor.vendor_name + '</b>' + ': цена ' + vendor.cost + 'руб.';
                            materialDiv.appendChild(vendorBlock);
                        })
                        body.appendChild(materialDiv)
                    })

                    let itog_material = document.createElement('h3');
                    itog_material.innerHTML = 'Итого за материалы: минимум - ' + data.material_price.min + 'руб, максимум - ' + data.material_price.max + 'руб, в среднем - ' + data.material_price.avg + 'руб';
                    body.appendChild(itog_material);
                } else {
                    console.log("Server response: ", xhr.status);
                }
            };
            let data = {
                data: points
            }
            xhr.send(JSON.stringify(data))
        } else {
            alert('Линия должна быть замкнутой');
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
