(() => {
    let btnSendComment = document.getElementById('sendComment');
    if (btnSendComment === null) {
        return;
    }
    let id = JSON.parse(document.getElementById('dataId').dataset.id);
    btnSendComment.onclick = function () {
        textareaValue = document.getElementById('textAreaComment').value;
        if (!textareaValue || /^\s*$/.test(textareaValue) || textareaValue.length === 0) {
            alert('Вы ввели неподходящий комментарий!');
            return
        }
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/comment/save", true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.onload = () => {
            if (xhr.status == 200) {
                alert('Комментарий успешно сохранен!');
            }
        }
        xhr.send(JSON.stringify({
            article_id: id,
            comment: textareaValue
        }))
    }
})()