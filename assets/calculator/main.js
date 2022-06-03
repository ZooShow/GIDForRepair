import PenTool from 'pen-tool'

let pen = new PenTool("canvas", {
    isFillPath: true
});

document.getElementById("btn").addEventListener("click", function() {
    pen.enablePen();
});

document.getElementById("save").addEventListener("click", function() {
    console.log(pen);
});