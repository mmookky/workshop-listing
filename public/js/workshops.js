document.addEventListener('DOMContentLoaded', function () {
    var tabs = document.querySelectorAll('.workshop-list-filter__tab');
    var cards = document.querySelectorAll('.workshop-list-card');
    var shownEl = document.querySelector('.workshop-list__count-shown');
    var ACTIVE_CLASS = 'workshop-list-filter__tab--active';
    var ENTER_CLASS = 'workshop-list-card--entering';

    function filterCards(category) {
        var shown = 0;
        var visibleCards = [];

        cards.forEach(function (card) {
            var cardCategories = card.dataset.categories.split('|');
            var match = category === 'all' || cardCategories.indexOf(category) !== -1;

            card.hidden = !match;

            if (match) {
                shown++;
                visibleCards.push(card);
            }
        });

        shownEl.textContent = shown;
        fadeIn(visibleCards);
    }

    function fadeIn(list) {
        list.forEach(function (card) {
            card.classList.add(ENTER_CLASS);
        });

        void document.body.offsetWidth;

        list.forEach(function (card) {
            card.classList.remove(ENTER_CLASS);
        });
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
