document.addEventListener('DOMContentLoaded', function () {
    var tabs = document.querySelectorAll('.workshop-list-filter__tab');
    var cards = document.querySelectorAll('.workshop-list-card');
    var shownEl = document.querySelector('.workshop-list__count-shown');
    var ACTIVE_CLASS = 'workshop-list-filter__tab--active';

    function filterCards(category) {
        var shown = 0;

        cards.forEach(function (card) {
            var cardCategories = card.dataset.categories.split('|');
            var match = category === 'all' || cardCategories.indexOf(category) !== -1;

            card.hidden = !match;

            if (match) {
                shown++;
            }
        });

        shownEl.textContent = shown;
    }

    function setActiveTab(activeTab) {
        tabs.forEach(function (tab) {
            tab.classList.toggle(ACTIVE_CLASS, tab === activeTab);
        });
    }

    tabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
            setActiveTab(tab);
            filterCards(tab.dataset.category);
        });
    });
});
