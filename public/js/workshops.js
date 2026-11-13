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

  function findTab(category) {
    return Array.from(tabs).find(function (tab) {
      return tab.dataset.category === category;
    });
  }

  function selectCategory(category) {
    var tab = findTab(category) || findTab('all');

    setActiveTab(tab);
    filterCards(tab.dataset.category);

    return tab.dataset.category;
  }

  function updateUrl(category) {
    var url = new URL(window.location.href);

    if (category === 'all') {
      url.searchParams.delete('category');
    } else {
      url.searchParams.set('category', category);
    }

    history.replaceState(null, '', url.toString());
  }

  tabs.forEach(function (tab) {
    tab.addEventListener('click', function () {
      updateUrl(selectCategory(tab.dataset.category));
    });
  });

  var initialCategory = new URLSearchParams(window.location.search).get('category');

  if (initialCategory) {
    updateUrl(selectCategory(initialCategory));
  }
});
