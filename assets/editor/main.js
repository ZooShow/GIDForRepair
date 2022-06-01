import EditorJS from "@editorjs/editorjs";
import Header from "@editorjs/header";
import List from "@editorjs/list";
import Embed from '@editorjs/embed';
import ImageTool from "@editorjs/image";
import Checklist from "@editorjs/checklist";
import Marker from "@editorjs/marker";
import Delimiter from "@editorjs/delimiter";
import Table from "@editorjs/table";
import SimpleVideo from 'simple-video-editorjs';

const editor = new EditorJS({
    holderId: "editorJS",
    tools: {
        header: Header,
        image: {
            class: ImageTool,
            config: {
                endpoints: {
                    byFile: 'http://127.0.0.1:8000/article/upload_file', // Your backend file uploader endpoint
                    byUrl: 'http://127.0.0.1:8008/fetchUrl', // Your endpoint that provides uploading by Url
                }
            }
        },
        video: SimpleVideo,
        list: List,
        checklist: Checklist,
        marker: Marker,
        delimiter: Delimiter,
        embed: {
            class: Embed,
            inlineToolbar: true,
        },
        table: Table,
    },
    i18n: {
        /**
         * @type {I18nDictionary}
         */
        messages: {
            /**
             * Other below: translation of different UI components of the editor.js core
             */
            ui: {
                "blockTunes": {
                    "toggler": {
                        "Click to tune": "Нажмите, чтобы настроить",
                        "or drag to move": "или перетащите"
                    },
                },
                "inlineToolbar": {
                    "converter": {
                        "Convert to": "Конвертировать в"
                    }
                },
                "toolbar": {
                    "toolbox": {
                        "Add": "Добавить",
                        'Filter': "Найти",
                        "Nothing found": "Ничего не найдено"
                    }
                }
            },

            /**
             * Section for translation Tool Names: both block and inline tools
             */
            toolNames: {
                "Text": "Параграф",
                "Heading": "Заголовок",
                "List": "Список",
                "Warning": "Примечание",
                "Checklist": "Чеклист",
                "Code": "Код",
                "Delimiter": "Разделитель",
                "Table": "Таблица",
                "Link": "Ссылка",
                "Marker": "Маркер",
                "Bold": "Полужирный",
                "Italic": "Курсив",
                "InlineCode": "Моноширинный",
                "Image": "Изображение",
                "SimpleVideo": "Видео",
            },
            tools: {
                "warning": {
                    "Title": 'Название',
                    "Message": 'Сообщение',
                },
                "linkTool": {
                    "Add a link": "Вставьте ссылку",
                    "Couldn't get this link data, try the other one": "Невозможно получить данные из ссылки, попробуйте другую",
                },
                "stub": {
                    'The block can not be displayed correctly.': 'Блок не может быть отображен'
                },
                "table": {
                    "Add column to left": 'Добавить колонку слева',
                    "Add column to right": 'Добавить колонку справа',
                    "Delete column": 'Удалить колонку',
                    "Add row above": 'Добавить строку сверху',
                    "Add row below": 'Добавить строку снизу',
                    "Delete row": 'Удалить строку',
                },
                "image": {
                    "Select an Image": 'Добавить изображение',
                    "Couldn’t upload image. Please try another.": 'При добавлении изображения произошла ошибка, попробуйте позже.',
                    "With border": 'Добавить рамку',
                    "Stretch image": 'Растянуть изображение',
                    "With background": 'Добавить фон',
                    "Caption": 'Подпись'
                },
                "quote": {
                    "Enter a quote": "Вставьте цитату",
                    "Enter a caption": "Вставьте подпись"
                },
                "embed": {
                    "Enter a caption": "Введите подпись"
                }
            },
            blockTunes: {
                "delete": {
                    "Delete": "Удалить"
                },
                "moveUp": {
                    "Move up": "Переместить вверх"
                },
                "moveDown": {
                    "Move down": "Переместить вниз"
                }
            },
        }
    },
});

let a = document.getElementById('btnSaves');
const edjsHTML = require('editorjs-html');
const edjsParser = edjsHTML();

a.onclick = function () {
    editor.save().then((outputData) => {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/article/save", true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.onload = () => {
            if (xhr.status == 200) {
                console.log(xhr.responseText);
            } else {
                console.log("Server response: ", xhr.statusText);
            }
        };
        let data = {
            data: edjsParser.parse(outputData)
        }
        console.log(JSON.stringify(data))
        xhr.send(JSON.stringify(data))
    }).catch((error) => {
        console.log('Saving failed: ', error)
    });
};