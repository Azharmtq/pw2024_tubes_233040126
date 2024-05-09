function search() {
    var search = document.getElementById("searchInput").value;
    window.location.href = "?search=" + search;
}