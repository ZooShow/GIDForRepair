(() => {
    let repairKind = document.getElementById('repairKind');
    if (repairKind === null) {
        return;
    }

    let repairs =
        {
            "Косметический ремонт": {
                "id": 1,
                "repair_type": [
                    {
                        "id": 1,
                        "name": "Замена обоев"
                    },
                    {
                        "id": 2,
                        "name": "Замена напольного покрытия"
                    },
                    {
                        "id": 3,
                        "name": "Замена плитки"
                    },
                    {
                        "id": 4,
                        "name": "Замена потолочного покрытия"
                    },
                    {
                        "id": 5,
                        "name": "Замена приборов электропитания"
                    }
                ]
            },
            "Капитальный ремонт": {
                "id": 2,
                "repair_type": [
                    {
                        "id": 1,
                        "name": "Замена обоев"
                    },
                    {
                        "id": 2,
                        "name": "Замена напольного покрытия"
                    },
                    {
                        "id": 3,
                        "name": "Замена плитки"
                    },
                    {
                        "id": 4,
                        "name": "Замена потолочного покрытия"
                    },
                    {
                        "id": 5,
                        "name": "Замена приборов электропитания"
                    },
                    {
                        "id": 6,
                        "name": "Демонтаж старых покрытий"
                    },
                    {
                        "id": 7,
                        "name": "Выравнивание стен/потолка"
                    },
                    {
                        "id": 8,
                        "name": "Прокладка трубопровода"
                    },
                    {
                        "id": 9,
                        "name": "Прокладка электропроводки"
                    },
                    {
                        "id": 10,
                        "name": "Монтаж сантехнического оборудования"
                    },
                    {
                        "id": 11,
                        "name": "Монтаж приточной вентиляции"
                    },
                    {
                        "id": 12,
                        "name": "Перепланировка"
                    }
                ]
            },
            "Евроремонт": {
                "id": 3,
                "repair_type": [
                    {
                        "id": 2,
                        "name": "Замена напольного покрытия"
                    },
                    {
                        "id": 3,
                        "name": "Замена плитки"
                    },
                    {
                        "id": 4,
                        "name": "Замена потолочного покрытия"
                    },
                    {
                        "id": 5,
                        "name": "Замена приборов электропитания"
                    },
                    {
                        "id": 6,
                        "name": "Демонтаж старых покрытий"
                    },
                    {
                        "id": 7,
                        "name": "Выравнивание стен/потолка"
                    },
                    {
                        "id": 8,
                        "name": "Прокладка трубопровода"
                    },
                    {
                        "id": 9,
                        "name": "Прокладка электропроводки"
                    },
                    {
                        "id": 10,
                        "name": "Монтаж сантехнического оборудования"
                    },
                    {
                        "id": 11,
                        "name": "Монтаж приточной вентиляции"
                    },
                    {
                        "id": 12,
                        "name": "Перепланировка"
                    }
                ]
            }
        };

    let materials = JSON.parse(document.querySelector('.materialsArray').dataset.materialsArray);
    let materialsSelect = document.getElementById('materials');
    materials.forEach(material => {
        materialsSelect.add(new Option(material.name, material.calculation_type, false, false))
    })

    let addMaterialsButton = document.getElementById('btnAddMaterials');

    addMaterialsButton.onclick = function () {
        let p = document.getElementById('materialsP');
        p.classList.remove('hidden');
        for (let i = 0; i < materialsSelect.length; ++i) {
            if (materialsSelect[i].selected) {
                let newDiv = document.createElement('div');
                let name = document.createTextNode(materialsSelect[i].text + ': ');
                let input = document.createElement('input')
                input.type = 'number';
                input.min = '0';
                input.defaultValue = '0';
                input.classList.add('material')
                input.dataset.materialName = materialsSelect[i].text;
                newDiv.appendChild(name);
                if (materialsSelect[i].value === 'by perim') {
                    input.step = '0.01';
                    newDiv.appendChild(input);
                    newDiv.appendChild(document.createTextNode(' штук на м'))
                } else if (materialsSelect[i].value === 'by peace') {
                    newDiv.appendChild(input);
                    newDiv.appendChild(document.createTextNode(' штук'))
                } else {
                    newDiv.appendChild(input);
                    newDiv.appendChild(document.createTextNode(' на м²'))
                    input.step = '0.01';
                }
                p.append(newDiv);
                materialsSelect.remove(i);
            }
        }
    }

    let tools = JSON.parse(document.querySelector('.toolsArray').dataset.toolsArray);
    let toolsSelect = document.getElementById('tools');
    tools.forEach(tool => {
        toolsSelect.add(new Option(tool.name, tool.name, false, false))
    })

    let addToolsButton = document.getElementById('btnAddTools');

    addToolsButton.onclick = function () {
        let p = document.getElementById('toolsP');
        p.classList.remove('hidden');
        for (let i = 0; i < toolsSelect.length; ++i) {
            if (toolsSelect[i].selected) {
                let newDiv = document.createElement('div');
                newDiv.classList.add('tool')
                let name = document.createTextNode(toolsSelect[i].text);
                newDiv.appendChild(name);
                p.append(newDiv);
                toolsSelect.remove(i);
            }
        }
    }

    let repairType = document.getElementById('repairType');
    window.onload = selectRepairs;
    repairKind.onchange = selectRepairs;

    function selectRepairs(ev) {
        repairType.innerHTML = '';
        var c = this.value || 'Косметический ремонт', o;
        for (let i = 0; i < repairs[c].repair_type.length; ++i) {
            o = new Option(repairs[c].repair_type[i].name, repairs[c].repair_type[i].id, false, false);
            repairType.add(o);
        }
    }
})()