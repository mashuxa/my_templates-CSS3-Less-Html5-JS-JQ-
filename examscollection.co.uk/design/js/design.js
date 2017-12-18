(function () {
    function setEventListenerForSearchForm() {
        var searchForm = document.forms.search;
        searchForm.querySelector(".btn").addEventListener("click", function () {
            this.closest("form").submit();
        });
    }
    setEventListenerForSearchForm();

    function toggleExamList() {
        var toggleTriggers = document.querySelectorAll(".exam-name");
        for (var i = 0; i < toggleTriggers.length; i++) {
            var listTrigger = toggleTriggers[i];
            listTrigger.addEventListener("click", function () {
                this.closest("li").classList.toggle("open");
            });
        }
    }
    toggleExamList();
})();