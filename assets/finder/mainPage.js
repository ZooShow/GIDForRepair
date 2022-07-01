(()=>{
    let searchBtnMain = document.getElementById('btnSearchMain');
    if (searchBtnMain === null) {
        return
    }
    searchBtnMain.onclick = function () {
        let searchInput = document.getElementById('searchInputMain').value;
        console.log(searchInput)
        if (!searchInput || /^\s*$/.test(searchInput) || searchInput.length === 0) {
            return
        }
        window.location.href = '/article/search/?data=' + searchInput;
    }
})()

