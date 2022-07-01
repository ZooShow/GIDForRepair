(()=>{
    let searchBtn = document.getElementById('btnSearch');
    if (searchBtn === null) {
        return
    }
    searchBtn.onclick = function () {
        let searchInput = document.getElementById('searchInput').value;
        console.log(searchInput)
        if (!searchInput || /^\s*$/.test(searchInput) || searchInput.length === 0) {
            return
        }
        window.location.href = '/article/search/?data=' + searchInput;
    }
})()

